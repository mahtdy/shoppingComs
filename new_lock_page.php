
<?
if($url_temp[1]=='news'){
	$class='fa-newspaper-o';
    $title=$view_news_list ;
	$text=$view_longtext9;
}else if($url_temp[1]=='gallery'){
	$class='fa-camera';
    $title=$view_gallery;
	$text=$view_longtext10;
}else if($url_temp[1]=='video'){
	$class='fa-home';
    $title=$view_video;
	$text=$view_longtext11;
}else {
	$class='fa-home';
    $title=$view_page.' : ';
	$text=$view_longtext12;
}
?>   
<div class="ptitle">
	<div class="container">
		<span class="fa <?=$class?>"></span>
		<h1 class="title"><?=$title?></h1>
		<span class="pdesc"> <?=$text?></span>
	</div>
</div>
<div class="row">
	<div class="new_lock_page_main">
	
		<div class="col-sm-6 col-xs-12 new_lock_page_div pull-right new_lock_page_main_sign">
			<p>
				<i class="fa fa-lock" aria-hidden="true"></i>
			</p>
			<h3>
				<?=$view_were_member?>
			</h3>
			<p>
			<?=$view_login_information?>
			</p>
			<a class="btn btn-primary" id="login"><?=$view_login_site?></a>
			
		</div>

		
		<div class="col-sm-6 col-xs-12 new_lock_page_div pull-right">
			<p>
				<i class="fa fa-user" aria-hidden="true"></i>
			</p>
			<h3>
				<?=$view_you_new?>
			</h3>
			<p>
			 <?=$view_register_information?>
			</p>
			<a class="btn btn-success" id="register"><?=$view_register_site?></a>
		
<script>				
$(document).on('click', '#register', function() {

	window.location='/register/<?=$defult_lang?>';
});
$(document).on('click', '#login', function() {
	$(".login_form").submit();
});
</script>				
 
		</div>
	
	</div>

</div>
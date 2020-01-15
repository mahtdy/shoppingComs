<?$query="SELECT instagram,youtube,facebook,twiter,telegram from new_members where id='{$_SESSION["new_userid"]}'";
$result = $coms_conect->query($query);
while($member_social = $result->fetch_assoc()){
	$instagram=$member_social['instagram'];
	$youtube=$member_social['youtube'];
	$facebook=$member_social['facebook'];
	$twiter=$member_social['twiter'];
	$telegram=$member_social['telegram'];
}?>
<div>
	<div id="show_social_message_div"></div>
	<form  action="" id="social_form"  method="post" enctype="multipart/form-data">
		<div class="col-md-8">
			<div class="form-group">
				<label class="control-label">اینستاگرام</label>
				<div class="input-group">	
					<input type="text" name='instagram' value="<?=$instagram?>" class="form-control">
					<span class="input-group-addon">https://www.instagram.com/</span>
				</div>	
			</div>
			<div class="form-group">
				<label class="control-label">یوتیوب</label>
				<div class="input-group">	
					<input type="text" name="youtube" value="<?=$youtube?>" class="form-control">
					<span class="input-group-addon">https://www.youtube.com/</span>
				</div>	
			</div>
			<div class="form-group">
				<label class="control-label">فیسبوک</label>
				<div class="input-group">	
					<input type="text" name="facebook" value="<?=$facebook?>" class="form-control">
					<span class="input-group-addon">https://www.facebook.com/</span>
				</div>	
			</div>
			<div class="form-group">
				<label class="control-label">تویتر</label>	
				<div class="input-group">
					<input type="text" name="twiter" value="<?=$twiter?>" class="form-control">
					<span class="input-group-addon">https://twitter.com/</span>
				</div>	
			</div>
			<div class="form-group">
				<label class="control-label">تلگرام</label>
				<div class="input-group">
					<input type="text" name="telegram" value="<?=$telegram?>" class="form-control">
					<span class="input-group-addon">https://telegram.me/</span>
				</div>		
			</div>
			<div class="form-group">
				<button type="button" id="update_social" class="btn btn-primary">ویرایش</button>
				<img src="/waiting.gif" id="show_pic_sicoal" style="display:none">
			</div>
		</div>	
	</form>	
</div>
<script>
$("#update_social").click(function() {
	 $('#show_social_message_div').empty(); 
 	$("#show_pic_sicoal").show();
	$.ajax({
		type : "POST",
		url:'/New_members_ajax.php',
		data : 'action=update_member_social&'+$('#social_form').serialize(),
		success : function (data) {
			 $("#show_pic_sicoal").hide();
			 $('#show_social_message_div').html(data);   
		}
	});
 
});
</script>
<style>
.input-group > input{
	direction: ltr !important;
	border-bottom-left-radius: 0px;
	border-top-left-radius: 0px;
}
.input-group-addon{	
	direction: ltr;
	border-right: none;
	border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-top-left-radius: 5px !important;
    border-bottom-left-radius: 5px !important;
    border-left: 10px !important;
}	
</style>
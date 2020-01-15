<?$ftp_servers=injection_replace($_GET["ftp_servers"]);
$server_status=get_result("SELECT status from new_servers where id='$ftp_servers'",$coms_conect);

?>	

<!-- #section:main/filemanager.filemanager -->
<div class="page-header">
	<h1>
		مدیریت فایل
		<small>
			<i class="ace-icon fa fa-angle-double-left"></i>
			لطفا از ایجاد و یا آپلود فایل با املای فارسی خودداری نمائید.
		</small>
		 <!-- #section:main/filemanager.setting -->
			<button class="pull-right btn btn-primary btn-xs" data-title='edit_set' data-toggle='modal' data-target='#edit_set' data-placement='top' rel='tooltip'><span class='glyphicon glyphicon-cog'></span>تنظیمات </button>
		 <!-- /section:main/filemanager.setting -->
	</h1>
</div>
<!-- /section:main/filemanager.filemanager -->
 
<div class="sr-sms-settings-text">
	<form class="form-inline">
	<?if(get_result("select value from new_filemanager_setting where name='active_ftp' and user_id={$_SESSION['manager_id']}",$coms_conect)==1){?>
	  <div class="form-group">
		<label for="ftp_servers" class="control-label">انتخاب سرور</label> 
		<select name="ftp_servers" id="ftp_servers" class="form-control" style="width: 140px;">
			<option value='0'>انتخاب کنید</option>
				<?$query="SELECT a.id,a.server_name from new_servers a,new_servers_permission b where a.id=b.server_id and b.user_id={$_SESSION['manager_id']}"; 
					$result = $coms_conect->query($query);
					while($row = $result->fetch_assoc()) {
					
						$str='';
						 if($row['id']==$ftp_servers)
							$str='selected';
							echo "<option $str value='{$row['id']}'>{$row['server_name']}</option>";
					
				}?>
		</select>
	  </div>
	  <?}?>
		<?if(get_result("select value from new_filemanager_setting where name='active_ftp' and user_id={$_SESSION['manager_id']}",$coms_conect)==1){?>	  
		  <div class="form-group">
			
			<a class="btn btn-success btn-next" id="next_btn" data-value="<?=$ftp_servers?>">فعال کردن سرور </a>
			<?if($server_status==1&&$ftp_servers>0)
			echo "<span style='background-color:#5fb100;color:white;padding:5px 10px'>سرور فعال است</span>";	
			else if($server_status==0&&$ftp_servers>0)
				echo "<span style='background-color:#b10800;color:white;padding:5px 10px'>سرور غیر فعال است</span>";
			?>
			<div id="show_result"></div> 
		  </div>
	 
	</form>
	<br>
	<p>بعد از انتخاب سرور برای مشاهده دیتاها در فایل منیجر و استفاده از آن در کلیه قسمت های سایت حتما روی گزینه فعال سازی کلیلک نمایید.</p>
	 <?}?>
	 
	 
	 
	 
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										فعال کردن گزینه watermark

									</h4>
									<input type="hidden" name="active_watermark" value="0">
									<label class="col-md-6 col-xs-12">
										<input id="active-watermark-checkbox"  name="active_watermark" value="1" <?if(get_result("select value from new_filemanager_setting where name ='active_watermark' and user_id ={$_SESSION['manager_id']}",$coms_conect)==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										لطفا بعد از تغییر گزینه صفحه را رفرش نمایید
										</p>
								</div>	 
	 
	 
	 
	 
	 
	 
	 
	 
</div>




<script>
 	$("#next_btn").click(function () {
		 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=active_filemanager_status&id="+$(this).data('value'),
				 success: function(result){ 
					 $("#show_result").html(result);	
				 }
			});	
	});	
	
	
 	$("#active-watermark-checkbox").click(function () {
		if ($('#active-watermark-checkbox').is(':checked'))
			var a=1;
		else
			var a=0;
		 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=active_watermark_status&id="+a,
				 success: function(result){ 
					 $("#show_result").html(result);	
				 }
			});	
	});		
</script>

<!-- #section:main/filemanager.upload -->
<iframe id="fmframe" width="100%"  height="550" frameborder="0"
	src="/filemanager/dialog.php?type=2">
</iframe>
<!-- /section:main/filemanager.upload -->

 
<script>		 
$('#ftp_servers').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&ftp_servers=") >= 0){
			var b=a.split('&ftp_servers=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&ftp_servers="+$(this).val()+e;
		}
		else
		a +='&ftp_servers='+$(this).val();
		window.location.href = a;
    });
</script>	

<script type="text/javascript">
		$(document).ready(function() {
			 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
			   $(this).val($(this).val().replace(/[^\d].+/, ""));
				if ((event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			});
		});
		
		
		
		
</script>
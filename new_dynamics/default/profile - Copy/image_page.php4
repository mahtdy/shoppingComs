<div>
	<form role="form" action="#" method="post" enctype="multipart/form-data">
		
			<div class="form-group">
				<p><strong>آنچه برای ارسال تصویر جدید باید بدانید:</strong>
					<ul>
						<li>حداکثر حجم فايل 2000 کيلوبايت باشد.</li>
						<li>بافشار دکمه Browse فايل را روي کامپيوترتان انتخاب کرده و دکمه ارسال را بزنيد.</li>
						<li>با کلیک روی لینک :انتخاب تصویر پیش فرض'.'عکس پروفایل حذف شده و عکس پیش فرض تعیین شده از طرف سایت نشان داده خواهد شد.</li>
					</ul>
				</p>
			</div>
			<div class="form-group">
				 <label class="control-label" for="singlebutton">انتخاب عکس صفحه</label>
				 <div class="imgdemo"><img id="img1_preview" src="/yep_theme/default/rtl/images/pic.png"></div>
				 <div style="display: inline-flex;">
				<script>
					setInterval(check_address,2000)													
					function check_address() {
						var aks_news = $('#slide_img1').val(); 
						if(aks_news!=""){				
							$('#img1_preview').attr("src",aks_news);						
						}
					}
				</script>	
					<a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img1" class="btn btn-success iframe-btn" style="padding: 6px 9px 2px 5px;vertical-align: bottom;color:#fff!important;"><span class="fa fa-plus"></span></a>
					 <input id="slide_img1" value='<?=$slide_img1?>' name="slide_img1" class="imginput" type="text"  >
				 </div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">ارسال</button>
			</div>
		
	</form>	
</div>		
							<div id="navication" class="tab-pane">
								<!-- #section:download/download.nav -->
									<div class="form-group" style="margin-top:25px;">
										<label class="control-label" for="selectbasic">انتخاب منبع تصوير ناوبری</label>
										<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
										<div class="col-md-4">
											<select id="source_pic" name="source_pic" class="form-control">
												<option value="0">استفاده از تصوير پيش فرض</option>
												<option value="1" <?if($navication_pic>"")echo 'selected';?>>آپلود تصوير اختصاصي</option>
											</select>
										</div>
									</div>
									<br>
									<br>
									<br>
									<div class="form-group" id="nav_pic_div" <?if($navication_pic==""){?>style='display:none'<?}?>>
										<label class="control-label">بارگزاري تصوير جديد</label>
										<div class="headerimgdemo">
										<img id="aks_thumb" src="/yep_theme/default/rtl/images/pic.png"> 
										</div>
											 <script>
												setInterval(check_address,2000)													
												function check_address() {
													var aks_news = $('#navication_pic').val(); 
													if(aks_news!=""){				
														$('#aks_thumb').attr("src",aks_news);						
													}
												}
											 </script>	
										<div>
												<a href="/filemanager/dialog.php?type=1&amp;field_id=navication_pic"   class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;    vertical-align: bottom;"><span class="addimg flaticon-add133"></span></a>
											<input id="navication_pic" value="<?=$navication_pic?>" name="navication_pic" class="imginput" type="text" >
										</div>
									</div>
									
									<script>	
									$("#source_pic").change(function () {
										if($(this).val()==1){
											$("#nav_pic_div").show();
											$("#navication_pic").val('');
										}	
										else {
											$("#nav_pic_div").hide();
											$("#navication_pic").val('');
											$('#aks_thumb').attr("src",'');	
										}	
									});
									</script>
									</br>
									</br>
									</br>
									</br>
									<!-- /section:download/download.nav -->
								</div>
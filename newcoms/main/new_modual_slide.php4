					<div id="slide" class="tab-pane fade">
									<div style="margin-top:25px;">
										<!-- #section:ads/ads.slide -->
											<div class="col-md-4">
											
												<div class="form-group">
													<div> 
													<input id="slide" <?if($slide==1) echo 'checked';?> value="1" name="slide" type="checkbox" placeholder="">
													  <label class="control-label" for="download_info">اسلاید شو باشد</label>
													</div>
												</div>
												 <div class="form-group">
													 <label class="control-label" for="singlebutton">تصویر اول</label>
													 <div class="imgdemo"><img id="slide_img1_preview" src="/yep_theme/default/rtl/images/pic.png"></div>
													 <div style="display: inline-flex;">
													<script>
														setInterval(check_address,2000)													
														function check_address() {
															var aks_news = $('#slide_img1').val(); 
															if(aks_news!=""){				
																$('#slide_img1_preview').attr("src",aks_news);						
															}
														}
													</script>	
														<a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img1" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
														 <input id="slide_img1" value='<?=$slide_img1?>' name="slide_img1" class="imginput" type="text"  >
													 </div>
												 </div>
												<div class="form-group" style="  display: table-caption;">
													<label class="control-label" for="singlebutton">تصویر دوم</label>
													<div class="imgdemo"><img id="slide_img2_preview" src="/yep_theme/default/rtl/images/pic.png"></div>
													<div style="display: inline-flex;">
													 <script>
														setInterval(check_address,2000)													
														function check_address() {
															var aks_news = $('#slide_img2').val(); 
															if(aks_news!=""){				
																$('#slide_img2_preview').attr("src",aks_news);						
															}
														}
													 </script>
														<a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img2"   class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
														<input id="slide_img2" value='<?=$slide_img2?>' name="slide_img2" class="imginput" type="text"  >
													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="start_date">از تاریخ نمایش</label>
													<div>
														<a href="#"><span class="dateicon flaticon-calendar53"></span></a>
														<input id="end_Slide_show" name="start_date" value='<?=$start_date?>' class="dateinput" type="text"  >
													</div>
													<label class="control-label" for="start_date">تا تاریخ نمایش</label>
													<div>
														<a href="#"><span class="dateicon flaticon-calendar53"></span></a>
														<input id="start_Slide_show" name="finish_date" value='<?=$finish_date?>' class="dateinput" type="text"  >
													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="textinput">عنوان در اسلاید</label>
													<div>
													<input id="slide_title" name="slide_title" value='<?=$slide_title?>' type="text" placeholder="" class="form-control">
													</div>
												</div>
											</div>
											<div class="col-md-8"></div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label" for="text">توضیحات 1</label>
													<div>
													<textarea name="text1" style="width:100%" class="form-control" rows="6"><?=$text1?></textarea>

													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="text2">توضیحات 2</label>
													<div>
													<textarea name="text2" style="width:100%" class="form-control" rows="6"><?=$text2?></textarea>

													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="text3">توضیحات 3</label>
													<div>
													<textarea name="text3" style="width:100%" class="form-control" rows="6"><?=$text3?></textarea>

													</div>
												</div>
											</div>
										<!-- /section:ads/ads.slide -->	
									</div>
								 
								</div>
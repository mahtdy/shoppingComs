<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/jquery.gritter.css" />
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/select2.css" />
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<?$query2="select * from new_managers where id={$_SESSION['manager_id']}";
$result2 = $coms_conect->query($query2);
$RS2 = $result2->fetch_assoc();?>

<?$query2="select status,link from new_modules";
$result2 = $coms_conect->query($query2);
 
while($RS24 = $result2->fetch_assoc()){
	$link=$RS24['link'];
	$module_temp[$link]=$RS24['status'];	
 
}	

if(isset($_POST['avatar'])){
	$avatar=injection_replace($_POST['avatar']);
	$query1="update new_managers set avatar='$avatar' where id={$_SESSION['manager_id']}"; 
	//echo $query1;exit;
	$coms_conect->query($query1);	
}
?>
<br>
<div class="tabbable">
<form action="" method="post">
	<ul class="nav nav-tabs" style="display:none;">
		<li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>دسته بندی <?=$cat_title?></a></li>
	</ul>
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:ads/ads_cat.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span>
				</div>
				<div class="title"><p class="titr">پروفایل مدیر <?=$cat_title?></p><p class="lead">در این بخش امکان افزودن و مدیریت دسته بندی های اختصاص یافته به <?=$cat_title?> را مدیریت کنید</p> 
				</div>
			</div>
			<!-- /section:ads/ads_cat.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

		</div>
		
		<div class="row"> 
			<div class="col-md-12">
				
				<!-- profile html -->
				<div>
					<div id="user-profile-1" class="user-profile row">
						<div class="col-xs-12 col-sm-3 center">
							<div>
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">آواتار</label> 
									<div class="form-group col-md-6">
										<img data-src="holder.js/100%x100%" id="aks_thumb" width="190px;" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+" >
										<br><br>
										<div class="input-group col-md-12">
											<input type="text" class="form-control" name="avatar" value="<?=$RS2['avatar']?>" id="avatar">
											<span class="input-group-btn">
												<a href="/filemanager/dialog.php?type=1&amp;field_id=avatar" class="btn btn-sm btn-default iframe-btn"  type="button">
													<i class="ace-icon fa fa-upload bigger-110"></i>
													انتخاب
												</a>
											</span>
										</div>
										<script>
										setInterval(check_address,2000)													
										function check_address() {
											var aks_news = $('#avatar').val(); 
											if(aks_news!=""){				
												$('#aks_thumb').attr("src",aks_news);						
											}
										}
										</script>
									</div>
								</div>							
							
								<!-- #section:pages/profile.picture -->
								<!--span class="profile-picture">
									<img id="avatar" class="editable img-responsive" alt="آواتار" src="<?=$RS2['avatar']?>" />
								</span-->

								<!-- /section:pages/profile.picture -->
								<div class="space-4"></div>

								<div class="width-80 btn btn-primary label-xlg arrowed-in arrowed-in-right">
									<div class="inline position-relative">
										<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
											<i class="ace-icon fa fa-circle light-green"></i>
											&nbsp;
											<span class="white">اسماعیل فاضل نیارکی</span>
										</a>

								 
									</div>
								</div>
							</div>

							<div class="space-6"></div>

							<!-- /section:pages/profile.contact -->
							<div class="hr hr12 dotted"></div>

							<!-- #section:custom/extra.grid -->
							<div class="clearfix">
								<div class="grid2">
									<span class="bigger-175 blue">0</span>

									<br />
									دنبال کنندگان شما
								</div>

								<div class="grid2">
									<span class="bigger-175 blue"><?=get_result("select count(id) from new_manager_pm where resiver='{$_SESSION['manager_user_name']}'",$coms_conect)?></span>

									<br />
									پیام دریافتی
								</div>
							</div>

							<!-- /section:custom/extra.grid -->
							<div class="hr hr16 dotted"></div>
						</div>

						<div class="col-xs-12 col-sm-9">
							<div class="center">
								<?if($module_temp['page']==0){?>
								<a href="/newcoms.php?yep=new_Pages" target="_blank">
								<span class="btn btn-app btn-sm btn-light no-hover">
									<span class="line-height-1 bigger-170 blue"> <?=get_result("select count(id) from new_static_page where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> صفحه </span>
								</span>
								</a>
								<?}if($module_temp['news']==0){?>
								<a href="/newcoms.php?yep=new_newstext" target="_blank">
								<span class="btn btn-app btn-sm btn-yellow no-hover">
									<span class="line-height-1 bigger-170">  <?=get_result("select count(id) from new_news where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> اخبار </span>
								</span>
								</a>
								<?}if($module_temp['gallery']==0){?>
								<a href="/newcoms.php?yep=new_gallery" target="_blank">
								<span class="btn btn-app btn-sm btn-pink no-hover">
									<span class="line-height-1 bigger-170">  <?=get_result("select count(id) from new_gallery where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> گالری عکس </span>
								</span>
								</a>
								<?}if($module_temp['video']==0){?>
								<a href="/newcoms.php?yep=new_video" target="_blank">
								<span class="btn btn-app btn-sm btn-grey no-hover">
									<span class="line-height-1 bigger-170">  <?=get_result("select count(id) from new_video where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> ویدئو </span>
								</span>
								</a>
								<?}if($module_temp['article']==0){?>
								<a href="/newcoms.php?yep=new_article" target="_blank">
								<span class="btn btn-app btn-sm btn-success no-hover">
									<span class="line-height-1 bigger-170">  <?=get_result("select count(id) from new_article where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> مقاله </span>
								</span>
								</a>
								<?}if($module_temp['download']==0){?>
								<a href="/newcoms.php?yep=new_download" target="_blank">
								<span class="btn btn-app btn-sm btn-primary no-hover">
									<span class="line-height-1 bigger-170">  <?=get_result("select count(id) from new_download where user_id='{$_SESSION['manager_id']}'",$coms_conect)?> </span>

									<br />
									<span class="line-height-1 smaller-90"> دانلود </span>
								</span>
								</a>
								<?}?>
							</div>

							<div class="space-12"></div>

							<!-- #section:pages/profile.info -->
							<div class="profile-user-info profile-user-info-striped">
								<div class="profile-info-row">
									<div class="profile-info-name"> نام کامل </div>

									<div class="profile-info-value">
										<span class="editable" data-pk="0" data-value="<?=$RS2['name']?>"  id="xusername"><?=$RS2['name']?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name">ایمیل </div>

									<div class="profile-info-value">
										<span data-pk="0" data-value="<?=$RS2['email']?>" class="editable editable-click" id="manager_email"> <?=$RS2['email']?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> شماره موبایل </div>

									<div class="profile-info-value">
										<span class="editable" data-pk="0" data-value="<?=$RS2['mobile']?>" id="xmobile"><?=$RS2['mobile']?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> شماره تلفن </div>

									<div class="profile-info-value">
										<span class="editable" data-pk="0" data-value="<?=$RS2['phone']?>" id="xtell"> <?=$RS2['phone']?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> سمت </div>

									<div class="profile-info-value">
										<span class="editable" id="semat"> <?=$_SESSION['manager_semat']?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> مدیر سطح بالایی </div>

									<div class="profile-info-value">
										<span class="editable" id="admin"><?=get_result("select name from new_managers where id={$RS2['parent_id']}",$coms_conect);?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> سطح دسترسی </div>

									<div class="profile-info-value">
										<span class="editable" id="avalible"><?=get_result("select name from new_groups where id={$RS2['group_id']}",$coms_conect);?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> امکانات فعال شما </div>

									<div class="profile-info-value">
									<?$str='';
									if($RS2['can_add']==1)$str .='درج محتوا<br>';
									if($RS2['can_edit']==1)$str .='ویرایش محتوا<br>';
									if($RS2['can_delete']==1)$str .='حذف محتوا<br>';
									if($RS2['can_draft']==1)$str .='پیش نویس محتوا<br>';
									?>
										<span class="editable" id="feature"><?=$str?></span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> نام سایت </div>

									<div class="profile-info-value">
										<span class="editable" id="site">
											<?$query2="select name,title from new_manage_lang a, new_subsite b where b.id=a.lang_id and type='s' and manager_id={$RS2['id']}";
											$result2 = $coms_conect->query($query2);
											while($RS23 = $result2->fetch_assoc()){
												echo $RS23['title'].' ( '.$RS23['name'].' ) <br>';
											}?>
										</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> زبان سایت </div>

									<div class="profile-info-value">
										<span class="editable" id="lang">
											<?$query2="select name,title from new_manage_lang a, new_language b where b.id=a.lang_id and type='l' and manager_id={$RS2['id']}";
											$result2 = $coms_conect->query($query2);
											while($RS23 = $result2->fetch_assoc()){
												echo $RS23['name'].' ( '.$RS23['title'].' ) <br>';
											}?>
										</span>
									</div>
								</div>

								<div class="profile-info-row">
									<div class="profile-info-name"> تاریخ آخرین ورود </div>

									<div class="profile-info-value"> 
										<span class="editable" id="lastlogin"><?if($RS2['last_login']!='0000-00-00 00:00:00') echo $temp[1].'  '.miladitojalalidefult($RS2['last_login']);else echo 'ورودی صورت نگرفته است';?></span>
									</div>
								</div>
								
								<div class="profile-info-row">
									<div class="profile-info-name"> تاریخ اعتبار کلمه عبور </div>

									<div class="profile-info-value">
										<span class="editable" id="validlogin"><?=miladitojalaliuser($RS2['expire_date'])?></span>
									</div>
								</div>
								
								<div class="profile-info-row">
									<div class="profile-info-name"> آدرس </div>

									<div class="profile-info-value">
										<i class="fa fa-map-marker light-orange bigger-110"></i>
										<span class="editable" data-pk="0" data-value="<?=$RS2['address']?>" id="xcountry"> <?=$RS2['address']?></span>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
				<!-- end profile html -->
				
			</div><!-- end .col-md-12--> 
		</div><!-- end row-->
		
		<div class="panel-footer bttools">
			<button type="submit" id="submit_page" class="btn btn-success"><span class="flaticon-verified9"></span>ذخیره</button>
		</div>
	</div>
	<form>		
</div>			

<script src="/yep_theme/default/rtl/assets/js/jquery.gritter.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/select2.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-editable.css" />
<script src="/yep_theme/default/rtl/assets/js/x-editable/bootstrap-editable.min.js"></script>
<!--script src="/yep_theme/default/rtl/assets/js/x-editable/ace-editable.min.js"></script-->

<style>
.gritter-title{
	font-family: IRANsans;
}
.gritter-item p{
	font-family: IRANsans;
}
</style>
<!-- inline scripts related to this page -->
<script type="text/javascript">
$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false,
		});
 


jQuery(function($) {

	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
	$.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
								'<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    

 
	$('#xusername').editable({
		type: 'text',
		name:'change_manager_name',
		url: '/New_ajax.php',
		value:$("#x_editable_val").val(),
		source:"{1: 'منتشر شده',0: 'پيش نويس'}",
		ajaxOptions: {
		type: 'get',
		},
	});


	$('#manager_email').editable({
		type: 'text',
		name:'change_manager_email',
		url: '/New_ajax.php',
		value:$("#x_editable_val").val(),
		ajaxOptions: {
			type: 'get',
		},
	})


	$('#xmobile').editable({
		type: 'text',
		name:'change_manager_mobile',
		url: '/New_ajax.php',
		value:$("#x_editable_val").val(),
		ajaxOptions: {
			type: 'get',
		},
	});

	$('#xtell').editable({
		type: 'text',
		name:'change_manager_phone',
		url: '/New_ajax.php',
		value:$("#x_editable_val").val(),
		ajaxOptions: {
			type: 'get',
		},
	});
	
	$('#xcountry').editable({
		type: 'text',
		name:'change_manager_address',
		url: '/New_ajax.php',
		value:$("#x_editable_val").val(),
		ajaxOptions: {
			type: 'get',
		},
	});	
	

// *** editable avatar *** //
 
try {//ie8 throws some harmless exceptions, so let's catch'em

	//first let's add a fake appendChild method for Image element for browsers that have a problem with this
	//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
	try {
		document.createElement('IMG').appendChild(document.createElement('B'));
	} catch(e) {
		Image.prototype.appendChild = function(el){}
	}

	var last_gritter
	$('#avatar').editable({
		type: 'image',
		name: 'avatar',
		value: null,
		image: {
			//specify ace file input plugin's options here
			btn_choose: 'تغییر آواتار',
			droppable: true,
			maxSize: 110000,//~100Kb

			//and a few extra ones here
			name: 'avatar',//put the field name here as well, will be used inside the custom plugin
			on_error : function(error_type) {//on_error function will be called when the selected file has a problem
				if(last_gritter) $.gritter.remove(last_gritter);
				if(error_type == 1) {//file format error
					last_gritter = $.gritter.add({
						title: 'فایل مورد نظر عکس نیست',
						text: 'لطفا عکس را با فرمت jpg/gif/png انتخاب کنید',
						class_name: 'gritter-error gritter-center'
					});
				} else if(error_type == 2) {//file size rror
					last_gritter = $.gritter.add({
						title: 'عکس بسیار بزرگ است',
						text: 'سایز عکس نباید بیش از 100kb باشد',
						class_name: 'gritter-error gritter-center'
					});
				}
				else {//other error
				}
			},
			on_success : function() {
				$.gritter.removeAll();
			}
		},
		url: function(params) {
			// ***UPDATE AVATAR HERE*** //
			//for a working upload example you can replace the contents of this function with 
			//examples/profile-avatar-update.js

			var deferred = new $.Deferred

			var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
			if(!value || value.length == 0) {
				deferred.resolve();
				return deferred.promise();
			}


			//dummy upload
			setTimeout(function(){
				if("FileReader" in window) {
					//for browsers that have a thumbnail of selected image
					var thumb = $('#avatar').next().find('img').data('thumb');
					if(thumb) $('#avatar').get(0).src = thumb;
				}
				
				deferred.resolve({'status':'OK'});

				if(last_gritter) $.gritter.remove(last_gritter);
				last_gritter = $.gritter.add({
					title: 'آواتار بروز شد',
					text: 'آپلود آواتار با موفقیت انجام شد',
					class_name: 'gritter-info gritter-center'
				});
				
			 } , parseInt(Math.random() * 800 + 800))

			return deferred.promise();
			
			// ***END OF UPDATE AVATAR HERE*** //
		},
		
		success: function(response, newValue) {
		}
	})
}catch(e) {}


});
 

</script>
		
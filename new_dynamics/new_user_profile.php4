<link rel="stylesheet" href="/css/datatables/datatables.css">
<link rel="stylesheet" href="/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/css/datatables-responsive/dataTables.yepco.css">

<script src="/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/js/datatables/datatables.js"></script>
<script src="/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/js/datatables-responsive/dataTables.yepco.js"></script>



 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="del_pm"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div> 

 <div class="modal fade" id="delete_favorite" tabindex="-2" role="dialog" aria-labelledby="delete_favorite" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="del_favorite"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div> 

<?if($_SESSION["new_okusername"]=="")
	echo "<script>window.location='/logout'</script>";


		$avatar_name= $_FILES["avatar"]["name"];
		if($avatar_name>""){
			$avatar_type= $_FILES["avatar"]["type"];
			$avatar_tmp= $_FILES["avatar"]["tmp_name"];
			$avatar_path="new_avatar/$avatar_name";
			upload_file($avatar_name,$avatar_type,$avatar_tmp,$avatar_path);
			$condition="user_name='{$_SESSION["new_okusername"]}'";
			$arr_pic=array("avatar"=>$avatar_name);
			update_data_base($arr_pic,'new_members',$condition,$coms_conect);
			
		}
$sms_login=injection_replace($_POST['sms_login']);
$name=injection_replace($_POST['name']);
$question=injection_replace($_POST['question']);
$answer=injection_replace($_POST['answer']);
$family=injection_replace($_POST['family']);
$password=injection_replace($_POST['password']);
$new_password=injection_replace($_POST['new_password']);$pass='';

$pass="'name'=>$new_password,";
$mobile=injection_replace($_POST['mobile']);
$type=injection_replace($_POST['type']);
$email=injection_replace($_POST['email']);
$favorites=injection_replace($_POST['favorites']);
$job=injection_replace($_POST['job']);
$about_me=injection_replace($_POST['about_me']);
$website=injection_replace($_POST['website']);
$ok=1;
if($name>""){
	if(check_password($_SESSION["new_userpassword"],$password,$_SESSION["new_username"])==0&&$new_password>""&&$password>''){
		echo "<script>alert('کلمه عبور اشتباه است')</script>";
		$ok=0;
	}else if(check_password($_SESSION["new_userpassword"],$password,$_SESSION["new_username"])==1&&$new_password>""&&$password>''){
	$_SESSION["new_userpassword"]=create_password($_SESSION["new_username"],$new_password);
	}
	if($ok==1){	
		$condition="user_name='{$_SESSION["new_okusername"]}'";
		$arr_imag=array("question"=>$question,"answer"=>$answer,"sms_login"=>$sms_login,"name"=>$name,"family"=>$family,"password"=>$_SESSION["new_userpassword"],"mobile"=>$mobile,"email"=>$email,"favorites"=>$favorites,"job"=>$job,"about_me"=>$about_me,"website"=>$website);
		update_data_base($arr_imag,'new_members',$condition,$coms_conect);
		

	}	
}	
	
if($_SESSION["new_okusername"]>""){
$query="SELECT * FROM new_members where user_name='{$_SESSION["new_okusername"]}'";

	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();	
	
	$family=$row['family'];
	$name=$row['name'];
	$password=$row['password'];
	$mobile=$row['mobile'];
	$type=$row['type'];
	$email=$row['email'];
	$favorites=$row['favorites'];
	$job=$row['job'];
	$about_me=$row['about_me'];
	$website=$row['website'];
	$avatar=$row['avatar'];
	$sms_login=$row['sms_login'];
	$question=$row['question'];
	$answer=$row['answer'];
}	
?>
</br>
<!-- CONTENT -->
			<section>
				<div class="container">

					<div class="clearfix tab-header">

						<!-- tabs nav -->
						<ul class="nav nav-tabs pull-left">
							<li class="active"><!-- TAB 1 -->
								<a href="#tab-1" data-toggle="tab"><i class="fa fa-eye text-muted"></i> پروفايل</a>
							</li>
							<li class=""><!-- TAB 2 -->
								<a href="#tab-2" data-toggle="tab"><i class="fa fa-cogs text-muted"></i> حساب کاربری</a>
							</li>
						</ul>
						<!-- /tabs nav -->

					</div>

					<div class="clearfix tab-body profile-tabs">

						<!-- tabs content -->
						<div class="tab-content transparent">

							<!-- TAB 1 CONTENT -->
							<div id="tab-1" class="tab-pane active">
								
								<div class="row">

									<!-- LEFT -->
									<div class="col-lg-3 col-md-4">

										<!-- IMAGE -->
										<figure class="default-gradient bg-silver text-center margin-bottom8">
											<!--span class="buttons-over-image">
												<a href="#" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> ويرايش</a>
												<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> حذف</a>
											</span-->

											<!-- 230 x 340 px -->
											<!--img class="img-responsive" src="/yep_theme/images/demo/people/9_thumb.jpg" alt="" /-->
										</figure>
										<!-- /IMAGE -->

										<!-- BUTTONS -->
										
									<?/*?>	<div class="margin-bottom8 profile-buttons">
											<div class="row text-center">

												<!-- Followers -->
												<div class="col-md-6 col-sm-6 col-xs-6">
													<h2>20,7K</h2>
													<!--span class="block text-muted fsize12">Followers</span-->

													<a href="#" class="btn btn-success btn-sm margin-top20">
														<span class="fa fa-plus-circle"></span> دنبال کردن
													</a>
												</div>

												<!-- Following -->
												<div class="col-md-6 col-sm-6 col-xs-6">
													<h2>1,3K</h2>
													<!--span class="block text-muted fsize12">Following</span-->

													<a href="#" class="btn btn-info btn-sm margin-top20">
														<span class="fa fa-user"></span> پروفایل 
													</a>
												</div>

											</div>
										</div>
										<?*/?>
										<!-- /BUTTONS -->

										<!-- MENU -->
										
										<ul class="side-nav list-group margin-bottom30" style="direction:rtl;">
											<li class="list-group-item active"><a href="#a" data-toggle="tab"><i class="fa fa-home"></i> پروفایل</a></li>
											<!--li class="list-group-item list-toggle">
												<a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-2"><i class="fa fa-level-down"></i> منو بازشونده</a>
												<ul id="collapse-2" class="collapse"><!-- NOTE: "collapse in" to be open on page load >
													<li><a href="#"><i class="fa fa-angle-left"></i> مورد اول</a></li>
													<li><a href="#"><i class="fa fa-angle-left"></i> Option #2</a></li>
													<li><a href="#"><i class="fa fa-angle-left"></i> Option #3</a></li>
												</ul>
											</li-->

											<li class="list-group-item"><a href="#p" data-toggle="tab"><i class="fa fa-comments"></i> پیام های دریافتی</a></li>
											<li class="list-group-item"><a href="#h" data-toggle="tab"><i class="fa fa-edit"></i> علاقه مندیهای من</a></li>
											<li class="list-group-item"><a href="#z" data-toggle="tab"><i class="fa fa-users"></i> دوستان</a></li>
										</ul>
										<!-- /MENU -->

										<!-- USER ACTIVITY -->
										</div>
										
										<div class="col-lg-9 col-md-8" style="direction:rtl;">						
											<div class="tab-content transparent">
												<div class="tab-pane active" id="a"></div>
												<div class="tab-pane" id="z"></div>
												<div class="tab-pane" id="p">
													<div class="tt">
														<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
														<thead>
															<tr>	
							 
																<th>نمایش پیام</th>
																<th>نام فرستنده</th>
																<th>تاریخ</th>
																<th><?=$new_sysmenu[2]?></th>
																
															</tr>
														</thead>
														<tbody>
																<?$i=1;$query="select * from new_member_pm where resiver='{$_SESSION["new_okusername"]}' ";
																$result = $coms_conect->query($query);
																	while($RS1 = $result->fetch_assoc()) {
																	?>
															<tr>
												
																 <td><?=$RS1['text']?></td>
																<td><?=$RS1['sender']?></td>
																<td><?=miladitojalaliuser(date('Y-m-d',$RS1['date']));?></td>
																<td>

																	<a class="red del_qaz" id="<?=$RS1['id']?>" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="<?=$s_Pages_delete?>" style="font-size: 15px !important;">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</a>
							 
																</td>
															</tr>
																<?$i++;}?>
														</tbody>
													</table>
												</div>
												</div>	
												
												<div class="tab-pane" id="h">
												<div class="tt">
													<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
													<thead>
														<tr>	
						 
															<th>ردیف</th>
															<th>صفحه</th>
															<th><?=$new_sysmenu[2]?></th>
															
														</tr>
													</thead>
													<tbody>
															<?$query="select * from new_favorite where user_name='{$_SESSION["new_okusername"]}' group by url";
															$result = $coms_conect->query($query);
																while($RS1 = $result->fetch_assoc()) {?>
														<tr>
															 <td><?=$i?></td>
															<td><a href='<?=$RS1['url']?>' target='_balnk'><?=$RS1['url']?></a></td>
															<td>

																<a class="red del_favorite" id="<?=$RS1['id']?>" data-title="delete_favorite" data-toggle="modal" data-target="#delete_favorite" data-placement="top" rel="tooltip" title="<?=$s_Pages_delete?>" style="font-size: 15px !important;">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i>
																</a>
						 
															</td>
														</tr>
															<?$i++;}?>
													</tbody>
												</table>
												</div>
												</div>
											</div>
										</div>

					
					
										<!-- activity list -->
										<?/*?><div class="row profile-activity hidden-xs">

											<!-- activity item -->
											<div class="col-xs-2 col-sm-1">
												<time datetime="2014-06-29" class="datebox">
													<strong>Jun</strong>
													<span>29</span>
												</time>
											</div>

											<div class="col-xs-10 col-sm-11">
												<h6><a href="#">مدیریت محتوا CMS</a></h6>
												<p>
													یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است که می توانید از حداقل منابع خود حداکثر استفاده را ببرید
												</p>
											</div>
											<!-- /activity item -->

											<div class="col-sm-12">
												<hr class="half-margins" />
											</div><!-- /activity separator -->

											<!-- activity item -->
											<div class="col-xs-2 col-sm-1">
												<time datetime="2014-06-29" class="datebox">
													<strong>Jun</strong>
													<span>29</span>
												</time>
											</div>

											<div class="col-xs-10 col-sm-11">
												<h6><a href="#">Voip سانترال تحت شبکه</a></h6>
												<p>
													یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است که می توانید از حداقل منابع خود حداکثر استفاده را ببرید
												</p>
											</div>
											<!-- /activity item -->

											<div class="col-sm-12">
												<hr class="half-margins" />
											</div><!-- /activity separator -->

											<!-- activity item -->
											<div class="col-xs-2 col-sm-1">
												<time datetime="2014-06-29" class="datebox">
													<strong>Jun</strong>
													<span>29</span>
												</time>
											</div>

											<div class="col-xs-10 col-sm-11">
												<h6><a href="#">افزایش پایداری و امنیت</a></h6>
												<p>
													یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است که می توانید از حداقل منابع خود حداکثر استفاده را ببرید
												</p>
											</div>
											<!-- /activity item -->

											<div class="col-sm-12">
												<hr class="half-margins" />
											</div><!-- /activity separator -->

											<!-- paginatoin -->
											<div class="text-center">
												<ul class="pagination pagination-sm">
													<li class="disabled"><a href="#">قبلی</a></li>
													<li class="active"><a href="#">1</a></li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#">بعدی</a></li>
												</ul>													
											</div>
											<!-- /paginatoin -->

										</div>
										<?*/?>
										<!-- /activity list -->

										<!-- /USER ACTIVITY -->

									

									<!-- RIGHT -->
								<?/*?>	<div class="col-md-7" style="  direction: rtl;">

										<h3 class="nomargin">احسان محمدی</h3>
										<span class="margin-bottom20 margin-top6 block gray fsize12">کارگردان خلاق</span>

										<p>
											یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است که می توانید از حداقل منابع خود حداکثر استفاده را ببرید
										</p>

										<p>
											<a href="#" class="btn btn-default btn-xs"><i class="fa fa-envelope"></i> ارسال پیام</a>
										</p>


										<ul class="has-icons list-unstyled" style="direction:rtl;padding-right: 0;">
											<li><i class="gray fa fa-map-marker"></i> ایالت متحده</li>
											<li><i class="gray fa fa fa-pagelines"></i> 28 ساله</li>
											<li><i class="gray fa fa-trophy"></i> فروشنده تاپ</li>
											<li><i class="gray fa fa-briefcase"></i> Photoshop, Corel, برنامه نویسی</li>
											<li class="margin-top10">
												<a href="#" data-toggle="tooltip" data-placement="top" title="Facebook" class="btn ico-only btn-facebook btn-xs"><i class="fa fa-facebook"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Twitter" class="btn ico-only btn-twitter btn-xs"><i class="fa fa-twitter"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Google plus" class="btn ico-only btn-google-plus btn-xs"><i class="fa fa-google-plus"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Linked In" class="btn ico-only btn-linkedin btn-xs"><i class="fa fa-linkedin"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest" class="btn ico-only btn-pinterest btn-xs"><i class="fa fa-pinterest"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Flickr" class="btn ico-only btn-flickr btn-xs"><i class="fa fa-flickr"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Tumblr" class="btn ico-only btn-tumblr btn-xs"><i class="fa fa-tumblr"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Skype" class="btn ico-only btn-skype btn-xs"><i class="fa fa-skype"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Stack Overflow" class="btn ico-only btn-stackoverflow btn-xs"><i class="fa fa-stack-overflow"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Instagram" class="btn ico-only btn-instagram btn-xs"><i class="fa fa-instagram"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Dribble" class="btn ico-only btn-dribbble btn-xs"><i class="fa fa-dribbble"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Youtube" class="btn ico-only btn-youtube btn-xs"><i class="fa fa-youtube"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Vimeo" class="btn ico-only btn-vimeo btn-xs"><i class="fa fa-vimeo-square"></i></a>
												<a href="#" data-toggle="tooltip" data-placement="top" title="Rss" class="btn ico-only btn-rss btn-xs"><i class="fa fa-rss"></i></a>
											</li>
										</ul>

										<hr />

										<form class="well">
											<textarea rows="2" class="form-control" placeholder="چه چیزی به ذهنتان میرسد؟"></textarea>

											<div class="margin-top-10">
												<button type="submit" class="btn btn-sm btn-primary pull-right">پست</button>
												<a href="#" class="btn btn-link profile-btn-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="افزودن مکان"><i class="fa fa-map-marker"></i></a>
												<a href="#" class="btn btn-link profile-btn-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="افزودن عکس"><i class="fa fa-camera"></i></a>
												<a href="#" class="btn btn-link profile-btn-link" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="افزودن فایل"><i class="fa fa-file"></i></a>
											</div>
										</form>


										<!-- COMMENT -->
										<ul class="comment list-unstyled">
											<li class="comment">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small3.jpg" width="50" height="50" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 12 دقیقه پیش </small>
														<span>احسان محمدی</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است که می توانید از حداقل منابع خود حداکثر استفاده را ببرید
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-info"><i class="fa fa-reply"></i> پاسخ</a>
													</li>
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li>
														<a href="#" class="text-muted">نمایش همه پیام ها (36)</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul>
											</li><!-- /options -->

											<li class="comment comment-reply">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small1.jpg" width="35" height="35" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 4دقیقه پیش </small>
														<span>مهدی</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است <i class="fa fa-smile-o green"></i> 
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul><!-- /options -->

											</li>

											<li class="comment comment-reply">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small2.jpg" width="35" height="35" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 1 دقیقه پیش </small>
														<span>احسان</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است <i class="fa fa-smile-o green"></i> 
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul><!-- /options -->

											</li>
										</ul>
										<!-- /COMMENT -->

										<!-- COMMENT -->
										<ul class="comment list-unstyled">
											<li class="comment">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small4.jpg" width="50" height="50" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 12 دقیقه پیش </small>
														<span>مهدی</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است  
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-info"><i class="fa fa-reply"></i> پاسخ</a>
													</li>
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul>
											</li><!-- /options -->

											<li class="comment comment-reply">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small3.jpg" width="35" height="35" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 4 دقیقه پیش </small>
														<span>حسن</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است <i class="fa fa-smile-o green"></i> 
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul><!-- /options -->

											</li>

											<li class="comment comment-reply">

												<!-- avatar -->
												<img class="avatar" src="/yep_theme/images/demo/fashion/thumb/small5.jpg" width="35" height="35" alt="avatar" />

												<!-- comment body -->
												<div class="comment-body"> 
													<a href="#" class="comment-author">
														<small class="text-muted pull-right"> 1 دقیقه پیش </small>
														<span>مهدی</span>
													</a>
													<p>
														یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است <i class="fa fa-smile-o green"></i> 
													</p>
												</div><!-- /comment body -->

												<!-- options -->
												<ul class="list-inline fsize11">
													<li>
														<a href="#" class="text-success"><i class="fa fa-thumbs-up"></i> Like</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-danger">حذف</a>
													</li>
													<li class="pull-right">
														<a href="#" class="text-primary">ویرایش</a>
													</li>
												</ul><!-- /options -->

											</li>
											<li>
												<div class="input-group">
													<input id="btn-input" type="text" class="form-control" placeholder="نوشتن پیام ....">
													<span class="input-group-btn">
														<button class="btn btn-primary" id="btn-chat">
															<i class="fa fa-reply"></i> پاسخ
														</button> 
													</span>
												</div>
											</li>
										</ul>
										<!-- /COMMENT -->

									</div>
									<?*/?>
								</div>
								
							</div>
							<!-- /TAB 1 CONTENT -->

							<!-- TAB 2 CONTENT -->
							<div id="tab-2" class="tab-pane" style="  direction: rtl;">

								<div class="row">

									<!-- LEFT -->
									<div class="col-lg-3 col-md-4">

										<!-- MENU -->
										<div class="clearfix tab-header">
											<ul class="side-nav list-group margin-bottom30">
												<li class="list-group-item active"><a href="#tab-s1" data-toggle="tab"><i class="fa fa-cog"></i> اطلاعات شخصی</a></li>
												<li class="list-group-item"><a href="#tab-s2" data-toggle="tab"><i class="fa fa-eye"></i> عوض کردن آواتار</a></li>
												<li class="list-group-item"><a href="#tab-s3" data-toggle="tab"><i class="fa fa-lock"></i> عوض کردن رمز عبور</a></li>
												<li class="list-group-item"><a href="#tab-s4" data-toggle="tab"><i class="fa fa-cogs"></i> تنظیمات شخصی</a></li>
											</ul>
										</div>
										<!-- /MENU -->

									</div>

									<!-- RIGHT -->
									<div class="col-lg-9 col-md-8" style="direction:rtl;">
										<div class="tab-content transparent">

											<!-- SETTINGS TAB 1 -->
											<div id="tab-s1" class="tab-pane active">

												<form role="form" action="#" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<label class="control-label">نام</label>
														<input type="text" value="<?=$name?>" name='name' class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">نام خانوادگی</label>
														<input type="text" value="<?=$family?>" name="family"  class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">تلفن همراه</label>
														<input type="text" value="<?=$mobile?>" name="mobile" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">ایمیل</label>
														<input type="text" value="<?=$email?>" name="email" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">علاقه مندی ها</label>
														<input type="text" value="<?=$favorites?>" name="favorites"  class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">شغل</label>
														<input type="text" value="<?=$job?>" name="job" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">درباره من</label>
														<textarea class="form-control"  name="about_me" rows="3" ><?=$about_me?></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">آدرش وبسایت</label>
														<input type="text" value="<?=$website?>" name="website" class="form-control">
													</div>

											</div>
											<!-- /SETTINGS TAB 1 -->

											<!-- SETTINGS TAB 2 -->
											<div id="tab-s2" class="tab-pane">

													<div class="form-group">

														<div class="row">

															<div class="col-lg-3 col-md-3 col-sm-12">

																<div class="default-gradient thumbnail">
																	<img class="img-responsive" id="user_avatar" src="/new_avatar/<?=get_user_avatar($avatar)?>" alt="" />
																</div>

															</div>

															<div class="col-lg-7 col-md-7 col-sm-12">

																<div class="sky-form nomargin">
																	<label class="label">انتخاب فایل</label>
																	<label for="file" class="input input-file">
																		<div class="button">
																			<input type="file" name='avatar' id="file" onchange="this.parentNode.nextSibling.value = this.value">
																		</div>
																		<!--input type="text" readonly-->
																	</label>
																</div>

																<a href="#" id="del_avatar" class="btn btn-danger btn-xs "><i class="fa fa-times"></i> حذف آواتار</a>

																<!--div class="clearfix margin-top20">
																	<span class="label label-warning">یادداشت! </span>
																	<p>
																		یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است
																	</p>
																</div-->

															</div>

														</div>

													</div>

		


											</div>
											<!-- /SETTINGS TAB 2 -->

											<!-- SETTINGS TAB 3 -->
											<div id="tab-s3" class="tab-pane">

												
													<div class="form-group">
														<label class="control-label">رمز عبور کنونی</label>
														<input type="password" name="password"  class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">رمز عبور جدید</label>
														<input type="password" name="new_password" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">تکرار رمز عبور جدید</label>
														<input type="password" name="confirm_password" class="form-control">
													</div>



											</div>
											<!-- /SETTINGS TAB 3 -->

											<!-- SETTINGS TAB 4 -->
											<div id="tab-s4" class="tab-pane">
											
													<div class="sky-form">

														<table class="table table-bordered table-striped">
															<tbody>
																<tr>
																	<td>فعال کردن ورود دومرحله ای</td>
																	<td>
																		<div class="inline-group">
																			<label class="radio">
																				<input type="radio" value='1' name="sms_login" <?if($sms_login==1) echo 'checked'?>><i></i> بله
																			</label>

																			<label class="radio">
																				<input type="radio" value='0' name="sms_login" <?if($sms_login==0) echo 'checked'?> ><i></i> خیر
																			</label>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است</td>
																	<td>
																		<label class="checkbox nomargin">
																			<input type="checkbox" name="checkbox" checked=""><i></i> بله
																		</label>
																	</td>
																</tr>
																<tr>
																	<td>یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است</td>
																	<td>
																		<label class="checkbox nomargin">
																			<input type="checkbox" name="checkbox" checked=""><i></i> بله
																		</label>
																	</td>
																</tr>
																<tr>
																	<td>یکی از راهکارهای اساسی برای مدیریت صحیح منابع سازمان و حجم اطلاعات زیاد، مجازی سازی است</td>
																	<td>
																		<label class="checkbox nomargin">
																			<input type="checkbox" name="checkbox" checked=""><i></i> بله
																		</label>
																	</td>
																</tr>
															</tbody>
														</table>

												

							
													<div class="form-group">
														<label class="control-label">سوال امنیتی</label>
														<input type="text" value='<?=$question?>' name="question" class="form-control">
													</div>
													<div class="form-group">
														<label class="control-label">پاسخ</label>
														<input type="text"  value='<?=$answer?>' name="answer" class="form-control">
													</div>

											</div>
											<!-- /SETTINGS TAB 4 -->
										
										</div>		<div class="margiv-top10">
														<button   type='submit' value='' class="btn btn-primary">ذخیره تغییرات</button>
														<a href="<?="/profile/$madual_lang"?>" class="btn btn-default">لغو </a>
													</div>
									</div>

								</div>
								
							</div>
							<!-- /TAB 2 CONTENT -->

						</div>
						<!-- /tabs content -->

					</div>

				</div>
			</section>
			<!-- /CONTENT -->
<script>
		$("#del_avatar").click(function () {
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=del_avatar&id=<?=$_SESSION["new_username"]?>",
				success: function(result){
					alert('آواتار شما حذف شد');
					$("#user_avatar").attr('src',"/new_avatar/no_avatar.jpg")
				}
			});		
		});
		
 
$("#del_qaz").click(function () {
	$("#del_pm").val($(this).attr('id'));
});

		$("#del_pm").click(function () {
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=del_pm&id="+$(this).val(),
				success: function(result){
					 window.location='/profile/<?=$madual_lang?>';	
				}
			});		
		});

$(".del_favorite").click(function () {
	alert($(this).attr('id'));
	$("#del_favorite").val($(this).attr('id'));
});
		$("#del_favorite").click(function () {
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=del_favorite&id="+$(this).val(),
				success: function(result){
					alert(result);
					
					 window.location='/profile/<?=$madual_lang?>';	
				}
			});		
		});		
</script>
			
<style>
.text-danger {
  color: #a94442;
  direction: rtl;
}
h6 {
  font-size: 12px;
  direction: rtl;
}
.profile-buttons {
  background-color: rgba(0,0,0,0.05);
  padding: 15px;
}
.margin-bottom8 {
  margin-bottom: 8px;
}
.buttons-over-image {
  position: absolute;
  left: 23px;
  top: 8px;
}
.bg-silver {
  background-color: #ddd !important;
}

.list-group-item:first-child, .list-group-item:last-child, ul.side-nav {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}

.margin-bottom30 {
  margin-bottom: 30px;
}
ul.side-nav a {
  display: block;
  text-decoration: none;
  color: #333;
}
ul.side-nav ul li a {
  padding: 3px;
  font-size: 13px;
}
ul.side-nav a i.fa {
  width: 20px;
}
i.fa {
  text-decoration: none !important;
}

li.comment .comment-body {
  position: relative;
  padding-right: 60px;
}
.fsize11 {
  font-size: 11px !important;
  line-height: 15px !important;
}
li.comment.comment-reply {
  margin-right: 60px;
  background-color: #fafafa;
  padding: 6px;
  margin-bottom: 6px;
}
li.comment {
  position: relative;
  margin-bottom: 25px;
  font-size: 13px;
}
time.datebox {
  font-size: 14px;
  display: block;
  position: relative;
  width: 35px;
  background-color: #fff;
  margin: 3px auto;
  border: 1px solid;
}
li.comment.comment-reply img.avatar {
  right: 6px;
  top: 6px;
}
li.comment img.avatar {
  position: absolute;
  right: 0;
  top: 0;
  display: inline-block;
  width: 50px;
  height: 50px;
  border-radius: 0px;
}
img {
  border: 0;
  vertical-align: top;
}
audio, canvas, img, video {
  vertical-align: middle;
}
li.comment a.comment-author {
  margin-bottom: 6px;
  display: block;
}
li.comment a.comment-author span {
  font-size: 15px;
}
li.comment p {
  margin: 0;
  padding: 0;
}
p {
  line-height: 22px;
  margin: 0 0 20px;
}
p {
  display: block;
  -webkit-margin-before: 1em;
  -webkit-margin-after: 1em;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
}
li.comment {
  position: relative;
  margin-bottom: 25px;
  font-size: 13px;
}
.comment .avatar {
  float: none;
   width: none;
   -webkit-border-radius: none;
  -moz-border-radius: none;
  border-radius: none;
}


/* bootstrap side navigation */
ul.side-nav span.badge {
	float:right;
	margin-top:6px;
	font-weight:400;

	-webkit-border-radius: 3px;
	   -moz-border-radius: 3px;
			border-radius: 3px;
}
ul.side-nav>li>span.badge {
	margin-top:12px;
	margin-right:6px;
}
ul.side-nav li.list-group-item>a>.label {
	margin-right:20px;
}
.list-group-item:first-child,
.list-group-item:last-child,
ul.side-nav {
	-webkit-border-radius: 0;
	   -moz-border-radius: 0;
			border-radius: 0;
}
ul.side-nav li {
	list-style:none;
}
ul.side-nav ul {
	margin:0;
	padding:0;
	background-color:rgba(0,0,0,0.02);
}
ul.side-nav ul li {
	padding:0 15px;
	border-bottom:rgba(0,0,0,0.05) 1px solid;
}
ul.side-nav ul li:last-child {
	border-bottom:0;
}
ul.side-nav a {
	display:block;
	text-decoration:none;
	color:#333;
}
ul.side-nav a i.fa {
	width:20px;
}
ul.side-nav ul li a {
	padding:3px;
	font-size:13px;
}
ul.side-nav>li {
	padding:0;
}
ul.side-nav>li>a {
	padding:7px 10px;
}
ul.side-nav>li.list-group-item.active {
	border:0;
	background-color:transparent;
}
ul.side-nav>li.active>a {
	background-color:rgba(0,0,0,0.5);
}
ul.side-nav li.list-toggle.active:after,
ul.side-nav > li.active>a {
	color:#fff !important;
}
ul.side-nav li.list-toggle:after {
	content: "\f105";
	font-family: FontAwesome;
	position: absolute;
	font-size: 15px;
	right: 10px;
	top: 7px;
	color:#999;
}
ul.side-nav li.list-toggle.active:after {
	content: "\f107";
}
.list-group-item {
	border:0;
	background:transparent;
	border:rgba(0,0,0,0.1) 1px solid;
	border-left:0;
	border-right:0;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
  height: 41px;
}

.nav-tabs {
  border-bottom: 3px solid #EF4A43;
  width: 100%;
  margin-bottom: 10px;
}
</style>			
<?
$username=injection_replace($_POST['username']);
$password=injection_replace($_POST['password']);
if($password=='********')
	$str="";else
	$str=",title='$password'";	
if($username!=""){
	$sql="select name from new_blocks where manage_lang='xx'";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();	
if ($result->num_rows == 0) {
		$query1="insert into new_blocks(name,title,manage_lang) 
		values ('$username','$password','xx')";
		$coms_conect->query($query1);
	}else{
	$query1="update new_blocks set name='$username' $str where manage_lang='xx'"; 
	$coms_conect->query($query1);
	}
}
		$query="select name  from new_blocks where manage_lang='xx'";
		$result = $coms_conect->query($query);
		$row1 = $result->fetch_assoc(); 
?>
</br>
		<div class="tabbable col-md-12">
			<!--ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i><?=$new_sysmenu[135]?></a></li>
			</ul-->
			<div class="msheet tab-content">
			
				<div class="secfhead">

				<div class="sectitle">
					<div class="icon"><span class="flaticon-file23" style=""></span></div>
					<div class="title"><p class="titr">تنظیمات هاست</p><p class="lead">توضیحات این بخش</p></div>
				</div>

				<div class="toolmenu">
					<ul>
						<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					</ul>
				</div>

				</div>
					<div class="tab-pane active" id="tab1">
					
							<form class="form-horizontal" action="" method="post" id="AdsPanel_new" name="AdsPanel_new" role="form" enctype="multipart/form-data">
								<div class="panel-body">	
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="url">نام کاربری</label>
											<div class="form-group col-sm-9">
												<input id="username" value="<?=$row1['name']?>" name="username"   type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="sms_user">کلمه عبور </label>
												<div class="form-group col-sm-9">
													<input id="password" value="********" name="password"  type="password" class="form-control"  >
												</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="alert alert-warning">
										برای مشاهده اطلاعات هاست خود در صفحه داشبورد می بایست اطلاعات هاست خود را در این بخش وارد نمائید.
											
										</div>
									</div>
								</div>								
								<div class="panel-footer bttools">
									<button type="submit" id="submit_page" class="btn btn-primary" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
								</div>
							</form>	
					
					</div>
			</div>
		</div>
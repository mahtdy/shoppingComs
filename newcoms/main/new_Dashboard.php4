<!-- Start html -->
<style>
.infobox {
    width: 181px;
}	
.infobox>.infobox-data {
    min-width: 100px;
}
.box-center-info{
	width: 250px;
	height: 140px;
	margin: 5px !important;
}
.infobox-dark>.infobox-icon>.ace-icon, .infobox-dark>.infobox-icon>.ace-icon:before{
	font-size: 50px;
}
.infobox>.infobox-icon{
	margin: 10px auto;
}
.box-center-info>.text-box-info{
	font-size: 15px;
    margin: 35px auto;
    text-align: center !important;
}

.row-col{
    padding:7px;
    border-bottom: 1px solid #c5d0dc;
	font-family: tahoma
}
.row-col ul li{
    float:right;
    margin-right: 18px;
	list-style: none;
	text-align: center;
}
.row-col ul li p{
	color: #41719e;
}
.row-col ul li .numi{
	color: #69aa46;
	padding-right:5px;
}
</style>
		<br>			
		<div class="row"> 
			<div class="col-md-12 col-sm-12 infobox-container">
				
				<?if($_SESSION['manager_user_name']=='comsroot'){?>	
				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-comments"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?=get_result("select count(id) from new_user_online",$coms_conect);?></span>
						<div class="infobox-content">بازدید کننده آنلاین </div>
					</div>

				</div>

				<div class="infobox infobox-red">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-comment"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?=get_result("select count(id) from new_user_online where type=1",$coms_conect);?></span>
						<div class="infobox-content">کاربران عضو آنلاین</div>
					</div>

				</div>
				<?}else{?>
				
				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-file-text"></i>
					</div>
					<?$news_approve_count=get_result("select count(id) from new_news where user_id={$_SESSION['manager_id']} and status=1",$coms_conect);
					$page_approve_count=get_result("select count(id) from new_static_page where user_id={$_SESSION['manager_id']} and status=1",$coms_conect);
					$video_approve_count=get_result("select count(id) from new_video where user_id={$_SESSION['manager_id']} and status=1",$coms_conect);
					$gallery_approve_count=get_result("select count(id) from new_gallery where user_id={$_SESSION['manager_id']} and status=1",$coms_conect);?>
					
					<div class="infobox-data">
						<span class="infobox-data-number"><?=$news_approve_count+$page_approve_count+$video_approve_count+$gallery_approve_count?></span>
						<div class="infobox-content">محتوای منتشر شده </div>
					</div>

				</div>

				<div class="infobox infobox-red">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-book"></i>
					</div>

					<div class="infobox-data">
					<?$news_pending_count=get_result("select count(id) from new_news where user_id={$_SESSION['manager_id']} and status=0",$coms_conect);
					$page_pending_count=get_result("select count(id) from new_static_page where user_id={$_SESSION['manager_id']} and status=0",$coms_conect);
					$video_pending_count=get_result("select count(id) from new_video where user_id={$_SESSION['manager_id']} and status=0",$coms_conect);
					$gallery_pending_count=get_result("select count(id) from new_gallery where user_id={$_SESSION['manager_id']} and status=0",$coms_conect);?>
						<span class="infobox-data-number"><?=$news_pending_count+$page_pending_count+$video_pending_count+$gallery_pending_count?></span>
						<div class="infobox-content">محتوای در حال بررسی</div>
					</div>

				</div>
				<?}?>
				<div class="infobox infobox-blue2"> 
					<div class="infobox-icon">
						<i class="ace-icon fa fa-tachometer"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?=get_module_viwe_count($coms_conect,date('Y-m-d'),date('Y-m-d'))?></span>
						<div class="infobox-content">بازدید کننده امروز</div>
					</div>
				</div>

				<div class="infobox infobox-red">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-user"></i>
					</div>

					<div class="infobox-data"> 
						<span class="infobox-data-number"><?=get_module_viwe_count($coms_conect,jalalitomiladi(tr_num(jdate('Y/m/01'))),date('Y-m-d'));?>
						</span>
						<div class="infobox-content">بازدید کننده ماه</div>
					</div>
				</div>

				<div class="infobox infobox-orange2">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-users"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number"><?=get_module_viwe_count($coms_conect,jalalitomiladi(tr_num(jdate('Y/01/01'))),date('Y-m-d'));?></span>
						<div class="infobox-content">بازدید کننده سال</div>
					</div>

				</div>

				<div class="infobox infobox-blue2">
						<div class="infobox-icon">
						<i class="ace-icon fa fa-bar-chart-o"></i>
					</div>
					
					<div class="infobox-data">
						<span class="infobox-text"><?=get_module_viwe_count($coms_conect,'2010-01-01',date('Y-m-d'));?></span>
						<div class="infobox-content">
							بازدید کل تا امروز  
						</div>
					</div>
				</div>

				<!-- /.infobox-container 1 -->
				 
				
 
				<!-- /.infobox-container 2 -->
			</div><!-- /.infobox-container -->
		
			<div class="hr hr32 hr-dotted"></div>
			
			<div class="col-md-12 col-sm-12" style="direction: ltr;">
				<div id="hiechartbas" style="min-width: 310px; height: 400px; margin: 40px auto"></div>	
			</div><!-- /#hiechart_basic -->
		
			<div class="hr hr32 hr-dotted"></div>
		
			<div class="col-md-12 col-sm-12 infobox-container">	
				<div class="infobox infobox-green infobox-large infobox-dark box-center-info">
					<div class="infobox-icon block">
						<i class="ace-icon fa fa-bullhorn"></i>
					</div>

					<div class="infobox-data block text-box-info">
						<div class="infobox-content"><?=get_result("select count(id) from new_news where  status=1",$coms_conect);?> اخبار منتشر شده</div>
					</div>
				</div>
 				<div class="infobox infobox-orange2 infobox-large infobox-dark box-center-info">
					<div class="infobox-icon block">
						<i class="ace-icon fa fa-credit-card"></i>
					</div>
					
					<div class="infobox-data block text-box-info">
						<div class="infobox-content"><?=get_result("select count(id) from new_gallery where  status=1",$coms_conect);?> گالری تصاویر منتشر شده</div>
					</div>
				</div>

				<div class="infobox infobox-red infobox-large infobox-dark box-center-info">
					<div class="infobox-icon block">
						<i class="ace-icon fa fa-film"></i>
					</div>

					<div class="infobox-data block text-box-info">
						<div class="infobox-content"><?=get_result("select count(id) from new_video where  status=1",$coms_conect);?> ویدئو های منتشر شده</div>
					</div>
				</div>

				<div class="infobox infobox-blue infobox-large infobox-dark box-center-info">
					<div class="infobox-icon block">
						<i class="ace-icon fa fa-envelope-o"></i>
					</div>

					<div class="infobox-data block text-box-info">
						<div class="infobox-content"><?=get_result("select count(id) from new_static_page where  status=1",$coms_conect);?> صفحات منتشر شده</div>
					</div>
				</div>
			</div><!-- /.infobox-container -->
		</div><!-- /.row -->

		<div class="hr hr32 hr-dotted"></div>
		
		<div class="row">
			<div class="col-sm-12"> 
				<div class="widget-box transparent" id="recent-box">
					<div class="widget-header">
						
						<div class="widget-toolbar no-border pull-left">
							<ul class="nav nav-tabs" id="recent-tab">  
								<li class="active">
									<a data-toggle="tab" href="#mansger-tab">مدیران سایت</a>
								</li>
								<li>
									<a data-toggle="tab" href="#member-tab">آخرین اعضای سایت</a>
								</li>
						
							</ul>
						</div>
					</div>

					<div class="widget-body">
						<div class="widget-main padding-4">
							<div class="tab-content padding-8">
								<div id="member-tab" class="tab-pane ">
										<?$member_query="select mobile,email,last_login,status,date,avatar,user_name,name,id,family from new_members where id>0 order by id desc limit 0,5";
									 	$member_result = $coms_conect->query($member_query);
									 	while($member_row = $member_result->fetch_assoc()) {
										?>								
									<div class="itemdiv commentdiv">
										<div class="user">
											<img alt="<?=$member_row['name'].' '.$member_row['family']?>" src="<?=$member_row['avatar']?>" />
										</div>
										<div class="row-col">
											<div class="row">
												<div class="col-md-12">
													<ul>
														<div class="col-md-2 col-xs-12">
															<li><p style="font-weight: bold;"><?=$member_row['name'].' '.$member_row['family']?></p><i class="fa fa-clock-o"></i><i class="numi"><?=miladitojalalitime(date('Y-m-d',$member_row['date']))?></i></li>
														</div>
														<div class="col-md-7 col-xs-12">
															<li><p>موبایل</p><i class="numi"><?=$member_row['mobile']?></i></li>
															<li><p>ایمیل</p><i class="numi"><?=$member_row['email']?></i></li>
														</div>
														
														<div class="col-md-3 col-xs-12">
															<li><p></p><i class="label label-default"><?=miladitojalalidefult($member_row['last_login'])?></i></li>
															<li><p></p><a href="/newcoms.php?yep=new_member"><i class="ace-icon fa fa-edit bigger-130"></i></a>
																	   <a href="/newcoms.php?yep=new_member"><i class="ace-icon fa fa-user bigger-125"></i></a>
																	   <a href="/newcoms.php?yep=new_member"><i class="label label-<?if($member_row['status']==1)echo 'success';else echo 'info';?>"><?if($member_row['status']==1)echo 'فعال';else echo 'غیرفعال';?></i></a></li>
														</div>
													</ul>
												</div>
											</div>	
										</div>
									</div>
									<?}?>
				 

					 				 <div class="hr hr8"></div>

									<div class="center">
										<i class="ace-icon fa fa-users fa-2x green middle"></i>

										&nbsp;
										<a href="/newcoms.php?yep=new_member" class="btn btn-sm btn-white btn-info">
											دیدن همه اعضا&nbsp;
											<i class="ace-icon fa fa-arrow-left"></i>
										</a>
									</div>

									<div class="hr hr-double hr8"></div>

			 
								
								</div>

								<div id="mansger-tab" class="tab-pane active">
									<!-- #section:pages/dashboard.comments -->
									<div class="last">
										<?$manager_query="select last_login,status,date,avatar,user_name,name,id from new_managers where id in({$_SESSION["manager_user_permisson_string"]})";
										 $manager_result = $coms_conect->query($manager_query);
									 	while($manager_row = $manager_result->fetch_assoc()) {
										?>
										<div class="itemdiv commentdiv">
											<div class="user">
												<img alt="<?$manager_row['name']?>" src="<?=$manager_row['avatar']?>" />
											</div>
											<div class="row-col">
												<div class="row">
													<div class="col-md-12">
														<ul> 
															<div class="col-md-2 col-xs-12">
																<li><p style="font-weight: bold;"><?=$manager_row['user_name'].' ( '.$manager_row['name'].' ) '?></p><i class="fa fa-clock-o"></i>
																<i class="numi"><?=miladitojalali($manager_row['date'])?></i></li>
															</div>
															<div class="col-md-4 col-xs-12"> 
																<li><p>اخبار</p><i class="numi"><?=get_result("select count(id) from new_news where user_id={$manager_row['id']}",$coms_conect)?></i></li>
																<li><p>گالری عکس</p><i class="numi"><?=get_result("select count(id) from new_gallery where user_id={$manager_row['id']}",$coms_conect)?></i></li>
																<li><p>ویدئو ها</p><i class="numi"><?=get_result("select count(id) from new_video where user_id={$manager_row['id']}",$coms_conect)?></i></li>
																<li><p>صفحات</p><i class="numi"><?=get_result("select count(id) from new_static_page where user_id={$manager_row['id']}",$coms_conect)?></i></li>
															</div>
															
															<div class="col-md-3 col-xs-12">
																<li><p>مدیران زیر مجموعه</p><i class="numi"><?=get_result("select count(id) from new_managers where parent_id={$manager_row['id']}",$coms_conect)?></i></li>
																<li><p>پیام های دریافتی</p><i class="numi">5</i></li>
															</div>
															
															<div class="col-md-3 col-xs-12">
																<li><p></p><i class="label label-default"><?=miladitojalalidefult($manager_row['last_login'])?></i></li>
																<li><p></p><a href="/newcoms.php?yep=new_manager"><i class="ace-icon fa fa-edit bigger-130"></i></a>
																  <a href="/newcoms.php?yep=new_manager"><i class="ace-icon fa fa-user bigger-125"></i></a>
																<a href="/newcoms.php?yep=new_manager"><i class="label label-<?if($manager_row['status']==1)echo 'success';else echo 'info';?>"><?if($manager_row['status']==1)echo 'فعال';else echo 'غیرفعال';?></i></a></li>
															</div>
														</ul>
													</div>
												</div>	
											</div>
											
										</div>
									<?}?>
									</div>

									<div class="hr hr8"></div>

									<div class="center">
										<i class="ace-icon fa fa-users fa-2x green middle"></i>

										&nbsp;
										<a href="/newcoms.php?yep=new_manager" class="btn btn-sm btn-white btn-info">
											دیدن همه مدیران &nbsp;
											<i class="ace-icon fa fa-arrow-left"></i>
										</a>
									</div>

									<div class="hr hr-double hr8"></div>

									<!-- /section:pages/dashboard.comments -->
								</div>
							</div>
						</div><!-- /.widget-main -->
					</div><!-- /.widget-body -->
				</div><!-- /.widget-box -->
			</div><!-- /.col -->

		</div><!-- /.row -->

<!-- End html -->

<div class="modal fade" id="delete_comment" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف مدیر زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>


 
<script>
$(".delete_comment").click(function () {
		$("#btn_ok").val($(this).attr('id'));
		
});	
	$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_page_comments_dass&id="+$(this).val(),
				success: function(result){
				window.location.href = "newcoms.php?yep=new_Dashboard";
				}
			});	
		});

	$('.accept_comment').click( function() {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=accept_comment_page_dash&id="+$(this).attr('id'),
				success: function(result){
					alert('نظر فوق تایید گردید');
				//alert(result);
				//window.location='newcoms.php?yep=new_Dashboard';
				}
			});
    });
	$('.unaccept_comment').click( function() {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=unaccept_comment_page_dash&id="+$(this).attr('id'),
				success: function(result){
					alert('نظر فوق تایید نگردید');
				//alert(result);
				//window.location='newcoms.php?yep=new_Dashboard';
				}
			});
    });
</script>
<script src="/yep_theme/default/rtl/js/Chart.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.easypiechart.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.sparkline.min.js"></script>

<script src="/yep_theme/default/rtl/js/highchart2/code/highcharts.js"></script>
<script src="/yep_theme/default/rtl/js/highchart2/modules/exporting.js"></script>	
											 
<script type="text/javascript">
$(document).ready(function () {
    Highcharts.chart('hiechartbas', { 
        title: {
            text: 'آمار بازدید ماژول های فعال سیستم',
            x: -20 //center
        },
		chart: {
			style: {
				fontFamily: 'IRANSans'
			}
		}, 
        xAxis: {
            categories: [<?=create_month_day()?>] 
        },
        yAxis: {
            title: {
                text: 'تعداد' //Example Temperature (°C)
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' ' //Example °C
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'صفحات',
            data: [<?=create_viwe_tree(5,$coms_conect,tr_num(jdate('m')),tr_num(jdate('Y')))?>]
        }, {
            name: 'ویدئو',
            data: [<?=create_viwe_tree(8,$coms_conect,tr_num(jdate('m')),tr_num(jdate('Y')))?>]
        }, {
            name: 'خبر',
            data: [<?=create_viwe_tree(1,$coms_conect,tr_num(jdate('m')),tr_num(jdate('Y')))?>]
        }, {
            name: 'گالری تصاویر',
            data: [<?=create_viwe_tree(9,$coms_conect,tr_num(jdate('m')),tr_num(jdate('Y')))?>]
        }]
    });
});

</script>

 
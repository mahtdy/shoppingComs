<?$modual_type=10;
$report_url='new_blog_reports';
$report_table='new_blog';
$report_title=$new_sysmenu[93];
include 'newcoms/main/new_modual_report.php4';
?>
				<div class="toptenrep">
					<h3><span class="flaticon-view32"></span><span class="title">نوشته های  پربازدید</span></h3>
					<!-- #section:ads/ads_report.table -->
					<table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr >
								<th class="center">رديف</th>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								<th class="center">عنوان </th>
								<th class="center">نام سايت</th>
								<th class="center">نوع</th>
								<th class="center">بازديد</th>
								<th class="center">وضعيت</th>
								<th class="center">امکانات</th>
							</tr>
						</thead>
						<tbody>
					
						 <?
						################################################################
							$sql1 = "SELECT count(id) as cnt from new_blog a ,new_modules_catogory b   where a.id>0 and a.id=b.page_id and b.type=10 
							$str_expire $str_cat $str_status $str_is_importand  
							group by b.page_id";
							$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();
							$page=injection_replace($_GET["page"]);
							$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_blog_reports$label_page$is_importand_page$cat_page$expire_page$status_page");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];
							$sql12 = "SELECT a.site,a.la,a.title,a.id,a.publish_date ,a.mudoal_lock,a.view,a.status 
							from new_blog a ,new_modules_catogory b   where a.id>0 and a.id=b.page_id and b.type=10 
							$str_expire $str_cat $str_status $str_is_importand  
							group by b.page_id
							order by a.view desc
							LIMIT $from,$to";
							// echo $sql12;
						################################################################
						$resultd1 = $coms_conect->query($sql12);
						if($page>1)$k=$page*10;else $k=1;
							while($row = $resultd1->fetch_assoc()) {
							$id=$row['id'];
							?>
											<tr>
								<td class="center"><?=$k?></td>
								<td class="center" style="border-right: none;border-left: none;">
									<label class="position-relative">
										<input id='<?=$id?>' type="checkbox"   class="conchkNumber"/>
										<span class="lbl"></span>
									</label> 
								</td>
								<?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
								<td><a href="/<?="$domain/blog/{$row['title']}/{$row['la']}/".insert_dash($row['title'])?>" target="_blank"><?=$row['title']?></a></td>

								
								<td><a href="/<?=$domain?>" target="_blank"><?=$row['site']?></a></td>
								<td><?if($row['mudoal_lock']==1) echo 'ويژه اعضا';else echo 'عادي';?></td>
								<td><?=$row["view"]?></td> 
								<td>
									<span class="status_news editable editable-click" data-pk="<?=$row["id"]?>" ><?if($row["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
								</td>
								<td>
									<?if($_SESSION["can_edit"]==1){?>	
									<a target="_blank" id="<?=$id?>" class="edit_menu blue"  href="newcoms.php?yep=new_blog&edit_id=<?=$id?>" style="font-size: 18px !important;margin: 0 5px 0 5px;">
										<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
									</a>
									<?}if($_SESSION["can_delete"]==1){?>	
									<a    href="#" id="<?=$id?>" class="del_menu red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 5px 0 5px;">
										<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
									</a>
									<a target="_blank" href="/newcoms.php?yep=new_blog_comments"   class="del_menu green"      style="font-size: 18px !important;margin: 0 5px 0 5px;">
										<i class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
									</a>
									<a href="/<?="$domain/article/{$row['title']}/{$row['la']}/".insert_dash($row['title'])?>" target="_blank"  class="del_menu blue"   style="font-size: 18px !important;margin: 0 5px 0 5px;">
										<i class="ace-icon fa fa-vimeo-square bigger-120" title="نمايش"></i>
									</a>
									
									<?}?>
									<label></label>
										<input  id="<?=$id?>" name="switch-field-1" <?if($row['mudoal_lock']==0) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
										<span title="فعال سازي"class="lbl"></span>
								</td>
							</tr>
						<?$k++;}?>
						
						</tbody>
					</table>
					<!-- /section:ads/ads_report.table -->
				</div>
			</div>
<script src="/yep_theme/default/rtl/js/Chart.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.easypiechart.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.sparkline.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/flot/jquery.flot.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/flot/jquery.flot.pie.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/flot/jquery.flot.resize.min.js"></script>		
<?$sql ="$str_cat $str_status $str_is_importand";?>	 							
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			//labels : ["<?=tr_num(1,$mod='fa')?>","<?=tr_num(2,$mod='fa')?>","<?=tr_num(3,$mod='fa')?>","<?=tr_num(4,$mod='fa')?>","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
			labels : [<?=farsi_date_num( $day,$start)?>],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [<?=create_chart_moduale(10,$coms_conect,$mounth,$year,$day,$start,$sql)?>]
				}
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
			$(document).ready(function() {
													var chart = new Highcharts.Chart({

													chart: {
														style: {
																fontFamily: 'tahoma'
															},
														renderTo: 'chart1',
														type: 'column'

													},

													xAxis: {
														categories: [
														<?for($j=0;$j<=$i;$j++){
														$titl=$title[$j];
														echo "'". $titl. "'".",";
														}?>
														/*	'آگهی یک', 
															'آگهی دو', 
															'آگهی سه', 
															'آگهی چهار', 
															'آگهی پنج', 
															'آگهی شش'*/
														],
														reversed: true
													},
													
													yAxis: {
														title: {
															text: '     تعداد بازدید کل',
															useHTML: Highcharts.hasBidiBug
														},
														opposite: true
													},
													
													title: {
														text: 'نمودار بازدید آگهی',
														useHTML: Highcharts.hasBidiBug
													},
													
													legend: {
														useHTML: Highcharts.hasBidiBug
													},    

													tooltip: {
														useHTML: true
													},

													series: [{
														name: 'تعداد کل بازدید',
														data: [
														//1,3,2,4,3,5
														<?for($j=0;$j<=$i;$j++){
														$rezaa=$reza[$j];
														echo " $rezaa ,";
														}?>
														]
													}]

												});
												});
												</script>
											
		</div>
	</div>
</div>	

	
<link class="include" rel="stylesheet" type="text/css" href="/yep_theme/default/rtl/css/jqplot/jquery.jqplot.min.css" />
<link rel="stylesheet" type="text/css" href="/yep_theme/default/rtl/css/jqplot/examples.css" />
<link type="text/css" rel="stylesheet" href="/yep_theme/default/rtl/css/jqplot/shCoreDefault.min.css" />
<link type="text/css" rel="stylesheet" href="/yep_theme/default/rtl/css/jqplot/shThemejqPlot.min.css" />

<!--main js-->
<script class="include" type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/scripts/shCore.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/scripts/shBrushXml.min.js"></script>

<!--additional js-->
<script type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/jqplot/jqplot.donutRenderer.min.js"></script>
<script>
	$(document).ready(function(){

	  var data = [
		['پرو 206', 12],['پزو 207', 9], ['سبد کالا', 14], 
		['سبد test', 16],['farda', 7], ['مانیتور', 9]
	  ];
	  var plot1 = jQuery.jqplot ('chart1', [data], 
		{ 
		  seriesDefaults: {
			// Make this a pie chart.
			renderer: jQuery.jqplot.PieRenderer, 
			rendererOptions: {
			  // Put data labels on the pie slices.
			  // By default, labels show the percentage of the slice.
			  showDataLabels: true
			}
		  }, 
		  legend: { show:true, location: 'e' },
		   grid: {
				drawBorder: false, 
				drawGridlines: false,
				background: '#ffffff',
				shadow:false
			}
		}
	  );
	
	});

		$("#start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
		$("#finish_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});	
</script>
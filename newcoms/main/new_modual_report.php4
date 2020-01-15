<?$day=31;$start=1;$redirect=0;
	$mounth= jdate('m'); 							
	$year= jdate('Y'); 
$start_date=(injection_replace($_GET['start_date']));
$finish_date=(injection_replace($_GET['finish_date']));
$cat_filter=(injection_replace($_GET['cat_filter']));
$mudoal_lock_filter=(injection_replace($_GET['mudoal_lock_filter']));
 
if(isset($_GET['search_status']))
$search_status=(injection_replace($_GET['search_status']));
 			 
						if($search_status>""){
							$str_status=" and a.status='$search_status'";
							$status_page="&status_filter=$search_status";
						}
						$mudoal_lock_filter=injection_replace($_GET['mudoal_lock_filter']);
						if($mudoal_lock_filter>""){
							$str_is_importand=" and a.mudoal_lock='$mudoal_lock_filter'";
							$is_importand_page="&is_importand=$mudoal_lock_filter";
						}
						if($start_date>""){
							$start_datee=strtotime(jalalitomiladi($start_date));
							$finish_datee=strtotime(jalalitomiladi($finish_date));
							$str_expire=" and a.publish_date<='$finish_datee' and a.publish_date>='$start_datee'";
							$expire_page="&publish_search=$publish_search";
							$day=($finish_datee-$start_datee)/86400;
							 if($day>31){
							 echo  "<script>alert('دوره انتخابي نبايد بيشتر از يک ماه باشد')</script>";
							 $redirect=1;
							 }
							 if($redirect==1)
								 echo  "<script>window.location='newcoms.php?yep=$report_url'</script>"; 
							$start= (jdate('d',$start_datee));
							$mounth= (jdate('m',$start_datee)); 							
							$year= (jdate('Y',$start_datee)); 							
							
							
							$tempdate=explode("/",($start_date));
							$start= abs($tempdate[2]);
							 
						}
					   	$cat_filter=injection_replace($_GET['cat_filter']);
						if($cat_filter>""){
							$str_cat=" and b.cat_id in($cat_filter)";
							$cat_page="&cat_filter=$cat_filter";
						}else 
						$str_cat=" and b.cat_id in({$_SESSION['manager_page_cat_str']})";
					
						
						if($label_filter>""){
							$str_label=" and c.id in($label_filter)";
							$label_page="&label_filter=$label_filter";
						} 
						 ?>

<script src="/yep_theme/default/rtl/js/highchart/js/highcharts.js"></script>
<script src="/yep_theme/default/rtl/js/highchart/js/highcharts-3d.js"></script>
<script src="/yep_theme/default/rtl/js/highchart/js/modules/exporting.js"></script>
<script src="/yep_theme/default/rtl/js/highchart/js/modules/funnel.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css">
<script src="/yep_theme/default/rtl/assets/js/ace/elements.onpage-help.js"></script>
<script src="/yep_theme/default/rtl/assets/js/ace/ace.onpage-help.js"></script>	

<script type="text/javascript">
 $(document).ready(function() {
    $('#cat_filter').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=$modual_type";$i=0;
				$result = $coms_conect->query($query);
					while($RS1 = $result->fetch_assoc()) {
					$id=$RS1["id"];
					$name=$RS1["name"];
					if(in_array($id,$_SESSION['manager_page_cat'])){
					//echo $id.'<br>';
						if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
					}
				
				}
		?>
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});
</script>

<script type="text/javascript">
 $(document).ready(function() {
    $('#label_filter').select2({
        data: [
				<?
				$query="select id,key_count,name from new_keyword";$i=0;
				$result = $coms_conect->query($query);
				while($RS1 = $result->fetch_assoc()) {
					$id=$RS1["id"];
					$name=$RS1["name"].'('.$RS1["key_count"].')';
							if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
				}
		?>
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});

</script>
	</br>
<div class="tabbable">
		<ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			گزارشات </a></li>
		</ul>
		<div class="msheet tab-content">
			<div class="secfhead">
				<!-- #section:ads/ads_report.head -->
				<div class="sectitle">
					<div class="icon">
						<span class="flaticon-barsgraphic4" style=""></span>
					</div>
					<div class="title">
						<p class="titr"> گزارش بازدید <?=$report_title?></p><p class="lead">توضيحات اين بخش</p>
					</div>
				</div>
				<!-- /section:ads/ads_report.head -->
				<div class="toolmenu">
					<ul>
						<li class="helpicon">
						<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما">
							<span class="flaticon-help31"></span>
						</a>
						</li>
					</ul>
				</div>

		</div>
		<div class="tab-pane active" id="tab1">
			<div class="row">
				<div class="mrepfilters">
					<form action="" >
					<input type="hidden" value="<?=$report_url?>" name='yep'>
					<h3><span class="flaticon-music236"></span><span class="title">تنظيمات نمايش</span></h3>
					<div class="row">
					<!-- #section:ads/ads_report.view -->
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label" for="start_date">از تاريخ</label>

							<input id="start_date"  name="start_date" value='<?=$start_date?>' type="text"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							
							<label class="control-label" for="finish_date">تا تاريخ</label>
							<input id="finish_date"  name="finish_date" value='<?=$finish_date?>' type="text"  >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label class="control-label">دسته</label>
							<div class="form-group">
								
								<input  type="text" value='<?=$cat_filter?>' name="cat_filter" id="cat_filter" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
							</div>
						</div>
					</div>
					<!--div class="col-md-2">
						<div class="form-group">
							<label class="control-label">برچسب ها</label>
							<div class="form-group">
								<?$label_filter=(injection_replace($_GET['label_filter']))?>
								<input  type="text" value='<?=$label_filter?>' name="label_filter" id="label_filter" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
							</div>
						</div>
					</div-->
					<div class="col-md-2">
						
							<label class="control-label">نوع</label>
							
							<div class="form-group">
								<select id="mudoal_lock_filter" name="mudoal_lock_filter" class="col-md-12">
									<option value="" <?if($mudoal_lock_filter=="") echo 'selected'?>>همه</option>
									<option value="0" <?if($mudoal_lock_filter==0) echo 'selected'?>>عادي</option>
									<option value="1" <?if($mudoal_lock_filter==1) echo 'selected'?>>ويژه</option>
								</select>
							</div>
						
					</div>
					<div class="col-md-2"> 
						
							<label class="control-label">وضعيت</label>
							<div class="form-group">
								<select class="col-md-12" name="search_status">
									<option <?if($search_status==0) echo 'selected';?> value="0">پيش نويس</option>
									<option   <?if($search_status==1||!isset($search_status)) echo 'selected';?> value="1">منتشر شده</option>
								
								</select>
							</div>
						
					</div>
<style>
.mrepfilters span:before {
   color: #fff !important; 
}
</style>					
					<div class="col-md-2">
						<button type="submit" id="submit_form" class="btn btn-success" style="top: 25px;height: 35px;padding-top: 1px;"><span class="flaticon-verified9"></span><span>جستجو</span></button>
					</div>
					<!-- /section:ads/ads_report.view -->
				</div>
				</form>
				<div class="nemodar">
				<h3><span class="flaticon-data67"></span><span class="title">نمودار بازديد</span></h3>
					<center>
						<canvas id="canvas" height="50" width="200"></canvas>
					</center>
				</div>
				<div class="amaradadi">
				<!-- #section:ads/ads_report.chart -->
					<div class="col-md-3">
						<div class="newscount">
							<h3><span class="flaticon-file23"></span><span class="title">تعداد <?=$report_title?></span></h3>
							<p><?=get_result_number("select count(a.id) as cnt from  $report_table   a ,new_modules_catogory b where a.id>0 and a.id=b.page_id and b.type=$modual_type 
							$str_expire $str_cat $str_status $str_is_importand group by b.page_id ",$coms_conect)?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="newsview">
							<h3><span class="flaticon-view32"></span><span class="title">تعداد بازديد</span></h3>
							<p><?$totlal_view=get_result("select sum(view) as view from  $report_table  a ,new_modules_catogory b where a.id>0 and a.id=b.page_id and b.type=$modual_type 
							$str_expire $str_cat $str_status $str_is_importand ",$coms_conect);
							if($totlal_view=="")echo 0;else echo $totlal_view;
							?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="newspublish">
						<h3><span class="flaticon-verified9"></span><span class="title">تعداد <?=$report_title?> منتشر شده</span></h3>
						<p><?=get_result_number("select count(id) as view from  $report_table  a ,new_modules_catogory b where id>0 and status=1 and a.id=b.page_id and b.type=$modual_type 
							$str_expire $str_cat $str_status $str_is_importand group by b.page_id",$coms_conect)?></p>

						</div>
					</div>
					<div class="col-md-3">
						<div class="comments">
							<h3><span class="flaticon-speechballoons1"></span><span class="title">تعداد نظرات</span></h3>
							<p><?=get_result_number("select count(a.id) as view from new_madules_comment c,  $report_table  a ,new_modules_catogory b
							where  a.id=b.page_id and b.type=$modual_type and c.type=$modual_type and a.id=c.madul_id 
							$str_expire $str_cat $str_status $str_is_importand
							group by c.id ",$coms_conect)?></p>
						</div>
					</div>
					<!-- /section:ads/ads_report.chart -->
				</div>
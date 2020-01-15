<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<div class="block ">
	<form method='post' id='faq_search'>
	<?create_token_in_function()?>
	<div class="header">
		<h3><span><?=$view_serach_page?></span></h3>
	</div>
	<div class="content filter-block">
		<div class="dateselect">
			<h4><?=$view_filter_title?></h4>
			<div class="form-group">
				<input id='faqq' name='faqq' class="form-control input-sm rtl"></input>
			</div>
			<div class="row"
				 style="padding-right: 15px;padding-left: 15px;    margin-bottom: 20px;">
				<h4><?=$view_filter_date?></h4>
				<?$start_date=injection_replace($_POST['start_date']);
				$finish_date=injection_replace($_POST['finish_date']);?>	
				<div class="col-md-6 pull-right pr0">
					<input value='<?=$start_date?>' id='start_date' name='start_date' class="btn btn-default fullwidth" data-MdDateTimePicker="true"
						   data-TargetSelector="#start_date" data-EnableTimePicker="false" data-Placement="left"
						   data-Trigger="click" style="min-height: 49px;padding-top: 12px;" placeholder="<?=$view_from_date?>">
				</div>
				<div class="col-md-6 pull-right pr0 pl0">
					<input  value='<?=$finish_date?>'  id='finish_date' name='finish_date' class="btn btn-default fullwidth" data-MdDateTimePicker="true"
						   data-TargetSelector="#finish_date" data-EnableTimePicker="false" data-Placement="left"
						   data-Trigger="click" style="min-height: 49px;padding-top: 12px;" placeholder="<?=$view_to_date?>">
				</div>
			</div>
		</div>
		 
		<h4><?=$view_filter_sub?></h4>
		<select name="modual_cat" id='modual_cat' class="cat-select" multiple="multiple" style="width: 100%;">
			<?$sql121="select id,name from new_modules_cat where type=5 and status=1";	
			$result21 = $coms_conect->query($sql121);
			while($row11 = $result21->fetch_assoc()){
				$str='';if($subdomian_add==$row11['id']) $str='selected';
				echo "<option $str value='{$row11['id']}'>{$row11['name']}</option>";	
			}
			?> 
	   </select>
		<div class="row" style="margin-top: 15px; padding-right: 15px; padding-left: 15px;">
			<button id="faq_btn" type='submit' class="btn btn-success fullwidth"><?=$view_apply_changes?></button>
		</div>
		<script>

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

		
		$("#faqq").keypress(function (e) {
			if(e.which==13){
			   $("#faq_search").attr("action", "/page/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
			   $("#faq_search").submit()
			}
		});
		$("#faq_btn").click(function () {  
			   $("#faq_search").attr("action", "/page/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
			   $("#faq_search").submit()
		});
		</script>
	</div>
	</form>
</div>
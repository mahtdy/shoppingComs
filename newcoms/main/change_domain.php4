<style>
#manager_filter{
	position: relative !important; top: -18px !important; width: 160px !important;
}
</style>
	<div class="tabbable">
		<div class="msheet tab-content">
			<div class="secfhead">
			<!-- #section:main/viewlog.head -->
				<div class="sectitle">
					<div class="icon"><span class="flaticon-file23" style=""></span></div>
					<div class="title"><p class="titr">عوض کردن آدرس ها به دامنه جدید</p><p class="lead">توضیحات این بخش</p></div>
				</div>
			<!-- /section:main/viewlog.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
 				</ul>
			</div>
		</div>
		 <div id="show_related"></div>
			<div class="tab-pane active" id="tab1">
				<div class="">
					<div class="tt">
						<div class="form-group">
							 <label class="col-sm-4 control-label">دامنه قبلی</label>
							 <div class="form-group col-sm-8">
								<input type="text" name="old_domain" id="old_domain" class="form-control input-mask-phone" placeholder="test.com">
							 </div>
						</div>
						 <div class="form-group">
							 <label class="col-sm-4 control-label">دامنه جدید</label>
							 <div class="form-group col-sm-8">
								<input type="text" name="new_domain" id="new_domain" class="form-control input-mask-phone" placeholder="test.com">
							 </div>
						</div>
							 <div class="form-group">
							  <div class="form-group col-sm-8">
									<button id="change_domain" type="button" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
									<img src="waiting.gif" id="show_waiting_search" style="display:none;    width: 20%;">
							 </div>
							
						</div>
						  
					</div>	
				</div>
			</div>
			
		</div>
	</div>	
<script>
		$("#change_domain").click(function () {
			if($("#old_domain").val()&&$("#new_domain").val()){
				 	  $("#show_waiting_search").show();
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=change_domain&id="+$("#old_domain").val()+"&value="+$("#new_domain").val(),
					success: function(result){
					  	$("#show_waiting_search").hide();
						$("#show_related").html(result);	
					}
				});			
			}
	
	 	});
</script>
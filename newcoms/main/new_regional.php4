<script>
$(document).ready(function(){


    $('#new_regional').submit(function() {
		$('#country, #stat, #city').find('option').each(function() {
		$(this).attr('selected', 'selected', 'selected');
		});
	});



	$("#add_country").click(function(){
		if($("#input1").val()!=""){
			var a =$("#input1").val();
			$("#country").append(new Option($("#input1").val(), $("#input1").val()));
			$("#input1").val("");
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=new_add_country&id="+a,
					success: function(result){
					}
				});
			
			}
	});

	$(document).on('click', '#add_stat', function(event) {
		if($("#input2").val()!=""){
			var a =$("#input2").val();
			var b =$("#coutry_val").val();
			//alert(b);
			$("#stat").append(new Option($("#input2").val(), $("#input2").val()));
			$("#input2").val("");
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=new_add_stat&id="+a+"&value="+b,
				success: function(result){
				
				}
			});
		
		}
	});



	$("#country").click(function(){
		$('#show_pic').show();
		$('#show_pic').attr('src', '/waiting.gif');
		$('#city_div').hide();
		var a =$(this).val();
		$("#coutry_val").val(a);
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_stat&id="+a,
			//dataType:"json",
			success: function(result){
			$('#show_pic').attr('src', '');
			$('#show_pic').hide();
				$("#show_stat").html(result);
			}
				
		});
	});
	

	$(document).on('click', '#stat', function(event) {
	$('#show_pic_city').show();
		$('#show_pic_city').attr('src', '/waiting.gif');
		var a =$(this).val();
		$("#stat_val").val(a);
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_city&id="+a,
		
			success: function(result){
			//	alert(result);
			$('#show_pic_city').attr('src', '');
			$('#show_pic_city').hide();
				$("#show_city").html(result);
			}
				
		});
	});



	$(document).on('click', '#del_stat', function(event) {
			var a =$('#stat option:selected').val();
			//alert(a);
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_stat&id="+a,
				success: function(result){
				//alert(result);
				if(result==0){
					alert("<?=$new_del_cities_state?>");
				}
				else
				$('#stat option:selected').remove();
				}
			});
	});


	$("#del_country").click(function(){
		if ($('#country option:selected').val() != null) {
			var a =$('#country option:selected').val();
			
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_country&id="+a,
				success: function(result){
				if(result==0){
					alert("<?=$new_del_country_state?>");
				}
				else
				$('#country option:selected').remove();
					//window.location.href = "<?=$custom_url?>";	
				}
				
			});
			
			}
	});	




	
	$(document).on('click', '#add_city', function(event) {
		if($("#input3").val()!=""){
			var a =$("#input3").val();
			var b =$("#stat_val").val();
			$("#city").append(new Option($("#input3").val(), $("#input3").val()));
			$("#input3").val("");
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=new_add_city&id="+a+"&value="+b,
				success: function(result){
				//alert(result);
				}
			});
		}
	});
	
	

	$(document).on('click', '#del_city', function(event) {
			var a =$('#city option:selected').val();
			
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_city&id="+a,
				success: function(result){
				}
			});
			$('#city option:selected').remove();
	});	

});
</script>

	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_sysmenu[8]?> </a></li>
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/regional.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">موقعیت جغرافیایی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/regional.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
		
			<div class="tab-pane active" id="tab1">
	
				<form class="form-horizontal" id="new_regional" name="new_regional" action="" role="form" method="post" enctype="multipart/form-data">
					<input type="hidden" name="coutry_val" id="coutry_val">
					<input type="hidden" name="stat_val" id="stat_val">
					<!-- #section:main/regional.form -->
						<div class="panel-body">
							<div class="row-fluid"> 
								<div class="col-md-12">
								
									<div class="row-fluid"> 
										<div class="col-md-4">
										
												<div class="form-group">
													<div class="col-sm-12">
														<div class="row">
																<label><?=$s_Members_name?> <?=$s_Members_country?></label>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="col-sm-12">
														<div class="row">
															<div class="form-group col-sm-9">
																<input id="input1" name="input1" type="text" placeholder="" class="form-control">
															</div>
															<div class="form-group col-sm-1"></div>
															<div class="form-group col-sm-3">
																<a id="add_country" class="btn btn-primary" style="width: 75px;height: 35px;padding-top: 3px;"><?=$pro_aafzodann?></a>
															</div>
														</div>
													</div>
												</div>
													
												<div class="form-group">
													<div class="col-sm-12">
														<div class="row">
															<div class="form-group col-sm-9">
																<select  id="country" name="country" class="form-control" size="10">
																	<?
																		$sql="SELECT name,id FROM new_regional where type=1";
																			 $result = $coms_conect->query($sql);
																		while($row = $result->fetch_assoc()) {
																	  		$id=$row['id'];
																			$name=$row['name'];
																			echo "<option value='$id'>$name</option>";
																		}
																	?>
																	
																</select>
															</div>
															<div class="form-group col-sm-1"></div>
															<div class="form-group col-sm-3">
																<a id="del_country" class="btn btn-primary" style="width: 75px;height: 35px;"><?=$s_Pages_delete?></a>
															</div>
														</div>
													</div>
												</div>
										</div>
									
										<div class="col-md-4">
										
											<img src="" id="show_pic">
											<div class="form-group" id="show_stat"></div>
											<!--select  id="stat" name="stat" class="form-control" size="2">
											<?
											$sql="SELECT name,id FROM new_regional where type=2";
											 $result = $coms_conect->query($sql);
											 while($row = $result->fetch_assoc()) {
											$id=$row['id'];
											$name=$row['name'];
											echo "<option value='$id'>$name</option>";
											}
																	?>
											</select-->
												
												
										</div>
										
										
										<img src="" id="show_pic_city">
										<div class="form-group" id="show_city"></div>
															
															
									</div>
									
								</div> 
							</div>	
						</div>
						<!-- /section:main/regional.form -->
						<div class="panel-footer bttools">
							<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
						</div>
				</form>
			</div>
			
		</div>	
	</div>
<!-- ace.min.css:6412 -->	
<style> 
select {
background-image:none;
}
</style>	
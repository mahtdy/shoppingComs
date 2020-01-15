<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<br>
<?$add_field_count=injection_replace($_POST['add_field_count']);

$filter_cat_id=injection_replace($_GET['cat_id']);
for($i=1;$i<=$add_field_count;$i++){
	$cat_id=injection_replace($_POST["cat_id"]);
	$la=injection_replace($_POST["la"]);
	$filed_title=injection_replace($_POST["filed_title$i"]);
	$option_field=injection_replace($_POST["option_field$i"]);
	 $field_value=injection_replace($_POST["field_value$i"]);
	
	$field_id=injection_replace($_POST["field_id$i"]);
	$exist_id=0;
	$exist_id=get_result("select id from new_ads_delicated_cat where id='$field_id'",$coms_conect);
	if($exist_id>0){
		$condition="id=$exist_id";
		$arr=array("status"=>1);
		update_data_base($arr,'new_ads_delicated_cat',$condition,$coms_conect);
		$field_id=$exist_id;
	}
	
	
	
	if($filed_title>""){
		$get_cat_id=get_result("select count(id) from new_ads_delicated_cat where id='$field_id'",$coms_conect);
		if($get_cat_id==0&&$exist_id==0){### add mode
			$arr=array("user_id"=>$_SESSION['manager_id'],"la"=>$la,"name"=>$filed_title,"value"=>$field_value,"cat_id"=>$cat_id,"ip"=>$custom_ip,"date"=>time(),"type"=>$option_field,"status"=>1);
			$id=insert_to_data_base($arr,'new_ads_delicated_cat',$coms_conect); 
			if($option_field==1){
				$temp=explode(",",$field_value);
				foreach($temp as $val){
					$arr=array("cat_id"=>$cat_id,"delicated_id"=>$id,'value'=>$val,'status'=>1);
					insert_to_data_base($arr,'new_ads_delicated_cat_val',$coms_conect);
				}
			}
		}else if($get_cat_id==1||$exist_id>0){####edit_mode
			$condition="id=$field_id";
			$arr=array("edit_user_id"=>$_SESSION['manager_id'],"la"=>$la,"name"=>$filed_title,"value"=>$field_value,"cat_id"=>$cat_id,"ip"=>$custom_ip,"edit_date"=>time(),"type"=>$option_field);
			update_data_base($arr,'new_ads_delicated_cat',$condition,$coms_conect);
			if($option_field==1){
				$temp=explode(",",$field_value); 
				$del_temp=explode(",",$field_value); 
				$result11 = $coms_conect->query("select id,value from new_ads_delicated_cat_val where cat_id=$cat_id and delicated_id=$field_id");
				while($row11 = $result11->fetch_assoc()){
					$id=$row11['id'];
					$exist_arr[]=$row11['value'];
				}
				if(count($exist_arr)>0){
					foreach($exist_arr as $val){##item is exists
					if(in_array($val,$temp)){
						$key = array_search($val, $temp);
							if(is_int($key)) {
						 	unset($temp[$key]);
						}
					}		
					}
							
				}
				if(count($exist_arr)>0){
					foreach($exist_arr as $val){  ##item is delete
						if(!in_array($val,$del_temp)){
							$condition="value='$val'";
							$arr_slide=array("status"=>0);
							update_data_base($arr_slide,'new_ads_delicated_cat_val',$condition,$coms_conect);
						}else if(in_array($val,$del_temp)){
							$condition="value='$val'";
							$arr_slide=array("status"=>1);
							update_data_base($arr_slide,'new_ads_delicated_cat_val',$condition,$coms_conect);
							
						}
					}
				}
				if(count($temp)>0){
					foreach($temp as $val){
						$arr=array("delicated_id"=>$cat_id,'value'=>$val,'status'=>1);
						insert_to_data_base($arr,'new_ads_delicated_cat_val',$coms_conect);
					} 		
				}
				 
			}
		}
	}
}
	


?>

<div class="tabbable">
	<div class="msheet tab-content">
		<div class="secfhead">
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">مشخصات اختصاصی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li>
						<a  data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته" >
							<span class="flaticon-search74"></span>
						</a>
					</li>
				</ul>
			</div>

		</div>
		
	
		<div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
			<form class="form-horizontal" action="" method="post" name="special" id="special" role="form" enctype="multipart/form-data">
			<div class="panel-body">
				<?$query="select name,id from new_modules_cat where   type='18' and status=1 and la='$la'"; 
					 $result = $coms_conect->query($query);
					 $j=0;
						echo "<div class='row'><div class='col-md-3'><select name='cat_id' id='cat_id' class='form-control'>";
					while($RS = $result->fetch_assoc()) {
						$str='';
						if($filter_cat_id==$RS['id'])
							$str='selected';
						if($j==0)$first_catid=$RS['id'];
						echo "<option $str value='{$RS['id']}'>{$RS['name']}</option>";$j++;
						
					}
					echo "</select></div>";
					
					$query="select name,title from new_language where    status=1"; 
					 $result = $coms_conect->query($query);
						echo "<div class='col-md-3'><select name='la' class='form-control'>";
					while($RS = $result->fetch_assoc()) {
						echo "<option value='{$RS['title']}'>{$RS['name']}</option>";
					}
					echo "</select></div></div><br>";
						 if(isset($_GET['cat_id']))
						$first_catid=injection_replace($_GET['cat_id']);
				$query="select * from new_ads_delicated_cat where   cat_id=$first_catid and status=1" ;
 					$i=1;
					$result = $coms_conect->query($query);
					while($RS = $result->fetch_assoc()) {
				?>
			 	 <div class="panel panel-success" id="field<?=$i?>">
					<div class="panel-body">
						<div class="form-group">
							<a data-filedid="<?=$RS['id']?>" class="col-md-1 control-label del_add_field" id="<?=$i?>">
								<i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i>
							</a><label class="col-sm-2 control-label" style="text-align: center;">عنوان <?=$i?></label>
							<div class="form-group col-md-3">
								<input value="<?=$RS['name']?>" type="text" name="filed_title<?=$i?>" id="filed_title<?=$i?>" class="form-control">
							</div>
							<label class="col-sm-2 control-label" style="text-align: center;">نوع فیلد</label>
							<div class="form-group col-md-3">
								<select name="option_field<?=$i?>" data-option="option_field<?=$i?>"  data-div="div_<?=$i?>" class="form-control select<?=$i?>">
									<option value="0" <?if($RS['type']==0)echo 'selected'?>> متنی</option>
									<option value="1" <?if($RS['type']==1)echo 'selected'?>> انتخابی</option>
								</select>
							</div>
						</div>
						<?if($RS['type']==1){?>
						<div   class="form-group div_<?=$i?> xblue">
							<label class="col-md-3 control-label" style="text-align: center;">گزینه ها را وارد نمایید</label>
							<div class="form-group col-md-8">
								<input value="<?=$RS['value']?>" type="text" name="field_value<?=$i?>" id="field_value<?=$i?>" class="form-control tagsfield" data-role="tagsinput" style="width:100%" placeholder="لطفا بعد از وارد کردن هر گزینه Enter بزنید">
							</div>
						</div>
						<?}?>
					</div>
					<input type='hidden' value="<?=$RS['id']?>" name="field_id<?=$i?>">
				</div>				
				<?$i++;}?>
				
				<input type="hidden" id="add_field_count" name="add_field_count" value="<?=$i?>">
				 	
				<script>
	$('#cat_id').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&cat_id=") >= 0){
			var b=a.split('&cat_id=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&cat_id="+$(this).val()+e;
		}
		else
		a +='&cat_id='+$(this).val();
		window.location.href = a;
    });		


				
					$(document).on('ready', function(e){
						var i = <?=$i?>;
						$(document).on('click', '#add_field',function(){				
							var someText = '<div class="panel panel-success" id="field'+i+'"><div class="panel-body"><div class="form-group"><a class="col-md-1 control-label del_add_field" id="'+i+'"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a><label class="col-sm-2 control-label" style="text-align: center;">عنوان '+i+'</label><div class="form-group col-md-3"><input type="text" name="filed_title'+i+'" id="filed_title'+i+'" class="form-control"></div><label class="col-sm-2 control-label" style="text-align: center;">نوع فیلد</label><div class="form-group col-md-3"><select name="option_field'+i+'" data-option="option_field'+i+'"  data-div="div_'+i+'" class="form-control select'+i+'"><option value="0"> متنی</option> <option value="1"> انتخابی</option> </select></div></div><div style="display:none" class="form-group div_'+i+' xblue"><label class="col-md-3 control-label" style="text-align: center;">گزینه ها را وارد نمایید</label><div class="form-group col-md-8"><input type="text" name="field_value'+i+'" id="field_value'+i+'" class="form-control tagsfield" data-role="tagsinput" style="width:100%" placeholder="لطفا بعد از وارد کردن هر گزینه Enter بزنید"></div></div></div></div>';				
							$(this).before(someText);						
							$('#field'+i+'').fadeTo('slow', 0.3, function()
							{
								$(this).css('background', '');
							}).fadeTo('slow', 1);
							
							$('select').change(function() {  ////show hide select
							if($(this).val()==1){
								$('.' +$(this).data('div')).show();  
							}else{
					 
								$('#' +$(this).data('option')).val(''); 
								$('.' +$(this).data('div')).hide(); 
							}
								
								
							});
							///////
							$('#add_field_count').val(i);
							i++;
							
							
						});
						
						$(document).on('click', '.del_add_field',function(){	
						//alert($(this).attr('id'));				
							var id = '';
							var k=$('#add_field_count').val();k--
							id = $(this).attr('id');
							$('#field'+id).remove();
							$('#add_field_count').val(k);
							if($(this).data('filedid')>0){
								 $.ajax({
								 type:'POST',
								 url:'/New_ajax.php',
								 data:"action=delete_delcate_fields&id="+$(this).data('filedid'),
									 success: function(result){
									 }
								});					
							}
 			
						});
						
						///////////
						$(document).on('click', '.tagsfield',function(){
							
							if($(this).val()==1){
								$('.tagsfield').tagsinput('items');
							}else{
								$('.tagsfield').tagsinput('items');
							}
						});
					});
 			
					
				</script>
				
				<a class="btn btn-success block" id="add_field" style="width: 100%;"><span class="fa fa-plus"></span>  افزودن فیلد بیشتر </a>
				 
				<div class="panel-footer bttools">
					<button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary submit2" id="submit2">ذخيره</button>
				</div>
			</div>
			</form>
		</div> 
	
	</div>
</div>
 
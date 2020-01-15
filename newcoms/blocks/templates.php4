<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/jquery.gritter.css" />

<!-- #section:blocks/templates.head -->
	<div class="page-header" style="font-size: x-large;">
		  لیست قالب ها
	</div>
<!-- /section:blocks/templates.head -->	
<form method="post" id="tem_list"  method="post" enctype="multipart/form-data">	
<input type="hidden" name="pic_tem_name" id="pic_tem_name">
<?###########################################

$pic_tem_name=injection_replace($_POST['pic_tem_name']);
 
if($_FILES["$pic_tem_name"]["name"]>""){
	$file_name= $_FILES["$pic_tem_name"]["name"];
	$file_type= $_FILES["$pic_tem_name"]["type"];
	$file_tmp= $_FILES["$pic_tem_name"]["tmp_name"];
	$file_path="new_template/$pic_tem_name/preview.jpg";
	upload_file($file_name,$file_type,$file_tmp,$file_path);	
} 



$copy_tem=injection_replace($_POST['copy_tem']);
$tem_name=injection_replace($_POST['tem_name']);

if($copy_tem>""){
	
	  $arr_attach=array("tem_name"=>$copy_tem,"date"=>date('Y-m-d H:i:s'),"ip"=>"$custom_ip","user_id"=>$manager_id);
	  insert_to_data_base($arr_attach,'new_active_template',$coms_conect);
		copy_directory("new_template/$tem_name","new_template/$copy_tem");	
}
 



$path="new_template/";
$not_site=0;
	if(is_dir($path)){
		$handle = opendir($path);
		$i=1;
		while (false !== ($entry = readdir($handle))) {
			if (($entry!='.')&&($entry!='..')){
				
				$query="select id  from new_active_template  where tem_name='$entry'";
				$result = $coms_conect->query($query);
				$RS1 = $result->fetch_assoc();
				$tem_id=$RS1['id'];
				$query1="select lang_id  from new_active_template a, new_manage_lang b where tem_name='$entry' and type='tl' and a.id=b.manager_id";
				$result1 = $coms_conect->query($query1);
				$j=0;
				$lang_arr="";
				$str="";
				while($RS11 = $result1->fetch_assoc()) {
					$lang_arr .=','.$RS11['lang_id'];
					$j++;
				}
			
				$query12="select lang_id  from new_active_template a, new_manage_lang b where tem_name='$entry' and type='ts' and a.id=b.manager_id";
				$result12 = $coms_conect->query($query12);
				$j=0;
				$site_arr='';
				while($RS12 = $result12->fetch_assoc()) {
					$site_arr .=','.$RS12['lang_id'];
					$j++;
				}
				//echo $site_arr.'<br>';
				$query13="select lang_id  from new_active_template a, new_manage_lang b where tem_name='$entry' and type='tl' and a.id=b.manager_id";
				$result13 = $coms_conect->query($query13);
				$j=0;
				$lang_arr="";
				$str="";
				while($RS13 = $result13->fetch_assoc()) {
					$lang_arr .=','.$RS13['lang_id'];
					$j++;
				}
				if($tem_id>""){
					$query14="select lang_id  from  new_manage_lang  where  type='tl' and manager_id<>$tem_id group by lang_id";
					//echo $query1;
					$result14 = $coms_conect->query($query14);
					$not_lang_arr="";
					$j=0;
					$str="";
					while($RS14 = $result14->fetch_assoc()) {
						if($j!=0)
						$str=",";
						$not_lang_arr .=$str.$RS14['lang_id'];
						$j++;
					}
					$query15="select lang_id  from  new_manage_lang  where  type='ts' and manager_id<>$tem_id group by lang_id";
					$result15 = $coms_conect->query($query15);
					$not_site_arr="";
					
					$j=0;
					$str="";
					while($RS15 = $result15->fetch_assoc()) {
						if($j!=0)
						$str=",";
						$not_site_arr .=$str.$RS15['lang_id'];
						$j++;
					}	//echo $query.'<br>';		
				}				
?>   
	<script type="text/javascript">
$(document).ready(function() {
	  $('#lang_<?=$entry?>').select2({
        data: [
				<?if($not_lang_arr>"")
				$str1="and id not in ($not_lang_arr)";
				else
				$str1='';	
				$query16="select id,name from new_language where status=1 $str1";
				$result16 = $coms_conect->query($query16);
				$i=0;
				while($RS16 = $result16->fetch_assoc()) {
					$id=$RS16["id"];
					$name=$RS16["name"];
					if(in_array($id,$manager_la)){
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
	
	  $('#site_<?=$entry?>').select2({
        data: [
				<?if ($not_site_arr)
				$str="and id not in ($not_site_arr)";
				$query17="select id,name from new_subsite where status=1 ";
				$result17 = $coms_conect->query($query17);
				$i=0;
				 
				while($RS17 = $result17->fetch_assoc()) {
					$id=$RS17["id"];
					$name=$RS17["name"];
					if(in_array($id,$manager_site)){
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
		

				<div class="col-md-4">   
				   <div class="box--no-padding">
					<div class="item-preview">
					<p class="templatetitle"><?=$entry?></p>
					
						<!--<a href="/new_template/<?=$entry?>/preview.jpg" target="_blank">
							<img alt="<?=$entry?>" itemprop="image" src="/new_template/<?=$entry?>/preview.jpg">
						</a>-->
						
						<span class="profile-picture" style="width: 320px;height: 245px;">
							<a href="#" class="pop">
								<img src="/new_template/<?=$entry?>/preview.jpg" alt="" class="img-responsive" width="320" height="250" id="avatar"/>
							</a>
							<!-- popup image -->
							<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									 <div class="modal-content">
										  <div class="modal-body">
											   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<img src="" class="imagepreview" style="width: 100%;" >
										  </div>
									 </div>
								</div>
						    </div>
						</span>
						
						<div class="item-preview__actions">
							<div id="fullscreen" class="item-preview__preview-buttons">								
								<!-- #section:blocks/templates.copy -->
								<div class="form-group">
									<!--<input name="<?=$entry?>" type='file' class="btn btn-primary"> -->
									<?if($_SESSION['manager_user_name']=='comsroot'){?>
									<a class="btn btn-success copy_tem btn-block" id="<?=$entry?>"  data-title="qaz" data-toggle="modal" data-target="#qaz" data-placement="top" rel="tooltip"> کپی کردن قالب</a>
									<?}?>	
								</div>
								<!-- /section:blocks/templates.copy -->
								<!-- #section:blocks/templates.set -->
								<div class="form-group">
									<a href="/newcoms.php?yep=new_tem_setting&tem=<?=$entry?>" role="button" class="btn btn-primary" ><i class="glyphicon glyphicon-cog"></i> تنظيمات </a>
									<a href="/newcoms.php?yep=new_Alignments&tem=<?=$entry?>" role="button" class="btn btn-primary" ><i class="glyphicon glyphicon-th-list"></i> چيدمان بلوک </a>
								</div>
								<!-- /section:blocks/templates.set -->
								
								<div class="form-group" id="show_lang" >
								<!-- #section:blocks/templates.sub -->								
									<div class="form-group col-md-12">
										<input value="<?=$site_arr?>" placeholder="انتخاب زیر سایت" type="text" id="site_<?=$entry?>" name="<?=$entry?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default manage_site"  style="width: 100%; ">									
									</div>
								<!-- /section:blocks/templates.sub -->
								</div>
								
								</br></br>
								
								<div class="form-group" id="show_lang" >
								<!-- #section:blocks/templates.lang -->
									<div class="form-group col-md-12">
										<input value="<?=$lang_arr?>" placeholder="انتخاب زبانها" type="text" id="lang_<?=$entry?>" name="<?=$entry?>" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default manage_lang"  style="width: 100%; ">									
									</div>
								<!-- /section:blocks/templates.lang -->
								</div>	
							</div>
							
						</div>
					</div>
					<!--<input id="<?=$entry?>" value="ثبت" type="button" class="form-group col-md-12 tem_pic_copy" type="bytton" value="ثبت">-->
				  </div>	
				</div>
					
<?
			}$i++;
		}
	}

$_SESSION["edit_item"]='change_active_tem_lang';
$_SESSION["delete_item"]='change_active_tem_site';

?>
</form>
<script>
$(".copy_tem").click(function () {
		$("#tem_name").val($(this).attr('id'));
});
$(".tem_pic_copy").click(function () {
		$("#pic_tem_name").val($(this).attr('id'));
		$("#tem_list").submit();
});


		$(".manage_lang").click(function () {

			var a="#site_"+$(this).attr('name');
			var b=$(a).val();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_active_tem_lang&id="+$(this).val()+"&value="+$(this).attr('name')+"&secend_value="+b,
				success: function(result){
				//alert(result);
				window.location.href = "newcoms.php?yep=templates";
				//alert(result);
				}
			});		
		});
		$(".manage_site").click(function () {
			var a="#lang_"+$(this).attr('name');
			var b=$(a).val();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_active_tem_site&id="+$(this).val()+"&value="+$(this).attr('name')+"&secend_value="+b,
				success: function(result){
					window.location.href = "newcoms.php?yep=templates";
				}
			});		
		});			
</script>
<?if($_SESSION['manager_user_name']=='comsroot'){?>
<form action="" method="post" id="copy_templatess">
	<div class="modal fade" id="qaz" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">کپی کردن قالب</h4>
				</div>
				<div class="modal-body ">
					<label class="  control-label" style="font-family:Yekan;">نام قالب</label>
					<span>
					<input class=" form-control" name="copy_tem" id="copy_id" placeholder="نام قالب باید حتما انگلیسی باشد">
					<input class=" form-control" type="hidden" name="tem_name" id="tem_name">
					</span>
					<img src="" id="dynamic" style="width: 100px;display:none;">
				</div>
				<div class="modal-footer ">
					
					<button type="button" id="btn_ok"     class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
					<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
				</div>
			</div>
		</div>

	</div>
	
</form>	
<?}?>
<link href="/yep_theme/default/rtl/css/tem_screenshot.min.css" rel="stylesheet">
<link href="/yep_theme/default/rtl/css/temp_screenshot.min.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/assets/js/jquery.gritter.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/x-editable/bootstrap-editable.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/x-editable/ace-editable.min.js"></script>
<script>
/*
jQuery(function($) {
			
	//editables on first profile page
	//$.fn.editable.defaults.mode = 'inline';
				
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
				btn_choose: 'تغییر تصویر قالب',
				droppable: true,
				maxSize: 110000,//~100Kb

				//and a few extra ones here
				name: 'avatar',//put the field name here as well, will be used inside the custom plugin
				on_error : function(error_type) {//on_error function will be called when the selected file has a problem
					if(last_gritter) $.gritter.remove(last_gritter);
					if(error_type == 1) {//file format error
						last_gritter = $.gritter.add({
							title: 'این فایل یک عکس نیست!',
							text: 'لطفا تصاویری با فرمت های jpg|gif|png انتخاب نمائید.',
							class_name: 'gritter-error gritter-right'
						});
					} else if(error_type == 2) {//file size rror
						last_gritter = $.gritter.add({
							title: 'این فایل خیلی برزگ است!',
							text: 'اندازه تصویر حداکثر  100Kb می باشد!',
							class_name: 'gritter-error gritter-right'
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
						title: 'تصویر قالب بروز شد!',
						text: 'تغییر تصویر قالب با موفقیت انجام شد.',
						class_name: 'gritter-info gritter-right'
					});
					
				 } , parseInt(Math.random() * 800 + 800))

				return deferred.promise();
				
				// ***END OF UPDATE AVATAR HERE*** //
			},
			
			success: function(response, newValue) {
				alert('fff');
							$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_blocks&id="+$(this).val(),
				success: function(result){
				 
				window.location.href = "newcoms.php?yep=new_Components";
				}
			});
				
				
			}
		})
	}catch(e) {}
	
				
});
*/

// popup image
$(function() {
	$('.pop').on('click', function() {
		$('.imagepreview').attr('src', $(this).find('img').attr('src'));
		$('#imagemodal').modal('show');   
	});		
});
						
$("#btn_ok").click(function(){
	$("#dynamic").attr('src', 'waiting.gif');
	$("#dynamic").css('display', 'block');
	$("#copy_templatess").submit();
});
</script>


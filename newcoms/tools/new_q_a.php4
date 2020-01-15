<?$edit_id=injection_replace($_GET['edit_id']);?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
 <div class="modal fade" id="deatils" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">مشاهده جزئیات</h4>
				<div id='show_deatils'> 
				</div>
			</div>
		</div>
	</div>
</div> 
<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get" enctype="multipart/form-data">
<input type="hidden" value="new_q_a" name='yep'>
	<fieldset>
		<div class="modal fade" id="searching" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title custom_align" id="Heading">جستجوي پيشرفته</h4>
					</div>
					<div class="modal-body">
						<div class="clearfix">
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">عنوان جستجو</label>
								<div class="col-md-4">
								<?$search_txt=injection_replace($_GET['search_txt'])?>
									<input id="search_txt" name="search_txt" value="<?=$search_txt?>" type="text" placeholder="" class="form-control">
								</div>
							</div>
 							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">فيلد</label>
								<div class="col-md-4">
									<?$field=injection_replace($_GET['field'])?>
									<select class="form-control" rows="5" name="field">
										<option <?if($field==0) echo 'selected'?> value="0">همه</option>
										<!--option <?if($field==1) echo 'selected'?> value="1">درج کننده</option-->
										<option <?if($field==2) echo 'selected'?> value="2">پاسخ دهنده</option>
										<option <?if($field==3) echo 'selected'?> value="3">موبایل</option>
										<option <?if($field==4) echo 'selected'?> value="4">ایمیل</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">دسته بندی</label>
								<div class="col-md-4">
								<?$cat_filter=injection_replace($_GET['cat_filter']);
								 $sql = "SELECT name,id FROM new_modules_cat where type=99";
										//echo $sql;
										$result = $coms_conect->query($sql);
										echo "<select name='cat_filter' id='cat_filter' class='form-control' rows='2' >";
										echo "<option  value=''></option> ";
										while($row = $result->fetch_assoc()) {
											$name=$row['name'];
											$id=$row['id'];
											$str="";
											if($cat_filter==$id)
											$str="selected";
											if(in_array($id,$_SESSION["manager_page_cat"]))
											echo "<option $str value='$id'>$name</option> ";
										}				
										echo '</select>';?>		
								
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">تاريخ انتشار</label>
								<div class="col-md-4">
								<?if($_GET['publish_search']>"")$publish_search=(injection_replace($_GET['publish_search']))?>
										<input type="text" value="<?=$publish_search?>" class="input-sm form-control" name="publish_search" id="publish_search" />
								 
								</div>
							</div>
 
						</div>
					</div>
					<div class="panel-footer">
						<button id="singlebutton"   class="btn btn-primary">جستجو</button>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</form>
<script type="text/javascript">
 $(document).ready(function() {
    $('#tag_faq').select2({
        data: [
				<?
				$query="select id,key_count,name from new_keyword where la='fa'";
				$result = $coms_conect->query($query);
				$i=0;
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
				$name=$RS1["name"];
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
 

<?$lang_id='fa';
$manager_filter=injection_replace($_GET['manager_filter']);
//if($manager_filter=='')
//	$manager_filter=$_SESSION["manager_id"];
$q=injection_replace($_GET['q']);
$site_filter=injection_replace($_GET['site_filter']);
if(isset($_GET['status_filter']))
$status_filter=injection_replace($_GET['status_filter']);
$lang_filter=injection_replace($_GET['lang_filter']); 
if($lang_filter==""&&$_SESSION['lang_filter']=='')
	$lang_filter=$_SESSION['page_languege'];
 
 
 
 $edit_id=injection_replace($_GET['edit_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
$answer=($_POST['answer']);
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$cat_id=injection_replace($_POST['cat_id']);
$question= ($_POST['question']);
$show_on_site=injection_replace($_POST['show_on_site']);
if($_POST['send_memeber_email']==1)
$send_memeber_email=injection_replace($_POST['send_memeber_email']);
else 
	$send_memeber_email=0;

if($_POST['send_memeber_sms']==1)
$send_memeber_sms=injection_replace($_POST['send_memeber_sms']);
else 
	$send_memeber_sms=0;
$faq_lang=injection_replace($_POST['faq_lang']);
$faq_site=injection_replace($_POST['faq_site']);
if($show_on_site==1)
	$status=2;else
		$status=0;
	
if($edit_id>0){
	$sql22="select sender_email,mobile,sender_name from new_question where id='$edit_id'";
	$result22 = $coms_conect->query($sql22);
	$row22 = $result22->fetch_assoc();	
	$temp=$_SERVER['SERVER_NAME'];
	if($send_memeber_email==1&&$edit_id>0){ 
		  $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
		  $result = $coms_conect->query($query);
		  $row = $result->fetch_assoc();
		  $sms_url=$row['url'];
		  $sms_password=$row['sms_password'];
		  $sms_user=$row['sms_user'];
		  $senderNumbers=array($row['senderNumbers']);
		 $recipientNumbers=array($row22['mobile']);
		 $sms_str="پاسخ سوال شما از سایت $temp به ایمیل شما ارسال گردید";
		 $messageBodies=array($sms_str);
		 $sendDate=array(time());
		 $sms=send_sms($sms_url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
		 if($sms==1)
			 $sms='پیامک شما با موفقیت ارسال شد';
		 else
			 $sms=sms_alert($sms);
		 show_msg($sms);
	}	
	
	if($send_memeber_sms==1&&$edit_id>0){ 

		
		$msg ="<div  style='text-align:right;font-family:tahoma;'>";
		$msg .= " $view_dear_friend , {$row22['sender_name']}  <br> ";
		$msg .='<p>'. $_POST['question'] ."</p><br> ";
		$msg .='<p>'. $_POST['answer']."</p><br>";
		$msg .='</div>';

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From:  $temp {$row22['sender_email']} ";
		 mail($row22['sender_email'],"پاسخ از سایت $temp ",$msg,$headers);	
		show_msg('ایمیل شما با موفقیت ارسال شد');
	}		
}
$tag_faq=injection_replace($_POST['tag_faq']);
$arr=explode(",",$tag_faq);
if($edit_mode=='' && $question>""){   
 	$arr_attach=array("mudoal_lock"=>$mudoal_lock,"cat_id"=>$cat_id,"site"=>$faq_site,'la'=>$faq_lang,"send_memeber_sms"=>$send_memeber_sms,"send_memeber_email"=>$send_memeber_email,"status"=>$status,"ip"=>$custom_ip,"question"=>$question,"answer"=>$answer,"user_id"=>$edit_user_id,"date"=>$now);
	$id=insert_to_data_base($arr_attach,'new_question',$coms_conect);
	show_msg('اطلاعات با موفقیت اضافه گردید');
	
	
	
	foreach($arr as $val){
		if($val>""){
 			$label_arr=array("id"=>$id,"type"=>99,"label_id"=>$val);
			insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
		}			
	}
	
	
}else if($edit_mode>"" && $question>""){
	$condition="id='$edit_mode'";
	$arr_attach=array("mudoal_lock"=>$mudoal_lock,"cat_id"=>$cat_id,"site"=>$faq_site,'la'=>$faq_lang,"send_memeber_sms"=>$send_memeber_sms,"send_memeber_email"=>$send_memeber_email,"status"=>$status,"ip"=>$custom_ip,"question"=>$question,"answer"=>$answer,"edit_user_id"=>$edit_user_id,"edit_date"=>$now);
	update_data_base($arr_attach,'new_question',$condition,$coms_conect);
	
     $condition1="id=$edit_mode and type=99";
    delete_from_data_base('new_mudoal_label',$condition1,$coms_conect);
	 foreach($arr as $val){
		if($val>""){
			$labe=array("id"=>$edit_mode,"type"=>99,"label_id"=>$val);
			insert_to_data_base($labe,'new_mudoal_label',$coms_conect);
		}			
	} 
	show_msg('اطلاعات با موفقیت ویرایش شد');	
} 


	if($status_filter==4||$status_filter=='') $status_str='';
	if($status_filter==3&&$status_filter!='') $status_str=' and status=0';
	if($status_filter==1) $status_str=' and status=1';
	if($status_filter==2) $status_str=' and status=2';
 
 
?>	
<style>
.error {
color : red;
}
.desm{display: inline-flex !important;}
</style>
<script>
	$(document).ready(function(){
		$("#drop4").hide();
		
		var boxes = $('input.conchkNumber');
		boxes.on('change', function () {
		  $('#drop4').toggleClass("desm", boxes.is(":checked"));
		});
		
		var boxall = $('input.conchkSelectAll');
		boxall.on('change', function () {
		  $('#drop4').toggleClass("desm", boxall.is(":checked"));
		});
		
	});
	
</script>
<script>
 $(function() {
         $('#new_question').validate({
            
            rules: {
				question: {
					required:true
				},
				amount: {
					required:true
				}
            },
            messages: {
				question: {
					required:"پر کردن اين فيلد الزامي است"
				},
				amount: {
					required:"پر کردن اين فيلد الزامي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '1 فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
                      $("div.errorHandler button").after(message);
                      $("div.errorHandler").show();
                    } else {
                      $("div.errorHandler").hide();
                    }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>  

<script type="text/javascript">
	jQuery(function($){
	
		$('.dd').nestable();
	
		$('.dd-handle a').on('mousedown', function(e){
			e.stopPropagation();
		});
		
		$('[data-rel="tooltip"]').tooltip();
	
	});
</script>
 
<style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f070";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f06e";}
</style>

<style>	
	.dd {
max-width: 100%;}
</style>
	
	<div class="tabbable">
		
	    <div class="msheet tab-content">
	  
		<div class="secfhead">
			<!-- #section:tools/faq.head -->
			<div class="sectitle">  
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">لیست پرسش و پاسخ</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:tools/faq.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li id="newpag" class="addicon">
						<a href="#add_templates" data-toggle="tab" id="newnew" data-placement="bottom" title="افزودن سوال" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					
					<li>
						<a href="" data-toggle="modal" data-target="#searching" id="iconsearch" data-placement="top"  title="جستجوی پیشرفته" >
							<span class="flaticon-search74"></span>
						</a>
					</li>
				</ul>
			</div>

		</div>
		
			<div class="tab-pane <?if($edit_id=='') echo 'active';?>" id="tab1">
				<div class="tt">
					<div class="row-fluid">
						<div class="col-md-10">
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
								<span class="sr-only">Toggle navigation</span>
								<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<?if($_SESSION["can_delete"]==1){ ?>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
										حذف 
										</a>
									</ul>
								</div>	
								<?}?>
							</div>

									<div class="form-group yepco">
										<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
											<input type="hidden" name="yep"  value="new_q_a">
											<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
											<input type="hidden" name="site_filter" value="<?=$site_filter?>">
											<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
											<input type="hidden" name="status_filter" value="<?=$status_filter?>">
											<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										</form>	
									

	 

										<!--div class="pull-right btn-default btn-xs yepco">
											<?if ($manager_filter>"")
												$_SESSION['manager_filter']=$manager_filter;
											create_manager_filter_none($_SESSION['manager_filter'],$coms_conect,$_SESSION["manager_user_permisson"])?>
										</div-->
										<div class="pull-right btn-default btn-xs yepco">
											<?if ($site_filter>"")
												
												$_SESSION['site_filter']=$site_filter;
											create_sub_site_filter($_SESSION['site_filter'],$coms_conect,$_SESSION['manager_title_site'])?>
										</div> 
									<?if ($lang_filter>"")
												$_SESSION['lang_filter']=$lang_filter;
										else 
											$lang_filter=$_SESSION['lang_filter'];?>
										<div class="pull-right btn-default btn-xs yepco">
											<?if ($lang_filter>"")
												$_SESSION['lang_filter']=$lang_filter;
												create_lang_filter($_SESSION['lang_filter'],$coms_conect,$_SESSION["manager_title_lang"])?>
										</div>
										<div class="pull-right btn-default btn-xs yepco">
											<select name='status_filter' id='status_filter' class="form-control">	
												<option <?if($status_filter==4||$status_filter=='') echo 'selected';?> value='4'>همه پرسش ها</option>
												<option <?if($status_filter==3) echo 'selected';?> value='3'>منتظر بررسی و پاسخ</option>
												<option <?if($status_filter==1) echo 'selected';?> value='1'>پاسخ داده شده ها</option>
												<option <?if($status_filter==2) echo 'selected';?> value='2'>منتشر شده در سایت</option>
											</select>
										</div>  
								</div>
						</div>
					</div>
				</div>
				<br><br><br>
			
			
					      <div class="panel-group" id="accordion">
					<?		if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
								header('Location: new_manager_signout.php');
								}
								
								if(($site>""&&!in_array($site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
								header('Location: new_manager_signout.php');
								exit;
								}
								$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]); 
								$manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
								$manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
							 
							 
								if($manager_filter>0&&!in_array($manager_filter,$_SESSION["manager_user_permisson"]))
								header('Location: new_manager_signout.php');	
					
					
					

							if($q>""){
								$str_q="  and(a.answer like '%$q%'  or a.question like '%$q%' or a.sender_name='%$q%' or a.sender_email='%$q%') ";
								 $manager_q="&q=$q";
							}
					 
					 
							if($lang_filter!=-1){
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							} else 
							$str_lang="";	
							
							 if($manager_filter>0){
								$str_manager=" and  a.user_id='$manager_filter'";
								 $manager_page="&manager_filter=$manager_filter";
							}
							else 
							$str_manager="  ";
							//$str_manager=" and  user_id in ($manager_user_permisson)";
						
						
							if($site_filter>0){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}else 
								$str_site="";	
							
							
							
						    if($publish_search>""){
								$temp=jalalitomiladi($publish_search);
								$yesterday_expire=strtotime(date('Y-m-d', strtotime($temp. ' - 1 days')));
								$today_expire=strtotime(jalalitomiladi($publish_search));
								$str_expire=" and a.edit_date<='$today_expire' and a.edit_date>='$yesterday_expire'";
								$expire_page="&publish_search=$publish_search";
							}

 						
							
							if($cat_filter>""){
								$str_cat=" and a.cat_id='$cat_filter'";
								$status_cat="&cat_filter=$cat_filter";
							}else{
								$str_cat='';		
								$status_cat="&cat_filter=$cat_filter"; 
							}
										
							
							
							 
							if(isset($field)&&$field>""){
								$field_page="&field=$field&search_txt=$search_txt"; 
								switch ($field) {
									 case 0:
										 
										$str_field=" and (a.answer like '%$search_txt%'  or a.question like '%$search_txt%' or a.sender_name='%$search_txt%' or a.sender_email='%$q%' or a.sender_name like '%$search_txt%'   or a.mobile like '%$search_txt%' or a.sender_email like '%$search_txt%')";
										break; 
									case 1:
										$str_field=" and a.sender_name like '%$search_txt%'";
										break;
									case 2:
										$str_field=" and (b.name like '%$search_txt%' or b.user_name)";
										break;
									case 3:
										$str_field=" and a.mobile like '%$search_txt%'";
										break;
									case 4:
										$str_field=" and a.sender_email like '%$search_txt%'";
										break;

								}
								 //$str_lang=" and a.la='$lang_filter'";
								 //$lang_page="&lang_filter=$lang_filter";
							}						
							$sql1 = "SELECT count(a.id)as cnt   from new_question a  
							where a.id>0    $str_site $str_manager $str_lang  $str_q $status_str $str_cat $str_field $str_expire 
							order by a.status,a.id desc ";
							  //echo $sql1; exit;
								$result = $coms_conect->query($sql1);
								$RS = $result->fetch_assoc();
							$page=injection_replace($_GET["page"]);
							$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_q_a$expire_page$lang_page$site_page$manager_page$manager_q$field_page$expire_page$status_cat");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];						
								
						
				        	$sql12 = "SELECT a.site,a.la,a.mudoal_lock,a.date,a.answer,a.question,a.id,a.status   from new_question a  
							where a.id>0    $str_site $str_manager $str_lang  $str_q $status_str $str_cat $str_field $str_expire
							order by a.status,a.id desc limit $from,$to";
							 // echo $sql12; // exit;
							$resultd1 = $coms_conect->query($sql12);$i=1;
							while($row = $resultd1->fetch_assoc()) {
								$id=$row['id'];
								$status=$row['status'];
								if($status==0) $status_str='منتظر بررسی و پاسخ';
								if($status==1) $status_str='پاسخ داده شده';
								if($status==2) $status_str='منتشر شده در سایت';
					?> 
						                      
                                <div class="panel panel-default">
								<!-- #section:tools/faq.table -->
                                    <div class="panel-heading container-fluid">
                                        <div class="panel-title col-md-12" style="display: inline-block">
											<div class="col-md-7 col-sm-12 col-xs-12">
												<label class="position-relative" style="bottom: 10px;">
												<input id="<?=$id?>" type="checkbox" class="conchkNumber" />
												<span class="lbl"></span>
												</label>  
												
												<a data-toggle="collapse" data-parent="#accordion" href="#question-<?=$i?>">
													<span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;"><?=$row['question']?></span>
												</a>
											</div>	
											<div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left;">
												
												<span class="a" id="" href="" style="margin-left:40px;margin-top: 15px;">
													<?=$row["la"]?>
												</span>
												<span>           </span>
												<span class="b" id="" href="" style="margin-left:30px">
													<?=$row["site"]?>
												</span>
												
												<span class="" id="" href="" style="margin-left:50px">
													<?=$status_str?>
												</span> 
												
												<a class="green show_details" id="<?=$id?>"   data-title="deatils" data-toggle="modal" data-target="#deatils" data-placement="top" rel="tooltip">
													<i class="ace-icon fa fa-eye bigger-130"></i>
												</a>
												<a class="blue" name="editfaq" id="<?=$id?>" href="newcoms.php?yep=new_q_a&edit_id=<?=$id?>">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>
												<a class="red del_menu" id="<?=$id?>" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>
												</a>
												 <label></label>
												 <input  id="<?=$id?>" name="switch-field-1" <?if($row['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
												 <span title="فعال سازی"class="lbl"></span>
											</div>
										</div>
                                    </div>
                                    <div id="question-<?=$i?>" class="panel-collapse collapse ">
                                        <div class="panel-body">
											<?=$row['answer']?>
                                        </div>
                                    </div>
								<!-- /section:tools/faq.table -->
                                </div>
							<?$i++;}?>
                         
 
							</div>
 <?=$pgsel?>
					</div>
			 

 
			<div class="tab-pane <?if($edit_id) echo 'active';?>" id="add_templates">
					<form class="form-horizontal" id="new_question" name="new_question" action="" role="form" method="post" enctype="multipart/form-data">
						<input type="hidden" id="check_value" name="check_value" value="0">
						<input name="edit_mode" hidden value="<?=$edit_id?>">
						<div id="id-message-new-navbar" class="message-navbar clearfix">
							<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
								<span class="flaticon-verified9">
								</span>
							</a>
							<a href="newcoms.php?yep=new_q_a" title=""  data-original-title="بازگشت">
								<span class="flaticon-left-arrow9">
								</span>
							</a>
						</div>
						</br>
						
<?$question='';
$answer='';
$status='';
$status='';
$site_id='';
$cat_id='';
 
$send_memeber_email='';
$send_memeber_sms='';

if($edit_id>""){
	$sql12 = "SELECT mudoal_lock,cat_id,site,la,send_memeber_sms,send_memeber_email,answer,question,id,status   from new_question    
	where id>0  and id='$edit_id'";
	$resultd1 = $coms_conect->query($sql12);$i=1;
	$row = $resultd1->fetch_assoc();
	$question=$row['question'];	
	$answer=$row['answer'];	
	$status=$row['status'];	
	$mudoal_lock=$row['mudoal_lock'];	
	$cat_id=$row['cat_id'];	
	$site_id=$row['site'];	
	$lang_id=$row['la'];	
	$send_memeber_sms=$row['send_memeber_sms'];	
	$send_memeber_email=$row['send_memeber_email'];	
	
	
	
	$sql121 = "SELECT b.id   from new_mudoal_label a , new_keyword b  where a.id='$edit_id' and a.label_id=b.id and type=99";
 
  
	$resultd11 = $coms_conect->query($sql121);
	$tag_faq=array();  
	while($row1 = $resultd11->fetch_assoc()){
		
		$tag_faq[]=$row1['id'];
	}    
	 $tag_faq=implode(',',$tag_faq); 
	 
}?>						
						<div class="panel-body">
						<!-- #section:tools/faq.form -->

							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-2 control-label">سایت</label>
												<div class="form-group col-md-10"> 
													<?$sql = "SELECT name FROM new_subsite where status=1";
														$result = $coms_conect->query($sql);
														echo "<select name='faq_site' id='faq_site' class='form-control' rows='2' >";
	 													while($row = $result->fetch_assoc()) {
															$name=$row['name'];
															$id=$row['name'];
															$str="";
															if($site_id==$name)
															$str="selected";
															if(in_array($name,$_SESSION["manager_title_site"]))
															echo "<option $str value='$name'>$name</option> ";
														}				
														echo '</select>';?>												</div>
											</div>
										</div>

									</div>
								</div>
							</div> 
						 	<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-2 control-label">زبان</label>
												<div class="form-group col-md-10"> 
													<? $sql = "SELECT name,title FROM new_language where status=1";
															$result = $coms_conect->query($sql);
													echo "<select name='faq_lang' id='faq_lang' class='form-control' rows='2' >";
	 													while($row = $result->fetch_assoc()) {
															$name=$row['name'];
															$id=$row['name'];
															$str="";
															if($lang_id==$row['title'])
															$str="selected";
															if(in_array($row['title'],$_SESSION["manager_title_lang"]))
															echo "<option $str value='{$row['title']}'>$name</option> ";
														}				
														echo '</select>';?>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div> 
							<div class="row-fluid " id="faq_cats"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-2 control-label">دپارتمان</label>
												<div class="form-group col-md-10"> 
													<?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$lang_id'";
														//echo $sql;
														$result = $coms_conect->query($sql);
														echo "<select name='cat_id' id='cat_id' class='form-control' rows='2' >";
	 													while($row = $result->fetch_assoc()) {
															$name=$row['name'];
															$id=$row['id'];
															$str="";
															if($cat_id==$id)
															$str="selected";
															if(in_array($id,$_SESSION["manager_page_cat"]))
															echo "<option $str value='$id'>$name</option> ";
														}				
														echo '</select>';?>												
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>							
							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-2 control-label">سوال*</label>
												<div class="form-group col-md-10"> 
													<textarea name="question" col="9" id="question" class="form-control"><?=$question?></textarea>									
												</div>
											</div>
										</div>

									</div>
								</div>
							</div> 
							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									 <div id="show_seo_div">
										<div class="col-md-12">
											<div class="form-group" id="cate_tag">
												<label class="col-md-2 control-label">برچسب</label>
												<div class="form-group col-md-10" style="display: flex;"> 
													<input  type="hidden" value='<?=$tag_faq?>' name="tag_faq" id="tag_faq" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
													<?if($_SESSION["can_add"]==1){ ?>
													<span id="add_plus" class="btn btn-success" style="padding-top: 10px;"><i class="fa fa-lg fa-plus"></i></span>
													<?}?>
												</div>
											</div>
						 				</div>
						 			  </div>
									</div>
								</div> 
							</div> 
 
							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
										<div class="col-md-12">
											<div class="form-group" id="new_cate_add">
												<label class="col-md-2 control-label" style="text-align: right;">برچسب جدید</label>
												<div class="form-group col-md-10" style="display: flex;">
													<input type="text" name="new_label" id="new_label" class="form-control">
												
													<input id="add_new_label_btn" class="btn btn-success" value="افزودن" style="width:66px">
													<img id="show_waiting_seo" src="/waiting.gif" style="display:none">
												</div>
											</div>
						 
										</div>									
									</div>
								</div> 
							</div>
							
							
							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
										<div class="col-md-12">
											<div class="form-group">
												<label class="control-label col-md-2" for="family">نوع انتشار</label>
												<div class="form-group col-md-10">
													<select name="mudoal_lock" id="mudoal_lock" class="form-control" rows="3">
														<option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عادي</option>
														<option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه اعضا</option>
													</select>
												</div>
											</div>							
										</div>							
									</div>							
								</div>							
							</div>							
							
								<?if($_SESSION["can_add"]==1){ ?>
								
								<script>
									$("#add_new_label_btn").click(function () {
										 if($("#new_label").val()){
											 $("#show_waiting_seo").show();
											 $.ajax({
											 type:'POST',
											 url:'New_ajax.php',
											 data:"action=add_new_label_tags&id="+$("#new_label").val()+"&value="+$("#faq_lang").val(),
												 success: function(result){
													  $("#show_waiting_seo").hide();
														 $("#new_label").val('');
														 $("#show_seo_div").html(result);
													}
					 
											});	
										}				
									});	
								</script>
								<?}?>							
							<div class="row-fluid"> 
								<div class="form-group">
								<div class="col-md-12"><div class="col-md-12">
									<label class="col-md-2 control-label">جواب</label> 
									<div class="form-group col-md-10">		<?$row["text"]=str_replace('src="source','src="/source',$answer);
												$row["text"]=str_replace('img src="source','img src="//source',$row["text"]);
											 
												 $row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
													$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
													$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
													$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
													$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
													$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
													$row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
													$row["text"]=str_replace('href="source','href="/source',$row["text"]);
													 ;
										 
										
										?>
										<textarea id="answer" name="answer"  class="form-control" rows="3"><?echo $row["text"]?></textarea>
																 <!--<script>CKEDITOR.replace( 'text' );</script>-->
											 <script>
												tinymce.init({
												selector: "#answer",
												height: 300,
												width:"99.5%",
												directionality : 'rtl',
												language : 'fa_IR',
												menubar:true,
												
												skin: 'flat',
												plugins: [
													 "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
													 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
													 "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
												],

												image_advtab: true,
												toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",
												
												image_advtab: true ,
												external_filemanager_path:"/filemanager/",
												filemanager_title:"مديريت فايل" ,
												external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
												
											 });
											 </script>
									</div>
								</div>
								</div>
								</div>
							</div>
							<div class="row-fluid"> 
								<div class="form-group">
									<div class="col-md-12">
									<div class="col-md-12">
										<div class="checkbox">
											<label class="col-md-2 control-label"></label>
											<div class="form-group col-md-10">
												<input name="send_memeber_email" <?if($send_memeber_email==1)echo 'checked';?> type="checkbox" value='1' class="ace" style="margin-right: 0px;">
												<span class="lbl"> اعلام وضعیت پرسش به موبایل کاربر</span>
											</div>
										</div>
										<div class="checkbox">
											<label class="col-md-2 control-label"></label>
											<div class="form-group col-md-10">
												<input name="send_memeber_sms" <?if($send_memeber_sms==1)echo 'checked';?> type="checkbox" value='1' class="ace" style="margin-right: 0px;">
												<span class="lbl"> ارسال پاسخ به ایمیل کاربر </span>
											</div>
										</div>
										<div class="checkbox">
											<label class="col-md-2 control-label"></label>
											<div class="form-group col-md-10">
												<input name="show_on_site" type="checkbox" <?if($status==2)echo 'checked';?> value='1' class="ace" style="margin-right: 0px;">
												<span class="lbl"> در سایت نمایش داده شود</span>
											</div>
										</div>
									</div>
									</div>
								</div>
							</div>	
							<!-- /section:tools/faq.form -->
						</div>		
						<div class="panel-footer bttools">
							<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>	
						</div>
					</form>
			</div>
			
		</div>
			
		</div>			
<script>
	 $(".submit2").click(function(){
		 $("#status").val("1");
		 $("#new_question").submit();
	 });				 
</script>					
<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 120px;
  padding-right: 130px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>


<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف سوال زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div></fieldset>
</form>

<script>
$(document).ready(function(){
$("#new_cate_add").hide();
$("#add_plus").click(function(){
	$("#new_cate_add").show();
});
$("#cate_tag").show();
});

/////// hide search ,add in tab #add_templates
	$("#newpag").show();	
	$("#newpag").click(function(){
		$("#newpag").hide();
		$('#iconsearch').hide();
	});
		
</script>    
<script>
	
$('#manage_site_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&site_filter=") >= 0){
			var b=a.split('&site_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&site_filter="+$(this).val()+e;
		}
		else
		a +='&site_filter='+$(this).val();
		window.location.href = a;
    });
	$('#manage_lang_filter').change( function() {
		var a ='<?=$url?>';
		if (a.indexOf("&lang_filter=") >= 0){
			var b=a.split('&lang_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&lang_filter="+$(this).val()+e;
		}
		else
		a +='&lang_filter='+$(this).val();
		window.location.href = a;
    });	
	
	$('#manager_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&manager_filter=") >= 0){
			var b=a.split('&manager_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&manager_filter="+$(this).val()+e;
		}
		else
		a +='&manager_filter='+$(this).val();
		window.location.href = a;
    });	
	
	$('#status_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&status_filter=") >= ''){
			var b=a.split('&status_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&status_filter="+$(this).val()+e;
		}
		else
		a +='&status_filter='+$(this).val();
		window.location.href = a;
    });	
	
	
$("#faq_lang").change(function () {
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_faq_lang&id="+$(this).val()+"&value=1",
		success: function(result){
 		 $('#faq_cats').html(result);
		}
	});	
});		
		$("#publish_search").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
    
</script>
<?$_SESSION["del_item"]='del_new_question';
$_SESSION["edit_item"]='edit_new_question';
?>													
<script src="ajax_js/question.js"></script>		
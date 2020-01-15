<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">

<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<?$onvan=injection_replace($_POST['onvan']);

$edit_mode=injection_replace($_POST['edit_mode']);

$meta_desciption=injection_replace($_POST['meta_desciption']);

$meta_keyword=injection_replace($_POST['meta_keyword']);

$seo_title=injection_replace($_POST['seo_title']);



if($_POST['manage_lang']>""){

	$manage_lang=injection_replace($_POST['manage_lang']);

	

}else

$manage_lang=$_SESSION['page_languege'];



 

##############################################################

if($onvan>""&&$edit_mode==0&&$_SESSION["can_add"]==1){

	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );

	$sql="SELECT id FROM new_modules_cat ORDER BY id DESC LIMIT 1";

	$result = $coms_conect->query($sql);

	$row  = $result->fetch_assoc();

	$id=$row['id'];

	$id++;

	

	

 

	 if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))

 header('Location: new_manager_signout.php');





	$query1="insert into new_modules_cat(status,meta_keyword,meta_desciption,name,rang,type,date,user_id,ip,la,seo_title) 

	values (1,'$meta_keyword','$meta_desciption','$onvan',$id,'$modual_type',NOW(),$manager_id,'$custom_ip','$manage_lang','$seo_title')";



        $coms_conect->query($query1);







	//echo $query1;

	$id=mysqli_insert_id($coms_conect) ;

	$query1="insert into new_cat_permission(menu_id,permission,group_id,view) 

	values ($id,1,1,1)";

	array_push($_SESSION["manager_page_cat"],$id);

	//echo $query1;exit;



	$coms_conect->query($query1);	

}else 	if(($onvan)>""&&$edit_mode>0&&$_SESSION["can_edit"]==1){

	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );

	$query12="select la from new_modules_cat a  where id=$edit_mode";

	$result12 = $coms_conect->query($query12);

	$RS121 = $result12->fetch_assoc();

	if(!in_array($RS121["la"],$_SESSION["manager_title_lang"]))

	header('Location: new_manager_signout.php');	

	$query1="update new_modules_cat set seo_title='$seo_title', meta_keyword='$meta_keyword',meta_desciption='$meta_desciption',name='$onvan',edit_date=NOW(),edit_user_id='$manager_id',ip='$custom_ip' where id='$edit_mode'";

	$coms_conect->query($query1);

}	

 create_session_token();

 

 $meta_keyword='';

 $meta_desciption='';

 $seo_title='';

?>

<script src="/yep_theme/default/rtl/js/menubar/madules_cat.js"></script>



<input type='hidden' id='sortDBfeedback'>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title custom_align" id="Heading">حذف</h4>

			</div>

			<div class="modal-body">

				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف دسته زير اطمينان داريد؟</div>

			</div>

			<div class="modal-footer ">

				<button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>

				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>

			</div>

		</div>

	</div>

</div>

<br>

<div class="tabbable">

	<ul class="nav nav-tabs" style="display:none;">

		<li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>دسته بندی <?=$cat_title?></a></li>

	</ul>

	<div class="msheet tab-content">

		<div class="secfhead">

			<!-- #section:ads/ads_cat.head -->

			<div class="sectitle">

				<div class="icon"><span class="flaticon-file23" style=""></span>

				</div>

				<div class="title"><p class="titr">مدیریت دسته بندی <?=$cat_title?></p><p class="lead">در این بخش امکان افزودن و مدیریت دسته بندی های اختصاص یافته به <?=$cat_title?> را مدیریت کنید</p> 

				</div>

			</div>

			<!-- /section:ads/ads_cat.head -->

			<div class="toolmenu">

				<ul>

					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

				</ul>

			</div>



		</div>

		

			<form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">

				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">

				<input name='cat_url' id='cat_id' value='<?=$url?>' type="hidden">

				<input type="hidden" id="check_value" name="check_value" value="0">

				<div class="row"> 

					<div class="col-md-12"><br>

						<div class="col-md-12">

							<label class="col-md-1 control-label">انتخاب زبان</label> 

								<select id="manage_lang" name="manage_lang" class="form-group col-md-3">

										<?$query="select title,name from new_language where status=1";

											$result = $coms_conect->query($query);

												while($RS1 = $result->fetch_assoc()) {

												$title=$RS1['title'];

													$name=$RS1['name'];

													$str="";

													

													

													

													if($manage_lang==$title||$change_lang==$title)

													$str="selected";

													if(in_array($RS1['title'],$_SESSION["manager_title_lang"]))  

													echo "<option value='$title' $str>$name</option>";	

											}

										?>

								</select>

						</div>

						<div class="col-md-12">

							<div class="panel panel-success">

								<div class="panel-heading">

									<h3 class="panel-title">دسته بندی</h3>

								</div>

									<input type="hidden" id="edit_mode" name="edit_mode" value="0">

									<input type="hidden" id="menu_id" name="menu_id" value="0">

									<div class="panel-body">

										<div class="row-fluid">

										<!-- #section:ads/ads_cat.menu -->

											<div class="col-md-12">

												<label class="col-md-2 control-label" for="group_name">عنوان</label> 

												<div class="form-group col-md-5">

													<input type="text" name="onvan" id="onvan" class="form-control" >									

												</div>

											</div>

									 	

											<div class="col-md-12">

												<label  class="col-md-2 control-label" >Meta keyword</label>

												<div class="form-group col-md-5">

														<input type="text" value="<?=$meta_keyword?>" id="meta_keyword" name="meta_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />

												</div>

														

											</div>

											<div class="col-md-12">	

												<div class="form-group">

													<label class="col-md-2 control-label" >Meta Description</label>

													<div class="form-group col-md-5">

														<textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?=$meta_desciption?></textarea>

													</div>

													

												</div>

											</div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label  class="col-md-2 control-label <? if($modual_type!=19)   echo 'hidden';?>" >Seo title</label>

                                                    <div class="form-group col-md-5">

                                                        <input  value="<?=$seo_title?>" type="<? if($modual_type==19) echo 'text'; else echo 'hidden';?>" id="seo_title" name="seo_title" class="form-control">



                                                    </div>



                                                </div>

                                            </div>



                                            <!-- /section:ads/ads_cat.menu -->

											<div class="col-lg-6 col-md-4 bttools">

												<div class="content">

													<button type="button" id="submit_form" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>

													<script>

														$(document).on('click', '#submit_form', function() {

															var img = $('<img id="dynamic">'); 

															img.attr('src', 'waiting.gif');

															img.appendTo('.content');

															$("#menu1").submit();

														});

													</script>

									

												</div>

											</div>

										</div>

										

									</div>

							</div>	

						</div>			

			</form>	

						<div class="col-md-12">

							<div class="panel panel-primary">

								<div class="panel-heading">

									<h3 class="panel-title">مرتب سازی دسته بندی</h3>

								</div>

								<div class="panel-body">

								<!-- #section:ads/ads_cat.table -->

								<?//	

								$sql = "SELECT * FROM new_modules_cat a,new_cat_permission b  WHERE    b.permission=1 and a.id=b.menu_id and a.parent_id='0' and b.group_id={$_SESSION["manager_group_id"]} and a.type='$modual_type' and a.la='$manage_lang' ORDER BY a.rang";

//								echo $sql;exit;

								$result = $coms_conect->query($sql);

								echo "<div class='cf nestable-lists'>\n";

									echo "<div class='dd' id='nestableMenu'>\n\n";

										echo "<ol class='dd-list'>\n";

											  while($row = $result->fetch_assoc()) {

												echo "\n";

												$id=$row['id'];$str="";

												 $status=$row['status'];

												 $name=insert_dash($row['name']);

												 if($status==1)

												 $str='checked';

												echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";

													echo "<div class='dd-handle'><a target='_blank' href="."/$modul_name/$manage_lang/category/$name/1"."> {$row['name']}</a>";

														echo '	<div class="pull-right action-buttons">';

														if ($modual_type==4)echo '<a href="newcoms.php?yep=new_product_cat_cat&catid='.$row['id'].'&catof='.'0'.'" class="btn btn-info" role="button">'.'دسته بندی فیلدها'.'</a><a href="newcoms.php?yep=new_product_cat_cat&catid='.$row['id'].'&catof='.'1'.'" class="btn " role="button">'.'فیلترینگ ویژگی ها'.'</a>';

																	if($_SESSION["can_edit"]==1){ 

 																	echo '<a class="blue" href="#">

																	 <input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>

																	 <span class="lbl"></span>

																	</a>';

																	

																	echo '<a id='.$id.' class="edit_menu blue" href="#">

																	<span class="flaticon-note32 bigger-130"></span>

																	</a>';

																	}

															 	 	if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)&&$_SESSION["can_delete"]==1){

																 	echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">

																 	<span class="flaticon-delete84 bigger-130"></span>

																 	</a>';

																 	}

															echo 	'</div>

														</div>';

													 show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect,$modul_name);

												echo "</li>\n";

											}

										echo "</ol>\n\n";

									echo "</div>\n";

								echo "</div>\n\n";

								//?><?//=$sql?>

								<!-- /section:ads/ads_cat.table -->

							</div>

						</div>

						<textarea id="nestable1-output" style="display:none"></textarea>

					</div>

				</div>

			</div>

		</div>

			

	</div>			



<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script> 	 

													

<script src="ajax_js/page_cat.js"></script>	

<script>

$("#manage_lang").change(function () {	

	$("#onvan").val('');

	$("#menu1").submit();

});	

</script>	

<?if($_SESSION["can_edit"]==1){ ?>

	<script>

$(document).ready(function(){

	var updateOutput = function(e)

		{

			var list   = e.length ? e : $(e.target),

				output = list.data('output');

			if (window.JSON) {

				output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));

				menu_updatesort(window.JSON.stringify(list.nestable('serialize')));

			} else {

				output.val('JSON browser support required for this demo.');

			}

		};

		

		

		// activate Nestable for list 1

		$('#nestableMenu').nestable({

			group: 1,

			maxDepth: 7,

		})

		.on('change', updateOutput);

		

		// output initial serialised data

		updateOutput($('#nestableMenu').data('output', $('#nestable1-output')));   

		

		

		jQuery(function($){

	

			$('.dd').nestable();

		

			$('.dd-handle a').on('mousedown', function(e){



				e.stopPropagation();

			});

			

			$('[data-rel="tooltip"]').tooltip();

		

		});

	});

</script>

<?}?>


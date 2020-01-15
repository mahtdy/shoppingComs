
        <!-- End main container -->
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
	 <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="#"><span class="fa fa-home"></span></a></li>
                    <li class="active">ليست آگهی ها</li>
                </ol>
            </div>
        </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-file-text-o"></span>

                <h1 class="title">ليست آگهی ها</h1>
                <span class="pdesc">توضيح مختصر درباره اين صفحه در اينجا نمايش داده مي شود.</span>

            </div>
        </div>

        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=18";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'ads_have_ads',$coms_conect))
				  $center=$center-2;
				if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>

			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>

                <!-- Start Main -->
                <div class="row">
                  <article class="col-md-12 col-xs-12 pull-right animated fadeIn">

	                    <section class="ads_filters">
                            <div class="row">
                                <div class="form-group col-xs-12 pull-right">
                                    <input class="form-control fullwidth" type="text"
                                           placeholder="عنوان مورد جستجو را وارد کنید ..."/>
                                </div>

								<?function get_cat_ads($id,$type,$coms_conect,$i){

									$sql="SELECT name,id FROM new_modules_cat where type=18 and status=1 and parent_id=$id";
											 $result = mysql_query($sql);
											 while($row = mysql_fetch_array($result)){
												 $i++;
												$str='';
												 if($madual_cat_id==$row['id'])
												 $str='selected';
												 echo "<option $str class='select2-l$i' value='{$row['id']}'>{$row['name']}</option>";
												  get_cat_ads($row['id'],18,$coms_conect,$i);
											 }
									}
									function get_state_ads($id,$type,$coms_conect,$i){
									$sql="SELECT name,id FROM new_regional where type=3 and parent_id=$id";
										 $result = mysql_query($sql);
										 while($row = mysql_fetch_array($result)){
										 	$str='';
											 if($state==$row['id'])
											 $str='selected';
											 echo "<option $str class='select2-l2' value='{$row['id']}'>{$row['name']}</option>";
									}
									}


									?>

                                    <div class="form-group col-xs-12 pull-right">
                                        <select multiple name='cat' id='cat' class="select2 cat-select_ads" style="width:100%;">
                                          <?$sql="SELECT name,id FROM new_modules_cat where type=18 and status=1 and parent_id=0";
											 $result = mysql_query($sql);
											 while($row = mysql_fetch_array($result)){
												$str='';
												 if($madual_cat_id==$row['id'])
												 $str='selected';
												 echo "<option $str class='select2-l1' value='{$row['id']}'>{$row['name']}</option>";
												 get_cat_ads($row['id'],18,$coms_conect,1);
											 }?>
                                        </select>
                                    </div>

                                <div class="form-group col-sm-5 col-xs-12 pull-right rtl">
                                    <select name='state' id='state' class="select2 cat-select_ads" style="width:100%;">
										<option class="select2-l1" value='0'>انتخاب کنید</option>
										 <?$sql="SELECT name,id FROM new_regional where type=2 and parent_id=74";
										 $result = mysql_query($sql);
										 while($row = mysql_fetch_array($result)){
										 	$str='';
											 if($state==$row['id'])
											 $str='selected';
											 echo "<option $str class='select2-l1' value='{$row['id']}'>{$row['name']}</option>";
											 get_state_ads($row['id'],18,$coms_conect,1);
										 }?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6 col-xs-12 pull-right rtl">
                                    <select multiple name='product_type' id='product_type' class="select2 cat-select_ads_option" style="width:100%;">
                                        <option value='3' class="select2-l1">دارای تصویر(987)</option>
                                        <option value='2' class="select2-l1">بدون تصویر(65)</option>
                                        <option value='0' class="select2-l1">نو(547)</option>
                                        <option value='1'class="select2-l1">دست دوم(658)</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-1 col-xs-12 pull-right pr0">
                                    <button id='ads_search' class="btn btn-success fullwidth"><span class="fa fa-search"></span>
                                    </button>
                                </div>
                            </div>
                        </section>



                        <section class="content">
                            <div class="row">
                                <section class="col-xs-12 list">
                                    <div id="switchshow">
                                        <div class="option">
                                            <div class="row">

                                                <div class="col-md-10 col-sm-12 pull-right pr0">
                                                    <form class="row">

                                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                                            <select id="ads_filter" class="form-control input-sm">
                                                                <option value='a'>مرتب سازی بر اساس</option>
                                                                <option value='1'>جدیدترین آگهی ها</option>
                                                                <option value='2'>بالاترین قیمت</option>
                                                                <option value='3'>پایین ترین قیمت</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2 col-sm-12 hidden-xs pull-left pr0 tcenter">

                                                    <button id="gbtn" class="gridbtn">
                                                        <span class="fa fa-th-large"></span>
                                                    </button>

                                                    <button  class="listbtn deact">
                                                        <span class="fa fa-th-list"></span>
                                                    </button>




                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
										<img id="waiting" src='/waiting.gif' style="display:none">
										<div id="show_result" >
                                            <ul class="pl0 gridshow">

								<?





								if($madual_cat_id)
									$str_cat=" and c.cat_id in ($madual_cat_id)";
								$query1="select b.name,a.date,a.la,a.title,a.id,a.price from new_ads a,new_regional b,new_modules_catogory c  
									where  site='$site' $str_cat and c.type=18 and a.id=c.page_id and a.state=b.id and la='$madual_lang' and status=1   and publish_date<='$now'
									group by a.id  order by a.id desc limit 0,9";
									$result1 = $coms_conect->query($query1);
								  // echo $query1;
										while($row1 = $result1->fetch_assoc()) {
											$pic_adress=get_result("select adress from new_file_path where type=18 and id={$row1['id']} and name='ads_galery_pic'",$coms_conect);
											?>
                                                <!----------------------- item ----------------------->
                                                <li class="col-md-4 col-sm-6 col-xs-12 griditem animated fadeIn">
                                                    <div class="adsitem">

                                                        <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>">
														<img src="<?=get_modual_pic_address($pic_adress,$site,$domain,18)?>" alt="<?=$row1['title']?>"></a>
													    <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>"><h3><?=$row1['title']?></h3></a>

                                                        <div class="row">
                                                            <div class="col-xs-12 location pull-right rtl"><span
                                                                    class="fa fa-map-marker"></span><span><?=$row1['name']?></span>
                                                            </div>
                                                            <div class="col-xs-6 date pull-right rtl"><span
                                                                    class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$row1['date']));?></span>
                                                            </div>
                                                            <div class="col-xs-6 price pull-left">
                                                                <span><?if($row1['price']=='')echo 'توافقی' ;else echo $row1['price'];?></span></div>
                                                        </div>


                                                    </div>
                                                </li>

                                                <li class="col-md-4 col-sm-6 col-xs-12 listitem animated fadeIn">
                                                    <div class="adsitem row">

                                                        <div class="col-sm-3 col-xs-12 pull-right rtl pr0">
                                                            <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>">
																<img src="<?=get_modual_pic_address($pic_adress,$site,$domain,18)?>" alt="<?=$row1['title']?>"></a>
                                                        </div>
                                                        <div class="col-sm-9 col-xs-12  pull-right rtl">
                                                            <a href="/ads/<?=$_SESSION['la']."/{$row1['id']}/".insert_dash($row1['title'])?>"><h3><?=$row1['title']?></h3></a>

                                                            <div class="row">
                                                                <div class="col-xs-12 location pull-right"><span
                                                                        class="fa fa-map-marker"></span><span><?=$row1['name']?></span>
                                                                </div>
                                                                <div class="col-xs-12 date pull-right"><span
                                                                        class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$row1['date']));?></span>
                                                                </div>
                                                                <div class="col-xs-12 price pull-right">
                                                                    <span><?if($row1['price']=='')echo 'توافقی' ;else echo $row1['price'];?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
										<?}?>
                                            </ul>
											</div>
                                        </div>
                                    </div>
									<div class="col-xs-12 moreitemsbtn">
										<h4>
											<a href="#"  id="ajax_pagissssn"><span class="fa fa-plus"></span></a>
										</h4>
										<input hidden id="page_num" value="9">
									</div>


                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>

                    <!-- Start Right Sidebar -->



				</div>
	 		</aside>
		</section>

				 <?if($RS23['left_block']>0){
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect);
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'ads_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='ads_have_ads'  and la='$defult_lang' and site='$defult_site'";
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {?>
											<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
										<?}?>
                                </div>
                            </div>
                        </section>
                    </aside>
				 <?}?>

 </main>
                </div>
 <script>
$("#ads_search").click(function () {
	$("#waiting").show();
	$("#show_result").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=ads_search_filter&product_type="+$("#product_type").val()+"&state="+$("#state").val()+"&cat="+$("#cat").val() +"&pic="+$("#ads_pic").val(),
		success: function(result){
			$("#waiting").hide();
					$("#show_result").html(result);
		}
	});
});
$("#ads_filter").change(function () {
	$("#waiting").show();
	$("#show_result").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=ads_search_filter&product_type="+$("#product_type").val()+"&state="+$("#state").val()+"&cat="+$("#cat").val()+"&ads_filter="+$("#ads_filter").val()+"&pic="+$("#ads_pic").val(),
		success: function(result){
			$("#waiting").hide();
					$("#show_result").html(result);
		}
	});
});
</script>
<script>
	$("#ajax_pagissssn").click(function (e) {
		var a=$("#page_num").val();
		var b=9+parseFloat(a);
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=ads_search_filter&secend_value="+$("#page_num").val()+"&product_type="+$("#product_type").val()+"&state="+$("#state").val()+"&cat="+$("#cat").val()+"&ads_filter="+$("#ads_filter").val()+"&pic="+$("#ads_pic").val(),
			success: function(result){
				$("#show_result").append(result);
				$("#page_num").val(b);
			}
		});
	});
</script>
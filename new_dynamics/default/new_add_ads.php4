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
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=5 and pages_id=18";
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


                    <!-- Start Article -->
                    <article class="col-md-9 col-xs-12 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-xs-12 ads_send rtl">


                              <div class="row"><h1><span class="fa fa-bullhorn"></span>ارسال آگهی</h1></div>
                                    <form id="fwvalidator" data-toggle="validator">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-xs-12 form-group pull-right has-feedback">
                                                <label>عنوان آگهی:</label>
                                                <input required data-error="حداقل سه کلمه وارد کنید!" class="form-control fullwidth" type="text" data-minlength="15"/>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>گروه:</label>
                                                    <select class="select2 cat-select" style="width:100%;">
                                                        <option>انتخاب گروه ...</option>
                                                        <option class="select2-l1">نرم افزار</option>
                                                        <option class="select2-l2">آفیس</option>
                                                        <option class="select2-l2">سیستم عامل</option>
                                                        <option class="select2-l3">Windows</option>
                                                        <option class="select2-l3">Linux</option>
                                                        <option class="select2-l3">Mac</option>
                                                        <option class="select2-l1">سخت افزار</option>
                                                        <option class="select2-l2">Desktop</option>
                                                        <option class="select2-l2">Laptop</option>
                                                        <option class="select2-l3">LCD</option>
                                                    </select>

                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>قیمـت<span class="suf">(تومان)</span>:</label>
                                                <input id="pricecheck" type="checkbox" />
                                                <span>توافقی</span>
                                                <input id="priceipbx" class="form-control fullwidth" type="text"/>

                                            </div>
                                        </div>

                                            <h3>مشخصات عمومی</h3><hr/>


                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>نو / دست دوم:</label>
                                                <select class="form-control fullwidth">
                                                    <option value="a">نو</option>
                                                    <option value="b">دست دوم</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>نو / دست دوم:</label>
                                                <select class="form-control fullwidth">
                                                    <option value="a">نو</option>
                                                    <option value="b">دست دوم</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>نو / دست دوم:</label>
                                                <select class="form-control fullwidth">
                                                    <option value="a">نو</option>
                                                    <option value="b">دست دوم</option>
                                                </select>
                                            </div>
                                        </div>

                                            <h3>مشخصات اختصاصی</h3><hr/>


                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>متراژ:</label>
                                                <input class="form-control fullwidth" type="text"/>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>متراژ:</label>
                                                <input class="form-control fullwidth" type="text"/>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right">
                                                <label>متراژ:</label>
                                                <input class="form-control fullwidth" type="text"/>
                                            </div>
                                        </div>

                                            <h3>مکان آگهی</h3><hr/>
                                        <div class="row">
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>شهر:</label>
                                                <select class="select2 cat-select" style="width:100%;">
                                                    <option>انتخاب شهر ...</option>
                                                    <option class="select2-l1">قزوین</option>
                                                    <option class="select2-l2">آبیک</option>
                                                    <option class="select2-l1">تهران</option>
                                                    <option class="select2-l2">شهر ری</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>شرح آگهی:</label>
                                                <textarea class="fullwidth" rows="5"></textarea>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right"></div>
                                        </div>

                                            <h3>درج تصویر آگهی</h3><hr/>
                                        <div class="row">
                                            <div class="col-xs-12 form-group pull-right"></div>
                                        </div>


                                            <h3>مشخصات ارسال کننده آگهی</h3><hr/>
                                        <div class="row">
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>ایمیل:</label>
                                                <input type="email" class="form-control fullwidth" type="text"/>
                                                <p>ایمیل شما به کاربران سایت نمایش داده نمی‌شود و نزد ما محفوظ می‌ماند.</p>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <label>شماره تماس:</label>
                                                <input data-error="شماره موبایل حداقل 11 رقم دارد!" data-minlength="11" class="form-control fullwidth" type="text"/>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <p>با کلیک روی دکمه ثبت آگهی، موافقت خود را با قوانین و شرایط استفاده کامز اعلام می‌کنید.</p>
                                            </div>
                                            <div class="col-xs-12">
                                                <hr/>
                                            </div>
                                            <div class="col-xs-12 form-group pull-right">
                                                <button class="btn btn-success">ارسال آگهی</button>
                                            </div>
                                        </div>
<div class="row">
    <div class="col-xs-12 form-group pull-right">

    </div>
</div>
                                    </div>

                                    </form>

                                </section>
                            </div>
                        </section>
                    </article>

                    <!-- Start Right Sidebar -->
                    <aside class="col-md-3 hidden-sm pull-right animated fadeIn">
                        <section class="block-col">





                            <div class="block hidden-xs">
                                <div class="header">
                                    <h3><span>لیست موضوعات</span></h3>
                                </div>
                                <div class="content ads_cats">
                                    <ul>
                                        <li><i class="fa fa-folder"></i><a
                                                href="#"><span>وسایل الکترونیکی</span></a><span class="amar">356</span>
                                        </li>
                                        <li><i class="fa fa-folder"></i><a href="#"><span>وسایل نقلیه</span></a><span
                                                class="amar">84</span></li>
                                        <li><i class="fa fa-folder"></i><a href="#"><span>لوازم خانگی</span></a><span
                                                class="amar">984</span></li>
                                        <li><i class="fa fa-folder"></i><a href="#"><span>لوازم شخصی</span></a><span
                                                class="amar">984984</span></li>
                                        <li><i class="fa fa-folder"></i><a href="#">استخدام<span></span></a><span
                                                class="amar">874</span></li>
                                        <li><i class="fa fa-folder"></i><a href="#">خدمات، کسب و
                                            کار<span></span></a><span class="amar">94884</span></li>
                                    </ul>
                                </div>
                            </div>


                        </section>
                    </aside>

                </div>
                <!-- end main row -->
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
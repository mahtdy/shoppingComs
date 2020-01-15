        <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="#"><span class="fa fa-home"></span></a></li>
                    <li class="active">لیست دانلود</li>
                </ol>
            </div>
        </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-file-text-o"></span>

                <h1 class="title">لیست دانلود</h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>

            </div>
        </div>

        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=6";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'download_have_ads',$coms_conect))
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

					<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
 
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 maghalatlist">
                                    <div class="option">
                                        <script>
                                            jQuery(document).ready(function () {
                                                jQuery("#waiting").show();
                                                jQuery("#show_result").empty();
                                                jQuery.ajax({
                                                    type:'POST',
                                                    url:'/New_members_ajax.php',
                                                    data:"action=download_type_change&id="+jQuery("#download_type").val()+"&value="+jQuery("#download_order").val()+"&secend_value=<?=$defult_lang?>",
                                                    success: function(result){
                                                        jQuery("#waiting").hide();
                                                        jQuery("#show_result").html(result);
                                                    }
                                                });
                                            });
                                        </script>
									</div>
										<img id="waiting" src='/waiting.gif' style="display:none">
										<div id="show_result" >
										</div>
                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>
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
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'download_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='download_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
 
        <!-- End main container -->
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
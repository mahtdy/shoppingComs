<? if ($defult_site == 'main') {
    include("new_template/doctor/" . 'blocks/header.php4');
} else
    include("../new_template/doctor/" . '/blocks/header.php4');
$dir = "rtl";
$_SESSION['site'] = $site;
$_SESSION['la'] = $la;
?>
<div role="main" class="main">

    <div class="slider-container rev_slider_wrapper" style="height: 650px;">
        <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 650, 'disableProgressBar': 'on', 'navigation': {'bullets': {'enable': true, 'direction': 'vertical', 'h_align': 'right', 'v_align': 'center', 'space': 5}, 'arrows': {'enable': false}}}">
            <ul>
                <?$query="SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and 
					start_date<=$now and finish_date>=$now order by id desc limit 0,10";
                $result = $coms_conect->query($query);
                $i=1;
                while($RS1 = $result->fetch_assoc()) {?>

                <li data-transition="fade">
                    <img src="<?= $RS1['slide_img1']?>"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="tp-caption main-label H"
                         data-x="left" data-hoffset="25"
                         data-y="center" data-voffset="-5"
                         data-start="1500"
                         data-whitespace="nowrap"
                         data-transform_in="y:[100%];s:500;"
                         data-transform_out="opacity:0;s:500;"
                         style="z-index: 5;  text-transform: uppercase; "
                         data-mask_in="x:0px;y:0px;"><?=$RS1['text1']?></div>

                    <div class="tp-caption main-label "
                         data-x="left" data-hoffset="25"
                         data-y="center" data-voffset="-55"
                         data-start="500"
                         style="z-index: 5; text-transform: uppercase; position: absolute;   "
                         data-transform_in="y:[-300%];opacity:0;s:500;"> <a href=" <?=$RS1['link']?>"><?=$RS1['title']?></a></div>

                    <div class="tp-caption bottom-label"
                         data-x="left" data-hoffset="25"
                         data-y="center" data-voffset="40"
                         data-start="2000"
                         style="z-index: 5; border-bottom: 1px solid #fff; padding-bottom: 3px;"
                         data-transform_in="y:[100%];opacity:0;s:500;" ><?=$RS1['text2']?></div>
                    <div class="tp-caption bottom-label H"
                         data-x="left" data-hoffset="25"
                         data-y="center" data-voffset="40"
                         data-start="2000"
                         style="z-index: 5; border-bottom: 1px solid #fff; padding-bottom: 3px;"
                         data-transform_in="y:[100%];opacity:0;s:500;" ><?=$RS1['text3']?></div>
                </li>
                    <?$i++;}?>
            </ul>
        </div>
    </div>
    <!--      بلوک آبی رنگ      -->
    <section class="section-custom-medical">
        <div class="container">
            <? $Block1 = get_tem_result($site, $la, "Block1", $tem, $coms_conect); ?>
            <div class="row medical-schedules">
                <div class="col-lg-3 box-one background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0">
                    <div class="feature-box feature-box-style-2 p-lg">
                        <div class="feature-box-icon">
                            <img src="<?= $Block1['pic'] ?>" alt class="img-responsive pt-xs" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="m-none"><a href="<?= $Block1['link'] ?>"><?= $Block1['title'] ?></a></h4>
                        </div>
                    </div>
                </div>
                <? $Block2 = get_tem_result($site, $la, "Block2", $tem, $coms_conect); ?>
                <div class="col-lg-3 box-two background-color-tertiary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
                    <h5 class="m-none">
                        <a href="<?= $Block2['link'] ?>" title="">
                            <?= $Block2['title'] ?>
                            <i class="icon-arrow-right-circle icons"></i>
                        </a>
                    </h5>
                </div>
                <? $Block3 = get_tem_result($site, $la, "Block3", $tem, $coms_conect); ?>
                <div class="col-lg-3 box-three background-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200">
                    <div class="expanded-info p-xlg background-color-primary">
                        <?for ($i = 1; $i <= 3; $i++) {?>
                        <? $sub_Block3 = get_tem_result($site, $la, "sub_Block3$i", $tem, $coms_conect);
                            if ($sub_Block3['title'] > "") { ?>
                        <div class="info custom-info" style="margin-bottom: 15px;">
                            <span><a href="<?= $sub_Block3['link'] ?>"><?= $sub_Block3['title'] ?></a></span>
                        </div>
                        <?}}?>
                    </div>
                    <h5 class="m-none">
                        <?= $Block3['title'] ?>
                        <i class="icon-arrow-right-circle icons"></i>
                    </h5>
                </div>
                <? $Block4 = get_tem_result($site, $la, "Block4", $tem, $coms_conect); ?>
                <div class="col-lg-3 box-four background-color-secondary p-none appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
                        <div class="feature-box feature-box-style-2 m-none">
                            <div class="feature-box-icon">
                                <img src="<?= $Block4['pic'] ?>" alt class="img-responsive pt-xs" />
                            </div>
                            <div class="feature-box-info ml-md">
                                <h6 class="m-none"><a href="<?= $Block4['link'] ?>"><?= $Block4['title'] ?></a></h6>
                            </div>
                        </div>
                </div>
            </div>
<!--      باکس اول      -->
            <?for($i=1;$i<=1;$i++){
            $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
        ?>
            <div class="row mt-xlg pt-xlg mb-xlg pb-xs">
                <div class="col-sm-7 col-md-7">
                    <h2 class="font-weight-semibold mb-xs"><?=$menu_bar['pic_adress']?></h2>
                    <p ><?=$menu_bar['text']?></p>

                    <?$cat_table='';
                    $cat_sondition='';
                    $module_adress=get_result("select link from new_modules where id={$menu_bar['title']}",$coms_conect);
                    if($menu_bar['link']==0){
                        $module_name=get_result("select name from new_modules where id={$menu_bar['title']}",$coms_conect);
                    }
                    else{
                        $cat_table= ', new_modules_catogory c';
                        $cat_sondition=" and c.type={$menu_bar['title']} and a.id=c.page_id and c.cat_id={$menu_bar['link']}";
                        $module_name=get_result("select name from new_modules_cat where id={$menu_bar['link']}",$coms_conect);
                    }

                   $table_name=get_result("select table_name from new_modules where id={$menu_bar['title']}",$coms_conect);
                    $name_value='';
                    if($menu_bar['title']==11||$menu_bar['title']==1)
                        $name_value=',name';
                    $query = "select title $name_value ,a.id,la,site $vaidostr from $table_name a  $cat_table where  a.id>0 and la='$la'
									 	$cat_sondition
                                         order by a.id desc
										 limit 0,1";

                    $result = $coms_conect->query($query);
                    $pic_arr=array('1'=>'news_image','8'=>'video_pic','9'=>'galery_pic','11'=>'content_image');
                    $module_type=$menu_bar['title'];
                    while($RS54 = $result->fetch_assoc()) {
                    $sql1w1="select adress from new_file_path where type={$menu_bar['title']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                    $result1q = $coms_conect->query($sql1w1);
                    $roww1 = $result1q->fetch_assoc();
                    $module_url='';
                    if($menu_bar['title']==11||$menu_bar['title']==1)
                        $module_url="/$module_adress/{$RS54['la']}/{$RS54['id']}/".insert_dash($RS54['name']);
                    else
                        $module_url="/$module_adress/{$RS54['la']}/{$RS54['id']}/".insert_dash($RS54['title']);
                    ?>

                    <a href="<?= $module_url?>" class="btn btn-borders btn-quaternary custom-button text-uppercase mt-lg mb-lg font-weight-bold"><?=$RS54['title']?></a>
                </div>

                <div class="col-sm-5 col-md-5 ">
                    <a class="hvr-grow" href="<?=$module_url?>">
                        <?if($menu_bar['title']==8){ ?>
                            <span class="video-play-btn" style="position: absolute;top: 42%;right: 48%;">
                                <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                            </span>
                        <?}?>
                        <img title="<?=$RS54['title']?>" alt="<?=$RS54['title']?>" width="100%" height="220px" src="<?=get_modual_pic_address($roww1['adress'],$RS54['site'],$domain,$menu_bar['title'])?>">
                    </a>
                    <?if($menu_bar['title']==8){ ?>
                        <span class="menu-video-duration"><?=$RS54['duration']?></span>
                    <?}?>
                    <h5 style="    text-align: center;
    background-color: #3babdd;
    padding: 6px 0 6px 0;
    border-radius: 0px 0px 4px 3px;">
                        <a href="<?=$module_url?>" style="color: white;">
                            <?=$RS54['title']?>
                        </a>
                    </h5>
                </div>
                <?}?>
            </div>
        </div>
    </section>
    <!--      باکس دوم      -->
    <?for($i=2;$i<=2;$i++){
    $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
    ?>
    <section class="section section-no-border">
        <div class="container">
            <div class="row pt-xl">
                <div class="col-md-12">
                    <h2 class="font-weight-semibold mb-xs"><?=$menu_bar['pic_adress']?></h2>
                    <p class="lead font-weight-normal"><?=$menu_bar['text']?></p>
                    <?}?>
                </div>
            </div>
            <div class="row mt-lg">
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-cardiology.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Cardiology</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-gastroenterology.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Gastroenterology</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-pulmonology.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Pulmonology</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg">
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-dental.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Dental</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-gynecology.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Gynecology</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                        <div class="feature-box-icon">
                            <img src="img/demos/medical/icons/department-icon-hepatology.png" alt class="img-responsive" />
                        </div>
                        <div class="feature-box-info ml-md">
                            <h4 class="font-weight-semibold"><a href="demo-medical-departments-detail.html" class="text-decoration-none">Hepatology</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-lg pb-xlg">
                <div class="col-md-12 center">
                    <a class="btn btn-borders btn-quaternary custom-button text-uppercase mt-lg font-weight-bold" href="demo-medical-departments.html">view more</a>
                </div>
            </div>
            <?}?>
        </div>
    </section>
    <!--      باکس سوم      -->
    <?for($i=3;$i<=3;$i++){
    $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
    ?>
    <section class="team">
        <div class="container">
            <div class="row mt-xlg">
                <div class="col-md-12">
                    <h2 class="font-weight-semibold m-none "><?=$menu_bar['pic_adress']?></h2>
                    <p class="lead font-weight-normal"><?=$menu_bar['text']?></p>

                    <div id="porfolioAjaxBoxMedical" class="ajax-box ajax-box-init mb-lg">

                        <div class="bounce-loader">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>

                        <div class="ajax-box-content" id="porfolioAjaxBoxContentMedical"></div>

                    </div>

                </div>
            </div>
            <div class="row mb-xlg">
                <div class="owl-carousel owl-theme nav-bottom rounded-nav pl-xs pr-xs" data-plugin-options="{'items': 4, 'loop': false, 'dots': false, 'nav': true}">
                    <div class="pr-sm pl-sm">
                        <a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
									<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
										<span class="thumb-info-wrapper m-none">
											<img src="img/demos/medical/doctors/doctor-1.jpg" class="img-responsive" alt="">
										</span>
										<span class="thumb-info-caption p-md pt-xlg pb-xlg">
											<span class="custom-thumb-info-title">
												<span class="custom-thumb-info-type font-weight-light text-md">Cardiology</span>
												<span class="custom-thumb-info-inner font-weight-semibold text-lg">John Doe</span>
												<i class="icon-arrow-right-circle icons font-weight-semibold text-lg "></i>
											</span>
										</span>
									</span>
                        </a>
                    </div>
                    <div class="pr-sm pl-sm">
                        <a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
									<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
										<span class="thumb-info-wrapper m-none">
											<img src="img/demos/medical/doctors/doctor-2.jpg" class="img-responsive" alt="">
										</span>
										<span class="thumb-info-caption p-md pt-xlg pb-xlg">
											<span class="custom-thumb-info-title">
												<span class="custom-thumb-info-type font-weight-light text-md">Gastroenterology</span>
												<span class="custom-thumb-info-inner font-weight-semibold text-lg">Robin Doe</span>
												<i class="icon-arrow-right-circle icons font-weight-semibold text-lg "></i>
											</span>
										</span>
									</span>
                        </a>
                    </div>
                    <div class="pr-sm pl-sm">
                        <a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
									<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
										<span class="thumb-info-wrapper m-none">
											<img src="img/demos/medical/doctors/doctor-3.jpg" class="img-responsive" alt="">
										</span>
										<span class="thumb-info-caption p-md pt-xlg pb-xlg">
											<span class="custom-thumb-info-title">
												<span class="custom-thumb-info-type font-weight-light text-md">Pulmonology</span>
												<span class="custom-thumb-info-inner font-weight-semibold text-lg">Jessica Doe</span>
												<i class="icon-arrow-right-circle icons font-weight-semibold text-lg "></i>
											</span>
										</span>
									</span>
                        </a>
                    </div>
                    <div class="pr-sm pl-sm">
                        <a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
									<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
										<span class="thumb-info-wrapper m-none">
											<img src="img/demos/medical/doctors/doctor-4.jpg" class="img-responsive" alt="">
										</span>
										<span class="thumb-info-caption p-md pt-xlg pb-xlg">
											<span class="custom-thumb-info-title">
												<span class="custom-thumb-info-type font-weight-light text-md">Dental</span>
												<span class="custom-thumb-info-inner font-weight-semibold text-lg">Rose Doe</span>
												<i class="icon-arrow-right-circle icons font-weight-semibold text-lg "></i>
											</span>
										</span>
									</span>
                        </a>
                    </div>
                    <div class="pr-sm pl-sm">
                        <a href="#" data-href="demo-medical-doctors-detail.html" data-ajax-on-page class="text-decoration-none">
									<span class="thumb-info thumb-info-no-zoom thumb-info-hide-wrapper-bg">
										<span class="thumb-info-wrapper m-none">
											<img src="img/demos/medical/doctors/doctor-5.jpg" class="img-responsive" alt="">
										</span>
										<span class="thumb-info-caption p-md pt-xlg pb-xlg">
											<span class="custom-thumb-info-title">
												<span class="custom-thumb-info-type font-weight-light text-md">Gynecology</span>
												<span class="custom-thumb-info-inner font-weight-semibold text-lg">Mary Ann Doe</span>
												<i class="icon-arrow-right-circle icons font-weight-semibold text-lg "></i>
											</span>
										</span>
									</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?}?>
    </section>
    <!--      باکس چهارم      -->
    <?for($i=4;$i<=4;$i++){
    $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
    ?>
    <section class="section">
        <div class="container">
            <div class="row mt-md">
                <div class="col-md-12">
                    <h2 class="font-weight-semibold m-none "><?=$menu_bar['pic_adress']?></h2>
                    <p class="lead font-weight-normal"><?=$menu_bar['text']?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <a href="demo-medical-resources-detail.html" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">
										<img alt="" class="img-responsive" src="img/demos/medical/gallery/gallery-2.jpg">
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text p-xl">
											<h4 class="font-weight-semibold mb-xs">Prepare for visit</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
										</span>
									</span>
								</span>
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a href="demo-medical-resources-detail.html" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">
										<img alt="" class="img-responsive" src="img/demos/medical/gallery/gallery-3.jpg">
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text p-xl">
											<h4 class="font-weight-semibold mb-xs">Surgery proccess</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
										</span>
									</span>
								</span>
                    </a>
                </div>
                <div class="col-sm-4 col-md-4">
                    <a href="demo-medical-resources-detail.html" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">
										<img alt="" class="img-responsive" src="img/demos/medical/gallery/gallery-4.jpg">
									</span>
									<span class="thumb-info-caption">
										<span class="thumb-info-caption-text p-xl">
											<h4 class="font-weight-semibold mb-xs">Patients</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hend...</p>
										</span>
									</span>
								</span>
                    </a>
                </div>
            </div>
            <div class="row pb-xlg">
                <div class="col-md-12 center">
                    <a class="btn btn-borders btn-quaternary custom-button text-uppercase font-weight-bold">view more</a>
                </div>
            </div>
        </div>
        <?}?>
    </section>

    <!--      باکس پنجم      -->

    <?for($i=5;$i<=5;$i++){
    $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
    ?>
    <section>
        <div class="container">
            <div class="row mt-md">
                <div class="col-md-12">
                    <h2 class="font-weight-semibold m-none"><?=$menu_bar['pic_adress']?></h2>
                    <p class="lead font-weight-normal"><?=$menu_bar['text']?></p>
                </div>
            </div>
            <div class="row mb-xlg pb-xlg">
                <div class="content-grid pl-md pr-md">
                    <div class="content-grid-row">
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-1.png" alt class="img-responsive" />
                        </div>
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-2.png" alt class="img-responsive" />
                        </div>
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-3.png" alt class="img-responsive" />
                        </div>
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-4.png" alt class="img-responsive" />
                        </div>
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-5.png" alt class="img-responsive" />
                        </div>
                        <div class="content-grid-item col-sm-4 col-md-2 center">
                            <img src="img/demos/medical/logos/insurance-logo-6.png" alt class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?}?>
    </section>
    <!--      باکس ششم      -->
    <section class="section-secondary">
        <div class="container">
            <div class="row mt-xlg pt-md mb-xlg pb-md">
                <div class="owl-carousel owl-theme nav-bottom rounded-nav" data-plugin-options="{'items': 1, 'loop': false, 'dots': false}">
                    <div>
                        <div class="col-md-8 col-md-offset-2 pt-xlg">
                            <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-none">
                                <div class="testimonial-quote">“</div>
                                <blockquote>
                                    <p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
                                </blockquote>
                                <div class="testimonial-author mt-xlg">
                                    <p class="text-uppercase">
                                        <strong>John Smith</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-8 col-md-offset-2 pt-xlg">
                            <div class="testimonial testimonial-style-2 testimonial-with-quotes mb-none">
                                <div class="testimonial-quote">“</div>
                                <blockquote>
                                    <p class="font-weight-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum pretium, tortor risus dapibus tortor, eu suscipit orci leo sed nisl. Integer et ipsum eu nulla auctor mattis sit amet in diam. Vestibulum non.</p>
                                </blockquote>
                                <div class="testimonial-author mt-xlg">
                                    <p class="text-uppercase">
                                        <strong>John Smith</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<? if ($defult_site == 'main') {
    include("new_template/doctor/" . 'blocks/footer.php4');
} else
    include("../new_template/doctor/" . '/blocks/footer.php4');
$dir = "rtl";
?> 
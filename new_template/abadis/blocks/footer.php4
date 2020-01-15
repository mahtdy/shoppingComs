<!-- Start Footer -->
<?if(count($url_temp)>2){?>
<section class="footerblocks">
	<div class="container" style="    margin-bottom: 30px;background-color: white;">
		<div class="newsWrapper fourColumnsnews H-responsive-top-footer">
			<h4>بیشتر بخوانید</h4>
			<?for($i=1;$i<=4;$i++){
				$footer_page_2['text']=0;
				$footer_page_2= get_tem_result($site,$la,"footer_page_2$i",$tem,$coms_conect);
				if($footer_page_2['text']>0){
					$fotter_id=$footer_page_2['text'];
					$fotter_type='content';
				}
				else if($footer_page_2['link']>0){
					$fotter_id=$footer_page_2['link'];
					$fotter_type='page';
				}
				?>		
 
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h5><a rel="nofollow" href="<?="/$fotter_type/$la/category/$fotter_id"?>"> <?=$footer_page_2['title']?><i class="icon-navigate_before"></i> </a></h5>
				<ul class="newslist">
				<?if($footer_page_2['text']>0){
				$footer_query="select  a.title,a.user_id,a.name,a.la,a.title,a.id  from new_content a  ,new_modules_catogory c
				where c.type=11 and a.id=c.page_id and c.cat_id='{$footer_page_2['text']}'   and site='$site' and la='$la' and status=1  and publish_date<='$now'
				group by c.page_id order by a.id desc limit 0,4";

				$fotter_type=11;
				}else if($footer_page_2['link']>0){
					$footer_query = "SELECT a.date,a.mudoal_lock,a.site,a.la,a.title,a.id ,name,text   from new_static_page a  ,new_modules_catogory c  
					where c.type=5 and  a.id=c.page_id	and cat_id='{$footer_page_2['link']}'
					and site='$site'  and la='$la'
					group by a.id
					order by a.id desc limit 0,4";

					$fotter_type=5; 
				}


 				$fotter_result = $coms_conect->query($footer_query);
				if ($footer_query>""){
                while($fotter_row= $fotter_result->fetch_assoc()) {
                    if($footer_page_2['text']>0){
                        $fotter_cat_adress="content/{$fotter_row['la']}/category/{$footer_page_2['text']}";
                        $fotter_pic_adress=get_result("select adress from new_file_path where id={$fotter_row['id']} and type=11 and name='content_image'",$coms_conect);
                        $fotter_link_adress="/content/{$fotter_row['la']}/{$fotter_row['id']}/".insert_dash($fotter_row['name']);
                    }else if($footer_page_2['link']>0){
                        $fotter_cat_adress="page/{$fotter_row['la']}/category/{$footer_page_2['text']}";
                        $fotter_link_adress="/{$fotter_row['name']}/{$fotter_row['la']}/".insert_dash($fotter_row['title']);
                        $fotter_pic_adress=get_result("select slide_img1 from new_slideshow where page_id={$fotter_row['id']} and type=5",$coms_conect);
                    }?>
                    <li>
                        <a href="<?=$fotter_link_adress?>" target="" rel="nofollow"  >
						<span class="img">
							<img class="pull-right mrg10L col-md-3 col-sm-4 col-xs-3 pad0R H_size-img" src="<?=$fotter_pic_adress?>" alt="<?=$fotter_row['title']?>">
						</span>
                            <span><?=$fotter_row['title']?></span>
                        </a>
                    </li>
                <?}

                }?>

                    <br>
				 </ul> 
			</div>
			<?}?> 
		</div>
	</div>
</section>
<?}?>
<footer class="container-fluid">




    <!-- Start Footer First Section -->
    <section class="footerads">
        <div class="container sr_no_padd">
            <figure>
			<?$fotter_ads_pic= get_tem_result($site,$la,'fotter_ads_pic',$tem,$coms_conect);
			if($fotter_ads_pic['pic']==1){
				echo '<script type="text/javascript" data-cfasync="false">';
				echo html_entity_decode($fotter_ads_pic['title']);
			}else{?>
                <a title="<?=$fotter_ads_pic['title']?>" href="<?=$fotter_ads_pic['link']?>"><img src="<?=$fotter_ads_pic['pic_adress']?>" alt="<?=$fotter_ads_pic['title']?>"></a>
			<?} if($fotter_ads_pic['pic']==1)
				echo '</script>';?>
            </figure>
        </div>
    </section>

    <!-- Start Footer Second Section -->
    <section class="footerblocks">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12 pull-right postlist sr_no_padd_1">
                    <h3>مطالب پربیننده</h3>
                    <ul>
						<?$queryq11="select  a.date,c.cat_id as cat_id,a.abstract,a.title,b.adress,a.user_id,a.name,a.publish_date,a.la,a.title,a.id  from new_content a ,new_file_path b, new_modules_catogory c
							where c.type=11 and a.id=c.page_id  and  b.name='content_image'  and site='$site' and la='$la' and status=1 and b.type=11 and a.id=b.id  and publish_date<='$now'
							group by b.id order by a.view desc limit 0,4";
							$resultq11 = $coms_conect->query($queryq11);
							// echo $query11;exit;
								while($row11q = $resultq11->fetch_assoc()) {
						?>
                        <li>
                            <div class="row">
                                <div class="col-md-4 col-xs-4 pull-right pl0">
                                    <figure>
                                        <a href="<?="/content/{$row11q['la']}/{$row11q['id']}/".insert_dash($row11q['name'])?>" class="hvr-grow">
										<img src="<?=$row11q['adress']?>"></a>
                                    </figure>
                                </div>
                                <div class="col-md-8 col-xs-8 pull-right">
                                    <a href="<?="/content/{$row11q['la']}/{$row11q['id']}/".insert_dash($row11q['name'])?>"><h4><?=$row11q['title']?></h4></a>

                                    <p><?=jdate('d  F  Y | H:m:s',$row11q['date']);?></p>
                                </div>
                            </div>
                        </li>
						<?}?>
                    </ul>
                </div>
				
                <div class="col-md-4 col-xs-12 pull-right commentlist">
                    <h3>پر بحث ترین ها</h3>
                    <ul>
					    <?$sql1_comment = "SELECT a.title,a.date,a.la,a.id,b.id as ide,count(a.id) as count_pm,b.text,b.name,b.status,a.title as page_name,b.email from new_madules_comment b ,new_content a  where 
						 a.id=b.madul_id  and site='$site' and la='$la'  and b.type=11 group by b.madul_id order by count_pm desc LIMIT 0,4";
						$result1_comment = $coms_conect->query($sql1_comment);
						    while($row_comment = $result1_comment->fetch_assoc()) {?>
								<li>
									<div class="row">
										<div class="col-md-3 pull-right">
											<figure>
												<a href="<?="/content/$defult_lang/{$row_comment['id']}/".insert_dash($row_comment['title'])?>"><p class="most-diss"><?=get_result("select count(id) from new_madules_comment where madul_id={$row_comment['id']}",$coms_conect)?></p></a>
											</figure>
										</div>
										<div class="col-md-9 pull-right">
											<h5><?=jdate("Y-m-d",$row_comment['date'])?></h5>
											  <a href="<?="/content/$defult_lang/{$row_comment['id']}/".insert_dash($row_comment['title'])?>"><h4><?=$row_comment['title']?></h4></a>

											<p><?=$row_comment['text']?></p>
										</div>
									</div>
								</li>
							<?}?>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-12 pull-right catlist">
                    <h3>موضوعات</h3>
                    <ul class="row">
					<?for($i=1;$i<=10;$i++){
						$fotter_link= get_tem_result($site,$la,"fotter_link$i",$tem,$coms_conect);
						if($fotter_link['link']>""){?>
						<li class="col-md-6 pull-right">
                            <a href="<?=$fotter_link['link']?>"><span><?=$fotter_link['title']?></span></a>
                        </li>
						<?}
						}?>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-12 pull-right catlist">
                    <h3>خانواده آبادیس</h3>
                    <ul class="row">
					<?for($i=1;$i<=10;$i++){
						$abadis_link= get_tem_result($site,$la,"abadis_link$i",$tem,$coms_conect);
					if($abadis_link['link']>""){?>
                        <li class="col-md-6 pull-right">
                            <a href="<?=$abadis_link['link']?>"><span><?=$abadis_link['title']?></span></a>
                        </li>
					<?}
					}?>
						
                    </ul>
                    <div class="newsletter col-md-12 pull-right pr0 pl0">
                        <h3>خبرنامه</h3>

                        <p>برای دریافت آخرین اخبار و مطالب در خبرنامه ما عضو شوید.</p>

                        <div class="form-group ltr">
                            <div class="input-group">
                                <a class="input-group-addon news_letters_a">تایید</a>
                                <input class="form-control dir-rtl news_letters" id="fotter_news_letters_Email" placeholder="ایمیل خود را وارد کنید." type="text">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Footer Third Section -->

    <!-- Start Footer Copyright Section -->
    <section class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-7 pull-right sr_no_padd_1">
                    <p>
                        © استفاده از مطالب سایت تنها با ذکر لینک مطلب مجاز می باشد.
                        <br>
                        آبادیس توسط سرورهای قدرتمند<a href="http://onlineservers.ir" target="_blank" class="green">آنلاین سرور</a> پشتیبانی و تولید و توسعه نرم افزار آبادیس توسط <a href="http://coms.ir"  target="_blank" class="green">کامز</a> انجام می شود.
                    </p>
                </div>
                <div class="col-md-5 pull-left pl0" style="margin-top: 12px">
                    <ul class="fa">
						<?for($i=1;$i<=6;$i++){
						$footer_social_network= get_tem_result($site,$la,"footer_social_network$i",$tem,$coms_conect);?>
                        <li><a title="<?=$footer_social_network['title']?>" href="<?=$footer_social_network['link']?>"><span class="fa <?=$footer_social_network['pic_adress']?>"></span></a></li>
						<?}?>
                        <li><a href="http://coms.ir" data-toggle="tooltip" data-placement="right" title=""
                               data-original-title="!کامز، همه چیز یک جا"><span
                                class="icon-comslogo"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>
<a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#0" class="cd-top">Top</a>
<!-- Start JS files -->
 

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.newsTicker.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/owl.carousel.js"></script>

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/video.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/bootstrap.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/lightgallery-all.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- End Js files -->
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.smartmenus.js" type="text/javascript"></script>
<!-- SmartMenus jQuery init -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 6,
                subMenusSubOffsetY: -8
            });
        });
    });

</script>
<script>
    // add a menu toggle button on small screens
    jQuery(document).ready(function($) {
        $('#menu-button').click(function() {
            var $this = $(this),
                    $menu = $('#main-menu');
            if ($menu.is(':animated')) {
                return false;
            }
            if (!$this.hasClass('collapsed')) {
                $menu.slideUp(250, function() { $(this).addClass('collapsed').css('display', ''); });
                $this.addClass('collapsed');
            } else {
                $menu.slideDown(250, function() { $(this).removeClass('collapsed'); });
                $this.removeClass('collapsed');
            }
            return false;
        });
    });

</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/persianumber.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('body').persiaNumber();
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
                scroll_top_duration = 700,
        //grab the "back to top" link
                $back_to_top = $('.cd-top');

        //hide or show the "back to top" link
        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if( $(this).scrollTop() > offset_opacity ) {
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                        scrollTop: 0 ,
                    }, scroll_top_duration
            );
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sr_search_icon').click(function () {
            $("#SearchBox").fadeToggle();
            $("#SearchTerm").focus();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ShareLink').click(function () {
            $("#ShareBox").fadeToggle();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#new-posts-icon').click(function () {
            $('#new-post-menu').toggleClass("visible");
        });
    });
</script>
<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            rtl: true,
            dots: false,
            nav: true,
            navText: ["<i class='fa fa-chevron-right'></i>","<i class='fa fa-chevron-left'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    })
	

$(".news_letters_a").click(function () {
	newsletter=$("#header_news_letters_Email").val();
	if(newsletter=="")
		newsletter=$("#fotter_news_letters_Email").val();
	 $.ajax({
	 type:'POST',
	 url:'New_ajax.php',
	 data:"action=add_newsletters&id="+newsletter+"&value=<?=$site?>&secend_value=<?=$la?>",
		success: function(result){
			alert(result);
			$("#show_newsletter_div").html(result);	
		}
	});	
});	
	

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1631827-50', 'auto');
  ga('send', 'pageview');

</script>

<!-------------------------------------------------start static sidebar -------------------->

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.sticky-sidebar.min.js" type="text/javascript"></script>
<script type="text/javascript">
    var stickySidebar = new StickySidebar('#sidebar5', {
        topSpacing: 20,
        bottomSpacing: 20,
        containerSelector: '.container',
        innerWrapperSelector: '.sidebar5__inner'
    });
</script>

<!-------------------------------------------------end static sidebar --------------------------->

</body>

</html>
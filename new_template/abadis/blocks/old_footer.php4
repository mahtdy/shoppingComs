<!-- Start Footer -->
<footer class="container-fluid">


        <!-- Start Footer First Section -->
        <section class="footerads">
            <div class="container">
			<?$up_fotter= get_tem_result($site,$la,"up_fotter",$tem,$coms_conect);?>
                <figure>
					<a href="<?=$up_fotter['link']?>">
				    <img title="<?=$up_fotter['title']?>" alt="<?=$up_fotter['title']?>" src="<?=$up_fotter['pic_adress']?>">
					</a>
                </figure>
            </div>
        </section>

        <!-- Start Footer Second Section -->
        <section class="footerblocks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right postlist">
                        <h3><?=$seramic_Hot_topic?></h3>
                        <ul>
						 <?$query1="select  a.title ,a.la,a.id,a.date,b.adress from new_news a, new_file_path b
							where  a.id=b.id and b.type=1 and b.name='news_image' and   site='$site' and la='$la' and status=1   and publish_date<=now()  
							 order by a.view desc limit 0,5";
							//echo $query1;
							$result1 = $coms_conect->query($query1);
							  
								while($rowe1 = $result1->fetch_assoc()){?>
                            <li>
                                <div class="row">
                                    <div class="col-md-4 pull-right">
                                        <figure>
                                            <a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>" class="hvr-grow"><img alt="<?=$rowe1['title']?>" src="<?=$rowe1['adress']?>"></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8 pull-right pr0">
                                        <a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><h4><?=$rowe1['title']?></h4></a>

                                        <p><?=jdate("Y-m-d",$rowe1['date'])?></p>
                                    </div>
                                </div>
                            </li>
						 <?}?>
 
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12 pull-right catlist">
                        <h3><?=$seramic_subjects?></h3>
                        <ul class="row">
						 <?$query1="select  a.name ,a.id   from new_modules_cat  a
							where    la='$la' and status=1 and type=1  order by a.id desc limit 0,12";
							$result1 = $coms_conect->query($query1);
						 		while($rowe1 = $result1->fetch_assoc()){?>
                            <li class="col-md-6 pull-right">
                                <a href="<?="/news/$la/cat_id/{$rowe1['id']}/1"?>"><span><?=$rowe1['name']?></span></a>
                            </li>
                            <?}?>
                        </ul>
                        <div class="newsletter col-md-12 pull-right pr0 pl0">
                            <h3>خبرنامه</h3>

                            <p>برای دریافت آخرین اخبار و مطالب در خبرنامه ما عضو شوید.</p>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9 pull-left">
                                        <input type="email" class="form-control" id="exampleInputEmail2"
                                               placeholder="jane.doe@example.com">
                                    </div>
                                    <div class="col-md-3 pull-right pl0">
                                        <button type="submit" class="btn btn-success">عضویت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 pull-right commentlist">
                        <h3><?=$seramic_Last_comments?></h3>
                        <ul>
						<?$sql1 = "SELECT a.title,a.date,a.la,a.id,b.id as ide,count(a.id) as count_pm,b.text,b.name,b.status,a.title as page_name,b.email from new_madules_comment b ,new_news a  where 
						 a.id=b.madul_id  and site='$site' and la='$la'  and b.type=1 group by b.madul_id order by count_pm desc LIMIT 0,4";
 
						$result1 = $coms_conect->query($sql1);
						    while($row = $result1->fetch_assoc()) {?>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <figure>
										<a href="<?="/news/$defult_lang/{$row['id']}/".insert_dash($row['title'])?>"> 
											<p class="most-diss"><?=get_result("select count(id) from new_madules_comment where madul_id={$row['id']}",$coms_conect)?></p>										
										</a>											
                                        </figure>
                                    </div>
                                    <div class="col-md-9 pull-right pr0">
                                        <h5><?=jdate("Y-m-d",$row['date'])?></h5>
                                        <a href="<?="/news/$defult_lang/{$row['id']}/".insert_dash($row['title'])?>"><h4><?=$row['title']?></h4></a>

                                        <p><?=$row['text']?></p>
                                    </div>
                                </div>
                            </li>
							<?}?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Footer Third Section -->

        <!-- Start Footer Copyright Section -->
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pull-right">
                        <p>
                            تمام حقوق مادی و معنوی این وبسایت محفوض می باشد.
                            <br>
                            آبادیس توسط سرورهای کامز میزبانی و پشتیبانی و نیز از نرم افزار مدیریت محتوای کامز برای مدیریت خود استفاده می کند .
                        </p>
                    </div>
                    <div class="col-md-6 pull-left pl0" style="margin-top: 12px">
                        <ul class="fa">
                            <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                            <li><a href="#"><span class="fa fa-rss"></span></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title=""
                                   data-original-title="!کامز، همه چیز یک جا"><span
                                    class="icon-comslogo"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
</footer>
<!-- Start JS files -->

<script>
    /*Preloading Animation*/
    $(window).load(function() {
        $('#status').fadeOut();
        $('#preloader').delay(300).fadeOut('slow');
        $('body').delay(300).css({'overflow':'visible'});
        setTimeout(function(){$('.intro-title').addClass('slideInLeft');},100);
    });
</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.newsTicker.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.mCustomScrollbar.min.js"></script>
<script>

    $(window).load(function(){
        $('code.language-javascript').mCustomScrollbar();
    });
    var nt_example1 = $('#nt-example1').newsTicker({
        row_height: 90,
        max_rows: 4,
        duration: 4000,
        prevButton: $('#nt-example1-prev'),
        nextButton: $('#nt-example1-next')
    });
    $('#nt-example2-infos').hover(function() {
        nt_example2.newsTicker('pause');
    }, function() {
        nt_example2.newsTicker('unpause');
    });
    var state = 'stopped';
    var speed;
    var add;
    var nt_example3 = $('#nt-example3').newsTicker({
        row_height: 80,
        max_rows: 1,
        duration: 0,
        speed: 10,
        autostart: 0,
        pauseOnHover: 0,
        hasMoved: function() {
            if (speed > 700) {
                $('#nt-example3').newsTicker("stop");
                console.log('stop')
                $('#nt-example3-button').text("RESULT: " + $('#nt-example3 li:first').text().toUpperCase());
                setTimeout(function() {
                    $('#nt-example3-button').text("START");
                    state = 'stopped';
                },2500);

            }
            else if (state == 'stopping') {
                add = add * 1.4;
                speed = speed + add;
                console.log(speed)
                $('#nt-example3').newsTicker('updateOption', "duration", speed + 25);
                $('#nt-example3').newsTicker('updateOption', "speed", speed);
            }
        }
    });

    $('#nt-example3-button').click(function(){
        if (state == 'stopped') {
            state = 'turning';
            speed = 1;
            add = 1;
            $('#nt-example3').newsTicker('updateOption', "duration", 0);
            $('#nt-example3').newsTicker('updateOption', "speed", speed);
            nt_example3.newsTicker('start');
            $(this).text("STOP");
        }
        else if (state == 'turning') {
            state = 'stopping';
            $(this).text("WAITING...");
        }
    });
</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/video.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/bootstrap.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#sidebar-btn').click(function() {
            $('#sidebar').toggleClass('visible');
        });
    });
</script>
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

</body>

</html>
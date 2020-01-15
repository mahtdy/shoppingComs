        <!-- Start Footer -->
        <footer>
            <!-- Start Footer First Section -->
            <section class="footerads">
                <div class="container">
                    <figure>
                        <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/adsbanner.jpg">
                    </figure>
                </div>
            </section>
	
<?function get_most_view($type,$coms_conect,$site,$la,$name){
	$table=get_result("select table_name from new_modules where id=$type",$coms_conect);
	$link=get_result("select link from new_modules where id=$type",$coms_conect);
	echo '<div class="col-md-4 col-xs-12 pull-right postlist">
       <h3>مطالب پربیننده</h3>
       <ul>   ';
	$query="SELECT date,title,id FROM $table where la='$la' and site='$site' and status=1 order by view desc limit 0,4";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		$status=$row['status'];	
		$pic=get_result("select adress from new_file_path where type=$type and name='$name' and id={$row['id']}",$coms_conect);
		echo '<li><div class="row">
                 <div class="col-md-4 pull-right">
                     <figure>
					<a href="'."/news/$la/{$row['id']}/".insert_dash($row['title']).'" class="hvr-grow"><img src="'.$pic.'"></a>
                     </figure>
                  </div>
                  <div class="col-md-8 pull-right pr0">
                      <a href="'."/news/$la/{$row['id']}/".insert_dash($row['title']).'"><h4>'.$row['status'].'</h4></a>
                      <p>'.miladitojalalidefult(date('Y-m-d H:i:m',$row['date'])).'</p>
                  </div>
           </div></li>';
	}
	echo '   </ul>
            </div>';
}
function get_fotter_view($type,$coms_conect,$la){
 	$query="SELECT name FROM new_modules_cat where la='$la' and type=$type  and status=1 order by id desc limit 0,14";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		echo '<li class="col-md-6 pull-right">
                   <a href="#"><span>'.$row['name'].'</span></a>
                                </li>';
	}								
}

function get_footer_comment($type,$coms_conect){
	$query="SELECT name,id,date FROM new_madules_comment where type='$type' and status=1 order by id desc limit 0,4";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		echo '<li><div class="row">
                  <div class="col-md-3 pull-right">
                       <figure>
                         <a href="#"><img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/avatar1.jpg"></a>
                         </figure>
                  </div>
                  <div class="col-md-9 pull-right pr0">
                       <h5>'.miladitojalalidefult(date('Y-m-d H:i:m',$row['date'])).'</h5>
                       <a href="#"><h4>در مورد مطلب علمی</h4></a>
						<p>'.$row['name'].'</p>
                  </div>
            </div></li>';
	}	
}
?>			
			
			
            <!-- Start Footer Second Section -->
            <section class="footerblocks">
                <div class="container">
                    <div class="row">
                    
								<?get_most_view(1,$coms_conect,$defult_site,$defult_lang,'news_image');?>
                
                        <div class="col-md-4 col-xs-12 pull-right catlist">
                            <h3>موضوعات</h3>
                            <ul class="row">
								<?=get_fotter_view(1,$coms_conect,$defult_lang)?>
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
                            <h3>آخرین دیدگاه ها</h3>
                            <ul>
								<?=get_footer_comment(1,$coms_conect)?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Start Footer Third Section -->
            <section class="footerads2">
                <div class="container">
                    <figure>
                        <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/adsbanner.jpg">
                    </figure>
                </div>
            </section>

            <!-- Start Footer Copyright Section -->
            <section class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pull-right">
						
                            <p>تمام حقوق مادی و معنوی این وبسایت محفوظ میباشد.</p>
							<?$fotter_pic= get_tem_result($defult_site,$defult_lang,'fotter_pic','default',$coms_conect);?>
							<p><?=$fotter_pic['text']?>
							</p>
                        </div>
                        <div class="col-md-6 pull-left pl0">
                            <ul class="fa">
     							<?for($i=1;$i<=6;$i++){?>
									<?$header_icon= get_tem_result($defult_site,$defult_lang,"header_icon$i",'default',$coms_conect);?>
									<li><a title="<?=$header_icon['title']?>" href="<?=$header_icon['link']?>"><span class="fa <?=$header_icon['pic']?>"></span></a></li>
								<?}?>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="!کامز، همه چیز یک جا"><span class="icon-comslogo"></span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </section>

        </footer>

        <!--main row-->
    </div>
    <!--container-fluid-->
</div>


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
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/owl.carousel.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.mCustomScrollbar.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/select2.min.js"></script>
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
<script>
    $(document).ready(function(){
        $("#owl-example").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 3,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });
        // Custom Navigation Events
        var owl = $("#owl-example");
        $(".next").click(function(){
            owl.trigger('owl.next');
        })
        $(".prev").click(function(){
            owl.trigger('owl.prev');
        })
        $(".play").click(function(){
            owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
        })
        $(".stop").click(function(){
            owl.trigger('owl.stop');
        })
    });
</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/video.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/bootstrap.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/lightgallery-all.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/custom.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/persianumber.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){ 
$('body').persiaNumber();
});
</script>
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

<script>
    /**
     * select 2
     */
    $(document).ready(function() {

        // category selection with select2 Cats
        $('.cat-select').select2({
            theme: "bootstrap",
            placeholder: "انتخاب کنید...",
            dir: "rtl",
            allowClear: true,
            templateResult: function (data) {
// We only really care if there is an element to pull classes from
                if (!data.element) {
                    return data.text;
                }

                var $element = $(data.element);

                var $wrapper = $('<span></span>');
                $wrapper.addClass($element[0].className);

                $wrapper.text(data.text);
                return $wrapper;
            }
        });

        // category selection with select2 Ads
        $('.cat-select_ads').select2({
            theme: "bootstrap",
            placeholder: "انتخاب گروه آگهی...",
            dir: "rtl",
            allowClear: true,
            templateResult: function (data) {
// We only really care if there is an element to pull classes from
                if (!data.element) {
                    return data.text;
                }

                var $element = $(data.element);

                var $wrapper = $('<span></span>');
                $wrapper.addClass($element[0].className);

                $wrapper.text(data.text);
                return $wrapper;
            }
        });

        // category selection with select2 Ads option
        $('.cat-select_ads_option').select2({
            theme: "bootstrap",
            placeholder: "تنظیمات نمایش آگهی ...",
            dir: "rtl",
            allowClear: true,
            templateResult: function (data) {
// We only really care if there is an element to pull classes from
                if (!data.element) {
                    return data.text;
                }

                var $element = $(data.element);

                var $wrapper = $('<span></span>');
                $wrapper.addClass($element[0].className);

                $wrapper.text(data.text);
                return $wrapper;
            }
        });

    });

</script>
<?$analysister1= get_tem_result($defult_site,$defult_lang,'analysister1','default',$coms_conect); 
 $analysister2= get_tem_result($defult_site,$defult_lang,'analysister2','default',$coms_conect); 
 $google_code_analiz= get_tem_result($defult_site,$defult_lang,'google_code_analiz','default',$coms_conect); 
?>
<script>
<?

if($google_code_analiz['text']>"") echo html_entity_decode(ta_latin_num($google_code_analiz["text"])) ;
if($analysister1['text']>"") echo html_entity_decode(ta_latin_num($analysister1['text']));
if($analysister2['text']>"") echo html_entity_decode(ta_latin_num($analysister2['text']));
?>
</script>
</body>
</html>

<div id="<?=$ads_div_open?>">

	<input type="hidden" value="<?=$ads_status?>" id="ads_status" name="ads_status">    

		<?			$sql1 = "SELECT count(a.id) as cnt from new_ads a where 
			a.status=1  and  a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}'";
		// echo $sql1;
			 $result = $coms_conect->query($sql1);
			 $RS = $result->fetch_assoc();
			 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/ads/{$_SESSION['la']}/page");
			 $from=$a[0];
			 $to=$a[1];
			 $pgsel=$a[2];?>
			 <?$query="select * from new_ads LIMIT $from,$to  ";
			    echo $query;//exit;
			 $result = $coms_conect->query($query);$i=$paging;$j=0;$k=0;
			 while($row = $result->fetch_assoc()) {?>
			 <div class="panel panel-default">
	<div class="panel-body">			 
		<div class="col-md-2">	
			<h4>لوازم اداری </h4>
			<img src="/new_gallery/files/896.jpg" class="img-responsive">
			<p>بازدید: <span>25 </span></p>
		</div>
		<div class="col-md-6">
			<h4>فروش صندلی نیلپر 450 هزار تومان </h4>
			<p>
				<a href="#" data-toggle="popover" title="مشخصات آگهی دهنده" data-html="true" data-content="
								<div style='font-family: yekan;text-align: right;'>
								نام: اسماعیل فاضل نیارکی <br> 
					  		    ایمیل: poyanweb@gmail.com <br>			  		  	 
					  		    تلفن: 09124813953 <br>
					  		    ثبت اولیه: شنبه، ۲۹ اسفند ۱۳۹۴ <br>
					  		    به روز شده:  شنبه، ۱۴ فروردین ۱۳۹۵ ساعت: ۱۶:۱۷ <br>
					  		    اعتبار: 60 روز <br>
					  		    آدرس: قزوین <br>
					  		    پادگان نبش کوچه بهمن </div>">مشخصات آگهی دهنده</a>
				<a href="#" class="icon-red">http://google.com </a>  
				<a id="244" class="icon-blue" href="#"><i class="fa fa-edit" title="ويرايش"></i></a>
				<br>
				<br><a href="#" data-toggle="popover" title="عبارات کلیدی" data-html="true" data-content="<div style='font-family: yekan;text-align: right;'>صندلی <br> نیلپر </div>">عبارات کلیدی<span>(1) </span></a>
				<br><a href="#" data-toggle="popover" title="عکس های بیشتر" data-html="true" data-content="
					  		    	
								<div class='btn-group' style='font-family: yekan;text-align: right;'>
								  <p class='text-center' >
							  		<a class='btn btn-primary btn-xs btn-block' href='/<?="profile/$la/ticket/show/{$RS1['id']}"?>'>
							  		<span class='glyphicon glyphicon-upload'></span>
							  		ارسال عکس
							  		</a>		  		
							      </p>		
							  	
	      		  			    شما می‌توانید تا 12 عکس با کیفیت، برای هر آگهی ویژه ارسال کنید.			 
							  	</div>				  		  
					  		  ">عکس های بیشتر<span>(ندارد) </span></a>
				<br><a href="#"> کد: <span>1/654/36 </span></a>
			</p>
			<p>
				<a href="#" target="_blank" class="icon-blue">
				<i class="fa fa-vimeo-square fa-lg" title="نمایش"></i></a>

				<a href="#" class="icon-green">
				<i class="fa fa-comments fa-lg" title="نظرات"></i></a>
				
				<a href="#" class="icon-red">
				<i class="fa fa-film fa-lg" title="فیلم" data-toggle="modal" data-target="#show_video_grid"></i></a>
															
				<a href="#" class="icon-green" data-toggle="modal" data-target="#show_news_gallery">
				<i class="fa fa-picture-o fa-lg" title="البوم عکس"></i></a>
															
				<a href="#" class="icon-blue" data-toggle="modal" data-target="#show_voice_grid">
				<i class="fa fa-volume-up fa-lg" title="صدا"></i></a>
				
				<a href="#" class="icon-green" data-toggle="modal" data-target="#show_attach">
				<i class="fa fa-file fa-lg" title="فایل"></i></a>
				
				<a href="#" class="icon-red" data-toggle="modal" data-target="#show_attach">
				<i class="fa fa-paperclip fa-lg" title="پیوست"></i></a>
															
				<input id="switch-size" type="checkbox" name="my-checkbox"  checked data-size="mini" data-on-color="danger">
					
			</p>
			<p>
				<button class="btn btn-success"><i class="fa fa-refresh"></i> به روز</button> 
				<button class="btn btn-primary"><i class="fa fa-edit"></i> ویرایش</button> 
				<button class="btn btn-danger"><i class="fa fa-trash"></i> حذف</button>
			</p>	
		</div>
		<div class="col-md-4">
			<button class="alert alert-success" style="padding-left: 30%;padding-right: 30%;">شنبه 29/12/94 </button> 
			<button class="btn btn-warning" style="padding-left: 30%;padding-right: 30%;">منتظر تایید </button> 
			<br><a href="#" class="vijheh2" style="padding-left: 30%;padding-right: 30%;">سفارش ویژه</a> 
			<br><br><div class="panel panel-default vijheh">
				<div class="panel-body">
					<div class="cost_vij">
						پرداخت از درگاه آنلاین 
						<br>ثبت سفارش شده
						<br>به توان: 13 
						<br>تخفیف ندارد 
						<br>قابل پرداخت: ۳,۹۰۰,۰۰۰ ریال 
						<br>اعتبار ویژه تا: ۹۵/۵/۸
						<br>
						<button class="btn btn-info btn-group-justified btn_vij"><i class="fa fa-edit fa-lg"></i> تغییر</button> 
					</div>
					
					<div class="ch_vij"><form name="form1" method="post" action="" >
						<label>به توان</label>
						<input type="number" class="form-control" id="num1"><br>
						<select class="form-control">
							<option value="1">تخفیف ندارد</option>
							<option value="2">5% تخفیف</option>
							<option value="2">10% تخفیف</option>
						</select><br>
						<select class="form-control">
							<option value="1">پرداخت ازدرگاه آنلاین</option>
							<option value="red">واریز به حساب کارت</option>
						</select><br>
						<div class="red box">
							<input type="text" class="form-control" placeholder="شماره فیش یا ارجاع یا پیگیری"><br>
							<input type="text" class="form-control" placeholder="تاریخ پرداخت 30/12/95"><br>
							<input type="text" class="form-control" placeholder="مبلغ پرداخت شده (ریال)"><br>
						</div>
						<label class="control-label">مبلغ ویژه: <span id="sum"></span> ریال </label><br>
						<label class="control-label">اعتبار ویژه تا: 9/5/95 </label><br>
						<button type="submit" class="btn btn-success btn-group-justified"> ثبت سفارش</button> 
						</form>
					</div>
					
					<button class="btn btn-danger btn-group-justified"><i class="fa fa-close fa-lg"></i> انصراف</button> 
				
					<a href="#" class="btn btn-link" style="">راهنما</a>
					<a href="#" class="btn btn-link" style="float: left;">پرداخت</a>
				</div>
			</div>
		</div>
	</div>
	</div>
		<?}?>
	<?=$pgsel?>

</div>
<style>
.icon-blue{
	color:#337ab7 !important;
}
.icon-green{
	color:#449d44 !important;
}
.icon-red{
	color:#c9302c !important;
}
//////
.toggle.btn {
    min-width: 43px;
    min-height: 23px;
}
.toggle-on.btn {
    padding-right: 20px;
    padding-top: 2px;
}
.toggle-off.btn {
    padding-left: 35px;
    padding-top: 2px;
}
////////
.popover-content {
    font-family: yekan;
    text-align: right;
}
.popover-title {
    font-family: yekan;
    text-align: right;
}
</style>

<fieldset>
	<div class="modal fade" id="show_news_gallery" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
				<img src="/new_gallery/files/896.jpg" class="img-responsive thumbnail col-md-4">
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
	<div class="modal fade" id="show_attach" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="panel-body">
					<p><a href="/new_gallery/files/896.jpg">آموزش.pdf</a></p>
					<p><a href="/new_gallery/files/896.jpg">فراخوان.pdf</a></p>
					<p><a href="/new_gallery/files/896.jpg">فروش.pdf</a></p>
				</div>
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
 <div class="modal fade" id="show_video_grid" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"   controls preload="none" width="100%" height="400px"
			data-setup="{}">
			<source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'   />
			</video>
		</div>
	</div>
</div>
</fieldset>	 

<fieldset>
 <div class="modal fade" id="show_voice_grid" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"   controls preload="none" width="100%" height="400px"
			data-setup="{}">
			<source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'   />
			</video>
			<audio width="320" id="example_voice_1" controls style="display:none">
				 <source src="" type="voice/mp3">
			</audio>
		</div>
	</div>
</div>
</fieldset>	 

<script>
$(".vijheh").hide();
$(".vijheh2").click(function(){
    $(".vijheh").toggle();
});
/////
$(".ch_vij").hide();
$(".btn_vij").click(function(){
    $(".cost_vij").hide();
	$(".ch_vij").show();
});

//////
$("[name='my-checkbox']").bootstrapSwitch();
//////
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
//////
	
	$("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="red"){
                $(".box").not(".red").hide();
                $(".red").show();
            }
            else if($(this).attr("value")=="green"){
                $(".box").not(".green").hide();
                $(".green").show();
            }
            else if($(this).attr("value")=="blue"){
                $(".box").not(".blue").hide();
                $(".blue").show();
            }
            else{
                $(".box").hide();
            }
        });
    }).change();
//////////////

	$(document).ready(function() {
		$("#num1").on("change", function() {
		sum();
		});
	});
	function sum() {
		var num1 = document.getElementById('num1').value;
		var num2 = 30000;
		var result = num2 * num1;
		if (!isNaN(result)) {
			document.getElementById('sum').innerHTML = result;
		}
	}
/////////
videojs.options.flash.swf = "/new_plugin/video-js/js/video-js.swf";	
</script>

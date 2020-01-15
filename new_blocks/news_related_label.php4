<div class="slidebox">
	<h4><?=$view_related_news_label?></h4>
	<div class="slidebox-content">
		<div class="carousel slide" id="myCarousel2" data-ride="carousel" data-interval="2500">
			<div class="carousel-inner">
			<?
			
			
			$sql440 = "select view,a.date,a.name,title,la,a.id from new_news a ,new_modules_catogory b where
			 b.cat_id={$left_under_slide_show['text']}  and status=1 and b.type=1 and a.id=b.page_id and la='$la' and site='$site' and publish_date<='$now'
			 group by a.id  order by a.id desc LIMIT 0,10";
			$result440 = $coms_conect->query($sql440); $i=1;
			while($row440 = $result440->fetch_assoc()) {?>

			  <div class="item  <?if($i==1)echo 'active';?>">
				<div class="col-md-12 akhbar-slider-sidbar prl0">
				  <div class="col-md-5 pull-right prl0">
					<a href="<?="/news/{$row440['la']}/{$row440['id']}/".insert_dash($row440['name'])?>">
					<img src="<?=get_result("select adress from new_file_path where type=1 and id={$row440['id']}",$coms_conect);?>">
					</a>
				  </div>
				  <div class="col-md-7 pull-left">
					<a href="<?="/news/{$row440['la']}/{$row440['id']}/".insert_dash($row440['name'])?>">
					<h3> <?=$row440['name']?></h3>
					</a>
					<p>
					  <?=$row440['title']?>
					</p>
					
				  </div>
				</div>
			  </div>
				<?$i++;}?>
			</div>
			<nav style="display: inline-block;width: 100%;">
			  <ul class="control-box pager">
				<li><a data-slide="next" href="#myCarousel2" class=""><i class="glyphicon glyphicon-chevron-right"></i></a>
				</li>
				<li><a data-slide="prev" href="#myCarousel2" class=""><i
				  class="glyphicon glyphicon-chevron-left"></i></a></li>
			  </ul>
			  <a href="/news/<?=$la?>" class="btn more-btn sidebar-slider-btn">فهرست اخبار</a>
			</nav>
			<!-- /.control-box -->

		</div>
	</div>
</div>
 <div class="cform col-xs-12 cform prl0" id="comments">
	<form method='post' action="">
	</form>
      <fieldset>
	  <div id="show_comment_message_div"></div>
       <legend><?=$view_send_comment?></legend>
			<form id="form-comment" method='post' action="">			
				<input class="inputh" type="hidden" value="<?=$id?>" name="madul_id" >
				<input   type="hidden" value="<?=$comment_type?>" name="comment_type" > 
				<div class="col-md-7 col-xs-12 H_fa_pull-right H_en_pull-left">
			 		<input class="form-control" name='name' placeholder="<?=$view_name_family?>" required ></input>
			 	</div>
			 	<div class="col-md-7 col-xs-12 H_fa_pull-right H_en_pull-left">
			 		<input class="form-control" name='email' type="email" placeholder="<?=$view_email?>" required ></input>
			 	</div>
			 	<div class="col-md-12 col-xs-12 H_fa_pull-right H_en_pull-left">
					<textarea class="form-control" name='comment' rows="5" placeholder="<?=$view_text_comment?>" required ></textarea>
			 	</div>
				<div class='col-md-7 col-xs-12 H_fa_pull-right H_en_pull-left'>
					<div class="row">
						<div class="col-sm-2 col-xs-4 ">
						<span><img  src="<?crate_capcha_pic($madual_lang)?>" style="height: 35px;width:100px"/>
						</span></div>
						<div class="col-sm-10 col-xs-8">
							<input type="text" class="form-control" name="com1_captcha" placeholder="<?=$view_captcha?>" required >
						</div>
					</div>
					
				</div>
			 	<div class="col-md-12 col-xs-12 pull-right">
					<button type="submit" class="btn btn-success col-xs-12"><?=$view_send?></button>
					<img src="/waiting.gif" id="show_pic_comment" style="display:none">
				 </div>
				 
			</form> 
      </fieldset>
	<div id="message"></div>
</div> 
 <div class="col-xs-12 clist prl0">
    <fieldset>
	<?//get_result("select count(id) as count from new_madules_comment where type='$comment_type' and madul_id='$madual_id' and status=1 and rep_id=0",$coms_conect){?>
       <legend><?=$view_comments?></legend>
			 <ul class="media-list pr10">
			<?$query="select id,name,date,text,rep_id,comment_id,date from new_madules_comment where type='$comment_type' and madul_id='$madual_id' and status=1 and rep_id=0";
			$result = $coms_conect->query($query);
				while($RS1 = $result->fetch_assoc()) {?>
				<li class="media">
					 <div class="media-left">
						<img class="media-object" src="<?=$subdomian_add?>/source/comsroot/default/dsl.jpg">
					   </a>
					 </div>
					<div class="media-body">
						 <div class="tools">
							<div class="score pull-left">
								<?$id=$RS1["id"];
								$sql44="select count(id) as count from new_like where post_id='$id' and rate=1  and type='$comment_type' and page_id='$madual_id' ";
								$result44 = $coms_conect->query($sql44);
								$row44 = $result44->fetch_assoc();
								$sql4450="select count(id) as count from new_like where post_id='$id' and rate=2  and type='$comment_type' and page_id='$madual_id' ";
								$result4450 = $coms_conect->query($sql4450);
								$row4450 = $result4450->fetch_assoc();?>
								 <div class="up pull-right">
									 <span><div id="like<?=$RS1["id"]?>"><?=$row44["count"]?></div></span><a href="#" class="like_post" value="<?=$RS1["id"]?>" ><span class="fa fa-plus-square-o"></span></a>
								 </div>
								 <div class="down pull-right">
									 <span><div id="dislike<?=$RS1["id"]?>"><?=$row4450["count"]?></div></span><a href="#" class="dislike_post" value="<?=$RS1["id"]?>" ><span class="fa fa-minus-square-o"></span></a>
								 </div>
									<br/><br/>
									<div class="reply">
										 <a href="#" class="rep_comment" id="<?=$RS1["comment_id"]?>" data-toggle="modal" data-target="#replyModal">
										 <span class="fa fa-commenting-o"></span>
										 <span><?=$view_send_reply?></span>
										</a>
									</div>
							 </div>
						 </div>
						 <h4 class="media-heading"><?if($RS11['admin']==1)echo $new_admin; else echo $RS1['name']?></h4><?=miladitojalalidefult(date('Y-m-d H:i:m',$RS1['date']),$madual_lang);?>
						 <p><?=$RS1['text']?></p>
						<?$query1="select admin,id,name,date,text,rep_id,comment_id,date from new_madules_comment where type='$comment_type' and rep_id='{$RS1["comment_id"]}' and status=1";
						//echo $query1;
						$result1 = $coms_conect->query($query1);
						while($RS11 = $result1->fetch_assoc()) {?>
							<div class="media">
								<div class="media-left">
									<a href="#">
									<img class="media-object" src="<?=$subdomian_add?>/source/comsroot/default/dsl.jpg">
									</a>
								</div>
								<div class="media-body">
									 <div class="tools">
										 <div class="score pull-left">
											 <div class="up pull-right">
												<?$ide=$RS11["id"];
												$sql440="select count(id) as count from new_like where post_id='$ide' and rate=1  and type='$comment_type' and page_id='$madual_id' ";
												$result440 = $coms_conect->query($sql440);
												$row440 = $result440->fetch_assoc();
												$sql445="select count(id) as count from new_like where post_id='$ide' and rate=2  and type='$comment_type' and page_id='$madual_id' ";
												$result445 = $coms_conect->query($sql445);
												$row445 = $result445->fetch_assoc();
												?>
												<span><div id="like<?=$RS11["id"]?>"><?=$row440['count']?></div>
												</span>
												<a href="#" class="like_post" value="<?=$RS11["id"]?>" ><span class="fa fa-plus-square-o"></span></a>
											 </div>
											 <div class="down pull-left">
												 <span><div id="dislike<?=$RS11["id"]?>"><?=$row445['count']?></div></span><a href="#" class="dislike_post" value="<?=$RS11["id"]?>" ><span class="fa fa-minus-square-o"></span></a>
											 </div>
										 </div>
									 </div>
									<h4 class="media-heading"><?if($RS11['admin']==1)echo $new_admin; else echo $RS11['name']?></h4><?=miladitojalalidefult(date('Y-m-d H:i:m',$RS11['date']),$madual_lang);?>
									<p> <?= $RS11['text']?></p>
								</div>  
							</div>  
						<?}?>
					 </div>
				</li>
				<?}?>
			</ul>
 
	</fieldset>
	<style>
	.error{   
		color: red;
		float: right;
		font-size: small;
	}
	</style>				
	<script>
	$(".rep_comment").click(function () {
		$("#rep_comment_id").val($(this).attr('id'));
	});
	</script>
	<script>
	// JQuery Script to submit Form
	$(document).ready(function () {
		$('#show_comment_message_div').empty();
		$("#form-comment").validate({ 
				
			submitHandler : function () {
				 $("#show_pic_comment").show();
				// your function if, validate is success  
				$.ajax({
					type : "POST",
					url:'/New_ajax.php',
					data : 'action=add_comments&'+$('#form-comment').serialize(),
					success : function (data) {
						 $("#show_pic_comment").hide();
						 $('#show_comment_message_div').html(data);   
					}
				});
			},
			rules: {  
					name: "required",
					email: {
						required: true,
						email: true
					},
					comment: "required",
					com1_captcha: "required"
				},
			messages: {
					name:"<?=$view_field_required?>",
					email: {
						required: "<?=$view_field_required?>",
						email: "<?=$view_email_required?>",
					},
					comment: "<?=$view_field_required?>",
					com1_captcha: "<?=$view_field_required?>",
				}
		});
	});	
			$(".like_post").click(function (e) {
				e.preventDefault();
			
				var a="like"+$(this).attr('value');
				$.ajax({
					type:'POST',
					url:'/New_ajax.php',
					data:"action=like_posts&value=<?=$comment_type?>&id=<?=$madual_id?>&secend_value="+$(this).attr('value'),
					success: function(result){
					if(result>0)
						$("#"+a).html(result);	
					else if(result==-1)
						alert('<?=$view_already_voted?>')
						
					}
				});		
			});
			$(".dislike_post").click(function (e) {
				e.preventDefault()
				var a="dislike"+$(this).attr('value');
				$.ajax({
					type:'POST',
					url:'/New_ajax.php',
					data:"action=dislike_posts&value=<?=$comment_type?>&id=<?=$madual_id?>&secend_value="+$(this).attr('value'),
					success: function(result){
					if(result>0)
						$("#"+a).html(result);	
					else if(result==-1)
						alert('<?=$view_already_voted?>')
						
					}
				});		
			});
		

	</script>
</div>

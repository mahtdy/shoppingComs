  <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
                <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg">
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_faq2?></li>
                    </ol>
                </div>
            </section>
     
        <!-- End Header -->
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">
				<span class="fa fa-lightbulb-o"></span>
                <h1 class="title"><?=$view_faq2?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container">
            <main>
                <!-- Start Main -->
			<form   method='post' id='faq_search'>
                <div class="row faq">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <button type="button" onclick='window.location="/q_a_new/<?=$defult_lang?>"' class="btn btn-success fullwidth"><?=$view_send_question?></button>
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-7 col-sm-6 col-xs-12 pull-right rtl">
                        <div class="form-group">
                           <input name='faqq' id='faqq' value='<?=$faqq?>' class="form-control"></input>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12 pull-right">
                        <div class="form-group">
						<select class="form-control" id="faq_cat">
							<option value=0><?=$view_all_categories?></option>
							<?$query="SELECT * FROM new_q_a_cat where la='$defult_lang' and site='$defult_site' ";
								$result = $coms_conect->query($query);
								$i=1;
								while($RS1 = $result->fetch_assoc()) {
									echo "<option value='{$RS1['id']}'>{$RS1['name']}</option>";
								}?>
						</select>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12 pull-right">
                        <div class="form-group">
                            <button type="button" id="faq_btn" class="btn btn-success fullwidth">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
					<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
						   $("#faq_search").attr("action", "/q_a/<?=$defult_lang?>/" + $("#faqq").val());
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
						   $("#faq_search").attr("action", "/q_a/<?=$defult_lang?>/" + $("#faqq").val());
						   $("#faq_search").submit()
					});
					</script>
                    <hr>
					<img src='/waiting.gif' id="show_waiting" style="display:none">
                    <div id='show_faq' class="col-xs-12 ">
                        <ul id="faq_ajax" class="faqitems ">
						<?if($faqq)
							$faq_str="and  a.question like '%$faqq%'";
							$sql12 = "SELECT a.answer,a.question,a.id,a.status   from new_q_a  a,new_q_a_cat b  
							where a.id>0 and a.status=1 and a.cat_id=b.id and a.site='$defult_site' and a.la='$defult_lang' $faq_str 
							order by a.id desc limit 0,10";
							//  echo $sql12;
							$resultd1 = $coms_conect->query($sql12);$i=1;
							while($row = $resultd1->fetch_assoc()) {
								$id=$row['id'];
							?> 
							<li><a target='_blank' id='<?$row['id']?>' href="<?="/q_a/$defult_lang/$id/".insert_dash($row['question'])?>"><?=$row['question']?></a></li>
							<?}?>
                        </ul>
                    </div>
                    <div class="col-xs-12 moreitemsbtn">
                        <h4>
                            <a id="ajax_pagissssn" href="#"><span class="fa fa-plus"></span></a>
                        </h4>
						<input type='hidden' id="page_num" value="10">
                    </div>
                </div>
			</form>
                <!-- end main row -->
            </main>
			<?$_SESSION['edit_item']='change_q_a_cat_show';?>			
			<script>			
					$("#faq_cat").change(function () { 
						$("#page_num").val(10);
							$("#show_waiting").show();
							$("#show_faq").empty();	
							$.ajax({
								type:'POST',
								url:'/New_members_ajax.php',
								data:"action=change_q_a_cat&id="+$(this).val(),
								success: function(result){
									$("#show_waiting").hide();
									$("#show_faq").html(result);	
								}
							});	
					});
			</script>	
            <!-- end main -->
<script>
	$("#ajax_pagissssn").click(function (e) {
		var a=$("#page_num").val();
		var b=10+parseFloat(a);
		var c=parseFloat(a)-10;
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=show_q_n_pagin_ajax&secend_value="+$("#page_num").val()+"&id="+$('#faqq').val()+"&value="+$("#faq_cat").val(),
			success: function(result){
				$("#faq_ajax").append(result);
				$("#page_num").val(b);	
			}
		});	
	});
</script>
		</div>
        <!-- End main container -->
        <!-- Filehaye safhe------------------------------------------------------------------>
        <!-- Filehaye safhe------------------------------------------------------------------>
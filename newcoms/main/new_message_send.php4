<?##################چک کردن زبان#######################
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
	header('Location: new_manager_signout.php');
}
#########################چک کردن زیر سایت#############
$site_filter=injection_replace($_GET['site_filter']);
if(($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"])))
	header('Location: new_manager_signout.php');

#######################چک کردن کاربران#####################
$manager_filter=injection_replace($_GET['manager_filter']);
if($manager_filter>0&&!in_array($manager_filter,$_SESSION["manager_user_permisson"]))
	header('Location: new_manager_signout.php');
#########################################################		
$q=injection_replace($_GET['q']);


$recipient_email=injection_replace($_POST['recipient_email']);
$draft_status=injection_replace($_POST['draft_status']);
$recipient_subject=injection_replace($_POST['recipient_subject']);
$recipient_text=($_POST['recipient_text']);
$draft_id=($_POST['draft_id']);
if($draft_status==2){
	$query1="delete from new_contactus_pm where id='$draft_id'";
	$coms_conect->query($query1);
	show_msg("پیش نویس شما با موفقیت حذف گردید");
}
else if($recipient_email>""&&$recipient_subject>""&&$recipient_text>""&&$draft_status==0){
	$headers= 'MIME-Version: 1.0' . "\r\n";
	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers .= "From: {$_SESSION["manager_email"]}";
	$msg ="<div style='text-align:right;font-family:tahoma;'>"; 
	$msg .=$recipient_text;
	$msg .='</div>';
	$temp=$_SERVER['SERVER_NAME'];
	mail($recipient_email,$recipient_subject,$msg,$headers);
 	$arr_attach=array("subject"=>$recipient_subject,"rep_id"=>0,"email"=>$recipient_email,"text"=>$recipient_text,"user_id"=>$_SESSION['manager_id'],"date"=>time(),"type"=>1);
 	insert_to_data_base($arr_attach,'new_contactus_pm',$coms_conect); 
 	show_msg("ایمیل شما با موفقیت ارسال شد");
	
}else if($recipient_email>""&&$recipient_subject>""&&$recipient_text>""&&$draft_status==1){

		$arr_attach=array("subject"=>$recipient_subject,"email"=>$recipient_email,"text"=>$recipient_text,"user_id"=>$_SESSION['manager_id'],"date"=>time(),"ip"=>$custom_ip,"type"=>2,"name"=>$recipient_subject);
insert_to_data_base($arr_attach,'new_contactus_pm',$coms_conect);
	show_msg("ایمیل شما به پیش نویس ارسال شد");
}


$rep_comment_id=injection_replace($_POST['rep_comment_id']);
if($rep_comment_id>""||$draft_id>""){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
	$rep_comment_id=$draft_id;
	$comment_title=injection_replace($_POST['comment_title']);
	 
	$comment_text=injection_replace($_POST['comment_text']);

	$query="select email,user_id from new_contactus_pm  
	where  id=$rep_comment_id";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"]))
		sign_out();
	$headers=$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
	$text  =$comment_text;
	$to = $RS1['email'];
	$subject = $comment_title;
	$headers .= $_SERVER['HTTP_HOST'] . "\r\n" ;
	$_SESSION['active_email_member']=$user;
	mail($to,$subject,$text,$headers);
	$arr_attach=array("subject"=>$comment_title,"rep_id"=>$rep_comment_id,"email"=>$RS1['email'],"text"=>$comment_text,"user_id"=>$RS1["user_id"],"date"=>time(),"type"=>1);
 	insert_to_data_base($arr_attach,'new_contactus_pm',$coms_conect);


	$condition1="id=$draft_id";
	delete_from_data_base('new_contactus_pm',$condition1,$coms_conect);
	show_msg('ایمیل شما ارسال شد');
}
create_session_token();

?>
<script>
	$(document).ready(function(){
		$("#drop4").hide();

		var boxes = $('input.conchkNumber');
		boxes.on('change', function () {
			$('#drop4').toggleClass("desm", boxes.is(":checked"));
		});

		var boxall = $('input.conchkSelectAll');
		boxall.on('change', function () {
			$('#drop4').toggleClass("desm", boxall.is(":checked"));
		});
	});
</script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>
		<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title custom_align" id="Heading">حذف</h4>
					</div>
					<div class="modal-body">
						<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
					</div>
					<div class="modal-footer ">
						<button type="button" id="btn_ok_page" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
						<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
					</div>
				</div>
			</div>
		</div></fieldset>
</form>


<form class="form-horizontal" id="reply25" name="reply25" action="" role="form" method="post" enctype="multipart/form-data">
	<input name="rep_comment_id" id="rep_comment_id" type="hidden">
	<input name="draft_id" id="draft_id" type="hidden">
	<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
	<div class="modal fade" id="repeat" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header no-padding">
					<div class="table-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							<span class="white">&times;</span>
						</button>
						  پاسخ
					</div>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="inputEmail3" class="control-label">ایمیل</label>
						<div class="col-sm-12">
							<input  name="comment_email" id="comment_email" readonly  class="form-control" rows="3">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="control-label">  عنوان  </label>
						<div class="col-sm-12">
							<input  name="comment_title" id="comment_title" class="form-control" rows="3">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="control-label">  متن پاسخ    </label>
						<div class="col-sm-12">
							<textarea name="comment_text" id="comment_text" class="form-control" rows="3"></textarea>
							<script>
								tinymce.init({
									selector: "#comment_text",
									height: 300,
									width:"99.5%",
									directionality : 'rtl',
									language : 'fa_IR',
									menubar:true,

									skin: 'flat',
									plugins: [
										"advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
										"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
										"fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
									],

									image_advtab: true,
									toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",

									image_advtab: true ,
									external_filemanager_path:"/filemanager/",
									filemanager_title:"مديريت فايل" ,
									external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},

								});
							</script>
						</div>
					</div>
				</div>
				<div class="panel-footer bttools">
					<button type="submit" id="submit_page" class="btn btn-primary" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
				</div>
			</div>
		</div><!-- /.modal-dialog -->
	</div>
</form>



<div class="msheet tab-content" style="margin-top: 15px;">

	<div class="secfhead">
		<!-- #section:blocks/components.head -->
		<div class="sectitle">
			<div class="icon"><span class="flaticon-file23" style=""></span></div>
			<div class="title"><p class="titr">مدیریت پیام ها</p><p class="lead">توضیحات این بخش</p></div>
		</div>
		<!-- /section:blocks/components.head -->
		<div class="toolmenu">
			<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

			</ul>
		</div>

	</div>

	<div class="tt">
		<div class="row-fluid">
			<div class="col-xs-12" style="padding: 0;border-bottom: 1px solid #e7e7e7;margin-bottom: 10px;">

				<div class="form-group yepco" style="float:right;">
					<div class="pull-right btn-xs yepco">
						<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION["manager_title_site"])?>
					</div>
					<div class="pull-right   btn-xs yepco">
						<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
					</div>
					<div class="pull-right   btn-xs yepco">
						<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
					</div>
				</div>

			</div>


		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="row">
				<div class="col-xs-12">
					<!-- #section:pages/inbox -->
					<div class="tabbable">
						<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs sr-nav-tabs padding-16 tab-size-bigger tab-space-1">
							<!-- #section:pages/inbox.compose-btn -->
							

							<!-- /section:pages/inbox.compose-btn -->
							<li>
								<a href="newcoms.php?yep=new_inbox_list">
									<i class="blue ace-icon fa fa-inbox bigger-130"></i>
									<span class="bigger-110">صندوق پیام</span>
								</a>
							</li>

							<li>
								<a   href="newcoms.php?yep=new_sent_list">
									<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
									<span class="bigger-110">ارسال شده</span>
								</a>
							</li>

							<li>
								<a href="newcoms.php?yep=new_draft_list">
									<i class="sr-green ace-icon fa fa-pencil bigger-130"></i>
									<span class="bigger-110">پیش نویس</span>
								</a>
							</li>

						</ul>

						<div class="tab-content sr-tab-content no-border no-padding">
							<div id="sent" class="tab-pane fade in active">
								<div class="message-container">

								
									<div id="id-message-new-navbar" class=" message-navbar-sr clearfix">
										<div class="message-bar">
											<div class="message-toolbar">
												<button type="button" id="send_to_draft" class="btn btn-xs btn-white btn-primary">
													<i class="ace-icon fa fa-floppy-o bigger-125"></i>
													<span class="bigger-110">ذخیره پیش نویس</span>
												</button>

												<button type="button" id="delete_from_draft" class="btn btn-xs btn-white btn-primary">
													<i class="ace-icon fa fa-times bigger-125 orange2"></i>
													<span class="bigger-110">دور انداختن</span>
												</button>
											</div>
										</div>

										<div>
											

											<div class="messagebar-item-right">
																	<span class="inline btn-send-message">
																		<button type="button" id="send_email_btn" class="btn btn-sm btn-primary no-border btn-white btn-round">
																			<span class="bigger-110">ارسال</span>

																			<i class="ace-icon fa fa-arrow-left icon-on-right"></i>
																		</button>
																	</span>
											</div>
										</div>
									</div>
										
						
			<form id="send_email_form" method="post" action="" class=" form-horizontal message-form col-xs-12">
				<input type="hidden" id="check_value" name="check_value" value="0">
				<input id="draft_status" name="draft_status" value="0" type="hidden">
				<input id="draft_id" name="draft_id" value="" type="hidden">
				<!-- #section:pages/inbox.compose -->
				<div>
					<div class="form-group">
						<label class="col-sm-3 control-label sr-control-label no-padding-right" for="form-field-recipient">گیرنده:</label>

						<div class="col-sm-9">
							<span class="input-icon">
								<input type="email" name="recipient_email" id="form-field-recipient" data-value="alex@doe.com" value="" placeholder="گیرنده(ها)">
								<i class="ace-icon fa fa-user"></i>
							</span>
						</div>
					</div>

					<div class="hr hr-18 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label sr-control-label no-padding-right" for="form-field-subject">موضوع :</label>

						<div class="col-sm-6 col-xs-12">
							<div class="input-icon block col-xs-12 no-padding">
								<input maxlength="100" type="text" class="col-xs-12" name="recipient_subject" id="form-field-subject" placeholder="موضوع">
								<i class="ace-icon fa fa-comment-o"></i>
							</div>
						</div>
					</div>

					<div class="hr hr-18 dotted"></div>

					<div class="form-group">
						<label class="col-sm-3 control-label sr-control-label no-padding-right">
							<span class="inline space-24 hidden-480"></span>
							متن پیام :
						</label>

						<!-- #section:plugins/editor.wysiwyg -->
						<div class="col-sm-9">
							<textarea id="recipient_text" name="recipient_text"  class="form-control" rows="3"><?=$edit_text?></textarea>
							<script>
								tinymce.init({
									selector: "#recipient_text",
									height: 300,
									width:"99.5%",
									directionality : 'rtl',
									language : 'fa_IR',
									menubar:true,
									skin: 'flat',
									plugins: [
										"advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
										"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
										"fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
									],
									image_advtab: true,
									toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",
									image_advtab: true ,
									external_filemanager_path:"/filemanager/",
									filemanager_title:"مديريت فايل" ,
									external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
								});
							</script>
							<!--div class="wysiwyg-editor"></div-->
						</div>

						<!-- /section:plugins/editor.wysiwyg -->
					</div>

					<div class="hr hr-18 dotted"></div>


					<div class="space"></div>
				</div>

				<!-- /section:pages/inbox.compose -->
			</form>
									<!-- /section:pages/inbox.message-footer -->
								</div>
							</div>
						</div><!-- /.tab-content -->
					</div><!-- /.tabbable -->

					<!-- /section:pages/inbox -->
				</div><!-- /.col -->
			</div><!-- /.row -->




			<div class="  message-content" id="id-message-content">
			</div>





			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->

	<!--[if !IE]> -->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
	</script>

	<!-- <![endif]-->

	<!--[if IE]>
	<script type="text/javascript">
		window.jQuery || document.write("<script src='../assets/js/jquery1x.min.js'>"+"<"+"/script>");
	</script>
	<![endif]-->


	<!-- page specific plugin scripts -->
	<script src="/yep_theme/default/rtl/js/bootstrap-tag.min.js"></script>
	<script src="/yep_theme/default/rtl/js/jquery.hotkeys.min.js"></script>
	<script src="/yep_theme/default/rtl/js/bootstrap-wysiwyg.min.js"></script>



	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_email_pm&id="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_messages_management";
				}
			});
		});
		$("#read_email_contactus").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=read_email_contactus_status&id="+$("#check_value").val()+"&value=1",
				success: function(result){
					window.location.href = "newcoms.php?yep=new_messages_management";
				}
			});
		});
		$("#unread_email_contactus").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=read_email_contactus_status&id="+$("#check_value").val()+"&value=0",
				success: function(result){
					window.location.href = "newcoms.php?yep=new_messages_management";
				}
			});
		});

		$(document).on('click', '.singel_del', function(){
			$("#check_value").val($(this).attr('id'));
		});
		$(document).on('click', '.reply_email', function(){
			$("#rep_comment_id").val($(this).attr('id'));
			$("#comment_email").val($(this).data('email'));
		});


		$(document).on('click', '.send_drft', function(){
			$("#draft_id").val($(this).attr('id'));
			$("#comment_email").val($(this).data('email'));
			//$("#comment_text").val($(this).data('text'));
			$("#comment_title").val($(this).data('title'));
			tinyMCE.activeEditor.setContent($(this).data('text'));
		});


		$(document).on('click', '.conchkSelectAll', function() {
			//$('.conchkSelectAll').click( function() {
			$('.conchkNumber').prop('checked', $(this).is(':checked'));
			var values = $('input:checkbox:checked.conchkNumber').map(function () {
				return $(this).attr('id');
			}).get();
			$("#check_value").val(values);
		});
		$('.conchkNumber').click( function() {

			var values = $('input:checkbox:checked.conchkNumber').map(function () {
				return $(this).attr('id');
			}).get();

			$("#check_value").val(values);
		});


		$("#send_email_btn").on('click', function() {

			$("#send_email_form").submit();
		});

		$("#send_to_draft").on('click', function() {
			$("#draft_status").val(1);
			$("#send_email_form").submit();
		});
		$("#delete_from_draft").on('click', function() {
			$("#draft_status").val(2);
			$("#send_email_form").submit();
		});

		jQuery(function($){

			//handling tabs and loading/displaying relevant messages and forms
			//not needed if using the alternative view, as described in docs
			$('#inbox-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
				var currentTab = $(e.target).data('target');
				if(currentTab == 'write') {
					Sent.show_form();
				}
				else if(currentTab == 'sent') {
					Sent.show_list();
				}

			})



			//basic initializations
			$('.message-list .message-item input[type=checkbox]').removeAttr('checked');
			$('.message-list').on('click', '.message-item input[type=checkbox]' , function() {
				$(this).closest('.message-item').toggleClass('selected');
				if(this.checked) Sent.display_bar(1);//display action toolbar when a message is selected
				else {
					Sent.display_bar($('.message-list input[type=checkbox]:checked').length);
					//determine number of selected messages and display/hide action toolbar accordingly
				}
			});


			//check/uncheck all messages
			$('#id-toggle-all').removeAttr('checked').on('click', function(){
				if(this.checked) {
					Sent.select_all();
				} else Sent.select_none();
			});

			//select all
			$('#id-select-message-all').on('click', function(e) {
				e.preventDefault();
				Sent.select_all();
			});

			//select none
			$('#id-select-message-none').on('click', function(e) {
				e.preventDefault();
				Sent.select_none();
			});

			//select read
			$('#id-select-message-read').on('click', function(e) {
				e.preventDefault();
				Sent.select_read();
			});

			//select unread
			$('#id-select-message-unread').on('click', function(e) {
				e.preventDefault();
				Sent.select_unread();
			});

			/////////

			//display first message in a new area
			$('.message-list  .text').on('click', function() {

				//show the loading icon
				$('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');

				$('.message-inline-open').removeClass('message-inline-open').find('.message-content').remove();

				var message_list = $(this).closest('.message-list');

				$('#inbox-tabs a[href="#sent"]').parent().removeClass('active');
				//some waiting
				setTimeout(function() {

					//hide everything that is after .message-list (which is either .message-content or .message-form)
					message_list.next().addClass('hide');
					$('.message-container').find('.message-loading-overlay').remove();

					//close and remove the inline opened message if any!

					//hide all navbars
					$('.message-navbar-sr').addClass('hide');
					//now show the navbar for single message item
					$('#id-message-item-navbar').removeClass('hide');

					//hide all footers
					$('.message-footer').addClass('hide');
					//now show the alternative footer
					$('.message-footer-style2').removeClass('hide');


					//move .message-content next to .message-list and hide .message-list
					$('.message-content').removeClass('hide').insertAfter(message_list.addClass('hide'));

					//add scrollbars to .message-body
					$('.message-content .message-body').ace_scroll({
						size: 150,
						mouseWheelLock: true,
						styleClass: 'scroll-visible'
					});

				}, 500 + parseInt(Math.random() * 500));
				$("#id-message-content").empty();
				$.ajax({

					type:'POST',
					url:'New_ajax.php',
					data:"action=show_contactus_status&id="+$(this).attr('id'),
					success: function(result){
						$("#id-message-content").html(result);
					}
				});



			});


			//display second message right inside the message list
			$('.message-list .message-item:eq(1) .text').on('click', function(){
				var message = $(this).closest('.message-item');

				//if message is open, then close it
				if(message.hasClass('message-inline-open')) {
					message.removeClass('message-inline-open').find('.message-content').remove();
					return;
				}

				$('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');
				setTimeout(function() {
					$('.message-container').find('.message-loading-overlay').remove();
					message
						.addClass('message-inline-open')
						.append('<div class="message-content" />')
					var content = message.find('.message-content:last').html( $('#id-message-content').html() );

					//remove scrollbar elements
					content.find('.scroll-track').remove();
					content.find('.scroll-content').children().unwrap();

					content.find('.message-body').ace_scroll({
						size: 150,
						mouseWheelLock: true,
						styleClass: 'scroll-visible'
					});

				}, 500 + parseInt(Math.random() * 500));

			});



			//back to message list
			$('.btn-back-message-list').on('click', function(e) {

				e.preventDefault();
				$('#inbox-tabs a[href="#sent"]').tab('show');
				$('.message-list').removeClass('hide');
				$('.message-footer').removeClass('hide');
				$('.message-content').addClass('hide');
				$('#id-message-item-navbar').addClass('hide');
				$('#id-message-list-navbar').removeClass('hide');
				$('#id-message-new-navbar').addClass('hide');
				$('#send_email_form').addClass('hide');
				$('#id-message-title-navbar').removeClass('hide');
			});



			//hide message list and display new message form
			/**
			 $('.btn-new-mail').on('click', function(e){
					e.preventDefault();
					Sent.show_form();
				});
			 */




			var Sent = {
				//displays a toolbar according to the number of selected messages
				display_bar : function (count) {
					if(count == 0) {
						$('#id-toggle-all').removeAttr('checked');
						$('#id-message-list-navbar .message-toolbar').addClass('hide');
						$('#id-message-list-navbar .message-infobar').removeClass('hide');
					}
					else {
						$('#id-message-list-navbar .message-infobar').addClass('hide');
						$('#id-message-list-navbar .message-toolbar').removeClass('hide');
					}
				}
				,
				select_all : function() {
					var count = 0;
					$('.message-item input[type=checkbox]').each(function(){
						this.checked = true;
						$(this).closest('.message-item').addClass('selected');
						count++;
					});

					$('#id-toggle-all').get(0).checked = true;

					Sent.display_bar(count);
				}
				,
				select_none : function() {
					$('.message-item input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');
					$('#id-toggle-all').get(0).checked = false;

					Sent.display_bar(0);
				}
				,
				select_read : function() {
					$('.message-unread input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

					var count = 0;
					$('.message-item:not(.message-unread) input[type=checkbox]').each(function(){
						this.checked = true;
						$(this).closest('.message-item').addClass('selected');
						count++;
					});
					Sent.display_bar(count);
				}
				,
				select_unread : function() {
					$('.message-item:not(.message-unread) input[type=checkbox]').removeAttr('checked').closest('.message-item').removeClass('selected');

					var count = 0;
					$('.message-unread input[type=checkbox]').each(function(){
						this.checked = true;
						$(this).closest('.message-item').addClass('selected');
						count++;
					});

					Sent.display_bar(count);
				}
			}

			//show message list (back from writing mail or reading a message)
			Sent.show_list = function() {
				$('.message-navbar-sr').addClass('hide');
				$('#id-message-list-navbar').removeClass('hide');

				$('.message-footer').addClass('hide');
				$('.message-footer:not(.message-footer-style2)').removeClass('hide');

				$('.message-list').removeClass('hide').next().addClass('hide');
				//hide the message item / new message window and go back to list
			}

			//show write mail form
			Sent.show_form = function() {
				if($('.message-form').is(':visible')) return;
				if(!form_initialized) {
					initialize_form();
				}


				var message = $('.message-list');
				$('.message-container').append('<div class="message-loading-overlay"><i class="fa-spin ace-icon fa fa-spinner orange2 bigger-160"></i></div>');

				setTimeout(function() {
					message.next().addClass('hide');

					$('.message-container').find('.message-loading-overlay').remove();

					$('.message-list').addClass('hide');
					$('.message-footer').addClass('hide');
					$('.message-form').removeClass('hide').insertAfter('.message-list');

					$('.message-navbar-sr').addClass('hide');
					$('#id-message-new-navbar').removeClass('hide');


					//reset form??
					$('.message-form .wysiwyg-editor').empty();

					$('.message-form .ace-file-input').closest('.file-input-container:not(:first-child)').remove();
					$('.message-form input[type=file]').ace_file_input('reset_input');

					$('.message-form').get(0).reset();

				}, 300 + parseInt(Math.random() * 300));
			}




			var form_initialized = false;
			function initialize_form() {
				if(form_initialized) return;
				form_initialized = true;

				//intialize wysiwyg editor
				$('.message-form .wysiwyg-editor').ace_wysiwyg({
					toolbar:
						[
							'bold',
							'italic',
							'strikethrough',
							'underline',
							null,
							'justifyleft',
							'justifycenter',
							'justifyright',
							null,
							'createLink',
							'unlink',
							null,
							'undo',
							'redo'
						]
				}).prev().addClass('wysiwyg-style1');



				//file input
				$('.message-form input[type=file]').ace_file_input()
					.closest('.ace-file-input')
					.addClass('width-90 inline')
					.wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>');

				//Add Attachment
				//the button to add a new file input
				$('#id-add-attachment')
					.on('click', function(){
						var file = $('<input type="file" name="attachment[]" />').appendTo('#form-attachments');
						file.ace_file_input();

						file.closest('.ace-file-input')
							.addClass('width-90 inline')
							.wrap('<div class="form-group file-input-container"><div class="col-sm-7"></div></div>')
							.parent().append('<div class="action-buttons sr-action-buttons pull-left col-xs-1">\
							<a href="#" data-action="delete" class="middle">\
								<i class="ace-icon fa fa-trash-o red bigger-130 middle"></i>\
							</a>\
						</div>')
							.find('a[data-action=delete]').on('click', function(e){
							//the button that removes the newly inserted file input
							e.preventDefault();
							$(this).closest('.file-input-container').hide(300, function(){ $(this).remove() });
						});
					});
			}//initialize_form

			//turn the recipient field into a tag input field!
			/**
			 var tag_input = $('#form-field-recipient');
			 try { 
					tag_input.tag({placeholder:tag_input.attr('placeholder')});
				} catch(e) {}


			 //and add form reset functionality
			 $('#id-message-form').on('reset', function(){
					$('.message-form .message-body').empty();
					
					$('.message-form .ace-file-input:not(:first-child)').remove();
					$('.message-form input[type=file]').ace_file_input('reset_input_ui');
			
					var val = tag_input.data('value');
					tag_input.parent().find('.tag').remove();
					$(val.split(',')).each(function(k,v){
						tag_input.before('<span class="tag">'+v+'<button class="close" type="button">&times;</button></span>');
					});
				});
			 */

		});
	</script>

</div>
							

 
 <?$_SESSION['add_commnet']=1;?> 	
	<div class="modal fade" id="replyModal" role="dialog"> 
            <div class="modal-dialog"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><span class="fa fa-comments-o" style="margin-left: 5px;"></span><?=$view_send_reply_comment?></h4>
                    </div>
					<br>
					<div id="show_popup_comment_message"></div>  
                    <div class="modal-body" style="display: inline-block;">
	 					<form action="" method="post" id="popupcomment_validate">
						<input class="inputh" type="hidden" value="<?=$madual_id?>" name="madual_id" >
						<input class="inputh" type="hidden" id="rep_comment_id" name="rep_comment_id" >
						<input class="inputh" type="hidden" value="<?=$comment_type?>" id="popup_comment_type" name="popup_comment_type" >
						<div class="col-md-7 col-xs-12 pull-right form-group">
							<input style="text-align: right" name='rep_name' class="form-control" placeholder="<?=$view_name_family?>" required>
                        </div>
                        <div class="col-md-7 col-xs-12 pull-right form-group">
                             <input style="text-align: right" name='rep_email' type="email" class="form-control" placeholder="<?=$view_email?>" required>
                        </div>
						<div class="col-xs-12 pull-right form-group">
                              <textarea style="text-align: right" name='rep_comment' class="form-control" rows="5" placeholder="<?=$view_text_comment?>" required></textarea>
                        </div>
						<div class="col-xs-12 pull-right form-group">
							<div class="row">
								<div class="col-md-2 col-xs-4">
									<img  src="<?crate_capcha_pic($madual_lang)?>" style="margin-top: 5%;height: 26px;"/>
								</div>
								<div class="col-md-10 col-xs-8">
									<input type="text" style="text-align: right" class="form-control" name="rep_com1_captcha" placeholder="<?=$view_code_captcha?>" required>
								</div>
							</div>
						</div>
						 
                        <div class="col-xs-12 pull-right form-group">
                            <button type="submit" class="btn btn-success col-xs-12"><?=$view_send?></button>
							<img src="/waiting.gif" id="show_pop_pic_comment" style="display:none">
                        </div>	
						
</form>	
					
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
           </div>
        </div>
<div id="message"></div>		
 <script src="<?=$subdomian_add?>/yep_theme/default/rtl/js/js-validate/jquery.validate.js"></script>
<script>
// JQuery Script to submit Form
$(document).ready(function () {
		 
    $("#popupcomment_validate").validate({
	 
        submitHandler : function () {
			 $("#show_pop_pic_comment").show();
            // your function if, validate is success
            $.ajax({
                type : "POST",
               url:'/New_ajax.php',
                data : 'action=add_comments_answer&'+$('#popupcomment_validate').serialize(),
                success : function (data) {
					 $("#show_pop_pic_comment").hide();
                    $('#show_popup_comment_message').html(data);
                }
            });
        },
		rules: {
				rep_name: "required",
				rep_email: {
					required: true,
					email: true
				},
				rep_comment: "required",
				rep_com1_captcha: "required"
			},
		messages: {
				rep_name:"<?=$view_field_required?>",
				rep_email: {
					required: "<?=$view_field_required?>",
					email: "<?=$view_email_required?>",
				},
				rep_comment: "<?=$view_field_required?>",
				rep_com1_captcha: "<?=$view_field_required?>",
			}
    });
});	
</script>		


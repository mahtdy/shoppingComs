<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<form action='/login/<?=$defult_lang?>' method="post" id="member_attributeForm"
			data-fv-framework="bootstrap"
			data-fv-message="This value is not valid"
			data-fv-icon-validating="glyphicon glyphicon-refresh">
			<input type='hidden' name='modal_lock_url' value='<?=$url?>'>
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span class="fa fa-user"></span><?=$view_login_account?></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input class="form-control" name="modal_user" placeholder="<?=$view_username?>"
					data-fv-message="<?=$view_notvalid_username?>"

					data-fv-notempty="true"
					data-fv-notempty-message="<?=$view_field_required?>"
	 
					data-fv-regexp="true"
					data-fv-regexp-regexp="^[a-zA-Z0-9_\.]+$"
					data-fv-regexp-message="<?=$view_username_point_num_letter?>"
	 
					data-fv-stringlength="true"
					data-fv-stringlength-min="6"
					data-fv-stringlength-max="30"
					data-fv-stringlength-message="<?=$view_username_character?>"></input>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="modal_password" placeholder="<?=$view_password?>"
					data-fv-notempty="true"
					data-fv-notempty-message="<?=$view_field_required?>"></input>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-3 ">
							 <img src="<?crate_capcha_pic($madual_lang)?>" style="width:73%" > 
						</div>	
						<div class="col-md-9 ">
							<input  name="modal_com1_captcha" class="form-control" placeholder="<?=$view_code_captcha?>"
							data-fv-notempty="true"
							data-fv-notempty-message="<?=$view_field_required?>"
							
							data-fv-numeric="true"
							data-fv-numeric-message="<?=$view_number_required?>"></input>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<button type='button' onclick='window.location="/register/<?=$defult_lang?>"' class="btn btn-warning"><?=$view_register?></button>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-success"><?=$view_login?></button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="/reset_password/<?=$defult_lang?>"><p><span class="fa fa-repeat"></span> <?=$view_password_reset?></p></a>
			</div>
		</div>
		</form>
	</div>
</div>


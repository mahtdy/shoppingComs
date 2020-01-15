<script src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>
	
<script type="text/javascript">
	jQuery(function($){
	
		$('.dd').nestable();
	
		$('.dd-handle a').on('mousedown', function(e){
			e.stopPropagation();
		});
		
		$('[data-rel="tooltip"]').tooltip();
	
	});
</script>

<form class="form-horizontal" id="shop" name="shop" action="" role="form" method="post" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف دسته زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
</form>


	<div class="page-content-area">
		<div class="page-header">
			<h1>دسته بندی محصولات</h1>
		</div>
		<div class="page-body">
					 
					<div class="row-fluid"> 
						<div class="col-md-12">
							<div class="row-fluid"> 
							<div class="col-md-6">
							
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">دسته ها</h3>
									</div>
									<div class="panel-body">
								<form id="shop_cate" name="shop_cate" action="" role="form" method="post" enctype="multipart/form-data">
								
											<div class="form-group">
												<label class="col-md-3 control-label" for="family">شاخه</label> 
												<div class="form-group col-md-9">
													<select name="dropdown" class="form-control" rows="3">
														<option value=""></option> 
														<option value="1">شاخه اصلی</option> 
														<option value="2">شاخه فرعی</option>
														<option value="3">شاخه 1</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="group_name" style="padding-right: 0px;">عنوان زیر مجموعه</label> 
												<div class="form-group col-md-9">
													<input type="text" name="onvan_majmoee" id="onvan_majmoee" class="form-control" >									
												</div>
											</div>
									
									</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
											</div>
								</form>
								</div>	
							</div>
							
							<div class="col-md-6">
							
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">مرتب سازی دسته ها</h3>
									</div>
									
									
									<div class="panel-body">
									<form class="form-horizontal" id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">
								
										<div class="dd" id="nestable">
											<ol class="dd-list">
												<li class="dd-item" data-id="1">
													<div class="dd-handle">
														دسته بندی 1
															<div class="pull-right action-buttons">
																<a class="blue" href="/newcoms.php?dll=new_dl_cat&la=fa#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>
													</div>
													
													<ol class="dd-list">
														<li class="dd-item" data-id="3">
															<div class="dd-handle">
															دسته بندی 1-1
																<div class="pull-right action-buttons">
																	<a class="blue" href="/newcoms.php?dll=new_dl_cat&la=fa#">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																		<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>
															</div>
														</li>

														<li class="dd-item" data-id="4">
															<div class="dd-handle">
																<span class="primary">دسته بندی 1-1-1</span>
														
																<div class="pull-right action-buttons">
																	<a class="blue" href="/newcoms.php?dll=new_dl_cat&la=fa#">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																		<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>
															</div>
														</li>
													</ol>
												</li>
												
											</ol>
										</div>
									
										<div class="dd" id="nestable">
										<ol class="dd-list">
											<li class="dd-item" data-id="1">
												<div class="dd-handle">
													دسته بندی 2
														<div class="pull-right action-buttons">
															<a class="blue" href="/newcoms.php?dll=new_dl_cat&la=fa#">
																<i class="ace-icon fa fa-pencil bigger-130"></i>
															</a>

															<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																<i class="ace-icon fa fa-trash-o bigger-130"></i>
															</a>
														</div>
												</div>
											</li>
										</ol>												
										</div>	
													
									</div>	
									
									<div class="panel-footer">	
										<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ذخیره</button>
									</div>	
									</form>
								</div>
								
							</div>
							</div>
						</div> 
					</div>
					
		</div>
	</div>	
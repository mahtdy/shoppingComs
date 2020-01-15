										$("#add_to_favorite").click(function (e) {
											e.preventDefault();
												$.ajax({
													type:'POST',
													url:'/New_members_ajax.php',
													data:"action=add_to_favorite&id=<?=$url?>",
													success: function(result){
														if(result==0){
															alert('این صفحه از لیست علاقه مندی شما خارج شد');
															$("#favorite_span").toggleClass('fa-heart  fa-heart-o');
														}
														else{
															alert('این صفحه به لیست علاقمندی های شما اضافه گردید');
															$("#favorite_span").toggleClass('fa-heart-o  fa-heart');
														}
													}
												});		
											});
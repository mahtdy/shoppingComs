<div class="block hidden-xs" style="margin-top: -30px;">
	<div class="header">
		<h5 class="H_block_h3 H_center"><span><?=$new_sysmenu[140]?></span></h5>
	</div> 
 			
<div class="" id="jstree-proton-2" style="direction:rtl; padding:20px;margin-bottom: 20px;     box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);" >
 
			 	<!--ul class="list-group">
				<?$sql122 = "SELECT name,id,la from  new_modules_cat 
					where  status=1  and  la='$defult_lang' and type=100 
					order by id desc";
					//   echo $sql122;exit;
					$resultd12 = $coms_conect->query($sql122);$i=1;
					while($row2 = $resultd12->fetch_assoc()) {?>
				  <a href="<?="/faq/{$row2['la']}/cat_id/{$row2['id']}"?>" class="list-group-item faq"><span class="fa fa-folder"></span> <?=$row2['name']?> <span class="pull-left badge"><?=get_result("select count(id) from new_faq where la='$defult_lang' and cat_id={$row2['id']}",$coms_conect);?></span></a>
				<?}?>  
				</ul-->
 
</div>
	<a class="btn btn-block" id="btn-newfaq" href="/faq/<?=$defult_lang?>/new"> پرسش جدید دارید؟ <i class="fa fa-send"></i></a>
 
<?$cat_arr[]="";$edit_id=0;?>
<script>
$(function() {
	$('#jstree-proton-2').jstree({
		'plugins': ['core', 'themes', 'json', "json_data"],
		'checkbox': { //new config
		'keep_selected_style': true,
		'three_state': false,
		'tie_selection':true,
		'cascade':'up'
		},
		'core': {
		'data': [<?creat_first_faq_cat(0,100,$coms_conect,$defult_lang);?>],
		'themes': {
		 'name': 'proton',
		 'responsive': true  
		}
		}
	}).bind("select_node.jstree", function (e, data) {
		 var href = data.node.a_attr.href;
		 var parentId = data.node.a_attr.parent_id;
		 if(href == '#')
		 return '';
		 window.open(href);
	})

});

$(function () {
	$('#jstree-proton-2').jstree({'plugins':["wholerow","checkbox"]});
	$('#jstree-proton-2').on("changed.jstree", function (event, data) {
		$("#array_value").val(data.selected);
	});
});
</script>								
			
			
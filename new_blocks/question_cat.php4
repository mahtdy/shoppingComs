<div class="block hidden-xs">
	<div class="header">
		<h5 class="H_block_h3 H_center"><span><?=$new_sysmenu[151]?></span></h5>
	</div>
<div class="" id="jstree-proton-22" style="direction:rtl; padding:20px;margin-bottom: 20px;     box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);" ></div>
<a class="btn btn-block" id="btn-newfaq" href="/question/<?=$defult_lang?>/new"> پرسش جدید دارید؟ <i class="fa fa-send"></i></a>
 
<?$cat_arr[]="";$edit_id=0;?>
<script>
$(function() {
	$('#jstree-proton-22').jstree({
		'plugins': ['core', 'themes', 'json', "json_data"],
		'checkbox': { //new config
		'keep_selected_style': true,
		'three_state': false,
		'tie_selection':true,
		'cascade':'up'
		},
		'core': {
		'data': [<?creat_first_faq_cat(0,99,$coms_conect,$defult_lang,'question');?>],
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
	$('#jstree-proton-22').jstree({'plugins':["wholerow","checkbox"]});
	$('#jstree-proton-22').on("changed.jstree", function (event, data) {
		$("#array_value").val(data.selected);
	});
});
</script>								
			
			
var DataSourceTree = function(options) {
	this._data 	= options.data;
	this._delay = options.delay;
}

DataSourceTree.prototype.data = function(options, callback) {
	var self = this;
	var $data = null;

	if(!("name" in options) && !("type" in options)){
		$data = this._data;//the root tree
		callback({ data: $data });
		return;
	}
	else if("type" in options && options.type == "folder") {
		if("additionalParameters" in options && "children" in options.additionalParameters)
			$data = options.additionalParameters.children;
		else $data = {}//no data
	}
	
	if($data != null)//this setTimeout is only for mimicking some random delay
		setTimeout(function(){callback({ data: $data });} , parseInt(Math.random() * 500) + 200);

	//we have used static data here
	//but you can retrieve your data dynamically from a server using ajax call
	//checkout examples/treeview.html and examples/treeview.js for more info
};

var tree_data = {

	'1' : {name: 'ویندوز', type: 'folder'}	,
	'tickets' : {name: 'امنیت', type: 'item'}	,
	'services' : {name: 'مدیریت', type: 'item'}	,
	'personals' : {name: 'شخصی', type: 'item'}
}

tree_data['1']['additionalParameters'] = {
	'children' : {
		'cars' : {name: 'Cars', type: 'folder'},
		'motorcycles' : {name: 'Motorcycles', type: 'item'},
		'boats' : {name: 'Boats', type: 'item'}
	}
}

tree_data['1']['additionalParameters']['children']['cars']['additionalParameters'] = {
	'children' : {
		'classics' : {name: 'Classics', type: 'folder'},
		'convertibles' : {name: 'Convertibles', type: 'item'},
	}
}
tree_data['1']['additionalParameters']['children']['cars']['additionalParameters']['children']['classics']['additionalParameters'] = {
	'children' : {
		'classics' : {name: 'Classsssics', type: 'folder'},
		'convertibles' : {name: 'Convertibles', type: 'item'},
	}
}
var treeDataSource = new DataSourceTree({data: tree_data});
var ace_icon = ace.vars['icon'];
<?php
if (session_id() == '') session_start();

mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Rome');

/*
|--------------------------------------------------------------------------
| Optional security
|--------------------------------------------------------------------------
|
| if set to true only those will access RF whose url contains the access key(akey) like:
| <input type="button" href="../filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey" value="Files">
| in tinymce a new parameter added: filemanager_access_key:"myPrivateKey"
| example tinymce config:
|
| tiny init ...
| external_filemanager_path:"../filemanager/",
| filemanager_title:"Filemanager" ,
| filemanager_access_key:"myPrivateKey" ,
| ...
|
*/
$user_id=$_SESSION["manager_id"];
include("../newcoms/Database.php");
include("../newcoms/jdf.php");

function decrypt_data1($str,$key){
	return $str;
	return mcrypt_ecb (MCRYPT_3DES, $key, $str, MCRYPT_DECRYPT);
} 

$key="yamahdiyaaliyahosionyepp";
$query12="select * from new_servers where status=1";
$result12 = $coms_conect->query($query12);
$RS02 = $result12->fetch_assoc();


 
$RS02['ftp_server_username']=decrypt_data1($RS02['ftp_server_username'],$key);
$RS02['ftp_server_username']= rtrim($RS02['ftp_server_username'], "\0")	;;

$RS02['ftp_server_password']=decrypt_data1($RS02['ftp_server_password'],$key);
$RS02['ftp_server_password']= rtrim($RS02['ftp_server_password'], "\0")	;

 
 

$query2="select * from new_filemanager_setting where user_id=$user_id";
$result2 = $coms_conect->query($query2);
while($RS22 = $result2->fetch_assoc()){
	$arr=$RS22['name'];
	$RS2[$arr]=$RS22['value'];	
}

$RS2['hidden_files']=explode(",",$RS2['hidden_files']);
$RS2['hidden_folders']=explode(",",$RS2['hidden_folders']);
$RS2['ext_img']=explode(",",$RS2['ext_img']);
$RS2['ext_img']=tr_num($RS2['ext_img'],$mod='en',$mf='٫');
$RS2['ext_video']=explode(",",$RS2['ext_video']);
$RS2['ext_video']=tr_num($RS2['ext_video'],$mod='en',$mf='٫');
$RS2['ext_music']=explode(",",$RS2['ext_music']);
$RS2['ext_music']=tr_num($RS2['ext_music'],$mod='en',$mf='٫');
$RS2['ext_misc']=explode(",",$RS2['ext_misc']);
$RS2['ext_misc']=tr_num($RS2['ext_misc'],$mod='en',$mf='٫');
$RS2['ext_file']=explode(",",$RS2['ext_file']);
$RS2['ext_file']=tr_num($RS2['ext_file'],$mod='en',$mf='٫');  
$RS2['googledoc_file_exts']=explode(",",$RS2['googledoc_file_exts']);  
$RS2['googledoc_file_exts']=tr_num($RS2['googledoc_file_exts'],$mod='en',$mf='٫'); 
$RS2['editable_text_file_exts']=explode(",",$RS2['editable_text_file_exts']);  
$RS2['editable_text_file_exts']=tr_num($RS2['editable_text_file_exts'],$mod='en',$mf='٫'); 
$RS2['viewerjs_file_exts']=explode(",",$RS2['viewerjs_file_exts']); 
$RS2['viewerjs_file_exts']=tr_num($RS2['viewerjs_file_exts'],$mod='en',$mf='٫');  
 
if($RS2['active_watermark']==0)
	$RS2['watermark_image']=false;
//else
	//$RS2['watermark_image']='"'.$RS2['watermark_image'].'"';
//echo $RS2['watermark_image'];

if($RS2['active_ftp']==0)
	$RS02['ftp_host']=false;
 
//echo $RS2['ext_img']; 

define('USE_ACCESS_KEYS', false); // TRUE or FALSE

/*
|--------------------------------------------------------------------------
| DON'T COPY THIS VARIABLES IN FOLDERS config.php FILES
|--------------------------------------------------------------------------
*/

define('DEBUG_ERROR_MESSAGE', true); // TRUE or FALSE

/*
|--------------------------------------------------------------------------
| Path configuration
|--------------------------------------------------------------------------
| In this configuration the folder tree is
| root
|    |- source <- upload folder
|    |- thumbs <- thumbnail folder [must have write permission (755)]
|    |- filemanager
|    |- js
|    |   |- tinymce
|    |   |   |- plugins
|    |   |   |   |- responsivefilemanager
|    |   |   |   |   |- plugin.min.js
*/ 
 //print_r($RS2);exit;
$config = array(

	/*
	|--------------------------------------------------------------------------
	| DON'T TOUCH (base url (only domain) of site).
	|--------------------------------------------------------------------------
	|
	| without final / (DON'T TOUCH)
	|
	*/
	'base_url' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && ! in_array(strtolower($_SERVER['HTTPS']), array( 'off', 'no' ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'],

	/*
	|--------------------------------------------------------------------------
	| path from base_url to base of upload folder
	|--------------------------------------------------------------------------
	|
	| with start and final /
	|
	*/
	'upload_dir' => "{$RS2['main_folder']}",
	/*
	|--------------------------------------------------------------------------
	| relative path from filemanager folder to upload folder
	|--------------------------------------------------------------------------
	|
	| with final /
	|
	*/
	'current_path' => "{$RS2['main_path']}",

	/*
	|--------------------------------------------------------------------------
	| relative path from filemanager folder to thumbs folder
	|--------------------------------------------------------------------------
	|
	| with final /
	| DO NOT put inside upload folder
	|
	*/
	'thumbs_base_path' =>  "{$RS2['thumb_path']}",


	/*
	|--------------------------------------------------------------------------
	| FTP configuration BETA VERSION
	|--------------------------------------------------------------------------
	|
	| If you want enable ftp use write these parametres otherwise leave empty
	| Remember to set base_url properly to point in the ftp server domain and 
	| upload dir will be ftp_base_folder + upload_dir so without final /
	|
	*/
	'ftp_host'         => $RS02['ftp_host'],
	'ftp_user'         =>  "{$RS02['ftp_server_username']}",
	'ftp_pass'         =>  "{$RS02['ftp_server_password']}",
	'ftp_base_folder'  => "",
	'ftp_base_url'     =>  "{$RS02['ftp_base_url']}",
	/* --------------------------------------------------------------------------
	| path from ftp_base_folder to base of thumbs folder with start and final |
	|--------------------------------------------------------------------------*/
	'ftp_thumbs_dir' => "{$RS2['ftp_thumb']}",
	'ftp_ssl' => false,
	'ftp_port' =>  $RS2['ftp_port'],


	// 'ftp_host'         => "s108707.gridserver.com",
	// 'ftp_user'         => "test@responsivefilemanager.com",
	// 'ftp_pass'         => "Test.1234",
	// 'ftp_base_folder'  => "/domains/responsivefilemanager.com/html",


	/*
	|--------------------------------------------------------------------------
	| Access keys
	|--------------------------------------------------------------------------
	|
	| add access keys eg: array('myPrivateKey', 'someoneElseKey');
	| keys should only containt (a-z A-Z 0-9 \ . _ -) characters
	| if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
	| $username = 'Admin';
	| $salt = 'dsflFWR9u2xQa' (a hard coded string)
	| $akey = md5($username.$salt);
	| DO NOT use 'key' as access key!
	| Keys are CASE SENSITIVE!
	|
	*/

	'access_keys' => array(),

	//--------------------------------------------------------------------------------------------------------
	// YOU CAN COPY AND CHANGE THESE VARIABLES INTO FOLDERS config.php FILES TO CUSTOMIZE EACH FOLDER OPTIONS
	//--------------------------------------------------------------------------------------------------------

	/*
	|--------------------------------------------------------------------------
	| Maximum size of all files in source folder
	|--------------------------------------------------------------------------
	|
	| in Megabytes
	|
	*/
	'MaxSizeTotal' => $RS2['max_upload_file_on_folder'],

	/*
	|--------------------------------------------------------------------------
	| Maximum upload size
	|--------------------------------------------------------------------------
	|
	| in Megabytes
	|
	*/
	'MaxSizeUpload' => "{$RS2['max_upload_file']}",

	/*
	|--------------------------------------------------------------------------
	| File and Folder permission
	|--------------------------------------------------------------------------
	|
	*/
	'fileFolderPermission' => 0755,


	/*
	|--------------------------------------------------------------------------
	| default language file name
	|--------------------------------------------------------------------------
	*/
	'default_language' => "fa",

	/*
	|--------------------------------------------------------------------------
	| Icon theme
	|--------------------------------------------------------------------------
	|
	| Default available: ico and ico_dark
	| Can be set to custom icon inside filemanager/img
	|
	*/
	'icon_theme' =>  "{$RS2['default_show_filemanager']}",


	//Show or not total size in filemanager (is possible to greatly increase the calculations)
	'show_total_size'						=>  $RS2['show_total_size'],
	//Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
	'show_folder_size'						=> $RS2['show_folder_size'],
	//Show or not show sorting feature in filemanager
	'show_sorting_bar'						=> $RS2['show_sorting_bar'],
	//Show or not show filters button in filemanager
	'show_filter_buttons'                   => true,
	//Show or not language selection feature in filemanager
	'show_language_selection'				=> $RS2['show_language_selection'],
	//active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
	'transliteration'						=> false,
	//convert all spaces on files name and folders name with $replace_with variable
	'convert_spaces'						=> $RS2['convert_spaces'],
	//convert all spaces on files name and folders name this value
	'replace_with'							=> "_",
	//convert to lowercase the files and folders name
	'lower_case'							=> $RS2['lower_case'],

	//Add ?484899493349 (time value) to returned images to prevent cache
	'add_time_to_img'                       => false,

	// -1: There is no lazy loading at all, 0: Always lazy-load images, 0+: The minimum number of the files in a directory
	// when lazy loading should be turned on.
	'lazy_loading_file_number_threshold'	=> 0,


	//*******************************************
	//Images limit and resizing configuration
	//*******************************************

	// set maximum pixel width and/or maximum pixel height for all images
	// If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected
	// if you don't need a limit set both to 0
	'image_max_width'                         => $RS2['image_max_width'],
	'image_max_height'                        => $RS2['image_max_height'],
	'image_max_mode'                          => "{$RS2['image_max_mode']}",
	/*
	#  $option:  0 / exact = defined size;
	#            1 / portrait = keep aspect set height;
	#            2 / landscape = keep aspect set width;
	#            3 / auto = auto;
	#            4 / crop= resize and crop;
	*/

	//Automatic resizing //
	// If you set $image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension
	// If you set width or height to 0 the script automatically calculates the other dimension
	// Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit
	'image_resizing'                          => false,
	'image_resizing_width'                    => 0,
	'image_resizing_height'                   => 0,
	'image_resizing_mode'                     => 'auto', // same as $image_max_mode
	'image_resizing_override'                 => false,
	// If set to TRUE then you can specify bigger images than $image_max_width & height otherwise if image_resizing is
	// bigger than $image_max_width or height then it will be converted to those values


	//******************
	//
	// WATERMARK IMAGE
	// 
	//Watermark url or false
	'image_watermark'                          => "{$RS2['watermark_image']}",
	# Could be a pre-determined position such as: 
	#           tl = top left,
	#           t  = top (middle),
	#           tr = top right,
	#           l  = left,
	#           m  = middle,
	#           r  = right,
	#           bl = bottom left,
	#           b  = bottom (middle),
	#           br = bottom right
	#           Or, it could be a co-ordinate position such as: 50x100
	'image_watermark_position'                 => "{$RS2['image_watermark_position']}",
	# padding: If using a pre-determined position you can
	#         adjust the padding from the edges by passing an amount
	#         in pixels. If using co-ordinates, this value is ignored.
	'image_watermark_padding'                 => "{$RS2['watermark_padding']}",

	//******************
	// Default layout setting
	//
	// 0 => boxes
	// 1 => detailed list (1 column)
	// 2 => columns list (multiple columns depending on the width of the page)
	// YOU CAN ALSO PASS THIS PARAMETERS USING SESSION VAR => $_SESSION['RF']["VIEW"]=
	//
	//******************
	'default_view'                            => 0,

	//set if the filename is truncated when overflow first row
	'ellipsis_title_after_first_row'          => true,

	//*************************
	//Permissions configuration
	//******************
	'delete_files'                            => $RS2['can_delete_file'],
	'create_folders'                          => $RS2['can_create_folder'],
	'delete_folders'                          => $RS2['can_delete_folder'],
	'upload_files'                            => $RS2['can_upload_file'],
	'rename_files'                            => $RS2['can_rename_file'],
	'rename_folders'                          => $RS2['can_rename_folder'],
	'duplicate_files'                         => $RS2['can_copy_file'],
	'copy_cut_files'                          => $RS2['can_copy_cut_file'], // for copy/cut files
	'copy_cut_dirs'                           => $RS2['can_copy_cut_folder'], // for copy/cut directories
	'chmod_files'                             => $RS2['can_permission_file'], // change file permissions
	'chmod_dirs'                              => $RS2['can_permission_folder'], // change folder permissions
	'preview_text_files'                      => $RS2['can_previwe_text_file'], // eg.: txt, log etc.
	'edit_text_files'                         =>$RS2['can_edit_text_file'] , // eg.: txt, log etc.
	'create_text_files'                       => $RS2['can_create_text_file'], // only create files with exts. defined in $editable_text_file_exts

	// you can preview these type of files if $preview_text_files is true
	'previewable_text_file_exts'              => array( 'txt', 'log', 'xml', 'html', 'css', 'htm', 'js' ),
	'previewable_text_file_exts_no_prettify'  => array( 'txt', 'log' ),

	// you can edit these type of files if $edit_text_files is true (only text based files)
	// you can create these type of files if $create_text_files is true (only text based files)
	// if you want you can add html,css etc.
	// but for security reasons it's NOT RECOMMENDED!
	'editable_text_file_exts'                 => $RS2['editable_text_file_exts'],

	// Preview with Google Documents
	'googledoc_enabled'                       => $RS2['googledoc_enabled'],
	'googledoc_file_exts'                     => $RS2['googledoc_file_exts'],

	// Preview with Viewer.js
	'viewerjs_enabled'                        => $RS2['viewerjs_enabled'],
	'viewerjs_file_exts'                      => $RS2['viewerjs_file_exts'],

	// defines size limit for paste in MB / operation
	// set 'FALSE' for no limit
	'copy_cut_max_size'                       => $RS2['copy_cut_max_size'],
	// defines file count limit for paste / operation
	// set 'FALSE' for no limit
	'copy_cut_max_count'                      => $RS2['copy_cut_max_count'],
	//IF any of these limits reached, operation won't start and generate warning

	//**********************
	//Allowed extensions (lowercase insert)
	//**********************
	'ext_img'                                 => $RS2['ext_img'], //Images  
	'ext_file'                                => $RS2['ext_file'], //Files
	'ext_video'                               => $RS2['ext_video'], //Video
	'ext_music'                               => $RS2['ext_music'], //Audio
	'ext_misc'                                => $RS2['ext_misc'], //Archives

	/******************
	* AVIARY config
	*******************/
	'aviary_active'                           =>  $RS2['aviary_active'],
	'aviary_apiKey'                           => "{$RS2['Aviary_API_key']}", 
	'aviary_language'                         => "{$RS2['aviary_language']}",
	'aviary_theme'                            => "{$RS2['aviary_theme']}",
	'aviary_tools'                            => "{$RS2['aviary_tools']}",
	'aviary_maxSize'                          => "{$RS2['aviary_maxSize']}",
	// Add or modify the Aviary options below as needed - they will be json encoded when added to the configuration so arrays can be utilized as needed

	//The filter and sorter are managed through both javascript and php scripts because if you have a lot of
	//file in a folder the javascript script can't sort all or filter all, so the filemanager switch to php script.
	//The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number
	'file_number_limit_js'                    => 500,

	//**********************
	// Hidden files and folders
	//**********************
	// set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)
	'hidden_folders'                          => $RS2['hidden_folders'],
	// set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
	'hidden_files'                            => $RS2['hidden_files'],

	/*******************
	* JAVA upload
	*******************/
	'java_upload'                             => true,
	'JAVAMaxSizeUpload'                       => 500, //Gb


	//************************************
	//Thumbnail for external use creation
	//************************************


	// New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
	// If you want create images resized out of upload folder for use with external script you can choose this method,
	// You can create also more than one image at a time just simply add a value in the array
	// Remember than the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
	// path_from_filemanager/test/test1/
	// PS if there isn't write permission in your destination folder you must set it
	//
	'fixed_image_creation'                    => false, //activate or not the creation of one or more image resized with fixed path from filemanager folder
	'fixed_path_from_filemanager'             => array( '../test/', '../test1/' ), //fixed path of the image folder from the current position on upload folder
	'fixed_image_creation_name_to_prepend'    => array( '', 'test_' ), //name to prepend on filename
	'fixed_image_creation_to_append'          => array( '_test', '' ), //name to appendon filename
	'fixed_image_creation_width'              => array( 300, 400 ), //width of image (you can leave empty if you set height)
	'fixed_image_creation_height'             => array( 200, '' ), //height of image (you can leave empty if you set width)
	/*
	#             $option:     0 / exact = defined size;
	#                          1 / portrait = keep aspect set height;
	#                          2 / landscape = keep aspect set width;
	#                          3 / auto = auto;
	#                          4 / crop= resize and crop;
	*/
	'fixed_image_creation_option'             => array( 'crop', 'auto' ), //set the type of the crop


	// New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
	// With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
	// just simply add a value in the array
	// The image creation path is always relative so if i'm inside source/test/test1 and I upload an image, the path start from here
	//
	'relative_image_creation'                 => false, //activate or not the creation of one or more image resized with relative path from upload folder
	'relative_path_from_current_pos'          => array( './', './' ), //relative path of the image folder from the current position on upload folder
	'relative_image_creation_name_to_prepend' => array( '', '' ), //name to prepend on filename
	'relative_image_creation_name_to_append'  => array( '_thumb', '_thumb1' ), //name to append on filename
	'relative_image_creation_width'           => array( 300, 400 ), //width of image (you can leave empty if you set height)
	'relative_image_creation_height'          => array( 200, '' ), //height of image (you can leave empty if you set width)
	/*
	#             $option:     0 / exact = defined size;
	#                          1 / portrait = keep aspect set height;
	#                          2 / landscape = keep aspect set width;
	#                          3 / auto = auto;
	#                          4 / crop= resize and crop;
	*/
	'relative_image_creation_option'          => array( 'crop', 'crop' ), //set the type of the crop


	// Remember text filter after close filemanager for future session
	'remember_text_filter'                    => false,

);
 
return array_merge(
	$config,
	array(
		'MaxSizeUpload' => ((int)(ini_get('post_max_size')) < $config['MaxSizeUpload'])
			? (int)(ini_get('post_max_size')) : $config['MaxSizeUpload'],
		'ext'=> array_merge(
			$config['ext_img'],
			$config['ext_file'],
			$config['ext_misc'],
			$config['ext_video'],
			$config['ext_music']
		),
		// For a list of options see: https://developers.aviary.com/docs/web/setup-guide#constructor-config
		'aviary_defaults_config' => array(
			'apiKey'     => $config['aviary_apiKey'],
			'language'   => $config['aviary_language'],
			'theme'      => $config['aviary_theme'],
			'tools'      => $config['aviary_tools'],
			'maxSize'    => $config['aviary_maxSize']
		),
	)
);

?>

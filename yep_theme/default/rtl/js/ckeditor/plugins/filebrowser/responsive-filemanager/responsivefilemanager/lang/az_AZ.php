<?php
$i18n = array (
	// GS settings page impementations
	'FM_PLUGIN_DESC' => 'Responsive File Manager for GetSimple CMS. Replaces the standard file browser with Responsive File Manager Plugin. Plugin can upload files to the server, create thumbnails, photo editing tools and much more.',
	'FILE_UPLOAD' => 'File <b><i>config/config.php</i></b> modified successfully. <b>Upload_dir</b> parameter set according to your site\'s URL:<br />',
	'FM_INTEGR_SECC' => 'Responsive FileManager integration was successful. Now you can use it to CKEditor window.',
	'FM_INTEGR_CANC' => 'Responsive FileManager integration canceled. From now will be used GS standard file browser.',
	'FM_THUMB_ERR' => 'Unable to create a CKEditor plugin Thumb. Check CKEditor directory structure and access rights.',
	'FM_LANG_PARAM' => 'Your settings have been saved successfully.',
	'FM_SET_EXPAND' => 'Expand',
	'FM_SET_COLAPS' => 'Collapse',
	'FM_SET_INTEGR' => 'Responsive FileManager CKEditor integration',
	'FM_SET_INTEGR_SECC' => 'Responsive FileManager integrated',
	'FM_SET_NM' => 'Responsive FileManager News Manager integration',
	'FM_SET_INTEGR_SECC_NM' => 'Responsive FileManager integrated in News Manager',
	'FM_SET_NOINTEGR_NM' => 'Responsive FileManager not integrated in News Manager',
	'FM_INTEGR_SECC_NM' => 'Responsive FileManager integration to the News Manager was successful. Now you can use it to News Manager window.',
	'FM_INTEGR_CANC_NM' => 'Responsive FileManager integration to the News Manager canceled. From now will be used GS standard file browser.',
	'FM_THUMB_ERR_NM' => 'Unable to change News Manager plugin. Check News Manager directory structure and access rights.',
	'FM_BTN_RESTORE' => 'Recall',
	'FM_BTN_SAVE' => 'Save',
	'FM_BTN_INTEGR' => 'Integrate',
	'FM_SET_WIDTH' => 'Responsive FileManager window width (px or %)',
	'FM_SET_HEIGHT' => 'Responsive FileManager window height (px or %)',
	'FM_SET_NOINTEGR' => 'Responsive FileManager not integrated',
	'OPEN_FM' => 'Open Filemanager',
	'FM_SET_TOOLBAR' => 'Set CKEditor toolbar to <b><i>advanced + Thumb</i></b> button',
	'FM_SET_JQUERY' => 'Loaded Jquery on frontend pages (required for PrettyPhoto and FancyBox)',
	'FM_SET_UPLOAD_LIMIT' => 'File maximum upload size (in Megabytes)',
	'FM_SET_NOJS' => 'Do not use Javascript on my site frontend pages',
	'FM_SET_LIGHTCSS' => 'Add LightBoxCSS image gallery stylesheet on frontend pages',
	'CKEDIT_THUMB_INS' => 'Insert thumbnail',
	'FM_SET_THUMB' => 'Thumbnails creation settings',
	'FM_THUMB_PREFIX' => 'Name to prepend on filename when creating a thumbnail',
	'FM_THUMB_SUFFIX' => 'Name to append on filename when creating a thumbnail',
	'FM_THUMB_SUFFIX_DESC' => 'Value should be between apostrophes. Multiple parameters must be separated by commas. If the prefix or suffix will not be used enter \'\' (two apostrophes). For example:<br>\'thumb.\', \'\'&nbsp;&nbsp;&nbsp;&nbsp;(for prepend) <br>\'_thumb\', \'.thumbnail\'&nbsp;&nbsp;&nbsp;&nbsp;(for append)',
	'FM_THUMB_WIDTH' => 'Thumbnail width (in px)',
	'FM_THUMB_HEIGHT' => 'Thumbnail height (in px)',
	'FM_THUMB_WIDTH_DESC' => 'Enter a numeric value only. Multiple parameters must be separated by commas. For example:<br>250, \'\'<br>200, 300',
	'FM_THUMB_OPTION' => 'Thumbnail creation options (for resize and crop)',
	'FM_EXAMPLE' => 'Example',
	'FM_EXMPL1' => 'Will create one thumbnail file with this settings: Width - 250px; Height - auto; Aspect ratio - by original image (no crop). The file name will look like this: <b>thumb.myphoto.jpg</b>',
	'FM_EXMPL2' => 'Will create two thumbnail files for the same image with this settings -> For the first file: Width - 250px; Height - 200px; Aspect ratio - crop (resize with crop); For the second file: Width - auto; Height - 300px; Aspect ratio - by image height (resize only). The file names will look like this: <b>myphoto_thumb.jpg</b> (for first file) and <b>myphoto.thumbnail.jpg</b> (for second file)',
	'FM_THUMB_SET_ERR' => 'Do not fill out all the required fields. Thumbnail setting changes are canceled.',
	'FM_THUMB_DEFAULT' => 'Reset to default',
	'FM_THUMB_DEFA_DESC' => 'Use Default Settings: Width - 122px; Height - 91px; Aspect ratio - crop',
	'FM_THUMB_FAIL' => 'Thumbnails directory creation failed. Check your server or GS folders structure permissions settings.<br>You can manually copy this folder from catalog: <b><i>plugins/responsivefilemanager/copy/thumb</i></b> to the this path: <b><i>admin/template/js/ckeditor/plugins</i></b>.',
	'FM_CKED_TOOL' => 'Enter the desired CKEditor Toolbars elements between brackets, eg. [\'Bold\', \'Italic\', \'Underline\'],\'/\',[\'Styles\',\'Format\']',
	'FM_USER_ADMIN' => 'Custom CKEditor Toolbars elements for user with Admin permissions',
	'FM_USER_PLAIN' => 'Custom CKEditor Toolbars elements for Plain user',
	'FM_EDITOR_TOOL' => 'Custom CKEditor Toolbars elements',
	'FM_EDITOR_OPT' => 'CKEditor <b>extraPlugins</b> activation',
	'FM_CKED_OPT' => 'Enter the desired CKEditor extraPlugins names by separating them with commas, eg. codesnippet,youtube',
	'FM_USE_HLP' => 'You can use the integration of Responsive Filemanager in your projects (plugins or themes). Below are 2 ways to call RFM. Copy chosen way code to the right place in your project.',
	'FM_USE_HLP1' => 'In the Responsive FileManager URL Address you can use the following GET variables and their values:<br><b>type:</b> the type of filemanager (1:images files 2:all files 3:video files)<br><b>field_id:</b> ID value of the input field to which the selection is forwarded (&lt;input type="text" id="your_id" /&gt;)<br><b>fldr:</b> the folder where i enter (the root folder remains the same) default=""<br><b>sort_by:</b> the element to sorting (values: name,size,extension,date) default=""<br><b>descending:</b> descending or ascending (values=1 or 0) default="0"<br><b>lang:</b> the language code (ex: &lang=fr_FR) default="en_EN"',
	'FM_HLP_1' => 'Responsive FileManager in Pop-up FancyBox window',
	'FM_HLP_2' => 'Responsive FileManager in IFRAME section',
	'FM_HLP_PVZ1' => '&lt;a href="&lt;?php echo $SITEURL; ?&gt;plugins/responsivefilemanager/dialog.php?type=0&lang=en&field_id=fieldID&akey=bce94f94426497ba5e669a705c186f12" class="rfm-button" type="button"&gt;Open RFM&lt;/a&gt;',
	'FM_SET_CF' => 'Responsive FileManager Custom Fields integration',
	'FM_SET_INTEGR_SECC_CF' => 'Responsive FileManager integrated in Custom Fields',
	'FM_SET_NOINTEGR_CF' => 'Responsive FileManager not integrated in Custom Fields',
	'FM_INTEGR_SECC_CF' => 'Responsive FileManager integration to the Custom Fields was successful. Now you can use it with Custom Fields.',
	'FM_INTEGR_CANC_CF' => 'Responsive FileManager integration to the Custom Fields canceled. From now will be used GS standard file browser.',
	'FM_SET_HIDDEN' => 'Hide RFM Settings Area from Plain Users (not ADMIN users).',
);
	
return array(

	'Select' => 'Seç',
	'Deselect_All' => 'Deselect All',
	'Select_All' => 'Select All',
	'Erase' => 'Sil',
	'Open' => 'Aç',
	'Confirm_del' => 'Bu faylı silmek istədiyinizdə əminsinizmi?',
	'All' => 'Hamısı',
	'Files' => 'Fayllar',
	'Images' => 'Şəkillər',
	'Archives' => 'Arxivlər',
	'Error_Upload' => 'Yükləmək istədiyiniz fayl maksimum limiti keçdi.',
	'Error_extension' => 'Fayl uzantısı icazəsi yoxdur.',
	'Upload_file' => 'Fayl Yüklə',
	'Filters' => 'Filtrlər',
	'Videos' => 'Videolar',
	'Music' => 'Mahnılar',
	'New_Folder' => 'Yeni Folder',
	'Folder_Created' => 'Folder müvəffəqiyyətlə yaradıldı.',
	'Existing_Folder' => 'Mövcud folder',
	'Confirm_Folder_del' => 'Bu folderi və içindəkiləri silmək istədiyinizə əminsinizmi?',
	'Return_Files_List' => 'Faylların siyahısına geri qayıt',
	'Preview' => 'İlk baxış',
	'Download' => 'Yüklə',
	'Insert_Folder_Name' => 'Folder adı əlavə et:',
	'Root' => 'kök',
	'Rename' => 'Yenidən Adlandır',
	'Back' => 'geri',
	'View' => 'Görünüş',
	'View_list' => 'List görünüşü',
	'View_columns_list' => 'Sütunlu list görünüşü',
	'View_boxes' => 'Qutu görünüşü',
	'Toolbar' => 'Alətlər Paneli',
	'Actions' => 'Fəaliyyətlər',
	'Rename_existing_file' => 'Bu fayl var artıq',
	'Rename_existing_folder' => 'Bu folder var artıq',
	'Empty_name' => 'Ad sahəsi boşdur.',
	'Text_filter' => 'filtrlə...',
	'Swipe_help' => 'Variantları görmək üçün file/folder adına tıklayın',
	'Upload_base' => 'Normal Yükləmə',
	'Upload_base_help' => "Drag & Drop files(modern browsers) or click in upper button to Add the file(s) and click on Start upload. When the upload is complete, click the 'Return to files list' button.",
	'Upload_add_files' => 'Add file(s)',
	'Upload_start' => 'Start upload',
	'Upload_error_messages' =>array(
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk',
		8 => 'A PHP extension stopped the file upload',
		'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
		'max_file_size' => 'File is too big',
		'min_file_size' => 'File is too small',
		'accept_file_types' => 'Filetype not allowed',
		'max_number_of_files' => 'Maximum number of files exceeded',
		'max_width' => 'Image exceeds maximum width',
		'min_width' => 'Image requires a minimum width',
		'max_height' => 'Image exceeds maximum height',
		'min_height' => 'Image requires a minimum height',
		'abort' => 'File upload aborted',
		'image_resize' => 'Failed to resize image'
	),
	'Upload_url' => 'From url',
	'Type_dir' => 'Kataloq',
	'Type' => 'Növ',
	'Dimension' => 'Ölçü',
	'Size' => 'Çəki',
	'Date' => 'Tarix',
	'Filename' => 'Fayl adı',
	'Operations' => 'Əməliyyatlar',
	'Date_type' => 'd-m-Y',
	'OK' => 'Razıyam',
	'Cancel' => 'Ləğv Et',
	'Sorting' => 'sıralama',
	'Show_url' => 'URL göstər',
	'Extract' => 'bura çıxart',
	'File_info' => 'fayl məlumatı',
	'Edit_image' => 'şəkli redaktə et',
	'Duplicate' => 'Dublikat',
	'Folders' =>  'Folders',
	'Copy' => 'Copy',
	'Cut' => 'Cut',
	'Paste' => 'Paste',
	'CB' =>  'CB', // clipboard
	'Paste_Here' => 'Paste to this directory',
	'Paste_Confirm' => 'Are you sure you want to paste to this directory? This will overwrite existing files/folders if encountered any.',
	'Paste_Failed' => 'Failed to paste file(s)',
	'Clear_Clipboard' => 'Clear clipboard',
	'Clear_Clipboard_Confirm' => 'Are you sure you want to clear the clipboard?',
	'Files_ON_Clipboard' => 'There are files on the clipboard.',
	'Copy_Cut_Size_Limit' => 'The selected files/folders are too big to %s. Limit: %d MB/operation', // %s = cut or copy
	'Copy_Cut_Count_Limit' => 'You selected too many files/folders to %s. Limit: %d files/operation', // %s = cut or copy
	'Copy_Cut_Not_Allowed' => 'You are not allowed to %s files.', // %s(1) = cut or copy =>  %s(2) = files or folders
	'Aviary_No_Save' =>  'Could not save image',
	'Zip_No_Extract' =>  'Could not extract. File might be corrupt.',
	'Zip_Invalid' =>  'This extension is not supported. Valid: zip, gz, tar.',
	'Dir_No_Write' =>  'The directory you selected is not writable.',
	'Function_Disabled' =>  'The %s function has been disabled by the server.', // %s = cut or copy
	'File_Permission' =>  'File permission',
	'File_Permission_Not_Allowed' =>  'Changing %s permissions are not allowed.', // %s = files or folders
	'File_Permission_Recursive' =>  'Apply recursively?',
	'File_Permission_Wrong_Mode' =>  "The supplied permission mode is incorrect.",
	'User' =>  'User',
	'Group' =>  'Group',
	'Yes' =>  'Yes',
	'No' =>  'No',
	'Lang_Not_Found' =>  'Could not find language.',
	'Lang_Change' =>  'Change the language',
	'File_Not_Found' =>  'Could not find the file.',
	'File_Open_Edit_Not_Allowed' =>  'You are not allowed to %s this file.', // %s = open or edit
	'Edit' =>  'Edit',
	'Edit_File' =>  "Edit file's content",
	'File_Save_OK' =>  "File successfully saved.",
	'File_Save_Error' =>  "There was an error while saving the file.",
	'New_File' => 'New File',
	'No_Extension' => 'You have to add a file extension.',
	'Valid_Extensions' => 'Valid extensions: %s', // %s = txt => log etc.
	'Upload_message' => "Drop file here to upload",

	'SERVER ERROR' => "SERVER ERROR",
	'forbiden' => "Forbiden",
	'wrong path' => "Wrong path",
	'wrong name' => "Wrong name",
	'wrong extension' => "Wrong extension",
	'wrong option' => "Wrong option",
	'wrong data' => "Wrong data",
	'wrong action' => "Wrong action",
	'wrong sub-action' => "Wrong sub-actio",
	'no action passed' => "No action passed",
	'no path' => "No path",
	'no file' => "No file",
	'view type number missing' => "View type number missing",
	'Not enough Memory' => "Not enough Memory",
	'max_size_reached' => "Your image folder has reach its maximale size of %d MB.", //%d = max overall size
	'B' => "B",
	'KB' => "KB",
	'MB' => "MB",
	'GB' => "GB",
	'TB' => "TB",
	'total size' => "Total size",
);

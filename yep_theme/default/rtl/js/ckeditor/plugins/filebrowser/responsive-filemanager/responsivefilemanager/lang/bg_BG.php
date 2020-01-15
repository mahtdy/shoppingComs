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

	'Select' => 'Избери',
	'Deselect_All' => 'Deselect All',
	'Select_All' => 'Select All',
	'Erase' => 'Изтрий',
	'Open' => 'Отваряне',
	'Confirm_del' => 'Сигурни ли сте, че искате да изтриете този файл?',
	'All' => 'Всичко',
	'Files' => 'Файла',
	'Images' => 'Изображения',
	'Archives' => 'Архиви',
	'Error_Upload' => 'Каченият файл надминава максимално разрешената големина.',
	'Error_extension' => 'Това файлово разширение не е позволено.',
	'Upload_file' => 'Качете файл',
	'Filters' => 'Папка',
	'Videos' => 'Видео',
	'Music' => 'Музика',
	'New_Folder' => 'Нова папка',
	'Folder_Created' => 'Папката е правилно създадена',
	'Existing_Folder' => 'Съществуваща папка',
	'Confirm_Folder_del' => 'Сигурни ли сте, че искате да изтриете папката и всичко =>  което се съдържа с нея?',
	'Return_Files_List' => 'Връщане към списъка с файлове',
	'Preview' => 'Преглед',
	'Download' => 'Свали',
	'Insert_Folder_Name' => 'Въведете име на папката:',
	'Root' => 'Основна',
	'Rename' => 'Преименуване',
	'Back' => 'Обратно',
	'View' => 'Изглед',
	'View_list' => 'Списък',
	'View_columns_list' => 'Колони',
	'View_boxes' => 'Кутии',
	'Toolbar' => 'Лента с инструменти',
	'Actions' => 'Действия',
	'Rename_existing_file' => 'Файлът вече съществува',
	'Rename_existing_folder' => 'Папката вече съществува',
	'Empty_name' => 'Името на файла е празно',
	'Text_filter' => 'текстов филтър',
	'Swipe_help' => 'Плъзнете името на файла/папката за опции',
	'Upload_base' => 'Базово качване',
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
	'Type_dir' => 'папка',
	'Type' => 'Тип',
	'Dimension' => 'Размер',
	'Size' => 'Големина',
	'Date' => 'Дата',
	'Filename' => 'Име',
	'Operations' => 'Операции',
	'Date_type' => 'y-m-d',
	'OK' => 'ОК',
	'Cancel' => 'Отказ',
	'Sorting' => 'сортиране',
	'Show_url' => 'покажи URL',
	'Extract' => 'разархивирай тук',
	'File_info' => 'информация за файл',
	'Edit_image' => 'редактирай изображение',
	'Duplicate' => 'Дубликат',
	'Folders' =>  'Папки',
	'Copy' => 'Копиране',
	'Cut' => 'Изрязване',
	'Paste' => 'Поставяне',
	'CB' =>  'CB', // clipboard
	'Paste_Here' => 'Постави в тази папка',
	'Paste_Confirm' => 'Сигурни ли сте, че искате да поставите в тази папка? Това може да презапише файловете в нея.',
	'Paste_Failed' => 'Грешка при поставянето на файла/овете',
	'Clear_Clipboard' => 'Изчисти клипборда',
	'Clear_Clipboard_Confirm' => 'Сигурни ли сте, че искате да изчистите клипборда?',
	'Files_ON_Clipboard' => 'Има файлове в клипборда.',
	'Copy_Cut_Size_Limit' => 'Избраните файлове/папки са прекалено големи за %s. Лимит: %d MB/действие', // %s = cut or copy
	'Copy_Cut_Count_Limit' => 'Избрали сте прекаленено много файлове/папки за %s. Лимит: %d файла/действие', // %s = cut or copy
	'Copy_Cut_Not_Allowed' => 'Нямате право за %s на файлове.', // %s(1) = cut or copy =>  %s(2) = files or folders
	'Aviary_No_Save' =>  'Изображението не може да бъде записано',
	'Zip_No_Extract' =>  'Невъзможно разархивиране. Файлът вероятно е повреден.',
	'Zip_Invalid' =>  'Това разширене не се поддържа. Валидни: zip, gz, tar.',
	'Dir_No_Write' =>  'Нямате права за запис в избраната папка.',
	'Function_Disabled' =>  '%s-то е забранено на сървъра.', // %s = cut or copy
	'File_Permission' =>  'Файлови права',
	'File_Permission_Not_Allowed' =>  'Не е разрешена промяната на права за %s.', // %s = files or folders
	'File_Permission_Recursive' =>  'Рекурсивно прилагане?',
	'File_Permission_Wrong_Mode' =>  "Зададените права са грешни.",
	'User' =>  'Потребител',
	'Group' =>  'Група',
	'Yes' =>  'Да',
	'No' =>  'Не',
	'Lang_Not_Found' =>  'Езикът не може да бъде намерен.',
	'Lang_Change' =>  'Смени езика',
	'File_Not_Found' =>  'Файлът не може да бъде намерен.',
	'File_Open_Edit_Not_Allowed' =>  'Нямате разрешение за %s на този файл.', // %s = open or edit
	'Edit' =>  'Редакция',
	'Edit_File' =>  "Редакция на съдържанието на файла",
	'File_Save_OK' =>  "Файлът е успешно записан.",
	'File_Save_Error' =>  "Възникна грешка при записването на файла.",
	'New_File' => 'Нов файл',
	'No_Extension' => 'Трябва да зададете разширение на файла.',
	'Valid_Extensions' => 'Валидни разширения: %s', // %s = txt => log etc.
	'Upload_message' => "Провлачете и спуснете файла тук за да го качите.",

	'SERVER ERROR' => "СЪРВЪРНА ГРЕШКА",
	'forbiden' => "Забранено",
	'wrong path' => "Грешен път",
	'wrong name' => "Грешно име",
	'wrong extension' => "Грешно разширение",
	'wrong option' => "Грешна опция",
	'wrong data' => "Грешни данни",
	'wrong action' => "Грешно действие",
	'wrong sub-action' => "Грешно вторично действие",
	'no action passed' => "Не е подадено действие",
	'no path' => "Няма път",
	'no file' => "Няма файл",
	'view type number missing' => "Номерът на прегледа липсва",
	'Not enough Memory' => "Недостатъчна памет",
	'max_size_reached' => "Вашата папка за изображения достигна максимумът от %d MB.", //%d = max overall size
	'B' => "B",
	'KB' => "KB",
	'MB' => "MB",
	'GB' => "GB",
	'TB' => "TB",
	'total size' => "Общ размер",
);

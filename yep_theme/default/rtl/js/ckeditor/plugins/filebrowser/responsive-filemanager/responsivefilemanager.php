<?php
	session_start();
	$rfm_version = "2.8";
/*
Plugin Name: Responsive File Manager for GetSimple
Description: Responsive File Manager plugin Integrated for Getsimple
Version: 2.8
Author: Andrejus Semionovas
Author URI: http://pigios-svetaines.eu/
*/

/* 
 This version uses a slightly modified Layer Slider core to function correctly in GetSimple.
*/

# get correct id for plugin
$thisfile=basename(__FILE__, ".php");

# language support
i18n_merge($thisfile, substr($LANG,0,2)) || i18n_merge($thisfile, $LANG) || i18n_merge($thisfile, 'en') || i18n_merge($thisfile, 'en_US');

$rfm_data_path = GSDATAPATH."responsivefilemanager/";
$rfm_plugin_path = GSPLUGINPATH."responsivefilemanager/";

# register plugin
register_plugin(
	$thisfile, 										# ID of plugin, should be filename minus php
	'Responsive File Manager', 						# Title of plugin
	$rfm_version, 									# Version of plugin
	'Andrejus Semionovas',							# Author of plugin
	'http://pigios-svetaines.eu/', 					# Author URL
	i18n_r($thisfile.'/FM_PLUGIN_DESC'), 	    	# Plugin Description
	'files', 										# Page type of plugin
	'responsivefilemanager_get'  					# Function that displays content
);

# activate hooks
add_action('files-sidebar','createSideMenu',array($thisfile,'Responsive File Manager')); 	// Add the sidebar 
add_action('edit-extras', 'editorChangeParams', array());
add_action('theme-footer','rfm_scriptstoFooter');
add_action('footer','rfm_scriptstoFooterBack');

if(isset($_GET['id']) && $_GET['id'] == "responsivefilemanager") {
	register_style('settings', $SITEURL.'plugins/responsivefilemanager/css/settings.css', $rfm_version, 'screen');
	queue_style('settings', GSBACK);
}
if(file_exists(GSDATAOTHERPATH . 'rfm_config.xml')) {
	$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
	$is_lightbox = $rfm_xml->lightcss;
}
if(isset($is_lightbox) && $is_lightbox != 0) {
	register_style('lightboxcss', $SITEURL.'plugins/responsivefilemanager/css/lightbox_css.css', $rfm_version, 'screen');
	queue_style('lightboxcss', GSFRONT);
}

function responsivefilemanager_get() {
	global $thisfile;
	global $plugin_info;
	global $plugins;
	global $LANG;
	global $rfm_data_path;
	global $rfm_plugin_path;
	global $SITEURL;
	global $USR;

	$access_keys = array('bce94f94426497ba5e669a705c186f12', '7969d6a7b4697750ebdcdd018274d571', '48607dfdaf9aba9b83f3dc881a939f68');
	$access_key = $access_keys[array_rand($access_keys, 1)];

	$filename = GSPLUGINPATH.'responsivefilemanager/config/config.php';
	$file = fopen($filename, "r")  or die("Couldn't open $filename");
	$thumb_true = false;
	while(!feof($file)){
		$line = fgets($file);
		$pos = strpos($line, "'upload_dir'");
		if ($pos !== false) {
			$rfm_upload = substr($line, strpos($line, '/'), (rtrim(strpos($line, ','))-strpos($line, '/'))-1);
		}
		elseif (strpos($line, "'MaxSizeUpload'")!==false) {
			$rfm_upload_limit = trim(str_replace(array("'MaxSizeUpload'", "=", ">", ","), "", $line));
		}
		elseif (strpos($line, "fixed_image_creation'")!==false) {
			$rfm_true = trim(str_replace(array("'fixed_image_creation'", "=", ">", ","), "", $line));
			if(strtolower($rfm_true) == 'false') {
				break;
			} else $thumb_true = true;
		}
		elseif (strpos($line, "fixed_image_creation_name_to_prepend")!==false) {
			$th_prep =trim(str_replace(array("'fixed_image_creation_name_to_prepend'", "=", ">", "array(", "),", ") ,"), "", $line));
		}
		elseif (strpos($line, "fixed_image_creation_to_append")!==false) {
			$th_appe =trim(str_replace(array("'fixed_image_creation_to_append'", "=", ">", "array(", "),", ") ,"), "", $line));
		}
		elseif (strpos($line, "fixed_image_creation_width")!==false) {
			$th_width =trim(str_replace(array("'fixed_image_creation_width'", "=", ">", "array(", "),", ") ,"), "", $line));
		}
		elseif (strpos($line, "fixed_image_creation_height")!==false) {
			$th_height = trim(str_replace(array("'fixed_image_creation_height'", "=", ">", "array(", "),", ") ,"), "", $line));
		}
		elseif (strpos($line, "fixed_image_creation_option")!==false) {
			$th_option = trim(str_replace(array("'fixed_image_creation_option'", "=", ">", "array(", "),", ") ,"), "", $line));
			break;
		}
	}
	fclose($file);

	$urls = parse_url($SITEURL, PHP_URL_PATH);
	if($urls == "/") $upload_d = "/data/uploads/";
	else  $upload_d = $urls."data/uploads/";
	if ($rfm_upload != $upload_d) {
		$file_temp = GSPLUGINPATH.'responsivefilemanager/config/config.tmp';
		$file = fopen($filename, "r")  or die("Couldn't open $filename");
		$file_new = fopen($file_temp, "w")  or die("Couldn't open $file_temp");
		while(!feof($file)){
			$line = fgets($file);
			$pos = strpos($line, "'upload_dir'");
			if ($pos !== false) {
				fwrite($file_new, "\t'upload_dir' => '".$upload_d."',\n");
			}
			else {
				fwrite($file_new, $line);
			}
		}
		fclose($file);
		fclose($file_new);
		unlink($filename);
		rename($file_temp, $filename);
	?> <div class="fancy-message info"><p><?php i18n('responsivefilemanager/FILE_UPLOAD'); echo $upload_d; ?></p></div> <?php
	}
	
	if(file_exists($rfm_plugin_path."lang/".$LANG.".php")) $lang_curr = $LANG;
	else $lang_curr = substr($LANG,0,2);
	if(isset($_POST['rfm_replace']) && $_POST['rfm_replace']) {
			if (check_plugin()) {
				$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
				$rfm_xml->replace = 1;
				XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
				?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_SECC'); ?></p></div> <?php
				if(!file_exists(GSADMINPATH.'template/js/ckeditor/plugins/thumb/plugin.js') || !file_exists(GSADMINPATH.'template/js/ckeditor/plugins/thumb/dialogs/thumb.js')) {
					?> <div class="fancy-message error"><p><?php i18n('responsivefilemanager/FM_THUMB_FAIL'); ?></p></div> <?php
				}
			}
			else {
				?> <div class="fancy-message error"><p><?php i18n('responsivefilemanager/FM_THUMB_ERR'); ?></p></div> <?php
			}
	}

	if(isset($_POST['rfm_dereplace']) && $_POST['rfm_dereplace']) {
		if(file_exists(GSADMINPATH.'template/js/ckeditor/plugins/thumb')) {
			recursiveRemoveDirectory(GSADMINPATH.'template/js/ckeditor/plugins/thumb');
		}
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_xml->replace = '';
		XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
		?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_CANC'); ?></p></div> <?php
				
	}
	if(isset($_POST['rfm_save']) && $_POST['rfm_save']) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_xml->w_width = str_replace(array("px"," "), "", $_POST['rfm_w_width']);
		$rfm_xml->w_height = str_replace(array("px"," "), "", $_POST['rfm_w_height']);
		if(isset($_POST['rfm_toolbar']) && !empty($_POST['rfm_toolbar'])) {
			$rfm_xml->toolbar = $_POST['rfm_toolbar']; }
		else { $rfm_xml->toolbar = 0; }
		if(isset($_POST['rfm_jquery']) && !empty($_POST['rfm_jquery'])) {
			$rfm_xml->jquery = $_POST['rfm_jquery']; }
		else { $rfm_xml->jquery = 0; }
		if(isset($_POST['rfm_upload_limit']) && !empty($_POST['rfm_upload_limit'])) {
			$file_temp = GSPLUGINPATH.'responsivefilemanager/config/config.tmp';
			$file = fopen($filename, "r")  or die("Couldn't open $filename");
			$file_new = fopen($file_temp, "w")  or die("Couldn't open $file_temp");
			while(!feof($file)){
				$line = fgets($file);
				$pos = strpos($line, "'MaxSizeUpload'");
				if ($pos !== false) {
					$upload_limit = (int) $_POST['rfm_upload_limit'];
					fwrite($file_new, "\t'MaxSizeUpload' => ".$upload_limit.",\n");
					$rfm_upload_limit = $upload_limit;
				}
				else {
					fwrite($file_new, $line);
				}
			}
			fclose($file);
			fclose($file_new);
			unlink($filename);
			rename($file_temp, $filename);
		}
		if(isset($_POST['rfm_nojs']) && !empty($_POST['rfm_nojs'])) {
			$rfm_xml->nojs = $_POST['rfm_nojs']; }
		else { $rfm_xml->nojs = 0; }
		if(isset($_POST['rfm_lightcss']) && !empty($_POST['rfm_lightcss'])) {
			$rfm_xml->lightcss = $_POST['rfm_lightcss']; }
		else { $rfm_xml->lightcss = 0; }
		if(isset($_POST['admTools']) && !empty($_POST['admTools'])) $rfm_xml->admtoolb = $_POST['admTools'];
		else $rfm_xml->admtoolb = '';
		if(isset($_POST['usrTools']) && !empty($_POST['usrTools'])) $rfm_xml->usrtoolb = $_POST['usrTools'];
		else $rfm_xml->usrtoolb = '';
		if(isset($_POST['ckOptions']) && !empty($_POST['ckOptions'])) $rfm_xml->ckoptions = $_POST['ckOptions'];
		else $rfm_xml->ckoptions = '';
		if(isset($_POST['rfm_hidden']) && !empty($_POST['rfm_hidden'])) {
			$rfm_xml->rfm_hidden = $_POST['rfm_hidden']; }
		else { $rfm_xml->rfm_hidden = 0; }
		XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
		?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_LANG_PARAM'); ?></p></div> <?php
	}
	
	if(isset($_POST['rfm_nm_replace']) && $_POST['rfm_nm_replace']) {
		$is_mody = false;
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$file_nm1 = GSPLUGINPATH.'news_manager/template/ckeditor.php';
		$file_nm2 = GSPLUGINPATH.'news_manager/template/edit_post.php';
		$file_nm_path = GSPLUGINPATH.'responsivefilemanager/copy/nm/';
		if(file_exists($file_nm1)) {
			if(rename($file_nm1, GSPLUGINPATH.'news_manager/template/ckeditor.php.old')) {
				if(copy($file_nm_path.'ckeditor.php', $file_nm1)) {
					$is_mody = true;
				}
			}
		}
		if(file_exists($file_nm2) && $is_mody) {
			if(rename($file_nm2, GSPLUGINPATH.'news_manager/template/edit_post.php.old')) {
				if(copy($file_nm_path.'edit_post.php', $file_nm2)) {
					$is_mody = true;
				}
			}
		}
		if($is_mody) {
			$rfm_xml->nm_replace = 1;
			XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
			?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_SECC_NM'); ?></p></div> <?php
		} else {
			?> <div class="fancy-message error"><p><?php i18n('responsivefilemanager/FM_THUMB_ERR_NM'); ?></p></div> <?php
		}
	}
	if(isset($_POST['rfm_nm_dereplace']) && $_POST['rfm_nm_dereplace']) {
		$is_mody = false;
		if(file_exists(GSPLUGINPATH.'news_manager/template/ckeditor.php.old') && file_exists(GSPLUGINPATH.'news_manager/template/edit_post.php.old')) {
			unlink(GSPLUGINPATH.'news_manager/template/ckeditor.php');
			rename(GSPLUGINPATH.'news_manager/template/ckeditor.php.old', GSPLUGINPATH.'news_manager/template/ckeditor.php');
			unlink(GSPLUGINPATH.'news_manager/template/edit_post.php');
			rename(GSPLUGINPATH.'news_manager/template/edit_post.php.old', GSPLUGINPATH.'news_manager/template/edit_post.php');
			$is_mody = true;
		}
		if($is_mody) {
			$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
			$rfm_xml->nm_replace = false;
			XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
			?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_CANC_NM'); ?></p></div> <?php
		} else {
			?> <div class="fancy-message error"><p><?php i18n('responsivefilemanager/FM_THUMB_ERR_NM'); ?></p></div> <?php
		}
	}
	
	if(isset($_POST['rfm_cf_replace']) && $_POST['rfm_cf_replace']) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_xml->cf_replace = 1;
		XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
		?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_SECC_CF'); ?></p></div> <?php
	}
	if(isset($_POST['rfm_cf_dereplace']) && $_POST['rfm_cf_dereplace']) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_xml->cf_replace = false;
		XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
		?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_INTEGR_CANC_CF'); ?></p></div> <?php
	}
	
	if(isset($_POST['thumbs_save']) && $_POST['thumbs_save']) {
		if(isset($_POST['thumbs_defa']) && !empty($_POST['thumbs_defa'])) {
			$file_temp = GSPLUGINPATH.'responsivefilemanager/config/config.tmp';
			$file = fopen($filename, "r")  or die("Couldn't open $filename");
			$file_new = fopen($file_temp, "w")  or die("Couldn't open $file_temp");
			while(!feof($file)){
				$line = fgets($file);
				if(strpos($line, "fixed_image_creation'")!==false) {
					fwrite($file_new, "\t'fixed_image_creation' => false,\n");
				}
				else {
					fwrite($file_new, $line);
				}
			}
			fclose($file);
			fclose($file_new);
			unlink($filename);
			rename($file_temp, $filename);
			?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_LANG_PARAM'); ?></p></div> <?php
		}
		if(isset($_POST['thumb_prefix']) && !empty($_POST['thumb_prefix']) && isset($_POST['thumb_suffix']) && !empty($_POST['thumb_suffix']) && isset($_POST['thumb_width']) && !empty($_POST['thumb_width']) && isset($_POST['thumb_height']) && !empty($_POST['thumb_height']) && isset($_POST['thumb_opt']) && !empty($_POST['thumb_opt'])) {
			$file_temp = GSPLUGINPATH.'responsivefilemanager/config/config.tmp';
			$file = fopen($filename, "r")  or die("Couldn't open $filename");
			$file_new = fopen($file_temp, "w")  or die("Couldn't open $file_temp");
			$count = count(explode(",", $_POST['thumb_width']));
			while(!feof($file)){
				$line = fgets($file);
				switch (true){
					case (strpos($line, "fixed_image_creation'")!==false):
						fwrite($file_new, "\t'fixed_image_creation' => true,\n");
						break;
					case (strpos($line, 'fixed_path_from_filemanager')!==false):
						fwrite($file_new, "\t'fixed_path_from_filemanager' => array( ");
						for( $i= 0 ; $i < $count ; $i++ ) {
							if($count == ($i+1)) fwrite($file_new, "'../../data/thumbs/'");
							else  fwrite($file_new, "'../../data/thumbs/', ");
						}
						fwrite($file_new, " ),\n");
						break;
					case (strpos($line, 'fixed_image_creation_name_to_prepend')!==false):
						fwrite($file_new, "\t'fixed_image_creation_name_to_prepend' => array( ".$_POST['thumb_prefix']." ),\n");
						break;
					case (strpos($line,'fixed_image_creation_to_append')!==false):
						fwrite($file_new, "\t'fixed_image_creation_to_append' => array( ".$_POST['thumb_suffix']." ),\n");
						break;
					case (strpos($line,'fixed_image_creation_width')!==false):
						fwrite($file_new, "\t'fixed_image_creation_width' => array( ".$_POST['thumb_width']." ),\n");
						break;
					case (strpos($line,'fixed_image_creation_height')!==false):
						fwrite($file_new, "\t'fixed_image_creation_height' => array( ".$_POST['thumb_height']." ),\n");
						break;
					case (strpos($line,'fixed_image_creation_option')!==false):
						fwrite($file_new, "\t'fixed_image_creation_option' => array( ".$_POST['thumb_opt']." ),\n");
						break;
					default:
						fwrite($file_new, $line);
						break;
				}
			}
			fclose($file);
			fclose($file_new);
			unlink($filename);
			rename($file_temp, $filename);
			?> <div class="fancy-message seccess"><p><?php i18n('responsivefilemanager/FM_LANG_PARAM'); ?></p></div> <?php
		}
		else {
			if(!isset($_POST['thumbs_defa']) && empty($_POST['thumbs_defa'])) {
		?> <div class="fancy-message error"><p><?php i18n('responsivefilemanager/FM_THUMB_SET_ERR'); ?></p></div> <?php
			}
		}
	}
	if (!file_exists(GSDATAOTHERPATH.'rfm_config.xml')) {
		$rfm_xml = @new SimpleXMLExtended('<?xml version="1.0" encoding="UTF-8"?><rfm_config></rfm_config>');
		$rfm_xml->addChild('replace', false);
		$rfm_xml->addChild('toolbar', false);
		$rfm_xml->addChild('jquery', false);
		$rfm_xml->addChild('nojs', false);
		$rfm_xml->addChild('w_width', "75%");
		$rfm_xml->addChild('w_height', "65%");
		$rfm_xml->addChild('nm_replace', false);
		$rfm_xml->addChild('cf_replace', false);
		XMLsave($rfm_xml, GSDATAOTHERPATH.'rfm_config.xml');
	}
	else {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_replace = $rfm_xml->replace;
		$win_width = $rfm_xml->w_width;
		$win_height = $rfm_xml->w_height;
		$rfm_toolbar = $rfm_xml->toolbar;
		$rfm_jquery = $rfm_xml->jquery;
		$rfm_nojs = $rfm_xml->nojs;
		$rfm_lightcss = $rfm_xml->lightcss;
		$thumb_pref = $rfm_xml->thumb_pref;
		$thumb_suff = $rfm_xml->thumb_suff;
		$adm_toolb = $rfm_xml->admtoolb;
		$usr_toolb = $rfm_xml->usrtoolb;
		$ck_option = $rfm_xml->ckoptions;
		$rfm_nm_replace = $rfm_xml->nm_replace;
		$rfm_cf_replace = $rfm_xml->cf_replace;
		$rfm_hidden = $rfm_xml->rfm_hidden;
	}
?>
	<h3 class="floated" style="float:left">Responsive FileManager</h3>
	<div class="edit-nav">
        <p>
		 <a href="../plugins/responsivefilemanager/dialog.php?type=0&lang=<?php echo $lang_curr; ?>&akey=<?php echo $access_key; ?>" class="btn iframe-btn" type="button"><?php i18n('responsivefilemanager/OPEN_FM'); ?></a>
        </p>
        <div class="clear"></div>
    </div>
	
	<div id="respfm"> 
		<div id="respbrowser">
			<iframe name="respfm" id="respframe" frameborder="0" width="100%" height="550px" src="../plugins/responsivefilemanager/dialog.php?type=0&lang=<?php echo $lang_curr; ?>&akey=<?php echo $access_key; ?>">
			</iframe>
		</div>
	</div>
	<?php if (function_exists('mm_permissions') && check_user_permission($USR, 'ADMIN') || !function_exists('mm_permissions')) { ?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="rfm-postform">
		<fieldset class="container-collapsed" id="container-0">
		<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
		<h3 style="margin:20px 10px"><?php i18n('responsivefilemanager/FM_SET_INTEGR'); ?></h3>
		<div class="edit-settings">
		<?php if (isset($rfm_replace) && $rfm_replace == 1) : ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_INTEGR_SECC'); ?></span>
			<input type="submit" name="rfm_dereplace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_RESTORE'); ?>"/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_WIDTH'); ?></span>
			<input type="text" name="rfm_w_width" class="rfm_input" value="<?php echo (isset($win_width) && strpos($win_width,'%')) === false ? $win_width.'px' : $win_width; ?>"/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_HEIGHT'); ?></span>
			<input type="text" name="rfm_w_height" class="rfm_input" value="<?php echo (isset($win_height) && strpos($win_height,'%')) === false ? $win_height.'px' : $win_height; ?>"/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_TOOLBAR'); ?></span>
			<input type="checkbox" name="rfm_toolbar" class="rfm_input" value=1 <?php echo $rfm_toolbar==1?"checked":"" ?>/></div>
			<?php if (function_exists('mm_permissions')) { ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_USER_ADMIN'); ?></span>
			<textarea id="admTools" name="admTools" class="form-control input-extended" rows="4" placeholder="<?php echo i18n('responsivefilemanager/FM_CKED_TOOL'); ?>" style="height: auto;margin-bottom: 20px;"><?php echo isset($adm_toolb) ? htmlspecialchars($adm_toolb, ENT_QUOTES, "UTF-8") : ''; ?></textarea>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_USER_PLAIN'); ?></span>
			<textarea id="usrTools" name="usrTools" class="form-control input-extended" rows="4" placeholder="<?php echo i18n('responsivefilemanager/FM_CKED_TOOL'); ?>" style="height: auto;margin-bottom: 20px;"><?php echo isset($usr_toolb) ? htmlspecialchars($usr_toolb, ENT_QUOTES, "UTF-8") : ''; ?></textarea>
			<?php } else { ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_EDITOR_TOOL'); ?></span>
			<textarea id="usrTools" name="usrTools" class="form-control input-extended" rows="4" placeholder="<?php echo i18n('responsivefilemanager/FM_CKED_TOOL'); ?>" style="height: auto;margin-bottom: 20px;"><?php echo isset($usr_toolb) ? htmlspecialchars($usr_toolb, ENT_QUOTES, "UTF-8") : ''; ?></textarea>
			<?php } ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_EDITOR_OPT'); ?></span>
			<textarea id="ckOptions" name="ckOptions" class="form-control input-extended" rows="2" placeholder="<?php echo i18n('responsivefilemanager/FM_CKED_OPT'); ?>" style="height: auto;margin-bottom: 20px;"><?php echo isset($ck_option) ? htmlspecialchars($ck_option, ENT_QUOTES, "UTF-8") : ''; ?></textarea>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_JQUERY'); ?></span>
			<input type="checkbox" name="rfm_jquery" class="rfm_input" value=1 <?php echo $rfm_jquery==1?"checked":"" ?>/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_UPLOAD_LIMIT'); ?></span>
			<input type="text" name="rfm_upload_limit" class="rfm_input" value="<?php echo isset($rfm_upload_limit) ? $rfm_upload_limit : 10; ?>"/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_NOJS'); ?></span>
			<input type="checkbox" name="rfm_nojs" class="rfm_input" value=1 <?php echo $rfm_nojs==1?"checked":"" ?>/></div>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_LIGHTCSS'); ?></span>
			<input type="checkbox" name="rfm_lightcss" class="rfm_input" value=1 <?php echo $rfm_lightcss==1?"checked":"" ?>/></div>
			<?php if (function_exists('mm_permissions')) { ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_HIDDEN'); ?></span>
			<input type="checkbox" name="rfm_hidden" class="rfm_input" value=1 <?php echo $rfm_hidden==1?"checked":"" ?>/></div>
			<?php } ?>
			<div class="inner-divs"><input type="submit" name="rfm_save" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_SAVE'); ?>" style="float:left; margin-bottom:20px;"/></div>
		<?php else: ?>
			<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_NOINTEGR'); ?></span>
			<input type="submit" name="rfm_replace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_INTEGR'); ?>"/></div>
		<?php endif; ?>
		</div>
		</fieldset>
	</form>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="rfm-postform">
		<fieldset class="container-collapsed" id="container-1">
			<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
			<h3 style="margin:20px 10px"><?php i18n('responsivefilemanager/FM_SET_THUMB'); ?></h3>
			<div class="edit-settings"> <?php
			if(!$thumb_true) { ?>
				<div class="inner-divs" style="color: blue; font-style: italic; padding-bottom: 6px;">
					<?php i18n('responsivefilemanager/FM_THUMB_DEFA_DESC'); ?>
				</div>
	<?php	} ?>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_THUMB_PREFIX'); ?></span><span class="required">*</span>
					<input type="text" name="thumb_prefix" class="text" value="<?php echo (isset($th_prep) && !empty($th_prep))?$th_prep:'' ?>"/>
				</div>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_THUMB_SUFFIX'); ?></span><span class="required">*</span>
					<input type="text" name="thumb_suffix" class="text" value="<?php echo (isset($th_appe) && !empty($th_appe))?$th_appe:'' ?>"/>
				</div>
				<div class="inner-divs" style="white-space: normal; font-weight: 400; font-size: 13px; font-style: italic;"><?php i18n('responsivefilemanager/FM_THUMB_SUFFIX_DESC'); ?></div>
				<hr style="color: #f6f6f6; margin-bottom: 20px;">
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_THUMB_WIDTH'); ?></span><span class="required">*</span>
					<input type="text" name="thumb_width" class="text" value="<?php echo (isset($th_width) && !empty($th_width))?$th_width:'' ?>"/>
				</div>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_THUMB_HEIGHT'); ?></span><span class="required">*</span>
					<input type="text" name="thumb_height" class="text" value="<?php echo (isset($th_height) && !empty($th_height))?$th_height:'' ?>"/>
				</div>
				<div class="inner-divs" style="white-space: normal; font-weight: 400; font-size: 13px; font-style: italic;"><?php i18n('responsivefilemanager/FM_THUMB_WIDTH_DESC'); ?></div>
				<hr style="color: #f6f6f6; margin-bottom: 20px;">
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_THUMB_OPTION'); ?></span><span class="required">*</span>
					<input type="text" name="thumb_opt" id="thumb_options" class="text" value="<?php echo (isset($th_option) && !empty($th_option))?$th_option:'' ?>"/>
				</div>
				<div class="inner-divs">
					<div class="leftsec">
						<select name="opt_values" id="option_values" class="text" style="width: auto; margin-top: 10px;">
							<option value="exact">Exact (defined size)</option>
							<option value="portrait">Portrait (keep aspect by height)</option>
							<option value="landscape">Landscape (keep aspect by width)</option>
							<option value="auto">Auto (automatic resize)</option>
							<option value="crop">Crop (resize and crop)</option>
						</select>
						<button type='button' id="add_option" style="height: 28px;">Add</button>
					</div>
					<div class="rightsec">
						<label for="thumbs_defa" style="float: right; padding-right: 20px;"><?php i18n('responsivefilemanager/FM_THUMB_DEFAULT'); ?></label>
						<input type="checkbox" id="thumbs_defa" name="thumbs_defa" class="rfm_input" value=1 />
					</div>
				</div>
				<div class="inner-divs"><input type="submit" name="thumbs_save" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_SAVE'); ?>" style="float:left; margin-bottom:20px;"/></div>
				<div class="inner-divs"><span style="position: relative;left: 480px;top: -28px;"><a id="exmpl1" href="#"><?php i18n('responsivefilemanager/FM_EXAMPLE'); ?> 1</a></span><span style="position: relative;left: 506px;top: -28px;"><a id="exmpl2" href="#"><?php i18n('responsivefilemanager/FM_EXAMPLE'); ?> 2</a></span></div>
				<div id="example1" class="inner-divs" style="display:none">
					<code style="color: green;">'name to prepend' => 'thumb.'<br>'thumbnail width' => 250<br>'thumbnail height' => ''<br>'creation options' => 'landscape'</code>
					<p style="padding-top: 10px;"><?php i18n('responsivefilemanager/FM_EXMPL1'); ?></p>
				</div>
				<div id="example2" class="inner-divs" style="display:none">
					<code style="color: green;">'name to append' => '_thumb', '.thumbnail'<br>'thumbnail width' => 250, ''<br>'thumbnail height' => 200, 300<br>'creation options' => 'crop', 'auto'</code>
					<p style="padding-top: 10px;"><?php i18n('responsivefilemanager/FM_EXMPL2'); ?></p>
				</div>
			</div>
		</fieldset>
	</form> <?php
	if(function_exists('nm_admin')) { ?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="rfm-postform">
		<fieldset class="container-collapsed" id="container-2">
			<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
			<h3 style="margin:20px 10px"><?php i18n('responsivefilemanager/FM_SET_NM'); ?></h3>
			<div class="edit-settings"> <?php
			if (isset($rfm_nm_replace) && $rfm_nm_replace == 1) { ?>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_INTEGR_SECC_NM'); ?></span>
				<input type="submit" name="rfm_nm_dereplace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_RESTORE'); ?>"/></div>
			<?php } else { ?>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_NOINTEGR_NM'); ?></span>
				<input type="submit" name="rfm_nm_replace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_INTEGR'); ?>"/></div>
			<?php } ?>
			</div>
		</fieldset>
	</form> <?php
	}
	if(function_exists('get_custom_field')) { ?>
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="rfm-postform">
		<fieldset class="container-collapsed" id="container-5">
			<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
			<h3 style="margin:20px 10px"><?php i18n('responsivefilemanager/FM_SET_CF'); ?></h3>
			<div class="edit-settings"> <?php
			if (isset($rfm_cf_replace) && $rfm_cf_replace == 1) { ?>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_INTEGR_SECC_CF'); ?></span>
				<input type="submit" name="rfm_cf_dereplace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_RESTORE'); ?>"/></div>
			<?php } else { ?>
				<div class="inner-divs"><span class="rfm-activate"><?php i18n('responsivefilemanager/FM_SET_NOINTEGR_CF'); ?></span>
				<input type="submit" name="rfm_cf_replace" class="iframe-buttn" value="<?php i18n('responsivefilemanager/FM_BTN_INTEGR'); ?>"/></div>
			<?php } ?>
			</div>
		</fieldset>
	</form> <?php
	} ?>
	<div style="margin: 10px 0;background: #ebf7fd;color: #2d7091;border: 1px solid rgba(45,112,145,0.3);border-radius: 4px;overflow: hidden;">
		<p style="margin: 10px;font-style: italic;">
			<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0OTYuMTU4IDQ5Ni4xNTgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ5Ni4xNTggNDk2LjE1ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojMjVCN0QzOyIgZD0iTTQ5Ni4xNTgsMjQ4LjA4NWMwLTEzNy4wMjItMTExLjA2OS0yNDguMDgyLTI0OC4wNzUtMjQ4LjA4MkMxMTEuMDcsMC4wMDMsMCwxMTEuMDYzLDAsMjQ4LjA4NSAgYzAsMTM3LjAwMSwxMTEuMDcsMjQ4LjA3LDI0OC4wODMsMjQ4LjA3QzM4NS4wODksNDk2LjE1NSw0OTYuMTU4LDM4NS4wODYsNDk2LjE1OCwyNDguMDg1eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzE1LjI0OSwzNTkuNTU1Yy0xLjM4Ny0yLjAzMi00LjA0OC0yLjc1NS02LjI3LTEuNzAyYy0yNC41ODIsMTEuNjM3LTUyLjQ4MiwyMy45NC01Ny45NTgsMjUuMDE1ICAgYy0wLjEzOC0wLjEyMy0wLjM1Ny0wLjM0OC0wLjY0NC0wLjczN2MtMC43NDItMS4wMDUtMS4xMDMtMi4zMTgtMS4xMDMtNC4wMTVjMC0xMy45MDUsMTAuNDk1LTU2LjIwNSwzMS4xOTItMTI1LjcxOSAgIGMxNy40NTEtNTguNDA2LDE5LjQ2OS03MC40OTksMTkuNDY5LTc0LjUxNGMwLTYuMTk4LTIuMzczLTExLjQzNS02Ljg2NS0xNS4xNDZjLTQuMjY3LTMuNTE5LTEwLjIyOS01LjMwMi0xNy43MTktNS4zMDIgICBjLTEyLjQ1OSwwLTI2Ljg5OSw0LjczLTQ0LjE0NiwxNC40NjFjLTE2LjcxMyw5LjQzMy0zNS4zNTIsMjUuNDEtNTUuMzk2LDQ3LjQ4N2MtMS41NjksMS43MjktMS43MzMsNC4zMTQtMC4zOTUsNi4yMjggICBjMS4zNCwxLjkxNSwzLjgyNSwyLjY0NCw1Ljk4NiwxLjc2NGM3LjAzNy0yLjg3Miw0Mi40MDItMTcuMzU5LDQ3LjU1Ny0yMC41OTdjNC4yMjEtMi42NDYsNy44NzUtMy45ODksMTAuODYxLTMuOTg5ICAgYzAuMTA3LDAsMC4xOTksMC4wMDQsMC4yNzYsMC4wMWMwLjAzNiwwLjE5OCwwLjA3LDAuNSwwLjA3LDAuOTMzYzAsMy4wNDctMC42MjcsNi42NTQtMS44NTYsMTAuNzAzICAgYy0zMC4xMzYsOTcuNjQxLTQ0Ljc4NSwxNTcuNDk4LTQ0Ljc4NSwxODIuOTk0YzAsOC45OTgsMi41MDEsMTYuMjQyLDcuNDMyLDIxLjUyOGM1LjAyNSw1LjM5MywxMS44MDMsOC4xMjcsMjAuMTQ2LDguMTI3ICAgYzguODkxLDAsMTkuNzEyLTMuNzE0LDMzLjA4LTExLjM1NGMxMi45MzYtNy4zOTIsMzIuNjgtMjMuNjUzLDYwLjM2My00OS43MTdDMzE2LjMzNywzNjQuMzI2LDMxNi42MzYsMzYxLjU4NywzMTUuMjQ5LDM1OS41NTV6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTMxNC4yODIsNzYuNjcyYy00LjkyNS01LjA0MS0xMS4yMjctNy41OTctMTguNzI5LTcuNTk3Yy05LjM0LDAtMTcuNDc1LDMuNjkxLTI0LjE3NiwxMC45NzEgICBjLTYuNTk0LDcuMTYtOS45MzgsMTUuOTQ2LTkuOTM4LDI2LjExM2MwLDguMDMzLDIuNDYzLDE0LjY5LDcuMzIsMTkuNzg1YzQuOTIyLDUuMTcyLDExLjEzOSw3Ljc5NCwxOC40NzYsNy43OTQgICBjOC45NTgsMCwxNy4wNDktMy44OTgsMjQuMDQ3LTExLjU4NmM2Ljg3Ni03LjU1MywxMC4zNjMtMTYuNDMzLDEwLjM2My0yNi4zOTNDMzIxLjY0Niw4OC4xMDUsMzE5LjE2OSw4MS42ODQsMzE0LjI4Miw3Ni42NzJ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" style="width: 24px;height: 24px;margin-right: 10px;"/>
			<span style="vertical-align: top;"><?php i18n('responsivefilemanager/FM_USE_HLP'); ?></span>
		</p>
	</div>
	<fieldset class="container-collapsed" id="container-3">
		<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
		<h3 style="margin:10px 10px;font-size: 14px;"><?php i18n('responsivefilemanager/FM_HLP_1'); ?></h3>
		<div class="edit-settings">
			<p style="margin-bottom: 6px;font-weight: 700;">HTML:</p>
			<code style="color: green;"><?php i18n('responsivefilemanager/FM_HLP_PVZ1'); ?></code>
			<p style="margin: 18px 0 -8px 0;font-weight: 700;">Javascript:</p>
			<code style="color: green;white-space: pre;">
jQuery('.rfm-button').fancybox({&#9;	
	'width'		: 900,&#9;
	'height'	: 600,&#9;
	'type'		: 'iframe',&#9;
	'autoScale'    	: false&#9;
});
			</code>
			<p style="margin-bottom: 6px;"><?php i18n('responsivefilemanager/FM_EXAMPLE'); ?>:</p>
			<div>
				<input type="text" name="rfm_help1" id="rfm_help1" class="text" value="" style="width: 450px;height: 20px;padding: 2px 4px;" />
				<a href="../plugins/responsivefilemanager/dialog.php?type=0&lang=<?php echo $lang_curr; ?>&field_id=rfm_help1&akey=<?php echo $access_key; ?>" class="css-button small iframe-btn" type="button" style="vertical-align: top;margin-left: 4px;"><?php i18n('responsivefilemanager/OPEN_FM'); ?></a>
			</div>
		</div>
	</fieldset>
	<fieldset class="container-collapsed" id="container-4">
		<legend class="collapsedlegend"><?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?></legend>
		<h3 style="margin:10px 10px;font-size: 14px;"><?php i18n('responsivefilemanager/FM_HLP_2'); ?></h3>
		<div class="edit-settings">
			<p style="margin-bottom: 6px;font-weight: 700;">HTML:</p>
			<code style="color: green;">&lt;iframe name="respfm" id="respframe" frameborder="0" width="100%" height="300px" src="&lt;?php echo $SITEURL; ?&gt;plugins/responsivefilemanager/dialog.php?type=0&lang=en&akey=bce94f94426497ba5e669a705c186f12"&gt;&lt;/iframe&gt;
			</code>
			<p style="margin: 18px 0 0 0;"><?php i18n('responsivefilemanager/FM_EXAMPLE'); ?>:</p>
			<iframe name="respfm" id="respframe" frameborder="0" width="100%" height="300px" src="../plugins/responsivefilemanager/dialog.php?type=0&lang=<?php echo $lang_curr; ?>&akey=<?php echo $access_key; ?>"></iframe>
		</div>
	</fieldset>
	<div style="margin: 10px 0;background: #ebf7fd;color: #2d7091;border: 1px solid rgba(45,112,145,0.3);border-radius: 4px;overflow: hidden;">
		<p style="margin: 10px;font-style: italic;">
			<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0OTYuMTU4IDQ5Ni4xNTgiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ5Ni4xNTggNDk2LjE1ODsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojMjVCN0QzOyIgZD0iTTQ5Ni4xNTgsMjQ4LjA4NWMwLTEzNy4wMjItMTExLjA2OS0yNDguMDgyLTI0OC4wNzUtMjQ4LjA4MkMxMTEuMDcsMC4wMDMsMCwxMTEuMDYzLDAsMjQ4LjA4NSAgYzAsMTM3LjAwMSwxMTEuMDcsMjQ4LjA3LDI0OC4wODMsMjQ4LjA3QzM4NS4wODksNDk2LjE1NSw0OTYuMTU4LDM4NS4wODYsNDk2LjE1OCwyNDguMDg1eiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMzE1LjI0OSwzNTkuNTU1Yy0xLjM4Ny0yLjAzMi00LjA0OC0yLjc1NS02LjI3LTEuNzAyYy0yNC41ODIsMTEuNjM3LTUyLjQ4MiwyMy45NC01Ny45NTgsMjUuMDE1ICAgYy0wLjEzOC0wLjEyMy0wLjM1Ny0wLjM0OC0wLjY0NC0wLjczN2MtMC43NDItMS4wMDUtMS4xMDMtMi4zMTgtMS4xMDMtNC4wMTVjMC0xMy45MDUsMTAuNDk1LTU2LjIwNSwzMS4xOTItMTI1LjcxOSAgIGMxNy40NTEtNTguNDA2LDE5LjQ2OS03MC40OTksMTkuNDY5LTc0LjUxNGMwLTYuMTk4LTIuMzczLTExLjQzNS02Ljg2NS0xNS4xNDZjLTQuMjY3LTMuNTE5LTEwLjIyOS01LjMwMi0xNy43MTktNS4zMDIgICBjLTEyLjQ1OSwwLTI2Ljg5OSw0LjczLTQ0LjE0NiwxNC40NjFjLTE2LjcxMyw5LjQzMy0zNS4zNTIsMjUuNDEtNTUuMzk2LDQ3LjQ4N2MtMS41NjksMS43MjktMS43MzMsNC4zMTQtMC4zOTUsNi4yMjggICBjMS4zNCwxLjkxNSwzLjgyNSwyLjY0NCw1Ljk4NiwxLjc2NGM3LjAzNy0yLjg3Miw0Mi40MDItMTcuMzU5LDQ3LjU1Ny0yMC41OTdjNC4yMjEtMi42NDYsNy44NzUtMy45ODksMTAuODYxLTMuOTg5ICAgYzAuMTA3LDAsMC4xOTksMC4wMDQsMC4yNzYsMC4wMWMwLjAzNiwwLjE5OCwwLjA3LDAuNSwwLjA3LDAuOTMzYzAsMy4wNDctMC42MjcsNi42NTQtMS44NTYsMTAuNzAzICAgYy0zMC4xMzYsOTcuNjQxLTQ0Ljc4NSwxNTcuNDk4LTQ0Ljc4NSwxODIuOTk0YzAsOC45OTgsMi41MDEsMTYuMjQyLDcuNDMyLDIxLjUyOGM1LjAyNSw1LjM5MywxMS44MDMsOC4xMjcsMjAuMTQ2LDguMTI3ICAgYzguODkxLDAsMTkuNzEyLTMuNzE0LDMzLjA4LTExLjM1NGMxMi45MzYtNy4zOTIsMzIuNjgtMjMuNjUzLDYwLjM2My00OS43MTdDMzE2LjMzNywzNjQuMzI2LDMxNi42MzYsMzYxLjU4NywzMTUuMjQ5LDM1OS41NTV6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkZGRkZGOyIgZD0iTTMxNC4yODIsNzYuNjcyYy00LjkyNS01LjA0MS0xMS4yMjctNy41OTctMTguNzI5LTcuNTk3Yy05LjM0LDAtMTcuNDc1LDMuNjkxLTI0LjE3NiwxMC45NzEgICBjLTYuNTk0LDcuMTYtOS45MzgsMTUuOTQ2LTkuOTM4LDI2LjExM2MwLDguMDMzLDIuNDYzLDE0LjY5LDcuMzIsMTkuNzg1YzQuOTIyLDUuMTcyLDExLjEzOSw3Ljc5NCwxOC40NzYsNy43OTQgICBjOC45NTgsMCwxNy4wNDktMy44OTgsMjQuMDQ3LTExLjU4NmM2Ljg3Ni03LjU1MywxMC4zNjMtMTYuNDMzLDEwLjM2My0yNi4zOTNDMzIxLjY0Niw4OC4xMDUsMzE5LjE2OSw4MS42ODQsMzE0LjI4Miw3Ni42NzJ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" style="width: 24px;height: 24px;margin-right: 10px;"/>
			<span style="vertical-align: top;"><?php i18n('responsivefilemanager/FM_USE_HLP1'); ?></span>
		</p>
	</div>
	<?php } ?>
<script type="text/javascript">
$('#exmpl1').click( function(e) {
    e.preventDefault();
    $( "#example1" ).toggle();
});
$('#exmpl2').click( function(e) {
    e.preventDefault();
    $( "#example2" ).toggle();
});
jQuery('#add_option').click(function(){
	var selected = $("#option_values").val();
	var input = $( "#thumb_options" );
	if($.trim(input.val()).length == 0) {
		input.val( input.val() + "'" + selected + "'" );
	}
	else {
		input.val( input.val() + ",'" + selected + "'" );
	}
});
jQuery('.collapsedlegend').click(function(){
	 var path = '<?php echo $SITEURL; ?>';
	 var expand = '<?php i18n('responsivefilemanager/FM_SET_EXPAND'); ?>';
	 var colapse = '<?php i18n('responsivefilemanager/FM_SET_COLAPS'); ?>';
	if($(this).text()==expand){
		jQuery(this).parent('fieldset').find('div:first').show(500);
		jQuery(this).text(colapse);
		jQuery(this).css('background-image', 'url('+path+'admin/template/images/tick.png)');
	}else{
		jQuery(this).parent('fieldset').find('div:first').hide(500);
		jQuery(this).text(expand);
		jQuery(this).css('background-image', 'url('+path+'admin/template/images/utick.png)');
	}
});
jQuery(function(){
   setTimeout(function() {
       jQuery(".fancy-message.seccess").hide('slow');
   }, 10000);
});
jQuery('.iframe-btn').fancybox({	
	'width'		: 900,
	'height'	: 600,
	'type'		: 'iframe',
	'autoScale'    	: false
});
jQuery('.groups').on('change', function() {
   jQuery('.groups').not(this).prop('checked', false);
});
</script>
<?php
}
function editorChangeParams() {
	global $GSEDITORBROWSER;
	global $LANG;
	global $rfm_plugin_path;
	global $filebrowserBrowseUrl;
	global $filebrowserUploadUrl;
	global $filebrowserImageBrowseUrl;
	global $filebrowserWidth;
	global $filebrowserHeight;
	global $toolbar_ins;
	
	$access_keys = array('bce94f94426497ba5e669a705c186f12', '7969d6a7b4697750ebdcdd018274d571', '48607dfdaf9aba9b83f3dc881a939f68');
	$access_key = $access_keys[array_rand($access_keys, 1)];
	
	if(file_exists($rfm_plugin_path."lang/".$LANG.".php")) $lang_curr = $LANG;
	else $lang_curr = substr($LANG,0,2);
	
	if (file_exists(GSDATAOTHERPATH.'rfm_config.xml')) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
	}
	if(empty($rfm_xml->replace)) $GSEDITORBROWSER = FALSE;
	else $GSEDITORBROWSER = $rfm_xml->replace;
	if(empty($rfm_xml->toolbar)) $toolbar_ins = FALSE;
	else $toolbar_ins = $rfm_xml->toolbar;
	if(isset($rfm_xml->usrtoolb) && !empty($rfm_xml->usrtoolb)) $usr_toolb = $rfm_xml->usrtoolb;
	if(isset($rfm_xml->admtoolb) && !empty($rfm_xml->admtoolb)) $adm_toolb = $rfm_xml->admtoolb;
	if(isset($rfm_xml->ckoptions) && !empty($rfm_xml->ckoptions)) $ck_option = $rfm_xml->ckoptions;
	if($GSEDITORBROWSER) {
        $filebrowserBrowseUrl = "../plugins/responsivefilemanager/dialog.php?type=2&lang=".$lang_curr."&akey=".$access_key."&editor=ckeditor&fldr=";
        $filebrowserUploadUrl = "../plugins/responsivefilemanager/dialog.php?type=2&lang=".$lang_curr."&akey=".$access_key."&editor=ckeditor&fldr=";
        $filebrowserImageBrowseUrl = "../plugins/responsivefilemanager/dialog.php?type=1&lang=".$lang_curr."&akey=".$access_key."&editor=ckeditor&fldr=";
        $filebrowserWidth = $rfm_xml->w_width;
        $filebrowserHeight = $rfm_xml->w_height;

// gsconfig GSEDITOROPTIONS is stored in global $EDOPTIONS, you can append whatever you want
        global $EDOPTIONS;
        global $EDTOOL;
        global $USR;
		if(!defined('GSEDITORTOOL')) define('GSEDITORTOOL', '');
		if(strpos($EDOPTIONS,'extraPlugins:"') !== false) {
			if(strpos($EDOPTIONS,'thumb') === false) {
				$EDOPTIONS = str_replace('extraPlugins:"', 'extraPlugins:"thumb,', $EDOPTIONS);
			}
		}
		else $EDOPTIONS .= ',extraPlugins:"thumb"';
		if(strpos($EDOPTIONS,'filebrowserBrowseUrl:"') === false) {
			$EDOPTIONS .= ',filebrowserBrowseUrl:"'.$filebrowserBrowseUrl.'"';
		}
		if(strpos($EDOPTIONS,'filebrowserImageBrowseUrl:"') === false) {
			$EDOPTIONS .= ',filebrowserImageBrowseUrl:"'.$filebrowserImageBrowseUrl.'"';
		}
		if(strpos($EDOPTIONS,'filebrowserWindowWidth:"') === false) {
			$EDOPTIONS .= ',filebrowserWindowWidth:"'.$filebrowserWidth.'"';
		}
		if(strpos($EDOPTIONS,'filebrowserWindowHeight:"') === false) {
			$EDOPTIONS .= ',filebrowserWindowHeight:"'.$filebrowserHeight.'"';
		}

		if($toolbar_ins) {
			$EDTOOL='[["Bold", "Italic", "Underline", "Strike", "Subscript", "Superscript", "NumberedList", "BulletedList", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyBlock", "HorizontalRule", "Table", "TextColor", "BGColor", "Link", "Unlink", "Anchor", "Image", "Thumb"], "/", ["Styles", "Format", "FontSize", "Video", "Flash", "Youtube", "CreateDiv", "Iframe", "SpecialChar", "RemoveFormat", "Undo", "Redo", "Source"]]';
		}
		elseif(isset($usr_toolb) && !empty($usr_toolb) || isset($adm_toolb) && !empty($adm_toolb)) {
			if(empty($GSEDITORTOOL)) {
				if (function_exists('mm_permissions')) {
					$xml_usr = simplexml_load_file(GSUSERSPATH.$USR.'.xml') or die(i18n_r('user-managment/ERROR_XML'));
					if($xml_usr->PERMISSIONS->ADMIN == "no" && !empty($usr_toolb)) $EDTOOL='['.$usr_toolb.']';
					if($xml_usr->PERMISSIONS->ADMIN != "no" && !empty($adm_toolb)) $EDTOOL='['.$adm_toolb.']';
				}
				else $EDTOOL='['.$usr_toolb.']';
			}
		}
		else {
			if(strpos($EDTOOL,'advanced') !== false) {
				$EDTOOL='[["Bold", "Italic", "Underline", "NumberedList", "BulletedList", "JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock", "Table", "TextColor", "BGColor", "Link", "Unlink", "Image", "RemoveFormat", "Source"],"/",["Styles","Format","Font","FontSize"]]';
			}
			if(strpos($EDTOOL,'basic') !== false) {
				$EDTOOL='[["Bold", "Italic", "Underline", "NumberedList", "BulletedList", "JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock", "Link", "Unlink", "Image", "Youtube", "RemoveFormat", "Source"]]';
			}
			if(strpos($EDTOOL,'Thumb') === false) {
				$EDTOOL=str_replace(']]', ',"Thumb"]]', $EDTOOL);
			}
		}
		if(isset($ck_option) && !empty($ck_option)) {
			if(strpos($EDOPTIONS,',extraPlugins:"thumb"') !== false) {
				$EDOPTIONS = str_replace(',extraPlugins:"thumb"', ',extraPlugins:"thumb,'.$ck_option.'"', $EDOPTIONS);
			} else $EDOPTIONS .= ',extraPlugins:"'.$ck_option.'"';
		}
	}
}

function check_plugin() {
	if(!file_exists(GSADMINPATH.'template/js/ckeditor/plugins/thumb')) {
		if (!mkdir(GSADMINPATH.'template/js/ckeditor/plugins/thumb', 0777, true)) {
			die('Failed to create folders...');
			return false;
		}
		elseif (!mkdir(GSADMINPATH.'template/js/ckeditor/plugins/thumb/dialogs', 0777, true)) {
			die('Failed to create folders...');
			return false;
			}
				elseif (!mkdir(GSADMINPATH.'template/js/ckeditor/plugins/thumb/icons', 0777, true)) {
					die('Failed to create folders...');
					return false;
				}
		$myplugin = fopen(GSADMINPATH.'template/js/ckeditor/plugins/thumb/plugin.js', "w") or die("Unable to open file!");
		$line = "CKEDITOR.plugins.add( 'thumb', {
    icons: 'thumb',
    init: function( editor ) {
        editor.addCommand( 'thumbDialog', new CKEDITOR.dialogCommand( 'thumbDialog' ) );
        editor.ui.addButton( 'Thumb', {
            label: 'Insert Thumbnail',
            command: 'thumbDialog',
			icon: this.path + 'icons/thumb.png',
            toolbar: 'insert'
        });
		if (editor.addMenuItems) {
			editor.addMenuItem('thumbDialog', {
				label: 'Edit Thumbnail',
				command: 'thumbDialog',
				icon: this.path + 'icons/thumb.png',
				group: 'image', order: 3
			});
		}
		if (editor.contextMenu) {
			editor.contextMenu.addListener(function(element, selection) {
				if ( element.getAscendant( 'a', true ) && element.getAscendant( 'a', true ).hasClass('thumbnail') || element.getAscendant( 'a', true ) && element.getAscendant( 'a', true ).hasClass('lightbox') ) {
					editor.contextMenu.removeAll();
					return { thumbDialog: CKEDITOR.TRISTATE_OFF };
				}
			});
		}
		CKEDITOR.dialog.add( 'thumbDialog', this.path + 'dialogs/thumb.js' );	
    }
});";
		fwrite($myplugin, $line);
		fclose($myplugin);
		$myplugin1 = fopen(GSADMINPATH.'template/js/ckeditor/plugins/thumb/dialogs/thumb.js', "w") or die("Unable to open file!");
		$line = "CKEDITOR.dialog.add( 'thumbDialog', function( editor ) {
	return {
		title : 'Thumbnail '+editor.lang.flash.propertiesTab,
		minWidth : 400,
		minHeight : 160,
		contents : [
			{
				id : 'general',
				label : 'Settings',
				elements : [
					{
						type : 'text',
						id : 'file_url',
						label : editor.lang.common.url,
						validate : CKEDITOR.dialog.validate.notEmpty( 'The link must have a URL.' ),
						required : true,
						setup: function( element ) {
							if(element.hasClass('thumbnailbox')) {
								this.setValue( element.find('.thumbnail').getItem(0).getChild(0).getAttribute( 'src' ) );
							}
							if(element.hasClass('lightbox-css')) {
								this.setValue( element.find('.lightbox').getItem(0).getChild(0).getAttribute( 'src' ) );
							}
                        },
						commit : function( data ) {
							data.file_url = this.getValue();
						}
					},
					{
						id:'img_url',
						type:'text',
						hidden : true,
						label:editor.lang.image.url,accessKey:'A',
						'default':'',
						setup: function( element ) {
                            if(element.hasClass('thumbnailbox')) {
								this.setValue( element.find('.thumbnail').getItem(0).getAttribute( 'href' ) );
							}
							if(element.hasClass('lightbox-css')) {
								var img_id = element.find('.lightbox').getItem(0).getAttribute( 'href' ).replace('#', '');
								var img_div = editor.document.getById( img_id );
								this.setValue( img_div.find('.lightboxcssImg').getItem(0).getAttribute( 'src' ) );
							}
                        },
						commit : function( data ) {
							data.img_url = this.getValue();
						}
					},
					{
					type: 'hbox',
					children: [
						{
							type: 'html',
							id: 'htmlPreview',
							html: '<div>' + CKEDITOR.tools.htmlEncode( editor.lang.common.preview ) + '<br>' +
							'<div class=\"ImagePreview\" id=\"ImagePreviewBox\" style=\"border: 2px ridge black;height: 80px;width: 80px;background-color: white;background-size:100% auto;\"></div></div>',
							setup: function( element ) {
								if(element.hasClass('thumbnailbox')) {
									CKEDITOR.document.getById( 'ImagePreviewBox' ).setStyle( 'background-image', 'url(\"'+element.getChild(0).getAttribute( 'src' )+'\")' );
								}
								else if(element.hasClass('lightbox-css')) {
									CKEDITOR.document.getById( 'ImagePreviewBox' ).setStyle( 'background-image', 'url(\"'+element.find('.lightbox').getItem(0).getChild(0).getAttribute( 'src' )+'\")' );
								}
							},
						},
						{
							type: 'select',
							id: 'img_option',
							label: 'Thumbnail type',
							items:[[editor.lang.common.notSet,'']],
							'default': '',
							onChange: function( api ) {
								var dialog = CKEDITOR.dialog.getCurrent();
								var element_id = CKEDITOR.document.getById( 'ImagePreviewBox' );
								var thumb_url = dialog.getContentElement( 'general', 'file_url' ).getValue();
								if(this.getValue() != '') {
									element_id.setStyle('background-image', 'url(\"'+thumb_url+'\")');
									var thumb_name = thumb_url.substr(thumb_url.lastIndexOf(\"\/\") + 1);
									dialog.setValueOf( 'general', 'file_url', thumb_url.replace(thumb_name, this.getValue()) );
								}
							},
							setup: function( element ) {
								var value;
								var dialog = CKEDITOR.dialog.getCurrent();
								var thumb_url = dialog.getContentElement( 'general', 'file_url' ).getValue();
								var thumb_name = thumb_url.substr(thumb_url.lastIndexOf(\"\/\") + 1);
								var thumb_urls = dialog.getContentElement( 'general', 'img_url' ).getValue();
								var thumb_names = thumb_urls.substr(thumb_urls.lastIndexOf(\"\/\") + 1);
								var thumb_full_path = thumb_url.substr(0, thumb_url.lastIndexOf(\"\/\")+1);
								var thumb_path = thumb_full_path.substr(thumb_full_path.lastIndexOf('data')-1, thumb_full_path.lastIndexOf(\"\/\")+1);
								$.post('../plugins/responsivefilemanager/fileList.php?path='+thumb_path+'&thumb='+thumb_names, function(data) {
									var obj = JSON.parse(data);
									dialog.getContentElement( 'general', 'img_option' ).clear();
									dialog.getContentElement( 'general', 'img_option' ).add(editor.lang.common.notSet,'');
									for (var i = 0; i < obj.length; i++) {
										for (var categoryid in obj[i]) {
											var category = obj[i][categoryid];
											if(categoryid == 'name') {
												th_name = category;
											}
											if(categoryid == 'dimensions') {
												th_dimen = category;
											}
										}
										if(obj.length < 2) {
											dialog.getContentElement( 'general', 'img_option' ).disable();
										} else {
											dialog.getContentElement( 'general', 'img_option' ).enable();
											dialog.getContentElement( 'general', 'img_option' ).add(th_dimen, th_name);
											if(th_name == thumb_name) {
												value = th_name;
											}
										}
									}
									valueIsReady(value);
								});
								function valueIsReady(value) {
									dialog.getContentElement( 'general', 'img_option' ).setValue( value );
								}
							},
							commit : function( data ) {
								data.img_Opt = this.getValue();
							}
						},
						{
							type : 'button',
							hidden : true,
							id : 'browse',
							style : 'position: absolute;right: 16px;',
							align : 'center',
							label : editor.lang.common.browseServer,
							filebrowser : {
							action : 'Browse',
							onSelect : function( fileUrl, data ) {
								var dialog = this.getDialog();
								dialog.getContentElement( 'general', 'file_url' ).setValue( fileUrl.replace('uploads', 'thumbs') );
								dialog.getContentElement( 'general', 'img_url' ).setValue( fileUrl );
								var thumb_url = dialog.getContentElement( 'general', 'file_url' ).getValue();
								var thumb_name = thumb_url.substr(thumb_url.lastIndexOf(\"\/\") + 1);
								var thumb_full_path = thumb_url.substr(0, thumb_url.lastIndexOf(\"\/\")+1);
								var thumb_path = thumb_full_path.substr(thumb_full_path.lastIndexOf('data')-1, thumb_full_path.lastIndexOf(\"\/\")+1);
								var element_id = CKEDITOR.document.getById( 'ImagePreviewBox' );
								element_id.setStyle('background-image', 'url(\"'+thumb_url+'\")');
								$.post('../plugins/responsivefilemanager/fileList.php?path='+thumb_path+'&thumb='+thumb_name, function(data) {
									var obj = JSON.parse(data);
									dialog.getContentElement( 'general', 'img_option' ).clear();
									dialog.getContentElement( 'general', 'img_option' ).add(editor.lang.common.notSet,'');
									for (var i = 0; i < obj.length; i++) {
										for (var categoryid in obj[i]) {
											var category = obj[i][categoryid];
											if(categoryid == 'name') {
												th_name = category;
											}
											if(categoryid == 'dimensions') {
												th_dimen = category;
											}
										}
										if(obj.length < 2) {
											dialog.getContentElement( 'general', 'img_option' ).disable();
										} else {
											dialog.getContentElement( 'general', 'img_option' ).enable();
											dialog.getContentElement( 'general', 'img_option' ).add(th_dimen, th_name);
										}
									}
								});
								return false;
							}
							}
						}
					]
					},
					{
						id:'txtAlt',
						type:'text',
						label:editor.lang.image.alt,accessKey:'A',
						'default':'',
						setup: function( element ) {
                            if(element.hasClass('thumbnailbox')) {
								this.setValue( element.find('.thumbnail').getItem(0).getChild(0).getAttribute( 'alt' ) );
							}
							if(element.hasClass('lightbox-css')) {
								var img_id = element.find('.lightbox').getItem(0).getAttribute( 'href' ).replace('#', '');
								var img_div = editor.document.getById( img_id );
								this.setValue( img_div.find('.lightbox-title').getItem(0).getText() );
							}
                        },
						commit : function( data ) {
							data.txtAlt = this.getValue();
						}
					},
					{
					type:'hbox',
					children:[
						{
							type: 'select',
							id: 'img_Align',
							label: editor.lang.common.align,
							items:[[editor.lang.common.notSet,''], [editor.lang.common.alignLeft,'left'],[editor.lang.common.alignRight,'right']],
							'default':'left',
							setup: function( element ) {
								var value = element.getStyle( 'float' );
								this.setValue( value );
							},
							commit : function( data ) {
								data.img_Align = this.getValue();
							}
						},
						{
							type: 'select',
							id: 'img_loader',
							label: editor.lang.common.target,
							items:[[editor.lang.common.targetNew,'_blank'], [editor.lang.common.targetSelf,'_self'], ['Simple Thumb','simplethumb'], ['prettyPhoto','prettyPhoto'], ['FancyBox','fancybox'], ['BaguetteBox','baguettebox'], ['LightBox CSS','lightboxcss']],
							onChange: function( api ) {
								var dialog = CKEDITOR.dialog.getCurrent();
								var element_id = dialog.getContentElement( 'general', 'baguette_settings' );
								var lightboxcss_id = dialog.getContentElement( 'general', 'lightboxcss_settings' );
								var gall_id = dialog.getContentElement( 'general', 'gallery_id' );
								if(this.getValue() == 'baguettebox') {
									element_id.getElement().show();
									lightboxcss_id.getElement().show();
									gall_id.disable();
								}
								else {
									lightboxcss_id.getElement().show();
									element_id.getElement().hide();
									gall_id.enable();
								}
								if(!this.insertMode) {
									this.disable();
								}
							},
							setup: function( element ) {
								var value = element.getAttribute( 'class' );
								var loader;
								if(element.getAttribute( 'target' ) == '_blank') loader = '_blank';
								if(element.getAttribute( 'target' ) == '_self') loader = '_self';
								if (value.indexOf('simplethumb') >= 0) loader = 'simplethumb';
								if (value.indexOf('prettyPhoto') >= 0) loader = 'prettyPhoto';
								if (value.indexOf('fancybox') >= 0) loader = 'fancybox';
								if (value.indexOf('baguette') >= 0) loader = 'baguettebox';
								if (value.indexOf('lightbox-css') >= 0) loader = 'lightboxcss';
								this.setValue( loader );
								if(!this.insertMode) {
									this.disable();
								}
							},
							commit : function( data ) {
								data.img_loader = this.getValue();
							}
						},
						{
							id:'img_margins',
							type:'text',
							label:'Margins (px)',
							validate: CKEDITOR.dialog.validate.integer(editor.lang.common.validateNumberFailed),
							'default':'',
							setup: function( element ) {
								var value = element.getStyle( 'margin' );
								var p_class = element.getAttribute( 'class' );
								p_class = p_class.substring(p_class.lastIndexOf('animation'),p_class.length);
								if(p_class == 'animation-polaroid') {
									value = value.substring(8,value.split('px', 3).join('px').length);
								}
								else if(p_class == 'animation-zoom') {
									value = value.substring(3,value.split('px', 2).join('px').length);
								}
								else if(p_class == 'animation-default') {
									value = value.substring(3,value.split('px', 2).join('px').length);
								}
								else { value = value.replace('px', ''); }
								if(value != null) {
									this.setValue( value.trim() );
								}
							},
							commit : function( data ) {
								data.img_margins = this.getValue();
							}
						},
					]},
					{
						type:'hbox',
						id:'lightboxcss_settings',
						hidden : false,
						children:[
							{
								id:'gallery_id',
								type:'text',
								label:'Gallery ID',
								title: 'Gallery ID class name (eg.: gallery-1)',
								'default':'',
								setup: function( element ) {
									var dialog = CKEDITOR.dialog.getCurrent();
									var loader = dialog.getContentElement( 'general', 'img_loader' ).getValue();
									if(loader == 'lightboxcss') {
										var img_id = element.find('.lightbox').getItem(0).getAttribute( 'href' ).replace('#', '');
										var img_div = editor.document.getById( img_id );
										var value = img_div.getAttribute( 'class' ).replace('lightbox-target', '');
									}
									else if(loader == 'baguettebox') {
										var value = 'baguetteBox';
										this.disable();
									}
									else {
										var value = element.find('.thumbnail').getItem(0).getAttribute( 'rel' );
										value = value.substring(value.lastIndexOf('[')+1,value.lastIndexOf(']'));
									}
									if(value != null) {
										this.setValue( value.trim() );
									}
								},
								commit : function( data ) {
									data.gallery_id = this.getValue();
								}
							},
							{
								type: 'select',
								id: 'lightboxcss_class',
								label: 'Gallery type',
								title: 'Choose a gallery animation class name',
								items:[[editor.lang.common.notSet,''], ['Default','animation-default'], ['Zoom','animation-zoom'], ['Polaroid','animation-polaroid'], ['Custom','animation-custom']],
								'default': 'animation-default',
								setup: function( element ) {
									var value = element.getAttribute( 'class' );
									value = value.substring(value.lastIndexOf('animation'),value.length);
									this.setValue( value );
								},
								commit : function( data ) {
									data.lightboxcss_settings = this.getValue();
								}
							},
							{
								id:'round_corner',
								type:'text',
								label:'Border radius (px)',
								validate: CKEDITOR.dialog.validate.integer(editor.lang.common.validateNumberFailed),
								'default':'',
								setup: function( element ) {
									var value = element.getStyle( 'border-radius' );
									this.setValue( value.replace('px', '') );
								},
								commit : function( data ) {
									data.round_corner = this.getValue();
								}
							},
					]},
					{
						type:'hbox',
						id:'baguette_settings',
						hidden : true,
						children:[
							{
								type: 'checkbox',
								id: 'baguette_first',
								label: 'Start a new gallery',
								title: 'Check if this image is the first in the gallery',
								'default': false,
								commit : function( data ) {
									data.baguette_first = this.getValue();
								}
							},
					]},
				]
			}
		],
		onShow: function() {
            var selection = editor.getSelection();
            var element = selection.getStartElement();
			var p_element = selection.getStartElement();
			if ( element.getAscendant( 'p' ) !== null && element.getAscendant( 'p', true ).hasClass('thumbnailbox') ) {
                element = element.getAscendant( 'p', true );
				this.insertMode = false;
			}
			else if ( element.getAscendant( 'p' ) !== null && element.getAscendant( 'p', true ).hasClass('lightbox-css') ) {
                element = element.getAscendant( 'p', true );
				this.insertMode = false;
			}
            else {
                this.insertMode = true;
			}
			console.log(\"Insert Mode: \"+this.insertMode);
            this.element = element;
            if ( !this.insertMode ) {
                this.setupContent( this.element );
			}
			else
				CKEDITOR.document.getById( 'ImagePreviewBox' ).setStyle('background-image', 'none');
		},
		onOk : function() {
			var dialog = this, data = {}, reff = editor.document.createElement( 'a' ); 
			var styles = 'border: 0 none;';
			this.commitContent( data );
			var p_elem = this.element;
			if(data.img_loader == 'lightboxcss') {
				p_elem.setAttribute( 'class', 'lightbox-css '+data.lightboxcss_settings );
				var p_elems = editor.document.find( '.lightbox-css' ).count();
				p_elem.setAttribute( 'id', 'lightboxcss'+'-'+p_elems );
			}
			else if(data.img_loader == 'baguettebox') {
				if(!data.baguette_first && this.insertMode) {
					var p_elems = editor.document.find( '.baguettebox' ).count();
					var baguete_parent = p_elem.getParent();
					var baguete_p = CKEDITOR.dom.element.createFromHtml( '<p class=\"new_temp\"></p>' );
					editor.document.getById( baguete_parent.getId() ).append( baguete_p );
					var p_last = editor.document.find('.new_temp').getItem(0);
					var range = new CKEDITOR.dom.range(editor.document);
					range.moveToElementEditablePosition(p_last, true);
					editor.getSelection().selectRanges([range]);
					p_elem = p_last;
				}
				p_elem.setAttribute( 'class', 'thumbnailbox baguette '+data.lightboxcss_settings );
			}
			else if(data.img_loader != 'simplethumb') {
				if(this.insertMode == false) {
					p_elem.removeAttribute( 'class' );
				}
				p_elem.setAttribute( 'class', 'thumbnailbox '+data.img_loader+' '+data.lightboxcss_settings );
				var p_elems = editor.document.find( '.thumbnailbox' ).count();
				p_elem.setAttribute( 'id', 'thumbnailbox'+'-'+p_elems );
			}
			if(data.img_Align == 'left' || data.img_Align == 'right') {
				var floats = 'float: '+data.img_Align+';';
			}
			else {
				var floats = '';
			}
			if(data.img_margins != '') {
				if(data.img_loader == 'simplethumb') {
					var margins = 'margin: '+data.img_margins+'px;';
				}
				else {
					var margins = 'margin:0 '+data.img_margins+'px '+data.img_margins/2+'px 0;';
				}
			}
			else {
				var margins = 'margin:0;';
			}
			if(data.round_corner != '') {
				var border_r = 'border-radius: '+data.round_corner+'px;';
			}
			else {
				var border_r = '';
			}
			if(data.lightboxcss_settings == 'animation-polaroid') {
				var margins = 'margin:0 0 10px 0;';
				var border_r = '';
			}
			var tmpImg = new Image();
			tmpImg.src = data.file_url;
			var thumb_width = 'width:'+tmpImg.width+'px;';
			var thumb_height = 'height:'+tmpImg.height+'px;';
			if(data.img_loader != 'simplethumb') {
				p_elem.setAttribute( 'style', floats+margins+border_r+thumb_width+thumb_height );
			}
			reff.setAttribute('href', data.img_url);
			if(data.img_loader == '_blank' || data.img_loader == '_self') {
				reff.setAttribute('target', data.img_loader);
				reff.setAttribute('class', 'thumbnail');
			} else if(data.img_loader == 'baguettebox') {
				reff.setAttribute('class', 'thumbnail');
			}
			else {
				if(data.img_loader != 'baguettebox' && data.img_loader != 'lightboxcss') {
					reff.setAttribute('class', 'thumbnail');
					if(data.gallery_id != '') {
						reff.setAttribute('rel', data.img_loader+'['+data.gallery_id+']');
					}
					else {
						reff.setAttribute('rel', data.img_loader);
					}
				}
			}
			if(data.baguette_first && this.insertMode) {
				divf = editor.document.createElement( 'div' );
				var p_elems = editor.document.find( '.baguettebox' ).count();
				divf.setAttribute('class', 'baguettebox');
				divf.setAttribute( 'id', 'baguette'+'-'+p_elems );
				if(data.lightboxcss_settings == 'animation-polaroid') {
					var bag_span = '<span class=\"polaroid-title\">'+data.txtAlt+'</span>';
				}
				else if(data.lightboxcss_settings == 'animation-default') {
					var bag_span = '<span class=\"default-title\">'+data.txtAlt+'</span>';
				}
				else {
					var bag_span = '';
				}
				var p_elem_styles = floats+margins+border_r+thumb_width+thumb_height;
				p_elem_styles = p_elem_styles.trim();
				divf.setHtml( '<p class=\"thumbnailbox baguette '+data.lightboxcss_settings+'\" style=\"'+p_elem_styles+'\"><a href=\"'+data.img_url+'\" class=\"thumbnail\"><img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.file_url+'\" style=\"'+styles+'\" />'+bag_span+'</a></p><p class=\"new_temp\"></p>' );
				editor.insertElement( divf );
				var p_last = editor.document.find('.new_temp').getItem(0);
				var range = new CKEDITOR.dom.range(editor.document);
				range.moveToElementEditablePosition(p_last, true);
				editor.getSelection().selectRanges([range]);
			}
			else if(data.img_loader == 'lightboxcss' && this.insertMode) {
				var thumb_url = dialog.getContentElement( 'general', 'file_url' ).getValue();
				var thumb_name = thumb_url.substr(thumb_url.lastIndexOf(\"\/\") + 1, thumb_url.lastIndexOf(\".\"));
				thumb_name = thumb_name.toLowerCase();
				thumb_name = thumb_name.split(\".\");
				thumb_name.pop();
				thumb_name.join('');
				var target_class = data.lightboxcss_settings;
				var gallery_class = data.gallery_id;
				if(gallery_class != '') {
					var elements = editor.document.find( '.'+gallery_class+'.lightbox-target' ), i = 0, element;
					var elements_count = elements.count();
					var prev_id, next_id;
					while ( element = elements.getItem( i++ ) ) {
						var el_prev = editor.document.getById( element.getId() ).find( '.'+gallery_class+' .prevLight' );
						var el_next = editor.document.getById( element.getId() ).find( '.'+gallery_class+' .nextLight' );
						if(elements_count != 0) {
							if( i == 1 && elements_count == 1) {
								var prev = CKEDITOR.dom.element.createFromHtml( '<a class=\"prevLight\" href=\"#'+gallery_class+'-'+thumb_name+'\">&nbsp;</a>' );
								editor.document.getById( elements.getItem(0).getId() ).append( prev );
								var next = CKEDITOR.dom.element.createFromHtml( '<a class=\"nextLight\" href=\"#'+gallery_class+'-'+thumb_name+'\">&nbsp;</a>' );
								editor.document.getById( elements.getItem(0).getId() ).append( next );
							}
							if( i == 1 && elements_count == 2) {
								elements.getItem(0).find('.prevLight').getItem(0).setAttribute('data-cke-saved-href', '#'+gallery_class+'-'+thumb_name);
								elements.getItem(0).find('.nextLight').getItem(0).setAttribute('data-cke-saved-href', '#' + elements.getItem(1).getId());
								elements.getItem(1).find('.prevLight').getItem(0).setAttribute('data-cke-saved-href', '#' + elements.getItem(0).getId());
								elements.getItem(1).find('.nextLight').getItem(0).setAttribute('data-cke-saved-href', '#'+gallery_class+'-'+thumb_name);
							}
							if( i == 2 && elements_count == 3) {
								elements.getItem(1).find('.prevLight').getItem(0).setAttribute('data-cke-saved-href', '#' + elements.getItem(0).getId());
								elements.getItem(1).find('.nextLight').getItem(0).setAttribute('data-cke-saved-href', '#' + elements.getItem(2).getId());
								elements.getItem(2).find('.prevLight').getItem(0).setAttribute('data-cke-saved-href', '#' + elements.getItem(1).getId());
								elements.getItem(2).find('.nextLight').getItem(0).setAttribute('data-cke-saved-href', '#'+gallery_class+'-'+thumb_name);
							}
							if( i == elements_count ) {
								if(elements_count == 1) {
									prev_id = '#' + elements.getItem(0).getId();
									next_id = '#' + elements.getItem(0).getId();
								}
								if(elements_count == 2) {
									prev_id = '#' + elements.getItem(1).getId();
									next_id = '#' + elements.getItem(0).getId();
								}
								if(elements_count > 2) {
									prev_id = '#' + elements.getItem(elements_count-1).getId();
									next_id = '#' + elements.getItem(0).getId();
									elements.getItem(elements_count-1).find('.nextLight').getItem(0).setAttribute('data-cke-saved-href', '#'+gallery_class+'-'+thumb_name);
								}
								var prev_el = elements.getItem(0).find('.prevLight').getItem(0);
								if(prev_el != null) {
									elements.getItem(0).find('.prevLight').getItem(0).setAttribute('data-cke-saved-href', '#'+gallery_class+'-'+thumb_name);
								}
							}
						}
					} //end while
				}
				else gallery_class = 'single';
				if(data.lightboxcss_settings == 'animation-polaroid') {
					var imgHtml = CKEDITOR.dom.element.createFromHtml('<a href=\"#'+gallery_class+'-'+thumb_name+'\" class=\"lightbox\"><img class=\"thumbnail\" src=\"'+data.file_url+'\" /><span class=\"polaroid-title\">'+data.txtAlt+'</span></a>');
				}
				else if(data.lightboxcss_settings == 'animation-default') {
					var imgHtml = CKEDITOR.dom.element.createFromHtml('<a href=\"#'+gallery_class+'-'+thumb_name+'\" class=\"lightbox\"><img class=\"thumbnail\" src=\"'+data.file_url+'\" /><span class=\"default-title\"></span></a>');
				}
				else {
					var imgHtml = CKEDITOR.dom.element.createFromHtml('<a href=\"#'+gallery_class+'-'+thumb_name+'\" class=\"lightbox\"><img class=\"thumbnail\" src=\"'+data.file_url+'\" /></a>');
				}
				if(data.txtAlt != '') {
					var add_title = '<span class=\"lightbox-title\">'+data.txtAlt+'</span>';
				}
				else {
					var add_title = '';
				}
				if(elements_count == 0 || gallery_class == 'single') {
					var imgHtml1 = CKEDITOR.dom.element.createFromHtml('<div id=\"'+gallery_class+'-'+thumb_name+'\" class=\"'+gallery_class+' lightbox-target\"><img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.img_url+'\" />'+add_title+'<a class=\"lightbox-close\" href=\"#\">&nbsp;</a></div>');
				}
				else {
					var imgHtml1 = CKEDITOR.dom.element.createFromHtml('<div id=\"'+gallery_class+'-'+thumb_name+'\" class=\"'+gallery_class+' lightbox-target\"><img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.img_url+'\" />'+add_title+'<a class=\"lightbox-close\" href=\"#\">&nbsp;</a><a class=\"prevLight\" href=\"'+prev_id+'\">&nbsp;</a><a class=\"nextLight\" href=\"'+next_id+'\">&nbsp;</a></div>');
				}
				editor.insertElement( imgHtml );
				editor.insertElement( imgHtml1 );
				
			}
			else {
				if(data.lightboxcss_settings == 'animation-polaroid') {
					reff.setHtml( '<img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.file_url+'\" /><span class=\"polaroid-title\">'+data.txtAlt+'</span>' );
				}
				else if(data.lightboxcss_settings == 'animation-default') {
					reff.setHtml( '<img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.file_url+'\" /><span class=\"default-title\">'+data.txtAlt+'</span>' );
				}
				else {
					if(!this.insertMode) {
						var is_span = this.element.find('span').getItem(0);
						if(is_span != null) {
							this.element.find('span').getItem(0).remove();
						}
					}
					if(data.img_loader == 'simplethumb') {
						simplet = editor.document.createElement( 'img' );
						simplet.setAttribute('class', 'simple-thumb');
						simplet.setAttribute('alt', data.txtAlt);
						simplet.setAttribute('src', data.file_url);
						simplet.setAttribute('style', styles+floats+margins+border_r);
					}
					else {
						reff.setHtml( '<img class=\"'+data.img_loader+'Img\" alt=\"'+data.txtAlt+'\" src=\"'+data.file_url+'\" style=\"'+styles+'\" />' );
					}
				}
			}
			if ( !this.insertMode ) {
				$( '.thumbnail' ).remove();
			}
			if(data.img_loader != 'simplethumb') {
				editor.insertElement( reff );
			}
			else {
				editor.insertElement( simplet );
			}
		}
	};
});";
		fwrite($myplugin1, $line);
		fclose($myplugin1);
		$icon_file = GSPLUGINPATH."responsivefilemanager/img/thumb.png";
		if(!file_exists($icon_file)) {
			$icon_file = GSPLUGINPATH."responsivefilemanager/img/thumbnail.png";
		}
		if (!copy($icon_file, GSADMINPATH.'template/js/ckeditor/plugins/thumb/icons/thumb.png')) {
			echo "failed to copy $icon_file...\n";
			return false;
		}
		return true;
	}
	return true;
}

function recursiveRemoveDirectory($directory) {
    foreach(glob("{$directory}/*") as $file) {
        if(is_dir($file)) {
            recursiveRemoveDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

function rfm_scriptstoFooter() {
	global $SITEURL;
	if (file_exists(GSDATAOTHERPATH.'rfm_config.xml')) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_jquery = $rfm_xml->jquery;
		$rfm_nojs = $rfm_xml->nojs;
	}
	
	if (!isset($rfm_nojs) || $rfm_nojs == 0) { ?>
<!-- Responsive FileManager Javascripts loading ver. 2.5 -->
<script>
function loadjscssfile(filename, filetype){
    if (filetype=="js"){ //if filename is a external JavaScript file
        var fileref=document.createElement('script');
        fileref.setAttribute("type","text/javascript");
        fileref.setAttribute("src", filename);
		fileref.async = false;
    }
    else if (filetype=="css"){ //if filename is an external CSS file
        var fileref=document.createElement("link");
        fileref.setAttribute("rel", "stylesheet");
        fileref.setAttribute("type", "text/css");
        fileref.setAttribute("href", filename);
    }
    if (typeof fileref!="undefined") {
		document.body.appendChild(fileref);
	}
}
if (window.addEventListener)
	window.addEventListener("load", loadjscssfile, false);
else if (window.attachEvent)
	window.attachEvent("onload", loadjscssfile);
else window.onload = loadjscssfile;
<?php
if (isset($rfm_jquery) && $rfm_jquery == 1) { ?>
if (document.querySelector('.prettyPhoto') !== null || document.querySelector('.fancybox') !== null) {
	loadjscssfile("<?php echo $SITEURL; ?>admin/template/js/jquery.min.js", "js");
}
<?php } ?>

if (document.querySelector('.prettyPhoto') !== null) {
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/css/prettyPhoto.css", "css");
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/prettyPhoto/jquery.prettyPhoto.js", "js");
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/prettyPhoto/rfm_prettyphoto.js", "js");
}
if (document.querySelector('.fancybox') !== null) {
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/FancyBox/jquery.fancybox.css", "css");
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/FancyBox/jquery.fancybox.pack.js", "js");
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/FancyBox/rfm_fancybox.js", "js");
}
if (document.querySelector('.baguettebox') !== null) {
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/BaguetteBox/baguetteBox.min.css", "css");
	loadjscssfile("<?php echo $SITEURL; ?>plugins/responsivefilemanager/js/BaguetteBox/baguetteBox.min.js", "js");
	window.onload = function() {
		baguetteBox.run('.baguettebox', {
			// Custom options
			fullScreen: false,
			animation: 'fadeIn',
			buttons: true,
			overlayBackgroundColor: 'rgba (0,0,0,.8)',
			captions: function(element) {
				return element.getElementsByTagName('img')[0].alt;
			}
		});
	};
}
</script>
<?php
	}
}

function rfm_scriptstoFooterBack() { 
	global $LANG, $SITEURL;
	if (file_exists(GSDATAOTHERPATH.'rfm_config.xml')) {
		$rfm_xml = getXML(GSDATAOTHERPATH . 'rfm_config.xml');
		$rfm_customf = $rfm_xml->cf_replace;
	}
	if (isset($rfm_customf) && $rfm_customf == 1) {
	if(file_exists($rfm_plugin_path."lang/".$LANG.".php")) $lang_curr = $LANG;
	else $lang_curr = substr($LANG,0,2);
	?>
<!-- Responsive FileManager Javascripts BackEnd -->
<script>
	var browse = $('span.edit-nav');
	for(var i=0, counter = browse.length; i < counter; i++) {
		var templatePage = browse[i].cloneNode(true);
		var is_id = $("a", templatePage).attr( 'id' );
		var change_id = is_id.replace('browse', 'browser');
		var change_url = is_id.replace('browse', 'post');
		var type = '1';
		if(change_id.indexOf('image') >= 0) type = '1';
		else if(change_id.indexOf('file') >= 0) type = '2';
		var new_url = '<?php echo $SITEURL; ?>plugins/responsivefilemanager/dialog.php?type='+type+'&lang=<?php echo $lang_curr; ?>&field_id='+change_url+'&akey=bce94f94426497ba5e669a705c186f12';
		$('#'+is_id).addClass('rfm-button');
		$('#'+is_id).attr( 'id',  change_id).attr( 'href',  new_url).attr( 'type',  'button');
	}
jQuery('.rfm-button').fancybox({		
	'width'		: 900,	
	'height'	: 600,	
	'type'		: 'iframe',	
	'autoScale'    	: false	
});
</script>
<?php
	}
}
?>
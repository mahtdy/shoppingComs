<?
$img_page_main= 'yep_theme/img/menu_image/';
$lang_filter = injection_replace($_GET['lang_filter']);
$query1 = "select align  from new_language where title='$lang_filter'";
$result1 = $coms_conect->query($query1);
$RS11 = $result1->fetch_assoc();

//print_r($_POST);
// arezo code---------setting id of edit_id-when you go with method get.if your id is not true, you left out.
if (isset($_GET['edit_id']))
    $edit_id = injection_replace($_GET['edit_id']);

if ($RS11['align'] == 0) $dir = 'rtl'; else $dir = 'ltr';

##################چک کردن زبان#######################
$la = injection_replace($_POST['manage_lang_filter']);

if (($lang_filter > "" && !in_array($lang_filter, $_SESSION["manager_title_lang"])) || ($la > "" && !in_array($la, $_SESSION["manager_title_lang"]))) {
    //echo $_POST['manage_lang_filter'].'<br>'.$lang_filter.'<br>';print_r($_SESSION["manager_title_lang"]);exit;
    header('Location: new_manager_signout.php');
    exit;
}
if ($lang_filter == '') $lang_filter = 'fa';
#########################چک کردن زیر سایت#############
$site_id = injection_replace($_POST['manage_site_filter']);
$site_filter = injection_replace($_GET['site_filter']);
if (($site_id > "" && !in_array($site_id, $_SESSION["manager_title_site"])) || ($site_filter > "" && !in_array($site_filter, $_SESSION["manager_title_site"]))) {
    header('Location: new_manager_signout.php');
    exit;
}
if ($site_filter == '') $site_filter = 'main';


$onvan = injection_replace($_POST['onvan']);
$type = injection_replace($_POST['type']);
$menu_id = injection_replace($_POST['menu_id']);
$menu_type = injection_replace($_POST['menu_type']);
$menu_mode = injection_replace($_GET['menu_mode']);
$edit_mode = injection_replace($_POST['edit_mode']);
$link = injection_replace($_POST['link']);
$show_open = injection_replace($_POST['show_open']);
$choose_kesho_or_url = injection_replace($_POST['choose_kesho_or_url']); //this code for choosing
$header_icon_link = injection_replace($_POST['header_icon_link']);//for saving name of ax icon
$header_icon = injection_replace($_POST['header_icon']);//for saving class of ax icon
$link_menu = injection_replace($_POST['link_menu']);//for saving onvan ax of font icon  i
$pic_link_menu = injection_replace($_POST['pic_link_menu']);//for saving link ax of font icon
$onvan_label = injection_replace($_POST['onvan_label']);//for saving link ax of font icon
$icon_label = injection_replace($_POST['icon_label']);//for saving having label or not
$have_icon = injection_replace($_POST['have_icon']); // for standard menu
$icon = injection_replace($_POST['icon_standard']);// the address of icon picture
$icon_link = injection_replace($_POST['icon_link']);// the link of icon picture
$choose_icon = injection_replace($_POST['choose_icon']);// this is for selecting type of pic  font
$onvan_img = injection_replace($_POST['onvan_img']);// this is for onvan_img
$have_image = injection_replace($_POST['have_image']);// have image or not checkbox for onvan
$type_pic = injection_replace($_POST['type_pic']);// type pic - value 1 or 2 save in db
$image = injection_replace($_POST['image']);// address of image in megaitem
$have_tag = injection_replace($_POST['have_tag']);// have tag or not
$have_button = injection_replace($_POST['have_button']);//have_button or not  in feature menu
$onvan_button = injection_replace($_POST['onvan_button']); // save onvan button in database
$link_button = injection_replace($_POST['link_button']); // save link button in database
$have_text = injection_replace($_POST['have_text']);// have text or not
$text = injection_replace($_POST['text']);// save text
$have_map = injection_replace($_POST['have_map']);// save have map or not
$big_icon_link = injection_replace($_POST['big_icon_link']);// save big icon link in features menu
$big_onvan_img = injection_replace($_POST['big_onvan_img']);// save big onvan image in features menu
$big_header_icon_link = injection_replace($_POST['big_header_icon_link']);// save big_header_icon_link in features menu
$big_header_icon = injection_replace($_POST['big_header_icon']);// save big_header_icon in features menu
$flag_shop = injection_replace($_POST['flag_shop']);// save big_header_icon in features menu
$id_shop = injection_replace($_POST['id_shop']);// id shop is foreign key
$show_name = injection_replace($_POST['show_name']);// template name save in db
$have_shop = injection_replace($_POST['have_shop']);// checkbox have_shop 1 or 0

if($show_open=='on')
    $show_open=1;
else
    $show_open=0;

if($have_map=='on')
    $have_map=1;
else
    $have_map=0;


if($have_icon=='on')
    $have_icon=1;
else
    $have_icon=0;

if($icon_label=='on')
    $icon_label=1;
else
    $icon_label=0;

if($have_tag=='on')
    $have_tag=1;
else
    $have_tag=0;

if($have_image=='on')
    $have_image=1;
else
    $have_image=0;

if($have_button=='on')
    $have_button=1;
else
    $have_button=0;

if($have_text=='on')
    $have_text=1;
else
    $have_text=0;

if ($have_shop == 'on')
    $have_shop = 1;
else
    $have_shop=0;

$content_news_cat = injection_replace_pic($_POST["content_news_cat"]);
$Custom_content_shop_subcat_cat = injection_replace_pic($_POST["Custom_content_shop_subcat_cat"]);
$Fixed_selection_cat = injection_replace_pic($_POST["Fixed_selection_cat"]);
$Custom_content_shop_number = injection_replace_pic($_POST["Custom_content_shop_number"]);

########################################################### باکس Tabs #####################################

//$condition1 = "name like 'Custom_content_Tabs_box%' and show_name='$tem'";
//delete_from_data_base('new_tem_setting',$condition1,$coms_conect);
$content_news_cat = injection_replace_pic($_POST["content_news_cat"]);
$Custom_content_Tabs_subcat_cat = injection_replace_pic($_POST["Custom_content_Tabs_subcat_cat"]);
$Fixed_selection_cat = injection_replace_pic($_POST["Fixed_selection_cat"]);
$Custom_content_Tabs_number = injection_replace_pic($_POST["Custom_content_Tabs_number"]);


if ($type_pic != 1 && $type_pic != 2)
    $type_pic = 0;

//try to save elhagh ax , pictures of elhagh ax save. in ax icon
#file upload field
if ($menu_mode == 2) {
    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_standard'][0]);
        if ($content_image_avatar != '') {
            $standard_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
            $icon_link = resize_image_M($standard_image, 15, 15, $img_page_main, '');
        }else
            $icon_link = '';
    }
} //---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
else if ($menu_mode == 5) {
    //try to save elhagh ax , pictures of elhagh ax save. in ax icon in megaitem
#file upload field
    if ($type_pic == 2)
        $image = injection_replace($_POST['image']);
    else if ($type_pic == 1) {
        $content_image_avatar_megaitem = injection_replace($_POST['content_image_avatar_megaitem_pic'][0]);
        if ($content_image_avatar_megaitem != '') {
            $megaitem_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar_megaitem;
            $image = resize_image_M($megaitem_image, 220, 145, $img_page_main, '');
        }else
            $image = '';
    }

//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu
//echo 'image is:'.$image;
    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_megaitem'][0]);
        if ($content_image_avatar != '') {
            $icon_megaitem = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
            $icon_link = resize_image_M($icon_megaitem, 15, 15, $img_page_main, '');
        } else
            $icon_link = '';
    }

    //  echo 'icon link  is:'.$icon_link;
//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
} else if ($menu_mode == 4) {
    //---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu

    if ($choose_icon == 2)
        $big_icon_link = injection_replace($_POST['big_icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_Features'][0]);
        if ($content_image_avatar != ''){
            $re_Features = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
            $big_icon_link = resize_image_M($re_Features, 70, 70, $img_page_main, '');
        }else
            $big_icon_link = '';


    }
    echo $big_icon_link;
//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
} else if ($menu_mode == 6) {
    //---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu

    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_call'][0]);
        if ($content_image_avatar != ''){
            $icon_call = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
        $icon_link = resize_image_M($icon_call, 15, 15, $img_page_main, '');
        }else
            $icon_link = '';
    }

//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
} else if ($menu_mode == 7) {
    //---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu

    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_shop'][0]);
        if ($content_image_avatar != '') {
            $icon_shop = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
            $icon_link = resize_image_M($icon_shop, 15, 15, $img_page_main, '');
        }else
            $icon_link = '';
    }

//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
} else if ($menu_mode == 3) {
    //---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu

    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_Tabs'][0]);
        if ($content_image_avatar != '')
            $icon_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
        else
            $icon_link = '';
    }

//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
} else if ($menu_mode == 1) {
    if ($choose_icon == 2)
        $icon_link = injection_replace($_POST['icon_link']);
    else if ($choose_icon == 1) {
        $content_image_avatar = injection_replace($_POST['content_image_avatar_dropdown'][0]);
        if ($content_image_avatar != '')
            $icon_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_image_avatar;
        else
            $icon_link = '';
    }

}

//print_r($_POST);
if ($show_open != 1)
    $show_open = 0;

if ($have_icon != 1)
    $have_icon = 0;

if ($icon_label != 1)
    $icon_label = 0;

if ($have_image != 1)
    $have_image = 0;

if ($have_tag != 1)
    $have_tag = 0;

if ($have_map != 1)
    $have_map = 0;

if ($have_text != 1)
    $have_text = 0;

if ($have_shop != 1)
    $have_shop = 0;

if ($have_button != 1)
    $have_button = 0;

if ($choose_icon != 1 && $choose_icon != 2)
    $choose_icon = 0;


$page_id = 0;
if ($site_filter == 'main') $domain = $_SERVER['HTTP_HOST']; else $domain = "$site_filter.{$_SERVER['SERVER_NAME']}";
if ($type == 1) {
    $static_page = injection_replace($_POST['static_page']);
    if ($static_page == 0)
        $link = "/UnderConstruction.php";
    else if ($static_page > "") {
        $sql = "SELECT site,la,name,title,id FROM new_static_page where id=$static_page";
        $result = $coms_conect->query($sql);
        $row = $result->fetch_assoc();


        $sql1 = "SELECT title FROM new_static_page where id=$static_page";
        $result1 = $coms_conect->query($sql1);
        $row1 = $result1->fetch_assoc();
        $title_static_page = $row1['title'];


        $page_title = insert_dash($row['title']);
        $page_id = $row['id'];
        $link = "http://$domain/{$row['name']}/{$row['la']}/$page_title";
    }
}
$daynamic = injection_replace($_POST['daynamic']);
$modual_cat = injection_replace($_POST['modual_cat']);
if ($type == 3 && $daynamic == 'contact_us') {
    $page_id = $daynamic;
    $link = "http://$domain/contact_us/$lang_filter";
} else if ($type == 3 && $daynamic == 'register') {
    $page_id = $daynamic;
    $link = "http://$domain/register/$lang_filter";
} else if ($type == 3 && $daynamic == 'login') {
    $page_id = $daynamic;
    $link = "http://$domain/login/$lang_filter";
} else if ($type == 3) {
    $page_id = $daynamic;
    if ($modual_cat == 0)
        $link = "http://$domain/$daynamic/$lang_filter";
    else
        $link = "http://$domain/$daynamic/$lang_filter/cat_id/$modual_cat";
}

###########################پیوند###################################

//insert in dropdown menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 1) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,have_icon,header_icon_link,  header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , icon_link ,  choose_icon, onvan_img) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,$have_icon,'$header_icon_link',  '$header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$icon_link' ,  $choose_icon , '$onvan_img')";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $news_id = $coms_conect->insert_id;
    echo 'jjjj';
    // echo $news_id;
  //  header('Location: /newcoms.php?yep=new_Menubar&menu_mode=1');


// update in standard menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 1 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $onvan_img = '';
        $icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $header_icon_link = '';
        $header_icon = '';
    }
    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode ,have_icon=$have_icon , header_icon_link='$header_icon_link' ,header_icon ='$header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , icon_link= '$icon_link' ,  choose_icon= $choose_icon , onvan_img= '$onvan_img'  where id=$edit_id";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=1');


}


//insert in dropdown menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 2) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,have_icon,header_icon_link,  header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , icon_link ,  choose_icon, onvan_img) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,$have_icon,'$header_icon_link',  '$header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$icon_link' ,  $choose_icon , '$onvan_img')";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $news_id = $coms_conect->insert_id;
    // echo $news_id;
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=2');


// update in standard menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 2 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $onvan_img = '';
        $icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $header_icon_link = '';
        $header_icon = '';
    }
    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode ,have_icon=$have_icon , header_icon_link='$header_icon_link' ,header_icon ='$header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , icon_link= '$icon_link' ,  choose_icon= $choose_icon , onvan_img= '$onvan_img'  where id=$edit_id";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=2');


}
//insert in megaitem menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 5) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,header_icon_link,  header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , icon_link ,  choose_icon, onvan_img , have_image , type_pic , image , have_tag) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,'$header_icon_link',  '$header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$icon_link' ,  $choose_icon , '$onvan_img' , $have_image , $type_pic , '$image' , $have_tag)";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $news_id = $coms_conect->insert_id;
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=5');
    //  echo $news_id;
    //echo $query1;
    /// echo '33';

// update in megaitem menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 5 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $onvan_img = '';
        $icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $header_icon_link = '';
        $header_icon = '';
    }
    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode , header_icon_link='$header_icon_link' ,header_icon ='$header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , icon_link= '$icon_link' ,  choose_icon= $choose_icon , onvan_img= '$onvan_img' , have_icon=$have_icon, type_pic=$type_pic , image='$image' , have_tag=$have_tag , have_image=$have_image where id=$edit_id";
    $coms_conect->query($query1);
    // echo $query1;
    // echo '444';
    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=5');


}


//insert in feature menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 4) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,have_icon, big_header_icon_link,  big_header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , big_icon_link ,  choose_icon, big_onvan_img , have_button , onvan_button , link_button , have_text , text) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,$have_icon,'$big_header_icon_link',  '$big_header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$big_icon_link' ,  $choose_icon , '$big_onvan_img' , $have_button , '$onvan_button' , '$link_button' , $have_text , '$text')";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $news_id = $coms_conect->insert_id;
    // echo $news_id;
    //echo $query1;
    //  exit();
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=4');


// update in feature menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 4 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $big_onvan_img = '';
        $big_icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $big_header_icon_link = '';
        $big_header_icon = '';
    }
    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode ,have_icon=$have_icon , big_header_icon_link='$big_header_icon_link' ,big_header_icon ='$big_header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , big_icon_link= '$big_icon_link' ,  choose_icon= $choose_icon , big_onvan_img= '$big_onvan_img', have_button=$have_button , onvan_button='$onvan_button' , link_button='$link_button' , have_text=$have_text , text='$text' where id=$edit_id";
    $coms_conect->query($query1);

    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=4');
    //echo $onvan;

}


//insert in call us menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 6) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,have_icon,header_icon_link,  header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , icon_link ,  choose_icon, onvan_img , have_button , onvan_button , link_button , have_text , text, have_map) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,$have_icon,'$header_icon_link',  '$header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$icon_link' ,  $choose_icon , '$onvan_img' , $have_button , '$onvan_button' , '$link_button' , $have_text , '$text' , $have_map)";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $news_id = $coms_conect->insert_id;
    // echo $news_id;
    //echo 'nnn';
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=6');

// update in call us menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 6 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $onvan_img = '';
        $icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $header_icon_link = '';
        $header_icon = '';
    }

    if ($have_map == 0) {
        $onvan_button = '';
        $link_button = '';
    }

    if ($have_text == 0) {
        $text = '';
    }

    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode ,have_icon=$have_icon , header_icon_link='$header_icon_link' ,header_icon ='$header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , icon_link= '$icon_link' ,  choose_icon= $choose_icon , onvan_img= '$onvan_img', have_button=$have_button , onvan_button='$onvan_button' , link_button='$link_button' , have_text=$have_text , text='$text', have_map=$have_map where id=$edit_id";
    $coms_conect->query($query1);
    // echo '222';
    //echo $query1;
    //echo $onvan;
    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=6');


}

//insert in shop menu
if (($onvan) > "" && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 7) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $query1 = "insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type,have_icon,header_icon_link,  header_icon ,choose_kesho_or_url , link_menu, pic_link_menu , icon_label, onvan_label , icon , icon_link ,  choose_icon, onvan_img, have_shop ) 
	values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type,$have_icon,'$header_icon_link',  '$header_icon' ,$choose_kesho_or_url , '$link_menu' , '$pic_link_menu' ,$icon_label , '$onvan_label' , '$icon' , '$icon_link' ,  $choose_icon , '$onvan_img'  , $have_shop)";
    $coms_conect->query($query1);
    show_msg('اطلاعات با موفقیت اضافه گردید');
    $id_shop = $coms_conect->insert_id;
    if ($Custom_content_shop_subcat_cat > 0 && $have_shop == 1)
        insert_templdate_menubar($site_filter, $Custom_content_shop_number, $lang_filter, $Fixed_selection_cat, $id_shop, $content_news_cat, $Custom_content_shop_subcat_cat, "Custom_content_shop_box", $show_name, $coms_conect);

    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=7');
// update in shop menu
} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 7 && isset($onvan) && $onvan > "") {
    if ($choose_kesho_or_url == 1) {
        $onvan_img = '';
        $icon_link = '';

    }
    if ($choose_kesho_or_url == 2) {
        $header_icon_link = '';
        $header_icon = '';
    }
    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' , menu_type=$menu_mode ,have_icon=$have_icon , header_icon_link='$header_icon_link' ,header_icon ='$header_icon' ,choose_kesho_or_url=$choose_kesho_or_url , link_menu='$link_menu' , pic_link_menu='$pic_link_menu' ,icon_label=$icon_label , onvan_label='$onvan_label' , icon='$icon' , icon_link= '$icon_link' ,  choose_icon= $choose_icon , onvan_img= '$onvan_img' , have_shop=$have_shop where id=$edit_id";
    $coms_conect->query($query1);
    // echo '222';
    //  echo $query1;
    //echo $onvan;

    if ($Custom_content_shop_subcat_cat > 0 && $have_shop == 1)
        update_templdate_menubar($site_filter, $Custom_content_shop_number, $lang_filter, $Fixed_selection_cat, $edit_id, $content_news_cat, $Custom_content_shop_subcat_cat, "Custom_content_shop_box", $show_name, $coms_conect);
    show_msg('اطلاعات با موفقیت ویرایش گردید');
    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=7');
}


//insert in tabs menu
if ((($onvan) > "" || ($onvan_label)>"") && $edit_mode == 0 && $_SESSION["can_add"] && !isset($edit_id) && $menu_mode == 3) {
    $sql = "SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $id++;
    $unic_id = time();
    $sql = "select count(id) as tedad  from new_menu where menu_type=3";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();
    if($choose_kesho_or_url==1)
    {
        $query1="insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id,menu_type, choose_kesho_or_url) 
	    values (0,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type, $choose_kesho_or_url)";
        $coms_conect->query($query1);
        $id_Tabs = $coms_conect->insert_id;
        show_msg('اطلاعات با موفقیت اضافه گردید');
    }
    else if($choose_kesho_or_url==2)
    {
        $query1 = "insert into new_menu(float_menu,onvan_label,rang,date,user_id,ip,la,site_id,unic_id,menu_type, choose_kesho_or_url) 
	    values (0,'$onvan_label',$id,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id',$menu_type, $choose_kesho_or_url)";
        $coms_conect->query($query1);
        $id_Tabs = $coms_conect->insert_id;
        show_msg('اطلاعات با موفقیت اضافه گردید');
        if ($Custom_content_Tabs_subcat_cat > 0 )
            insert_templdate_menubar($site_filter, $Custom_content_Tabs_number, $lang_filter, $Fixed_selection_cat, $id_Tabs, $content_news_cat, $Custom_content_Tabs_subcat_cat, "Custom_content_Tabs_box", $show_name, $coms_conect);
    }

    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=3');


} else if (isset($edit_id) && $_SESSION["can_edit"] && $menu_mode == 3 && (($onvan) > "" || ($onvan_label)>"")) {

    $query1 = "update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip', menu_type=$menu_type , choose_kesho_or_url=$choose_kesho_or_url where id=$edit_id";
    $coms_conect->query($query1);

        $query1 = "update new_menu set onvan_label='$onvan_label',edit_date=NOW(), menu_type=$menu_type , choose_kesho_or_url=$choose_kesho_or_url where id=$edit_id";
        $coms_conect->query($query1);

    show_msg('اطلاعات با موفقیت ویرایش گردید');
    update_templdate_Tabs_new($site_filter, $Custom_content_Tabs_number, $lang_filter, $Fixed_selection_cat, $edit_id, $content_news_cat, $Custom_content_Tabs_subcat_cat, "Custom_content_Tabs_box", $show_name, $coms_conect);
  header('Location: /newcoms.php?yep=new_Menubar&menu_mode=3');
}

$menu_type = '';
$have_icon = '';
$header_icon_link = '';
$header_icon = '';
$choose_kesho_or_url = '';
$link_menu = '';
$pic_link_menu = '';
$icon_label = '';
$onvan_label = '';
$icon = '';
$icon_link = '';
$choose_icon = '';
$onvan_img = '';
$type = '';
$page_id = '';
$show_open = '';
$link = '';
$manager_id = '';
$custom_ip = '';
$have_icon = '';
$type_pic = '';
$image = '';
$have_tag = '';
$have_button = '';
$onvan_button = '';
$link_button = '';
$have_text = '';
$text = '';
$have_map = '';
$big_icon_link = '';
$big_onvan_img = '';
$big_header_icon_link = '';
$big_header_icon = '';
$have_image = '';
$have_shop = '';
$onvan = '';


if ($edit_id) {
    $query = "SELECT * FROM new_menu  where id='$edit_id'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $menu_type = $row['menu_type'];
    $have_icon = $row['have_icon'];
    $header_icon_link = $row['header_icon_link'];
    $header_icon = $row['header_icon'];
    $choose_kesho_or_url = $row['choose_kesho_or_url'];
    $link_menu = ['link_menu'];
    $pic_link_menu = $row['pic_link_menu'];
    $icon_label = $row['icon_label'];
    $onvan_label = $row['onvan_label'];
    $icon = $row['icon'];
    $icon_link = $row['icon_link'];
    $choose_icon = $row['choose_icon'];
    $onvan_img = $row['onvan_img'];
    $type = $row['type'];
    $page_id = $row['page_id'];
    $show_open = $row['target'];
    $onvan = $row['name'];
    $link = $row['link'];
    $manager_id = $row['edit_user_id'];
    $custom_ip = $row['edit_ip'];
    $have_icon = $row['have_icon'];
    $type_pic = $row['type_pic'];
    $image = $row['image'];
    $have_tag = $row['have_tag'];
    $have_button = $row['have_button'];
    $onvan_button = $row['onvan_button'];
    $link_button = $row['link_button'];
    $have_text = $row['have_text'];
    $text = $row['text'];
    $have_map = $row['have_map'];
    $big_icon_link = $row['big_icon_link'];
    $big_onvan_img = $row['big_onvan_img'];
    $big_header_icon_link = $row['big_header_icon_link'];
    $big_header_icon = $row['big_header_icon'];
    $have_image = $row['have_image'];
    $have_shop = $row['have_shop'];
    $la = $row['la'];
    $id_Tabs = $edit_id;

}


if ($edit_id) {

    if ($page_id == 0)
        $title_static_page = "در دست ساخت";
    else {
        $sql1 = "SELECT title FROM new_static_page where id=$page_id";
        $result1 = $coms_conect->query($sql1);
        $row1 = $result1->fetch_assoc();
        $title_static_page = $row1['title'];
    }
    if ($type == 3) {

        if (strpos($link, 'contact_us') == true) {
            $link = 'contact_us';
        } else if (strpos($link, 'register') == true) {
            $link = 'register';
        } else if (strpos($link, 'login') == true) {
            $link = 'login';
        } else if (strpos($link, 'cat_id') == true) {
            $link_array = explode('/', $link);
            $id_variable = end($link_array);
            $sql1 = "SELECT new_modules_cat.name,new_modules.link FROM new_modules_cat, new_modules where new_modules_cat.id=$id_variable and new_modules_cat.type=new_modules.id";
            $result1 = $coms_conect->query($sql1);
            while ($row1 = $result1->fetch_assoc()) {
                $name_module = $row1['name'];
                $link = $row1['link'];
            }

        } else {

            $sql1 = "SELECT name,link FROM new_modules ";
            $result1 = $coms_conect->query($sql1);
            while ($RS1 = $result1->fetch_assoc()) {
                if (strpos($link, $RS1['link']) == true) {
                    $link = $RS1['link'];
                    break;
                }

            }

        }

    }


}



////////////////////////////////////////////////////////////////////////////////////////
?>
<!------------------------------------------------------- this code for matn kamel mohtava------------------------------>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<!---------------------------------------- end code----------------------------------------------------------------------->
<script src="/yep_theme/default/rtl/js/menubar/functions.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<!------------------------------------arezo code        ----------------------------------------------------->


<!--this css and java script for list keshoyi iconha----------------------------------------------------------------------->
<link rel="stylesheet"
      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!--end code this css and java script for list keshoyi iconha---------------------------------------------------------->

<!------------------------------------------this is for orakuloader----------------------------------------------------->
<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>
<!----------------------------------------------end code for orakuploader----------------------------------------------------------------------->

<!-------------this is for pop up magific---------------->
<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">
<!---------------------end code for pop up magific----------------------------------->

<script src="/yep_theme/default/rtl/js/select2.js"></script>


<!------------------------------------------------------- this code for matn kamel mohtava------------------------------>
<!--<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>-->
<!---------------------------------------- end code----------------------------------------------------------------------->

<link rel="stylesheet" href="/yep_theme/default/rtl/css/menu-arezo.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">

<!--this css and java script for popup file manager -->
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<!--this css and java script for lpopup file manager -->
<!------------------------------------end arezo code   ---------------------------------------------------->

<script type="text/javascript">
    $(document).ready(function () {
        $('#static_page').select2({
            data: [
                <?
                $query = "select id,name,title from new_static_page where la='$lang_filter' and site='$site_filter'";$i = 0;
                $result = $coms_conect->query($query);
                echo '{' . 'id' . ':0,' . 'text' . ':' . "'در دست ساخت'" . "}";
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    $name = $RS1["name"] . ' ( ' . $RS1["title"] . ' ) ';
                    echo ',' . '{' . 'id' . ':' . $id . ',' . 'text' . ':' . "'" . $name . "'" . "}";
                    $i++;
                }
                ?>
            ],
            allowClear: true,
            multiple: false,
            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>

<!-----------------------------------------------code arezo------------------------------------->
<script>
    $(document).ready(function () {


        // $("#Features_menu").hide();
        // $("#menu_megaitem").hide();
        // $("#call_menu").hide();
        // $("#dropdown_menu").hide();
        // $("#shop_menu").hide();
        // $("#Tabs_menu").hide();
        //     $("#arezo_menu_kesho_icon_standard").hide();
        //      $("#arezo_menu_kesho_icon_megaitem").hide();

        //  $("#arezo_title_btn_standard").hide();
        //  $("#icon_pic_standard").hide();
        //  $("#arezo_label_megaitem").hide();
///
        // $("#have_icon").hide();
        // $("#arezo_onvan").hide();
        // $("#arezo_type").hide();
        // $("#arezo-show_open").hide();
        // $("#add_temp").hide();
        // $("#add_temp2").hide();
        // $("#add_temp3").hide();
        // $("#arezo_select_pic").hide();
        // $("#arezo_icon_btn").hide();
        // $("#arezo_icon_title_checkbox").hide();
        //  $("#arezo_title_btn").hide();
        // $("#arezo_title_checkbox").hide();
        // $("#arezo_select_media").hide();
        // $("#upload_type2").hide();
        // $("#a-icon").hide();
        // $("#a-title").hide();
        // $("#arezo_menu_kesho_icon").hide();
        // $("#upload_type1").hide();
        // $("#content_image_avatar").hide();
        // $("#a_title_btn_new").hide();
        // $("#select2-drop-mask").hide();
        // $("#onvan_btn").hide();
        //
        //
        //
        //
        // //if dokmedar is checked after you select elhagh ax , then you select entekhab onvan ,because the user before choose dokmedar, we must the div it
        // if ($("#arezo_icon_btn").is(":checked")) {
        //     $("#arezo_title_btn").show();
        //
        // }
        //
        // //if matn dashte bashad  is checked after you select elhagh ax , then you select entekhab onvan ,because the user before choose matn dashte bashad, we must the div it
        // if ($("#arezo_icon_title_checkbox").is(":checked")) {
        //     $("#arezo_title_checkbox").show();
        // }
        //
        //
        //  $("input[name='choose_picture_or_title']").click(function () {
        //      if ($("#choose-pic").is(":checked")) {
        //         $("#have_icon").hide();
        //          $("#arezo_onvan").hide();
        //          $("#arezo_type").hide();
        //         $("#arezo-show_open").hide();
        //          $("#arezo_select_pic").show();
        //         $("#arezo_icon_btn").hide();
        //         $("#arezo_icon_title_checkbox").hide();
        //          $("#a-icon").hide();
        //          $("#a-title").hide();
        //          $("#arezo_title_checkbox").hide();
        //         $("#arezo_title_btn").hide();
        //
        //         $("#arezo_select_media").show();
        //         $("#arezo_menu_kesho_icon").hide();
        //         $("#upload_type2").show();
        //          $("#add_temp").hide();
        //          $("#add_temp2").hide();
        //          $("#add_temp3").hide();
        //          $("#a_title_btn_new").hide();
        //         $("#a_dokme_btn_new").hide();
        //          $("#onvan_btn").hide();
        //          $("#arezo_title_checkbox").hide();
        //
        //
        //
        //
        //      } else {
        //          $("#have_icon").show();
        //          $("#arezo_onvan").show();
        //          $("#arezo_type").show();
        //          $("#arezo-show_open").show();
        //          $("#arezo_select_pic").hide();
        //          $("#arezo_icon_btn").show();
        //         $("#arezo_icon_title_checkbox").show();
        //          $("#a-icon").show();
        // $("#a-title").show();
        //          $("#arezo_select_media").hide();
        //         $("#upload_type2").hide();
        //         $("#onvan_btn").show();
        //          $("#a_title_btn_new").show();
        //          $("#a_dokme_btn_new").show();
        //         $("#arezo_menu_kesho_icon").hide();
        //
        //
        //
        //     }
        // });
        //


        //this code for showing dokme icon and onvan label in standard menu
        var dokme_label_standard_before = $("#arezo_icon_btn_standard");
        $('input').on('click', function () {
            if (dokme_label_standard_before.is(':checked')) {
                $("#arezo_title_btn_standard").show();
            }
            else {
                $("#arezo_title_btn_standard").hide();
            }
        });

        //this code for showing dokme icon and onvan zir menu in Tab menu
        var dokme_Tab_asli = $("#arezo_icon_btn_Tab_asli");
        $('input').on('click', function () {
            if (dokme_Tab_asli.is(':checked')) {
                $("#arezo_Tabs_asli").show();
            }
            else {
                $("#arezo_Tabs_asli").hide();
            }
        });

        //this code for showing dokme icon and onvan label in Tab menu
        var dokme_Tab_zir_menu = $("#arezo_icon_btn_Tab_zir_menu");
        $('input').on('click', function () {
            if (dokme_Tab_zir_menu.is(':checked')) {
                $("#arezo_Tabs_zir_menu").show();
            }
            else {
                $("#arezo_Tabs_zir_menu").hide();
            }
        });


        //this code for showing dokme icon and onvan label in dropdown menu
        var dokme_label_dropdown_before = $("#arezo_icon_btn_dropdown");
        $('input').on('click', function () {
            if (dokme_label_dropdown_before.is(':checked')) {
                $("#arezo_title_btn_dropdown").show();
            }
            else {
                $("#arezo_title_btn_dropdown").hide();
            }
        });

        //this code for showing dokme icon and onvan label in shop menu
        var dokme_label_shop_before = $("#arezo_icon_btn_shop");
        $('input').on('click', function () {
            if (dokme_label_shop_before.is(':checked')) {
                $("#arezo_title_btn_shop").show();
            }
            else {
                $("#arezo_title_btn_shop").hide();
            }
        });


        //this code for showing dokme icon and onvan label in call menu
        var dokme_label_call_before = $("#arezo_icon_btn_call");
        $('input').on('click', function () {
            if (dokme_label_call_before.is(':checked')) {
                $("#arezo_title_btn_call").show();
            }
            else {
                $("#arezo_title_btn_call").hide();
            }
        });


        //this code for showing dokme icon and onvan label in feature menu


        var dokme_label_Feature_before = $("#arezo_icon_btn_Features");
        $('input').on('click', function () {
            if (dokme_label_Feature_before.is(':checked')) {
                $("#arezo_title_btn_Features").show();
            }
            else {
                $("#arezo_title_btn_Features").hide();
            }
        });

        var dokme_custom_shop_before = $("#arezo_icon_custom_content_shop");
        $('input').on('click', function () {
            if (dokme_custom_shop_before.is(':checked')) {
                $("#show_show_name").show();
                $("#shop_custom_title").show();
            }
            else {
                $("#show_show_name").hide();
                $("#shop_custom_title").hide();
            }
        });


        //this code for showing dokme icon and onvan text in Feature menu
        var dokme_text_Feature_before = $("#arezo_icon_text_Features");
        $('input').on('click', function () {
            if (dokme_text_Feature_before.is(':checked')) {
                $("#arezo_text").show();
            }
            else {
                $("#arezo_text").hide();
            }
        });

        //this code for showing dokme icon and onvan text in call menu
        var dokme_text_call_before = $("#arezo_icon_text_call");
        $('input').on('click', function () {
            if (dokme_text_call_before.is(':checked')) {
                $("#arezo_text_call").show();
            }
            else {
                $("#arezo_text_call").hide();
            }
        });

        //this code for showing dokme icon and onvan button in Feature menu
        var dokme_button_Feature_before = $("#arezo_icon_button_Features");
        $('input').on('click', function () {
            if (dokme_button_Feature_before.is(':checked')) {
                $("#arezo_btn_title_link_Feature").show();
            }
            else {
                $("#arezo_btn_title_link_Feature").hide();
            }
        });

        //this code for showing dokme icon and onvan button in call menu
        var dokme_button_call_before = $("#arezo_icon_button_call");
        $('input').on('click', function () {
            if (dokme_button_call_before.is(':checked')) {
                $("#arezo_btn_title_link_call").show();
            }
            else {
                $("#arezo_btn_title_link_call").hide();
            }
        });

        //this code for showing map in call menu
        var dokme_map_call_before = $("#arezo_icon_map_call");
        $('input').on('click', function () {
            if (dokme_map_call_before.is(':checked')) {
                $("#arezo_map_call").show();
            }
            else {
                $("#arezo_map_call").hide();
            }
        });

        //this code for showing dokme icon and onvan button in megaitem menu
        var dokme_label_megaitem_before = $("#arezo_icon_btn_megaitem");
        $('input').on('click', function () {
            if (dokme_label_megaitem_before.is(':checked')) {
                $("#arezo_title_btn_megaitem").show();
            }
            else {
                $("#arezo_title_btn_megaitem").hide();
            }
        });


        // ===================================================================for after executing show and hide label . for updating for standard menu
        $(document).ready(function () {
            var dokme_label_standard = $("#arezo_icon_btn_standard");
            if (dokme_label_standard.is(':checked')) {
                $("#arezo_title_btn_standard").show();
            }
            else {
                $("#arezo_title_btn_standard").hide();
            }
        });
        //================================================


        // ===================================================================for after executing show and hide onvan asli . for updating for tabs menu
        $(document).ready(function () {
            var dokme_Tabs_asli = $("#arezo_icon_btn_Tab_asli");
            if (dokme_Tabs_asli.is(':checked')) {
                $("#arezo_Tabs_asli").show();
            }
            else {
                $("#arezo_Tabs_asli").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide onvan zir menu . for updating for tabs menu
        $(document).ready(function () {
            var dokme_Tabs_zir_menu = $("#arezo_icon_btn_Tab_zir_menu");
            if (dokme_Tabs_zir_menu.is(':checked')) {
                $("#arezo_Tabs_zir_menu").show();
            }
            else {
                $("#arezo_Tabs_zir_menu").hide();
            }
        });
        //================================================
        // ===================================================================for after executing show and hide label . for updating for dropdown menu
        $(document).ready(function () {
            var dokme_label_dropdown = $("#arezo_icon_btn_dropdown");
            if (dokme_label_dropdown.is(':checked')) {
                $("#arezo_title_btn_dropdown").show();
            }
            else {
                $("#arezo_title_btn_dropdown").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide label . for updating for shop menu
        $(document).ready(function () {
            var dokme_custom_shop = $("#arezo_icon_custom_content_shop");
            if (dokme_custom_shop.is(':checked')) {
                $("#show_show_name").show();
                $("#shop_custom_title").show();
            }
            else {
                $("#show_show_name").hide();
                $("#shop_custom_title").hide();
            }
        });
        //================================================


        // ===================================================================for after executing show and hide label . for updating for shop menu
        $(document).ready(function () {
            var dokme_label_shop = $("#arezo_icon_btn_shop");
            if (dokme_label_shop.is(':checked')) {
                $("#arezo_title_btn_shop").show();
            }
            else {
                $("#arezo_title_btn_shop").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide label . for updating for Feature menu
        $(document).ready(function () {
            var dokme_label_Feature = $("#arezo_icon_btn_Features");
            if (dokme_label_Feature.is(':checked')) {
                $("#arezo_title_btn_Features").show();
            }
            else {
                $("#arezo_title_btn_Features").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide label . for updating for call menu
        $(document).ready(function () {
            var dokme_label_call = $("#arezo_icon_btn_call");
            if (dokme_label_call.is(':checked')) {
                $("#arezo_title_btn_call").show();
            }
            else {
                $("#arezo_title_btn_call").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide text . for updating for Feature menu
        $(document).ready(function () {
            var dokme_text_Feature = $("#arezo_icon_text_Features");
            if (dokme_text_Feature.is(':checked')) {
                $("#arezo_text").show();
            }
            else {
                $("#arezo_text").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide text . for updating for call menu
        $(document).ready(function () {
            var dokme_text_call = $("#arezo_icon_text_call");
            if (dokme_text_call.is(':checked')) {
                $("#arezo_text_call").show();
            }
            else {
                $("#arezo_text_call").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide map . for updating for call menu
        $(document).ready(function () {
            var dokme_map_call = $("#arezo_icon_map_call");
            if (dokme_map_call.is(':checked')) {
                $("#arezo_map_call").show();
            }
            else {
                $("#arezo_map_call").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide button . for updating for Feature menu
        $(document).ready(function () {
            var dokme_button_Feature = $("#arezo_icon_button_Features");
            if (dokme_button_Feature.is(':checked')) {
                $("#arezo_btn_title_link_Feature").show();
            }
            else {
                $("#arezo_btn_title_link_Feature").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide button . for updating for call menu
        $(document).ready(function () {
            var dokme_button_call = $("#arezo_icon_button_call");
            if (dokme_button_call.is(':checked')) {
                $("#arezo_btn_title_link_call").show();
            }
            else {
                $("#arezo_btn_title_link_call").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide label . for updating for megaitem menu
        $(document).ready(function () {
            var dokme_label_megaitem = $("#arezo_icon_btn_megaitem");
            if (dokme_label_megaitem.is(':checked')) {
                $("#arezo_title_btn_megaitem").show();
            }
            else {
                $("#arezo_title_btn_megaitem").hide();
            }
        });
        //================================================


        // ===================================================================for after executing show and hide icon font . for updating for standard menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_standard = $("#a_open_icon");
            if (dokme_icon_fontafterexe_standard.is(':checked')) {
                $("#arezo_menu_kesho_icon_standard").show();
            }
            else {
                $("#arezo_menu_kesho_icon_standard").hide();
            }
        });
        //===============================================

        // ===================================================================for after executing show and hide icon font . for updating for dropdown menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_dropdown = $("#a_open_icon_dropdown");
            if (dokme_icon_fontafterexe_dropdown.is(':checked')) {
                $("#arezo_menu_kesho_icon_dropdown").show();
            }
            else {
                $("#arezo_menu_kesho_icon_dropdown").hide();
            }
        });
        //===============================================

        // ===================================================================for after executing show and hide icon font . for updating for shop menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_shop = $("#a_open_icon_shop");
            if (dokme_icon_fontafterexe_shop.is(':checked')) {
                $("#arezo_menu_kesho_icon_shop").show();
            }
            else {
                $("#arezo_menu_kesho_icon_shop").hide();
            }
        });
        //================================================


        // ===================================================================for after executing show and hide icon font . for updating for Feature menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_Feature = $("#a_open_icon_Features");
            if (dokme_icon_fontafterexe_Feature.is(':checked')) {
                $("#arezo_menu_kesho_icon_Features").show();
            }
            else {
                $("#arezo_menu_kesho_icon_Features").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide icon font . for updating for call menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_call = $("#a_open_icon_call");
            if (dokme_icon_fontafterexe_call.is(':checked')) {
                $("#arezo_menu_kesho_icon_call").show();
            }
            else {
                $("#arezo_menu_kesho_icon_call").hide();
            }
        });
        //================================================

        // ===================================================================for after executing show and hide icon font . for updating for standard menu
        $(document).ready(function () {
            var dokme_icon_fontafterexe_megaitem = $("#a_open_icon_megaitem");
            if (dokme_icon_fontafterexe_megaitem.is(':checked')) {
                $("#arezo_menu_kesho_icon_megaitem").show();
            }
            else {
                $("#arezo_menu_kesho_icon_megaitem").hide();
            }
        });
        //================================================


        // ===================================================================for after executing show and hide picture in megaitem . for updating for megaitem menu
        $(document).ready(function () {
            var dokme_pic_after_mega = $("#have_pic_megaitem");
            if (dokme_pic_after_mega.is(':checked')) {
                $("#picture_onvan_megaitem").show();
            }
            else {
                $("#picture_onvan_megaitem").hide();
            }
        });
        //================================================


        //this code for showing ax icon pic or not in standard menu
        var dokme_choose_pic2_standard = $("#choose_pic2_standard");
        $('input').on('click', function () {
            if (dokme_choose_pic2_standard.is(':checked')) {
                $("#icon_pic_standard").show();
            }
            else {
                $("#icon_pic_standard").hide();
            }
        });
        //end code for showing dokme icon and onvan button


        //this code for showing ax icon pic or not in shop menu
        var dokme_choose_pic2_shop = $("#choose_pic2_shop");
        $('input').on('click', function () {
            if (dokme_choose_pic2_shop.is(':checked')) {
                $("#icon_pic_shop").show();
            }
            else {
                $("#icon_pic_shop").hide();
            }
        });
        //end code for showing dokme icon and onvan button

        //this code for showing ax icon pic or not in Feature menu
        var dokme_choose_pic2_Feature = $("#choose_pic2_Features");
        $('input').on('click', function () {
            if (dokme_choose_pic2_Feature.is(':checked')) {
                $("#icon_pic_Features").show();
            }
            else {
                $("#icon_pic_Features").hide();
            }
        });
        //end code for showing dokme icon and onvan button

        //this code for showing ax icon pic or not in call menu
        var dokme_choose_pic2_call = $("#choose_pic2_call");
        $('input').on('click', function () {
            if (dokme_choose_pic2_call.is(':checked')) {
                $("#icon_pic_call").show();
            }
            else {
                $("#icon_pic_call").hide();
            }
        });
        //end code for showing dokme icon and onvan button

        //this code for showing ax icon pic or not in menu standard menu
        var dokme_choose_pic2_megaitem = $("#choose_pic2_megaitem");
        $('input').on('click', function () {
            if (dokme_choose_pic2_megaitem.is(':checked')) {
                $("#icon_pic_megaitem").show();
            }
            else {
                $("#icon_pic_megaitem").hide();
            }
        });
        //end code for showing dokme icon and onvan button

        //this code for showing picture in megaitem after checkbox
        var dokme_picture_megaitem_checkbox = $("#have_pic_megaitem");
        $('input').on('click', function () {
            if (dokme_picture_megaitem_checkbox.is(':checked')) {
                $("#picture_onvan_megaitem").show();
            }
            else {
                $("#picture_onvan_megaitem").hide();
            }
        });
        //end code for showing picture in megaitem after checkbox click


        // // $("#arezo_icon_btn").click(function () {
        // //     if ($(this).is(":checked")) {
        // //         $("#arezo_title_btn").show();
        // //
        // //     } else {
        // //         $("#arezo_title_btn").hide();
        // //     }
        // // });
        //
        // //this code for showing title button
        // var dokme_title=$("#arezo_icon_title_checkbox");
        // $('input').on('click',function(){
        //     if(dokme_title.is(':checked')){
        //         $("#arezo_title_checkbox").show();
        //     }
        //     else
        //     {
        //         $("#arezo_title_checkbox").hide();
        //     }
        // });
        // //end code for button title after click
        //
        // //this code for hiding elzami bodan buttons in dokmedar and title
        //
        //
        // //
        // // $("#choose-pic").click(function () {
        // //     if ($(this).is(":checked")) {
        // //         $("#arezo_title_btn").hide();
        // //         $("#arezo_title_checkbox").hide();
        // //     }
        // //     else {
        // //       $("#arezo_title_checkbox").show();
        // //
        // //     }
        // // });
        //

        //
        // //this code for hide list keshoyi az iconkonha in standard menu
        // var dokme_icondar_megaitem = $("#have_icon");
        // $('input').on('click', function () {
        //     if (dokme_icondar_megaitem.is(':checked')) {
        //         $("#arezo_menu_kesho_icon_megaitem").show();
        //     }
        //     else {
        //         $("#arezo_menu_kesho_icon_megaitem").hide();
        //     }
        // });


        var dokme_icondar_standard = $("#a_open_icon");
        $('input').on('click', function () {
            if (dokme_icondar_standard.is(':checked')) {
                $("#arezo_menu_kesho_icon_standard").show();
            }
            else {
                $("#arezo_menu_kesho_icon_standard").hide();
            }
        });


        var dokme_icondar_dropdown = $("#a_open_icon_dropdown");
        $('input').on('click', function () {
            if (dokme_icondar_dropdown.is(':checked')) {
                $("#arezo_menu_kesho_icon_dropdown").show();
            }
            else {
                $("#arezo_menu_kesho_icon_dropdown").hide();
            }
        });


        var dokme_icondar_shop = $("#a_open_icon_shop");
        $('input').on('click', function () {
            if (dokme_icondar_shop.is(':checked')) {
                $("#arezo_menu_kesho_icon_shop").show();
            }
            else {
                $("#arezo_menu_kesho_icon_shop").hide();
            }
        });

        var dokme_icondar_Feature = $("#a_open_icon_Features");
        $('input').on('click', function () {
            if (dokme_icondar_Feature.is(':checked')) {
                $("#arezo_menu_kesho_icon_Features").show();
            }
            else {
                $("#arezo_menu_kesho_icon_Features").hide();
            }
        });

        var dokme_icondar_call = $("#a_open_icon_call");
        $('input').on('click', function () {
            if (dokme_icondar_call.is(':checked')) {
                $("#arezo_menu_kesho_icon_call").show();
            }
            else {
                $("#arezo_menu_kesho_icon_call").hide();
            }
        });

        var dokme_icondar_megaitem = $("#a_open_icon_megaitem");
        $('input').on('click', function () {
            if (dokme_icondar_megaitem.is(':checked')) {
                $("#arezo_menu_kesho_icon_megaitem").show();
            }
            else {
                $("#arezo_menu_kesho_icon_megaitem").hide();
            }
        });

        // var dokme_icondar_megaitem_new = $("#a_open_icon_megaitem");
        // $('input').on('click', function () {
        //     if (dokme_icondar_megaitem_new.is(':checked')) {
        //         $("#arezo_menu_kesho_icon_megaitem").show();
        //     }
        //     else {
        //         $("#arezo_menu_kesho_icon_megaitem").hide();
        //     }
        // });
        //
        // //for showing and hiding picture after click checkbox in megaitem
        // var dokme_icondar_megaitem_onvan = $("#have_pic_megaitem");
        // $('input').on('click', function () {
        //     if (dokme_icondar_megaitem_onvan.is(':checked')) {
        //         $("#picture_onvan_megaitem").show();
        //     }
        //     else {
        //         $("#picture_onvan_megaitem").hide();
        //     }
        // });

        // //this code for open icon of standard menu afte checkbox click
        // $("#a_open_icon_standrad").click(function () {
        //     if ($(this).is(":checked")) {
        //
        //         $("#arezo_menu_kesho_icon_standard").show();
        //     } else {
        //         $("#arezo_menu_kesho_icon_standard").hide();
        //     }
        // });
        // //end of---------this code for hide list keshoyi az iconkonha
        //
        //
        //
        // //
        // // $("#arezo_icon_title_checkbox").click(function () {
        // //     if ($(this).is(":checked")) {
        // //         $("#arezo_title_checkbox").show();
        // //     } else {
        // //         $("#arezo_title_checkbox").hide();
        // //     }
        // // });
        //
        //
        //this is for show and hide orakuploader with select it in standard menu
        var dokme_elsaghe_file_com_standard = $("#arezo-elsagh-file-computer_standard");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_standard.is(':checked')) {
                $("#upload_type1_standard").show();
                $("#upload_type2_standard").hide();
                $("#content_image_avatar_standard").show();

            }
            else {
                $("#upload_type1_standard").hide();
                $("#content_image_avatar_standard").hide();
            }
        });


        //this is for show and hide orakuploader with select it in dropdown menu
        var dokme_elsaghe_file_com_dropdown = $("#arezo-elsagh-file-computer_dropdown");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_dropdown.is(':checked')) {
                $("#upload_type1_dropdown").show();
                $("#upload_type2_dropdown").hide();
                $("#content_image_avatar_dropdown").show();

            }
            else {
                $("#upload_type1_dropdown").hide();
                $("#content_image_avatar_dropdown").hide();
            }
        });

        var dokme_elsaghe_file_com_shop = $("#arezo-elsagh-file-computer_shop");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_shop.is(':checked')) {
                $("#upload_type1_shop").show();
                $("#upload_type2_shop").hide();
                $("#content_image_avatar_shop").show();

            }
            else {
                $("#upload_type1_shop").hide();
                $("#content_image_avatar_shop").hide();
            }
        });

        var dokme_elsaghe_file_com_call = $("#arezo-elsagh-file-computer_call");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_call.is(':checked')) {
                $("#upload_type1_call").show();
                $("#upload_type2_call").hide();
                $("#content_image_avatar_call").show();

            }
            else {
                $("#upload_type1_call").hide();
                $("#content_image_avatar_call").hide();
            }
        });

        var dokme_elsaghe_file_com_Feature = $("#arezo-elsagh-file-computer_Features");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_Feature.is(':checked')) {
                $("#upload_type1_Features").show();
                $("#upload_type2_Features").hide();
                $("#content_image_avatar_Features").show();

            }
            else {
                $("#upload_type1_Features").hide();
                $("#content_image_avatar_Features").hide();
            }
        });

        var dokme_elsaghe_file_com_megaitem_new_2 = $("#a-elsagh-file-computer_megaitem_2");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_megaitem_new_2.is(':checked')) {
                $("#upload_type1_megaitem_2").show();
                $("#upload_type2_megaitem_2").hide();
                $("#content_image_avatar_megaitem_pic").show();

            }
            else {
                $("#upload_type1_megaitem_2").hide();
                $("#content_image_avatar_megaitem_pic").hide();
            }
        });

        var dokme_elsaghe_file_com_megaitem = $("#arezo-elsagh-file-computer_megaitem");
        $('input').on('click', function () {
            if (dokme_elsaghe_file_com_megaitem.is(':checked')) {
                $("#upload_type1_megaitem").show();
                $("#upload_type2_megaitem").hide();
                $("#content_image_avatar_megaitem").show();

            }
            else {
                $("#upload_type1_megaitem").hide();
                $("#content_image_avatar_megaitem").hide();
            }
        });

        //this is for amadan va nayamadan entekhab az resanehaye ghabli in megaitem
        var dokme_choose_media_upload_megaitem = $("#arezo-choose-media-upload_megaitem");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_megaitem.is(':checked')) {
                $("#upload_type2_megaitem").show();
                $("#upload_type1_megaitem").hide();
                $("#content_image_avatar_megaitem").hide();

            }
            else {
                $("#upload_type2_megaitem").hide();
            }
        });

        //
        // //this is for show and hide orakuploader with select it in megaitem menu
        // var dokme_elsaghe_file_com_megaitem = $("#arezo-elsagh-file-computer_megaitem");
        // $('input').on('click', function () {
        //     if (dokme_elsaghe_file_com_megaitem.is(':checked')) {
        //         $("#upload_type1_megaitem").show();
        //         $("#upload_type2_megaitem").hide();
        //         $("#content_image_avatar_megaitem").show();
        //
        //     }
        //     else {
        //         $("#upload_type1_megaitem").hide();
        //         $("#content_image_avatar_megaitem").hide();
        //     }
        // });


        //
        // // $("#arezo-elsagh-file-computer").click(function () {
        // //     if ($(this).is(":checked")) {
        // //         $("#upload_type1").show();
        // //         $("#upload_type2").hide();
        // //         $("#content_image_avatar").show();
        // //     } else {
        // //         $("#upload_type1").hide();
        // //         $("#content_image_avatar").hide();
        // //
        // //     }
        // // });
        //

        //this is for amadan va nayamadan entekhab az resanehaye ghabli
        var dokme_choose_media_upload_standard = $("#arezo-choose-media-upload_standard");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_standard.is(':checked')) {
                $("#upload_type2_standard").show();
                $("#upload_type1_standard").hide();
                $("#content_image_avatar_standard").hide();

            }
            else {
                $("#upload_type2_standard").hide();
            }
        });

        //this is for amadan va nayamadan entekhab az resanehaye ghabli
        var dokme_choose_media_upload_dropdown = $("#arezo-choose-media-upload_dropdown");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_dropdown.is(':checked')) {
                $("#upload_type2_dropdown").show();
                $("#upload_type1_dropdown").hide();
                $("#content_image_avatar_dropdown").hide();

            }
            else {
                $("#upload_type2_dropdown").hide();
            }
        });
        //this is for amadan va nayamadan entekhab az resanehaye ghabli
        var dokme_choose_media_upload_shop = $("#arezo-choose-media-upload_shop");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_shop.is(':checked')) {
                $("#upload_type2_shop").show();
                $("#upload_type1_shop").hide();
                $("#content_image_avatar_shop").hide();

            }
            else {
                $("#upload_type2_shop").hide();
            }
        });

        //this is for amadan va nayamadan entekhab az resanehaye ghabli in Feature menu
        var dokme_choose_media_upload_Feature = $("#arezo-choose-media-upload_Features");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_Feature.is(':checked')) {
                $("#upload_type2_Features").show();
                $("#upload_type1_Features").hide();
                $("#content_image_avatar_Features").hide();

            }
            else {
                $("#upload_type2_Features").hide();
            }
        });


        //this is for amadan va nayamadan entekhab az resanehaye ghabli for picture in megaitem menu
        var dokme_choose_media_upload_megaitem_show = $("#arezo-choose-media-upload_megaitem_2");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_megaitem_show.is(':checked')) {
                $("#upload_type2_megaitem_2").show();
                $("#upload_type1_megaitem_2").hide();
                $("#content_image_avatar_megaitem_pic").hide();

            }
            else {
                $("#upload_type2_megaitem_2").hide();
            }
        });


        //this is for amadan va nayamadan entekhab az resanehaye ghabli in call menu
        var dokme_choose_media_upload_call = $("#arezo-choose-media-upload_call");
        $('input').on('click', function () {
            if (dokme_choose_media_upload_call.is(':checked')) {
                $("#upload_type2_call").show();
                $("#upload_type1_call").hide();
                $("#content_image_avatar_call").hide();

            }
            else {
                $("#upload_type2_call").hide();
            }
        });


        // //this is for amadan va nayamadan entekhab az resanehaye ghabli in megaitem menu
        // var dokme_choose_media_upload_megaitem = $("#arezo-choose-media-upload_megaitem");
        // $('input').on('click', function () {
        //     if (dokme_choose_media_upload_megaitem.is(':checked')) {
        //         $("#upload_type2_megaitem").show();
        //         $("#upload_type1_megaitem").hide();
        //         $("#content_image_avatar_megaitem").hide();
        //
        //     }
        //     else {
        //         $("#upload_type2_megaitem").hide();
        //     }
        // });


    });


</script>
<!---->

<script>
    //this code for choosing menu
    // $(document).ready(function () {
    //     hideAllDivs_menu = function () {
    //         // $("#standard_menu").hide();
    //         // $("#Features_menu").hide();
    //         // $("#menu_megaitem").hide();
    //         // $("#call_menu").hide();
    //         // $("#dropdown_menu").hide();
    //         // $("#Tabs_menu").hide();
    //
    //     };
    //
    //     handleNewSelection_menu = function () {
    //
    //         hideAllDivs1();
    //
    //         switch ($(this).val()) {
    //             case '1': {
    //                 $("#dropdown_menu").show();
    //                 $("#standard_menu").hide();
    //                 $("#Features_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#call_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").hide();
    //
    //                 break;
    //             }
    //             case '2': {
    //                 $("#standard_menu").show();
    //                 $("#Features_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#call_menu").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").hide();
    //                 break;
    //             }
    //             case '3': {
    //                 $("#standard_menu").hide();
    //                 $("#Features_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#call_menu").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").show();
    //                 break;
    //             }
    //             case '4': {
    //                 $("#Features_menu").show();
    //                 $("#standard_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#call_menu").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").hide();
    //                 break;
    //             }
    //             case '5': {
    //                 $("#menu_megaitem").show();
    //                 $("#standard_menu").hide();
    //                 $("#call_menu").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").hide();
    //                 break;
    //             }
    //             case '6': {
    //                 $("#call_menu").show();
    //                 $("#standard_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").hide();
    //                 $("#Tabs_menu").hide();
    //                 break;
    //             }
    //             case '7': {
    //                 $("#standard_menu").hide();
    //                 $("#Features_menu").hide();
    //                 $("#menu_megaitem").hide();
    //                 $("#call_menu").hide();
    //                 $("#dropdown_menu").hide();
    //                 $("#shop_menu").show();
    //                 $("#Tabs_menu").hide();
    //                 break;
    //             }
    //         }
    //     };

    //this code for choosing menu
    $(document).ready(function () {
        hideAllDivs_menu = function () {
            $("#standard_menu").hide();
            $("#Features_menu").hide();
            $("#megaitem_menu").hide();
            $("#call_menu").hide();
            $("#dropdown_menu").hide();
            $("#Tabs_menu").hide();
            $("#shop_menu").hide();

        };

        handleNewSelection_menu = function () {

            hideAllDivs_menu();

            switch ($(this).val()) {
                case '1': {
                    $("#dropdown_menu").show();
                    $("#standard_menu").hide();
                    $("#Features_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#call_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").hide();

                    break;
                }
                case '2': {
                    $("#standard_menu").show();
                    $("#Features_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#call_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").hide();
                    break;
                }
                case '3': {
                    $("#standard_menu").hide();
                    $("#Features_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#call_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").show();
                    break;
                }
                case '4': {
                    $("#Features_menu").show();
                    $("#standard_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#call_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").hide();
                    break;
                }
                case '5': {
                    $("#megaitem_menu").show();
                    $("#standard_menu").hide();
                    $("#call_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").hide();
                    break;
                }
                case '6': {
                    $("#call_menu").show();
                    $("#standard_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").hide();
                    $("#Tabs_menu").hide();
                    break;
                }
                case '7': {
                    $("#standard_menu").hide();
                    $("#Features_menu").hide();
                    $("#megaitem_menu").hide();
                    $("#call_menu").hide();
                    $("#dropdown_menu").hide();
                    $("#shop_menu").show();
                    $("#Tabs_menu").hide();
                    break;
                }
            }
        };

        $(document).ready(function () {

            $("#menu_type").change(function () {
                window.location = "/newcoms.php?yep=new_Menubar&menu_mode=" + $(this).val();
            });

            // Run the event handler once now to ensure everything is as it should be
            handleNewSelection_menu.apply($("#menu_type"));

        });

    });

</script>
<!-----------------------------------------------end arezo-------------------------------------->
<script>
    //    this is for onvan standard
    $(document).ready(function () {
        hideAllDivs = function () {
            $("#add_temp").hide();
            $("#add_temp2").hide();
            $("#add_temp3").hide();

        };

        handleNewSelection = function () {

            hideAllDivs();

            switch ($(this).val()) {
                case '1': {
                    $("#add_temp").show();
                    $('#modual_cat').hide();
                    $('#add_temp30').hide();
                    break;
                }
                case '2': {
                    $("#add_temp2").show();
                    $('#modual_cat').hide();
                    $('#add_temp30').hide();
                    break;
                }
                case '3': {
                    $("#add_temp3").show();
                    break;
                }
            }
        };

        $(document).ready(function () {

            $("#type").change(handleNewSelection);

            // Run the event handler once now to ensure everything is as it should be
            handleNewSelection.apply($("#type"));

        });

    });


    //this section for onvan features menu
    $(document).ready(function () {
        hideAllDivs_Feature = function () {
            $("#add_temp_Feature").hide();
            $("#add_temp2_Feature").hide();
            $("#add_temp3_Feature").hide();

        };

        handleNewSelection_Feature = function () {

            hideAllDivs_Feature();

            switch ($(this).val()) {
                case '1': {
                    $("#add_temp_Feature").show();
                    break;
                }
                case '2': {
                    $("#add_temp2_Feature").show();
                    break;
                }
                case '3': {
                    $("#add_temp3_Feature").show();
                    break;
                }
            }
        };

    });


    //this section for onvan call menu
    $(document).ready(function () {
        hideAllDivs_call = function () {
            $("#add_temp_call").hide();
            $("#add_temp2_call").hide();
            $("#add_temp3_call").hide();

        };

        handleNewSelection_call = function () {

            hideAllDivs_call();

            switch ($(this).val()) {
                case '1': {
                    $("#add_temp_call").show();
                    break;
                }
                case '2': {
                    $("#add_temp2_call").show();
                    break;
                }
                case '3': {
                    $("#add_temp3_call").show();
                    break;
                }
            }
        };

    });

    //this section for onvan standard menu
    $(document).ready(function () {
        hideAllDivs_call = function () {
            $("#add_temp_call").hide();
            $("#add_temp2_call").hide();
            $("#add_temp3_call").hide();

        };

        handleNewSelection_call = function () {

            hideAllDivs_call();

            switch ($(this).val()) {
                case '1': {
                    $("#add_temp_call").show();
                    break;
                }
                case '2': {
                    $("#add_temp2_call").show();
                    break;
                }
                case '3': {
                    $("#add_temp3_call").show();
                    break;
                }
            }
        };

    });

    //this section for onvan megaitem menu
    $(document).ready(function () {
        hideAllDivs_megaitem = function () {
            $("#add_temp_megaitem").hide();
            $("#add_temp2_megaitem").hide();
            $("#add_temp3_megaitem").hide();

        };

        handleNewSelection_megaitem = function () {

            hideAllDivs_megaitem();

            switch ($(this).val()) {
                case '1': {
                    $("#add_temp_megaitem").show();
                    break;
                }
                case '2': {
                    $("#add_temp2_megaitem").show();
                    break;
                }
                case '3': {
                    $("#add_temp3_megaitem").show();
                    break;
                }
            }
        };


        $(document).ready(function () {

            $("#type_megaitem").change(handleNewSelection_megaitem);

            // Run the event handler once now to ensure everything is as it should be
            handleNewSelection_megaitem.apply($("#type_megaitem"));

        });

    });

</script>

<script>
    //-----------------------------------------------------arezo code-----------------------------------
    //this code for coming map with jquery code
    $(document).ready(function () {
        hideAllDivs1 = function () {
            $("#arezo_call_us").hide();
            $("#arezo-text1").hide();
            $("#arezo-text2").hide();

        };
        handleNewSelection1 = function () {

            hideAllDivs1();

            switch ($(this).val()) {
                case '6': {
                    $("#arezo_call_us").show();
                    $("#arezo-text1").show();
                    $("#arezo-text2").show();
                    break;
                }
            }
        };
        $("#menu_type").change(handleNewSelection1);
        handleNewSelection1.apply($("#menu_type"));
    });
    //end code for coming map with jquery code


    //-------------------------------------------------------------end arezo code-----------------------------------

</script>


<form class="form-horizontal" id="menubar" name="menubar" action="" role="form" method="post"
      enctype="multipart/form-data">
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">حذف</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف
                        دسته زير اطمينان داريد؟
                    </div>
                </div>
                <div class="modal-footer ">
                    <input type="hidden" name="del_menu_btn" id="del_menu_btn">
                    <button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning"><span
                                class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                                class="glyphicon glyphicon-remove"></span>&nbsp;خير
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</br>
<div class="tabbable">
    <!--    <ul class="nav nav-tabs">-->
    <!--        <li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>نوار منو</a></li>-->
    <!--    </ul>-->

    <div class="msheet tab-content">

        <div class="secfhead">
            <!-- #section:blocks/menubar.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">نوار منو</p>
                    <p class="lead">شما در این قسمت امکان مدیریت نوار منو اعم از افزودن، حذف، ویرایش و به روزرسانی را
                        داشته و به صورت Drag & Drop می توانید محتوای منو را مدیریت کنید</p></div>
            </div>
            <!-- /section:blocks/menubar.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a data-toggle="modal" data-target="#myModal" data-placement="bottom"
                                            title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a>
                    </li>
                </ul>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">قوانین انتخاب منو</h4>
                        </div>
                        <div class="modal-body">
                            1-فقط منوهای از یک نوع می توانند در یک مجموعه قرار بگیرند.
                            <br>
                            2-اگر پیغام آلارم با این موضوع دیدید سعی کنید حتما منوی مورد نظر را در زیر دسته مناسب قرار
                            دهید.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="tab-pane active" id="tab3">

            <form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">
                <br>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group col-md-6">
                            <? create_sub_site_filter_none($site_filter, $coms_conect, $_SESSION['manager_title_site']) ?>
                        </div>
                        <div class="form-group col-md-6">
                            <? create_lang_filter_none($lang_filter, $coms_conect, $_SESSION["manager_title_lang"]) ?>
                        </div>

                    </div>
                    <div class="col-md-6"></div>
                </div>


                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">منو</h3>
                        </div>

                        <div class="panel-body bg_panel">
                            <input type="hidden" name="edit_mode" id="edit_mode" value="<?= $edit_id ?>">
                            <input type="hidden" id="edit_mode" name="edit_mode" value="0">
                            <input type="hidden" id="menu_id" name="menu_id" value="0">
                            <div id="menu_mode_result"></div>
                            <input type="hidden" id="menu_mode_refresh" name="menu_mode_refresh"
                                   value="<?= $menu_mode ?>">
                            <!-- i send menu mode to menubar.js , we want to delete onvan menu without refresh. so we must send this parameter to this page.                               -->

                            <!-- #section:blocks/menubar.menu -->


                            <!--            opacity:0.3;   cursor: not-allowed; this conditions for hide menu_type for user when he or she want to go another menu type                -->
                            <div class="form-group row mlr0"
                                 style="<? if ($menu_type == $menu_mode && $edit_id > "") echo 'opacity:0.3;   cursor: not-allowed;'; ?> ">


                                <label class="col-md-1 control-label pt15" for="family">نوع منو</label>
                                <div class="form-group col-md-4 H_mt8">
                                    <!--                                        menutype disable when the user update -->

                                    <select name="menu_type"
                                            id="menu_type" <? if ($menu_type == $menu_mode && $edit_id > "") echo 'disabled'; ?>
                                            class="form-control" rows="3">
                                        <option value="">انتخاب کنيد</option>
                                        <option value="1" <? if ($menu_mode == 1) echo 'selected' ?>>
                                            آبشاری
                                        </option>
                                        <option value="2" <? if ($menu_mode == 2) echo 'selected' ?>>
                                            استاندارد
                                        </option>
                                        <option value="3" <? if ($menu_mode == 3) echo 'selected' ?>>
                                            Tabs
                                        </option>
                                        <option value="4" <? if ($menu_mode == 4) echo 'selected' ?>>Features
                                        </option>
                                        <option value="5" <? if ($menu_mode == 5) echo 'selected' ?>>مگاآیتم
                                        </option>
                                        <option value="6" <? if ($menu_mode == 6) echo 'selected' ?>>تماس با ما
                                        </option>
                                        <option value="7" <? if ($menu_mode == 7) echo 'selected' ?>>خرید
                                        </option>
                                        <!--option value="4">فرم های آنلاین</option-->

                                    </select>

                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/abshri.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/abshri.jpg" alt="form1">
                                    </a>
                                    <label class=" control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">آبشاری</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/Standard.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/Standard.jpg" alt="form1">
                                    </a>
                                    <label class=" control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">استاندارد</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/megaMenu.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/megaMenu.jpg" alt="form1">
                                    </a>
                                    <label class=" control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">مگاآیتم</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/tabs.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/tabs.jpg" alt="form1">
                                    </a>
                                    <label class=" control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">تب</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/features.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/features.jpg" alt="form1">
                                    </a>
                                    <label class=" control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">features</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/shop.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/shop.jpg" alt="form1">
                                    </a>
                                    <label class="control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">خرید</label>
                                </div>
                                <div class="col-md-1 col-sm-12 col-xs-12 pull-left" >
                                    <a href="yep_theme/img/menu_image/tamasBama.jpg" class=" without-caption" >
                                        <img width="30" height="30" class="H_cursor_zoom" src="yep_theme/img/menu_image/tamasBama.jpg" alt="form1">
                                    </a>
                                    <label class="control-label " for="family" style=" font-size: 10px;position: relative;    width: 60%;">تماس با ما</label>
                                </div>

                            </div>
                            <hr>

                            <!------------------------------------------------this code for standard menu--------------------------------------------------->
                            <? if ($menu_mode == 1 || ($menu_type == 1 && $edit_id > "")) {
                            ?>
                                <div class="form-group row " id="dropdown_menu">
                                    <div class="form-group row mlr0 " id="arezo_onvan">
                                        <label class="col-md-2 control-label w13" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type">
                                        <label class="col-md-2 control-label w13" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label w13">ليست صفحات</label>
                                        <div class="form-group col-md-4">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row  mlr0" id="add_temp2">
                                        <label class="col-md-3 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-4">
                                            <select name="daynamic" id="daynamic_dropdown" class="form-control"
                                                    rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic_dropdown" style="display:none">
                                    <div id="file_name_div_dropdown">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0 mlr0" id="arezo-show_open">
                                
                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>

                                            <input id="show_open" <? if (isset($show_open) && $show_open == 1) echo 'checked' ?> name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>
                                        </label>
                                    </div>

                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_dropdown">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> آیکون دار</span>

                                            <input id="a_open_icon_dropdown" <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?>  name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-8 bg_fff ptb30 mlr0 a-icon-menu " id="arezo_menu_kesho_icon_dropdown">

                                        <div class="form-group col-md-3  picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_dropdown"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-6 picture-kesho_dropdown">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="header_icon_link"
                                                       value="<? if (isset($header_icon_link) && $header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($header_icon) && $choose_kesho_or_url == 1) echo $header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>

                                        <div class="form-group col-md-12 border_top">
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_dropdown" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img">
                                                    <label class="col-md-2 control-label pt15" for="group_name">عنوان
                                                        تصویر </label>
                                                    <div class="form-group col-md-6 H_mt8">
                                                        <input type="text"
                                                               value="<? if (isset($onvan_img) && $choose_kesho_or_url == 2) echo $onvan_img; ?>"
                                                               name="onvan_img" id="onvan_img_dropdown"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_dropdown">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_dropdown">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_dropdown"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_dropdown"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_dropdown" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='new_gallery/files/$content_image_avatar' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar_dropdown[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_dropdown').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_dropdown').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_dropdown">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_dropdown"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_dropdown"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <!--                                        --><? //
                                                    //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                                    //                                        ?>

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img id="aks_content_thumb"
                                                                                          src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div >
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag"
                                                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo $icon_link; ?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                             <span class="col-md-5 "> برچسب</span>

                                            <input id="arezo_icon_btn_dropdown" <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?>  name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>
                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->

                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_dropdown">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_dropdown"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->

                                </div>
<? } ?>

                            <!--------------------------------this code for abshari menu---------------------------------->
                            <? if ($menu_mode == 2 || ($menu_type == 2 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="standard_menu">
                                    <div class="form-group row mlr0" id="arezo_onvan">
                                        <label class="col-md-2 control-label w13" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type">
                                        <label class="col-md-2 control-label w13" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label">ليست صفحات</label>
                                        <div class="form-group col-md-6">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp2">
                                        <label class="col-md-2 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-6">
                                            <select name="daynamic" id="daynamic" class="form-control" rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic" style="display:none">
                                    <div id="file_name_div">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo-show_open">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>
                                            <input id="show_open" <? if (isset($show_open) && $show_open == 1) echo 'checked' ?>  name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_standard">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">آیکون دار</span>
                                            <input id="a_open_icon" <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?>  name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-8 bg_fff ptb30 mlr0 a-icon-menu " id="arezo_menu_kesho_icon_standard">

                                        <div class="form-group col-md-3  picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_standard"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-6 picture-kesho_standard">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="header_icon_link"
                                                       value="<? if (isset($header_icon_link) && $header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($header_icon) && $choose_kesho_or_url == 1) echo $header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>
                                        <div class="form-group col-md-12 border_top"
                                            >
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_standard" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img">
                                                    <label class="col-md-2 control-label pt15" for="group_name">عنوان
                                                        تصویر </label>
                                                    <div class="form-group col-md-6 H_mt8">
                                                        <input type="text"
                                                               value="<? if (isset($onvan_img) && $choose_kesho_or_url == 2) echo $onvan_img; ?>"
                                                               name="onvan_img" id="onvan_img_standard"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_standard">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_standard">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_standard"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_standard"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_standard" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='$icon_link' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar_standard[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_standard').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_standard').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_standard">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_standard"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_standard"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <!--                                        --><? //
                                                    //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                                    //                                        ?>

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img id="aks_content_thumb"
                                                                                          src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div>
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag"
                                                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo resize_image_M($icon_link, 15, 15, $img_page_main, ''); ?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">برچسب</span>
                                            <input id="arezo_icon_btn_standard" <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?>  name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->

                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_standard">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_standard"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->

                                </div>
                            <? } ?>
                            <!--------------------------end code for abshari menu--------------------------->

                            <!----------------------------------------------------end code for megaitem menu------------------------------------------------>
                            <? if ($menu_mode == 5 || ($menu_type == 5 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="menu_megaitem">
                                    <div class="form-group row mlr0" id="arezo_onvan">
                                        <label class="col-md-2 control-label" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type">
                                        <label class="col-md-2 control-label" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label">ليست صفحات</label>
                                        <div class="form-group col-md-6">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp2">
                                        <label class="col-md-2 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-6">
                                            <select name="daynamic" id="daynamic_megaitem" class="form-control"
                                                    rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic_megaitem" style="display:none">
                                    <div id="file_name_div_megaitem">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo-show_open">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-7 ">باز کردن
                                            در پنجره جديد</span>
                                            <input  id="show_open" <? if (isset($show_open) && $show_open == 1) echo 'checked' ?>  name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>


                                    <!------------------------------------------this code for active your bpicture  or not  -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-7 "> این عنوان به عنوان ابر برچسب انتخاب شود؟</span>
                                            <input  id="have_tag" <? if (isset($have_tag) && $have_tag == 1) echo 'checked' ?>  name="have_tag" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for active your picture or not  -->
                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_megaitem">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-7 ">آیکون دار</span>
                                            <input  id="a_open_icon_megaitem" <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?>  name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-8 bg_fff ptb30 mlr0 a-icon-menu " id="arezo_menu_kesho_icon_megaitem">

                                        <div class="form-group col-md-3  picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_megaitem"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-6 picture-kesho_megaitem">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="header_icon_link"
                                                       value="<? if (isset($header_icon_link) && $header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($header_icon) && $choose_kesho_or_url == 1) echo $header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>
                                        <div class="form-group col-md-12 border_top">
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_megaitem" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img">
                                                    <label class="col-md-2 control-label pt15" for="group_name">عنوان
                                                        تصویر </label>
                                                    <div class="form-group col-md-6 H_mt8">
                                                        <input type="text"
                                                               value="<? if (isset($onvan_img) && $choose_kesho_or_url == 2) echo $onvan_img; ?>"
                                                               name="onvan_img" id="onvan_img_megaitem"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_megaitem">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_megaitem">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_megaitem"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_megaitem"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_megaitem" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);

                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='$icon_link' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar_megaitem[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_megaitem').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_megaitem').html("<?=$pic_str?>");
                                                    });
                                                </script>

                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_megaitem">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_megaitem"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_megaitem"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img id="aks_content_thumb"
                                                                                          src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div >
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag"
                                                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo  resize_image_M($icon_link, 15, 15, $img_page_main, '');?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-7 "> برچسب</span>
                                            <input  id="arezo_icon_btn_megaitem"  <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?>  name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->

                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_megaitem">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_megaitem"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->

                                    <!------------------------------------------this code for active your bpicture  or not  -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-7 "> انتخاب عکس برای عنوان</span>
                                            <input  id="have_pic_megaitem" <? if (isset($have_image) && $have_image == 1) echo 'checked' ?>  name="have_image" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for active your picture or not  -->

                                    <!------------------------------------------this code for selecting your background picture from your system         -->
                                    <div class="form-group row mlr0" id="picture_onvan_megaitem">

                                        <div>
                                            <label class="control-label col-md-12" id="a_elsagh_file_megaitem_2">
                                                <input type="radio"
                                                    <? if ($type_pic == 1) echo 'checked' ?>
                                                       name="type_pic"
                                                       id="a-elsagh-file-computer_megaitem_2"
                                                       value="1">
                                                الصاق از فایل کامپیوتر (تعداد:1 مورد)
                                            </label>
                                        </div>
                                        <div class="ui-sortable red box" id="upload_type1_megaitem_2"
                                             style="float:right;">
                                            <div id="content_image_avatar_megaitem_pic" orakuploader="on"></div>
                                            <? if ($edit_id > "" && $type_pic == 1) {
                                                $query1 = "select image from new_menu where id='$edit_id'";
                                                $result1 = $coms_conect->query($query1);

                                                $i = 1;
                                                $str = '';
                                                $articles_list = '';


                                                $pic_str_meg = '';
                                                $RS1_new = $result1->fetch_assoc();
                                                $temp_new = explode("/files/", $RS1_new['image']);
                                                $content_image_avatar_megaitem = $temp_new[1];



                                                $div_id_new = explode(".", $content_image_avatar_megaitem);
                                                $pic_str_meg .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar_megaitem' filename='$content_image_avatar_megaitem'>";
                                                $pic_str_meg .= "<div class='picture_delete'  ></div>";
                                                $pic_str_meg .= "<img src='$image' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                $pic_str_meg .= "<input type='hidden' value='$content_image_avatar_megaitem' name='content_image_avatar_megaitem_pic[]' />";
                                                $pic_str_meg .= "</div>";


                                            } ?>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#content_image_avatar_megaitem_pic').orakuploader({
                                                    orakuploader_path: 'new_orakuploader/',
                                                    orakuploader_main_path: 'new_gallery/files',
                                                    orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                    orakuploader_use_main: false,
                                                    //orakuploader_use_sortable : true,
                                                    orakuploader_use_dragndrop: true,
                                                    orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                    orakuploader_add_label: 'آپلود تصویر',
                                                    orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                    orakuploader_thumbnail_size: 400,
                                                    orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                    orakuploader_maximum_uploads: 1,
                                                });

                                                $('#content_image_avatar_megaitem_pic').html("<?=$pic_str_meg?>");
                                            });
                                        </script>

                                        <div>
                                            <label class="control-label col-md-12" id="a_select_media_megaitem_2">
                                                <input type="radio" name="type_pic"
                                                    <? if ($type_pic == 2) echo 'checked' ?>
                                                       id="arezo-choose-media-upload_megaitem_2"
                                                       value="2">
                                                انتخاب از رسانه های قبلی
                                            </label>
                                        </div>
                                        <div class="col-md-3" id="upload_type2_megaitem_2">

                                            <!--                                        --><? //
                                            //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                            //                                        ?>

                                            <div id="ads_slidshow" class="form-group row mlr0 seyed H_seyed"
                                                 style="opacity: 1;">
                                                <div class=" form-group row mlr0">

                                                    <div class="col-md-12">
                                                        <div class="imgdemo H_imgdemo"><img id="aks_content_thumb_megaitem"
                                                                                  src="/yep_theme/default/rtl/images/pic.png">
                                                        </div>
                                                        <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                        <div >
                                                            <script>
                                                                setInterval(check_address, 2000)

                                                                function check_address() {
                                                                    var aks_content1 = $('#content_imag_megaitem').val();
                                                                    if (aks_content1 != "") {
                                                                        $('#aks_content_thumb_megaitem').attr("src", aks_content1);
                                                                    }
                                                                }
                                                            </script>

                                                            <div class="col-md-10 input-group">
                                                                <input type="text"
                                                                       id="content_imag_megaitem"
                                                                       value="<? if (isset($image) && $type_pic == 2) echo resize_image_M($image,220,145,$img_page_main,''); ?>"
                                                                       class="form-control"
                                                                       placeholder="لینک"
                                                                       name="image"
                                                                       style="direction: ltr;">
                                                                <span class="input-group-addon"
                                                                      style="padding: 0px;"><a
                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=content_imag_megaitem"
                                                                            class="btn btn-success iframe-btn"
                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                class="addimg flaticon-add139"></span></a></span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </br>
                                    </div>
                                    <!------------------------------------------end  code for selecting your background picture from your system        -->

                                </div>

                            <? }
                            ?>

                            <!-- --------------------thhis code for feature menu--------------------->
                            <? if ($menu_mode == 4 || ($menu_type == 4 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="Features_menu">
                                    <div class="form-group row mlr0" id="arezo_onvan_Features">
                                        <label class="col-md-2 control-label" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type_Features">
                                        <label class="col-md-2 control-label" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label">ليست صفحات</label>
                                        <div class="form-group col-md-6">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp2">
                                        <label class="col-md-2 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-6">
                                            <select name="daynamic" id="daynamic_Feature" class="form-control" rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic_Feature" style="display:none">
                                    <div id="file_name_div_Feature">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo-show_open">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>
                                            <input  id="show_open"  <? if (isset($show_open) && $show_open == 1) echo 'checked' ?>  name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_Features">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> آیکون دار(فونت بزرگ)</span>
                                            <input   id="a_open_icon_Features"  <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?>  name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-8 bg_fff ptb30 mlr0 a-icon-menu " id="arezo_menu_kesho_icon_Features">

                                        <div class="form-group col-md-3 picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_Features"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-6 picture-kesho_Features">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="big_header_icon_link"
                                                       value="<? if (isset($big_header_icon_link) && $big_header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $big_header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="big_header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($big_header_icon) && $choose_kesho_or_url == 1) echo $big_header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>
                                        <div class="form-group col-md-12 border_top"
                                             >
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_Features" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img">
                                                    <label class="col-md-2 control-label pt15" for="group_name">عنوان
                                                        تصویر </label>
                                                    <div class="form-group col-md-6 H_mt8">
                                                        <input type="text"
                                                               value="<? if (isset($big_onvan_img) && $choose_kesho_or_url == 2) echo $big_onvan_img; ?>"
                                                               name="big_onvan_img" id="onvan_img_Features"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_Features">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_Features">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_Features"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_Features"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_Features" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select big_icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['big_icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='$big_icon_link' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar_Features[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_Features').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_Features').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_Features">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_Features"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_Features"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <!--                                        --><? //
                                                    //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                                    //                                        ?>

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img
                                                                            id="aks_content_thumb_Features"
                                                                            src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div >
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag_Features').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb_Features').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag_Features"
                                                                               value="<? if (isset($big_icon_link) && $choose_icon == 2) echo resize_image_M($big_icon_link, 70, 70, $img_page_main, ''); ?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="big_icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag_Features"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0" >
                                            <span class="col-md-5 ">برچسب</span>
                                            <input   id="arezo_icon_btn_Features" <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?> name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>
                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->

                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_Features">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_Features"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->
                                    <!------------------------------------------this code for have button for features menu        -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> دکمه</span>
                                            <input   id="arezo_icon_button_Features" <? if (isset($have_button) && $have_button == 1) {
                                                echo 'checked';
                                            } ?> name="have_button" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for have button for features menu       -->

                                    <!----------------------------------in this section enter your button title and link---------------------- -->
                                    <div  class="form-group row mlr0"
                                         id="arezo_btn_title_link_Feature">

                                        <div class="col-md-3 input-group">
                                            <input type="text"
                                                   id="content_imag_Features"
                                                   value="<? if (isset($onvan_button) && $have_button == 1) echo $onvan_button; ?>"
                                                   class="form-control"
                                                   placeholder="عنوان دکمه "
                                                   name="onvan_button"
                                                   >
                                        </div>
                                        <div class="col-md-3 input-group">
                                            <input type="text"
                                                   id="content_imag_Features"
                                                   value="<? if (isset($link_button) && $have_button == 1) echo $link_button; ?>"
                                                   class="form-control"
                                                   placeholder="لینک دکمه"
                                                   name="link_button"
                                                  >
                                        </div>

                                    </div>
                                    <!----------------------------------end section enter your button title and link---------------------- -->
                                    <!------------------------------------------this code for enter your text for features menu        -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> متن</span>
                                            <input   id="arezo_icon_text_Features" <? if (isset($have_text) && $have_text == 1) {
                                                echo 'checked';
                                            } ?> name="have_text" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for enter your text for features menu       -->

                                    <div class="form-group" id="arezo_text">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">متن کامل محتوا *</label>
                                            <textarea id="text" name="text" class="form-control"
                                                      rows="3"><? if ($have_text == 1 && isset ($text)) echo $text; ?></textarea>
                                        </div>
                                    </div>

                                </div>

                            <? }
                            ?>

                            <!----------------------------end code for feature menu----------------------------------------->


                            <!-- --------------------thhis code for call us menu--------------------->
                            <? if ($menu_mode == 6 || ($menu_type == 6 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="call_menu">
                                    <div class="form-group row mlr0" id="arezo_onvan_call">
                                        <label class="col-md-2 control-label" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type_call">
                                        <label class="col-md-2 control-label" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected'; ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label">ليست صفحات</label>
                                        <div class="form-group col-md-6">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp2">
                                        <label class="col-md-2 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-6">
                                            <select name="daynamic" id="daynamic_call" class="form-control" rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic_call" style="display: none">
                                    <div id="file_name_div_call">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo-show_open">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>
                                            <input  id="show_open" <? if (isset($show_open) && $show_open == 1) echo 'checked' ?> name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_call">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">آیکون دار</span>
                                            <input   id="a_open_icon_call" <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?> name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class=" mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-8  bg_fff ptb30 mlr0 a-icon-menu " id="arezo_menu_kesho_icon_call">

                                        <div class="form-group col-md-2 col-md-offset-2 picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_call"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-6 picture-kesho_call">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="header_icon_link"
                                                       value="<? if (isset($header_icon_link) && $header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($header_icon) && $choose_kesho_or_url == 1) echo $header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>
                                        <div class="form-group col-md-8 col-md-offset-2"
                                             >
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_call" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img_call">
                                                    <label class="col-md-2 control-label pt15" for="group_name">عنوان
                                                        تصویر </label>
                                                    <div class="form-group col-md-6 H_mt8">
                                                        <input type="text"
                                                               value="<? if (isset($onvan_img) && $choose_kesho_or_url == 2) echo $onvan_img; ?>"
                                                               name="onvan_img" id="onvan_img_Features"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_call">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_call">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_call"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_call"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_call" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='$icon_link' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar_call[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_call').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_call').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_call">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_call"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_call"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <!--                                        --><? //
                                                    //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                                    //                                        ?>

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img
                                                                            id="aks_content_thumb_call"
                                                                            src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div >
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag_call').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb_call').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag_call"
                                                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo resize_image_M( $icon_link, 15, 15, $img_page_main, ''); ?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag_call"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> برچسب</span>
                                            <input   id="arezo_icon_btn_call" <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?> name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->

                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_call">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_call"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->
                                    <!------------------------------------------this code for have button for features menu        -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> دکمه</span>
                                            <input id="arezo_icon_button_call" <? if (isset($have_button) && $have_button == 1) {
                                                echo 'checked';
                                            } ?> name="have_button" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for have button for features menu       -->

                                    <!----------------------------------in this section enter your button title and link---------------------- -->
                                    <div  class="form-group row mlr0"
                                         id="arezo_btn_title_link_call">

                                        <div class="col-md-3 input-group">
                                            <input type="text"
                                                   id="content_imag_call"
                                                   value="<? if (isset($onvan_button) && $have_button == 1) echo $onvan_button; ?>"
                                                   class="form-control"
                                                   placeholder="عنوان دکمه "
                                                   name="onvan_button"
                                                   >
                                        </div>
                                        <div class="col-md-3 input-group">
                                            <input type="text"
                                                   id="content_imag_call"
                                                   value="<? if (isset($link_button) && $have_button == 1) echo $link_button; ?>"
                                                   class="form-control"
                                                   placeholder="لینک دکمه"
                                                   name="link_button"
                                                   >
                                        </div>

                                    </div>
                                    <!----------------------------------end section enter your button title and link---------------------- -->
                                    <!------------------------------------------this code for enter your map for call menu        -->
<!--                                    <div class="form-group row mlr0" id="a-icon">-->
<!---->
<!--                                        <label class="col-md-4 p0">-->
<!--                                            <span class="col-md-5 ">نقشه </span>-->
<!--                                            <input id="arezo_icon_map_call" --><?// if (isset($have_map) && $have_map == 1) {
//                                                echo 'checked';
//                                            } ?><!-- name="have_map" class="ace ace-switch ace-switch-6" type="checkbox" >-->
<!--                                            <span class="mt0 lbl"></span>-->
<!---->
<!--                                        </label>-->
<!--                                    </div>-->
                                    <!------------------------------------------end code for enter your map for call menu       -->

                                    <div class="form-group row mlr0" id="arezo_map_call">
                                        <? $sql_check = "SELECT count(address) as new_address  FROM new_map_address where la='$lang_filter' and site='$site_filter'";
                                        $result_check = $coms_conect->query($sql_check);
                                        $row1 = $result_check->fetch_assoc();
                                        $count_address = $row1['new_address'];

                                        ?>

                                        <a id="map_show_hide" data-toggle="modal"
                                           data-target="<? if ($count_address == 0) {
                                               echo "#setting_map";
                                           } ?>" href="#"
                                           data-placement="bottom"
                                           title="تنظیمات نقشه">
                                                <span class="fa fa-map-marker"
                                                      style=" padding-right: 12px;font-size: 20px;"></span></a>
                                        <script>

                                            $('#map_show_hide').click(function () {
                                                var target = $('#map_show_hide').data("target");
                                                // alert(target);
                                                if (target == "")
                                                    alert('قبلا نقشه را انتخاب کرده اید.');
                                            });

                                        </script>

                                        <? if ($have_map == 1) { ?>
                                            <iframe src="<?= get_result("SELECT address  FROM new_map_address where la='$lang_filter' and site='$site_filter'", $coms_conect) ?>"
                                                    width="100%" height="625" frameborder="0"
                                                    style="border:0;height: 100%;width: 100%;" allowfullscreen="">
                                            </iframe>
                                        <? } ?>

                                    </div>
                                    <form class="form-horizontal" action="" method="post" name="new_map"
                                          id="new_map" enctype="multipart/form-data">
                                        <div class="modal fade" id="setting_map" tabindex="-1" role="dialog"
                                             aria-labelledby="edit" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×
                                                        </button>
                                                        <h4 class="modal-title custom_align" id="Heading">تنظیمات
                                                            نقشه</h4>
                                                    </div>
                                                    <div id="show_related"></div>
                                                    <img id="show_waiting_search" src="waiting.gif" dir="center"
                                                         style="display:none">
                                                    <div class="modal-body">
                                                        <div class="page-body">
                                                            <div class="alert alert-warning">برای درج نقشه به ترتیب
                                                                مراحل زیر را انجام دهید: <br>
                                                                1- وارد سایت map.google.com شوید<br>
                                                                2- در قسمت بالا سمت چپ مکان خود را جستجو کنید<br>
                                                                3- بعد از پیدا کردن مکان خود و اطمینان از صحت آن در
                                                                سمت چپ روی گزینه SHARE کلیک کنید<br>
                                                                4- در صفحه جدید روی گزینه Embed map رفته و از داخل
                                                                باکس آدرس متن داخل src را کپی کنید<br>
                                                                5- در سایت خود متن را در داخل قسمت آدرس نقشه گوگل
                                                                paste کنید<br>
                                                                6- برای اتمام و ذخیره سازی بر روی دکمه ثبت کلیک کنید
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="edit_name">سایت</label>
                                                                <div class="col-md-8">
                                                                    <? $sql = "SELECT name,title FROM new_subsite where status=1";
                                                                    $result = $coms_conect->query($sql);
                                                                    echo "<select name='site_map' id='site_map' class='form-control' rows='2' style='padding:0px;'>";
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $name = $row['name'];
                                                                        $title = $row['title'];
                                                                        $str = "";
                                                                        if ($site_id == $id)
                                                                            $str = "selected";
                                                                        if (in_array($name, $_SESSION["manager_title_site"]))
                                                                            echo "<option $str value='$name'>$name</option> ";
                                                                    }
                                                                    echo '</select>'; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label"
                                                                       for="edit_name">زبان</label>
                                                                <div class="col-md-8">
                                                                    <? $sql = "SELECT title,name FROM new_language where status=1";
                                                                    $result = $coms_conect->query($sql);
                                                                    echo "<select name='lang_map' id='lang_map' class='form-control' rows='2' style='padding:0px;'>";
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        $name = $row['name'];
                                                                        $id = $row['title'];
                                                                        $str = "";
                                                                        if ($site_id == $id)
                                                                            $str = "selected";
                                                                        if (in_array($id, $_SESSION["manager_title_lang"]))
                                                                            echo "<option $str value='$id'>$name</option> ";
                                                                    }
                                                                    echo '</select>'; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-group col-sm-12">
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-addon">آدرس نقشه گوگل</span>

                                                                        <input id="call_us_google" name="address"
                                                                               value="<?= $call_us_google ?>"
                                                                               type="text" class="form-control"
                                                                               placeholder="http://"
                                                                               style="direction: ltr;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="center">
                                                                <iframe id="call_us_google_frame" width="520"
                                                                        height="450" frameborder="0"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer ">
                                                        <button type="button" id="google_address"
                                                                class="btn btn-primary"><span
                                                                    class="glyphicon glyphicon-ok-sign"></span>&nbsp;ثبت
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <script>
                                        $("#google_address").click(function () {
                                            $("#show_waiting_search").show();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=add_google_contact&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val() + "&secend_value=" + $("#call_us_google").val(),
                                                success: function (result) {
                                                    //alert(result);
                                                    $("#show_waiting_search").hide();
                                                    $("#show_related").html(result);
                                                }
                                            });
                                        });

                                        $(document).ready(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_google_contact&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
                                                success: function (result) {
                                                    $("#call_us_google").val(result);
                                                    $("#call_us_google_frame").attr('src', result);
                                                }
                                            });
                                        });

                                        $("#lang_map").change(function () {
                                            $("#show_waiting_search").show();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_google_contact&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
                                                success: function (result) {
                                                    $("#call_us_google").val(result);
                                                    $("#show_waiting_search").hide();
                                                }
                                            });
                                        });

                                        $("#site_map").change(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_google_contact&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
                                                success: function (result) {
                                                    $("#call_us_google").val(result);
                                                }
                                            });
                                        });


                                        $("#about_us").click(function () {
                                            $("#showaboutus_pic").show();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=add_about_us&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val() + "&secend_value=" + tinyMCE.activeEditor.getContent(),
                                                success: function (result) {
                                                    //alert(result);
                                                    $("#showaboutus_pic").hide();
                                                    $("#show_about_us").html(result);
                                                }
                                            });
                                        });

                                        $(document).ready(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_about_us&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
                                                success: function (result) {

                                                    $("#about_us_text").val(result);
                                                }
                                            });
                                        });

                                        $("#about_us_lang").change(function () {
                                            $("#showaboutus_pic").show();
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_about_us&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
                                                success: function (result) {
                                                    tinymce.get('about_us_text').getBody().innerHTML = result;
                                                    $("#showaboutus_pic").hide();
                                                }
                                            });
                                        });

                                        $("#about_us_site").change(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_about_us&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
                                                success: function (result) {
                                                    tinymce.get('about_us_text').getBody().innerHTML = result;
                                                }
                                            });
                                        });
                                    </script>


                                    <!------------------------------------------this code for enter your text for call menu        -->
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">متن </span>
                                            <input id="arezo_icon_text_call" <? if (isset($have_text) && $have_text == 1) {
                                                echo 'checked';
                                            } ?> name="have_text" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <!------------------------------------------end code for enter your text for call menu       -->

                                    <div class="form-group" id="arezo_text_call">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">متن کامل محتوا *</label>
                                            <textarea id="text" name="text" class="form-control"
                                                      rows="3"><? if ($have_text == 1 && isset ($text)) echo $text; ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            <? }
                            ?>
                            <!----------------------------end code for call us menu----------------------------------------->


                            <!------------------------------------------------this code for shop menu--------------------------------------------------->
                            <? if ($menu_mode == 7 || ($menu_type == 7 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="shop_menu">
                                    <div class="form-group row mlr0" id="arezo_onvan">
                                        <label class="col-md-2 control-label" for="group_name">عنوان</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                   name="onvan" id="onvan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo_type">
                                        <label class="col-md-2 control-label" for="family">محتوا</label>
                                        <div class="form-group col-md-4">
                                            <select name="type" id="type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                    داخلی
                                                </option>
                                                <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                </option>
                                                <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                </option>
                                                <!--option value="4">فرم های آنلاین</option-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="add_temp">
                                        <label class="col-md-3 control-label">ليست صفحات</label>
                                        <div class="form-group col-md-6">
                                            <input name='static_page' type="text" id="static_page"
                                                   autocomplete="off"
                                                   autocorrect="off" autocapitalize="off" spellcheck="false"
                                                   class="select2-input select2-default"
                                                   placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                   style="width: 100%; ">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp2">
                                        <label class="col-md-2 control-label" for="family">پيوند</label>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="link" id="link" class="form-control"
                                                   placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                   style="direction: ltr;">
                                        </div>
                                    </div>
                                    <div class="form-group row mlr0" id="add_temp3">
                                        <label class="col-md-3 control-label" for="family">دايناميک</label>
                                        <div class="form-group col-md-6">
                                            <select name="daynamic" id="daynamic_shop" class="form-control" rows="3">
                                                <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ورود
                                                </option>
                                                <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                    صفحه ثبت نام
                                                </option>
                                                <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                    تماس با ما
                                                </option>
                                                <!--option value="2">پرسش و پاسخ</option>
                                                <option value="2">سوالات متداول</option-->
                                                <? $query = "select link,name from new_modules where status='0'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str = '';
                                                    if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                        $str = 'selected';
                                                    echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <img src="/waiting.gif" id="dynamic_pic_shop" style="display:none">
                                    <div id="file_name_div_shop">
                                        <? if ($edit_id) {

                                            if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                echo '<option value="0">' . $view_select . '</option>';
                                                $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                $result = $coms_conect->query($query);
                                                while ($RS1 = $result->fetch_assoc()) {
                                                    $str_new = '';
                                                    if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                        $str_new = 'selected';
                                                    echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                }
                                                echo '	</select>
			</div>
		</div>';
                                            } else
                                                echo '';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group row mlr0" id="arezo-show_open">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>
                                            <input id="show_open"  <? if (isset($show_open) && $show_open == 1) echo 'checked' ?> name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!-- -----------------------------------------------this code for active icon--------------------------------->
                                    <div class="form-group row mlr0" id="have_icon_shop">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">آیکون دار</span>
                                            <input id="a_open_icon_shop" <? if (isset($have_icon) && $have_icon == 1) echo 'checked' ?> name="have_icon" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>
                                    <div class="form-group col-md-8 bg_fff ptb30  mlr0 a-icon-menu " id="arezo_menu_kesho_icon_shop">

                                        <div class="form-group col-md-3  picture-kesho">
                                            <label class="col-md-12 control-label a-list-icon">
                                                <input type="radio"
                                                       checked <? if ($choose_kesho_or_url == 1) echo 'checked' ?>
                                                       name="choose_kesho_or_url" id="choose-pic1_shop"
                                                       value="1">
                                                فونت آیکون
                                            </label>
                                        </div>


                                        <div class="form-group col-md-8 picture-kesho_shop">

                                            <div class="col-md-12 input-group">
                                                <input type="text" class="form-control"
                                                       name="header_icon_link"
                                                       value="<? if (isset($header_icon_link) && $header_icon_link != 'fa-nonicon' && $choose_kesho_or_url == 1) echo $header_icon_link; ?>"
                                                       style="direction: rtl;">
                                                <span class="input-group-btn">
										                         <button class="btn btn-default form-control"
                                                                         name="header_icon"
                                                                         data-iconset="fontawesome"
                                                                         data-icon="<? if (isset($header_icon) && $choose_kesho_or_url == 1) echo $header_icon; ?>"
                                                                         role="iconpicker"></button>
									                        </span></div>
                                        </div>
                                        <div class="form-group col-md-12 border_top"
                                            >
                                            <div class="form-group row mlr0">
                                                <label class="col-md-12 control-label a-list-icon">
                                                    <input type="radio"
                                                           name="choose_kesho_or_url" <? if ($choose_kesho_or_url == 2) echo 'checked' ?>
                                                           id="choose_pic2_shop" value="2">
                                                    عکس آیکون
                                                </label>
                                                <div class="form-group row mlr0 mb0" id="arezo_onvan_img">
                                                    <label class="col-md-3 control-label pt10" for="group_name">عنوان تصویر </label>
                                                    <div class="form-group col-md-6">
                                                        <input type="text"
                                                               value="<? if (isset($onvan_img) && $choose_kesho_or_url == 2) echo $onvan_img; ?>"
                                                               name="onvan_img" id="onvan_img_shop"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>


                                            <!------------------------------------------this code for selecting your pic_icon picture from your system         -->
                                            <div class="form-group" id="icon_pic_shop">
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_elsagh_file_shop">
                                                        <input type="radio"
                                                            <? if ($choose_icon == 1) echo 'checked' ?>
                                                               name="choose_icon"
                                                               id="arezo-elsagh-file-computer_shop"
                                                               value="1">
                                                        الصاق از فایل کامپیوتر(تعداد : 1 مورد)
                                                    </label>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type1_shop"
                                                     style="float:right;">
                                                    <div id="content_image_avatar_shop" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $choose_icon == 1) {
                                                        $query = "select icon_link from new_menu where id='$edit_id'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['icon_link']);
                                                        $content_image_avatar = $temp[1];
                                                        $div_id = explode(".", $content_image_avatar);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='$icon_link' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$content_image_avatar' name='content_image_avatar[]' />";
                                                        $pic_str .= "</div>";

                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#content_image_avatar_shop').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#content_image_avatar_shop').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                                <div>
                                                    <label class="control-label col-md-12"
                                                           id="arezo_select_media_shop">
                                                        <input type="radio" name="choose_icon"
                                                            <? if ($choose_icon == 2) echo 'checked' ?>
                                                               id="arezo-choose-media-upload_shop"
                                                               value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>
                                                </div>
                                                <div class="col-md-9" id="upload_type2_shop"
                                                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <!--                                        --><? //
                                                    //                                        $our_customersfotter = get_tem_result($site, $la, "our_customersfotter$j", $tem, $coms_conect);
                                                    //                                        ?>

                                                    <div id="ads_slidshow" class="seyed H_seyed"
                                                         style="opacity: 1;">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <div class="imgdemo H_imgdemo"><img id="aks_content_thumb"
                                                                                          src="/yep_theme/default/rtl/images/pic.png">
                                                                </div>
                                                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                                <div >
                                                                    <script>
                                                                        setInterval(check_address, 2000)

                                                                        function check_address() {
                                                                            var aks_content = $('#content_imag').val();
                                                                            if (aks_content != "") {
                                                                                $('#aks_content_thumb').attr("src", aks_content);
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="content_imag"
                                                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo resize_image_M($icon_link, 15, 15, $img_page_main, ''); ?>"
                                                                               class="form-control"
                                                                               placeholder="لینک تصویر "
                                                                               name="icon_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                        class="addimg flaticon-add139"></span></a></span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                </br>
                                            </div>
                                            <!------------------------------------------end  code for selecting your icon picture from your system        -->

                                        </div>
                                        <br>

                                    </div>

                                    <!------------------------------------------this code for active your button or not  -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 mlr0 p0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> برچسب</span>
                                            <input id="arezo_icon_btn_shop" <? if (isset($icon_label) && $icon_label == 1) {
                                                echo 'checked';
                                            } ?> name="icon_label" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>
                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->


                                    <!------------------------------------------this code for enter your text of label        -->

                                    <div class="form-group row mlr0 a-dis-none" id="arezo_title_btn_shop">
                                        <label id="a_title_btn_new" class="col-md-2 control-label" for="group_name">
                                            متن برچسب</label>
                                        <div class="form-group col-md-4">
                                            <input type="text"
                                                   value="<? if (isset($onvan_label) && $icon_label == 1) echo $onvan_label; ?>"
                                                   name="onvan_label" id="onvan_label_shop"
                                                   class="form-control">
                                        </div>
                                    </div>


                                    <!------------------------------------------end code for enter your text of label        -->

                                    <!------------------------------------------this code for active your label or not  -->
                                    <div class="form-group col-md-12 p0 mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 "> انتخاب محتوا</span>
                                            <input id="arezo_icon_custom_content_shop" <? if (isset($have_shop) && $have_shop == 1) {
                                                echo 'checked';
                                            } ?> name="have_shop" class="ace ace-switch ace-switch-6" type="checkbox" >
                                            <span class="mt0 lbl"></span>

                                        </label>
                                    </div>

                                    <!------------------------------------------end code for active your label or not  -->
                                    <!-------------------select template form------------------------------>
                                    <div class="form-group row mlr0 " id="show_show_name">
                                        <?
                                        // $Custom_content_shop_box = get_tem_result($site_filter, $lang_filter, "Custom_content_shop_box", $tem, $coms_conect);
                                        $query = "select * from new_menu_tabs_shop where title='$edit_id' and name like 'Custom_content_shop%' ";
                                        $result = $coms_conect->query($query);
                                        ///  echo $query;
                                        $RS = $result->fetch_assoc();
                                        $Custom_content_shop_box = array("show_name" => $RS["show_name"], "filter_show" => $RS["filter_show"], "title" => $RS["title"], "id_modules" => $RS["id_modules"], "link" => $RS["link"], "number" => $RS["number"]);


                                        ?>


                                        <label class="col-md-2 control-label" for="family">انتخاب نحوه نمایش </label>
                                        <div class="form-group col-md-4">
                                            <!--                                        menutype disable when the user update -->

                                            <select name="show_name"
                                                    id="show_name"
                                                    class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="1" <? if ($Custom_content_shop_box['show_name'] == 1) echo 'selected' ?>>
                                                    نمایش به صورت اسلایدشو
                                                </option>
                                                <option value="2" <? if ($Custom_content_shop_box['show_name'] == 2) echo 'selected' ?>>
                                                    نمایش به صورت ستونی
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-------------------------end template form------------------------------------->

                                    <div class="bhoechie-tab-content " id="shop_custom_title">
                                        <center>

                                            <div id="download_link3" class="tab-pane">
                                                <div class="page-content-area" id="more7">
                                                    <div class="page-body" style="margin-top: 25px;">
                                                        <fieldset>
                                                            <div class="col-md-12">

                                                                <div id="ads_Custom_content_shop" class="seyed"
                                                                     style="opacity: 1;">
                                                                    <div class="form-group mb33">
                                                                        <div class="form-group col-md-12">

                                                                            <div class=" H_mark col-md-4 input-group">
                                                                                <input type="hidden"
                                                                                       id="Custom_content_shop_subcat_val"
                                                                                       name="Custom_content_shop_subcat_val"
                                                                                       value="<? if (isset($Custom_content_shop_box['id_modules'])) echo $Custom_content_shop_box['id_modules']; ?>">

                                                                                <select id="content_news_cat"
                                                                                        data-selectid="1"
                                                                                        class="form-control H_content_news_class_shop"
                                                                                        name="content_news_cat">
                                                                                    <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                    $result1 = $coms_conect->query($sql1);

                                                                                    echo "<option value='0'>انتخاب کنید</option>";
                                                                                    while ($row = $result1->fetch_assoc()) {
                                                                                        $str = '';
                                                                                        if ($row['id'] == $Custom_content_shop_box['link'])

                                                                                            $str = 'selected';
                                                                                        echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>

                                                                            <div id="Custom_content_shop_box"
                                                                                 class="col-md-4 input-group">

                                                                            </div>
                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=Custom_content_shop_box_resound&id=" + $("#content_news_cat").val() + "&value=" + $("#Custom_content_shop_subcat_val").val() + "&field_nmae=" + '<?=$lang_filter?>',
                                                                                        success: function (result) {
                                                                                            $('#Custom_content_shop_box').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>
                                                                            <div class="col-md-3 input-group">
                                                                                <select id="Fixed_selection_cat"
                                                                                        data-selectid="1"
                                                                                        class="form-control modules_class"
                                                                                        name="Fixed_selection_cat">
                                                                                    <option <?
                                                                                    if ($Custom_content_shop_box['filter_show'] == 0) echo 'selected'; ?>
                                                                                            value='0'>جدیدترین ها
                                                                                    </option>
                                                                                    <option <?
                                                                                    if ($Custom_content_shop_box['filter_show'] == 1) echo 'selected'; ?>
                                                                                            value='1'>پربازدیدترین
                                                                                        ها
                                                                                    </option>
                                                                                    <option <?
                                                                                    if ($Custom_content_shop_box['filter_show'] == 2) echo 'selected'; ?>
                                                                                            value='2'>پربحث ترین ها
                                                                                    </option>
                                                                                </select>

                                                                            </div>
                                                                            <div class="col-md-1 input-group">
                                                                                <input type="text"
                                                                                       id="name_slidshow-ads_shop"
                                                                                       value="<?
                                                                                       if (isset ($Custom_content_shop_box["number"])) echo $Custom_content_shop_box["number"]; ?>"
                                                                                       class="form-control"
                                                                                       placeholder="تعداد"
                                                                                       name="Custom_content_shop_number">
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <script>

                                                                    $(document).on('change', '.H_content_news_class_shop', function () {
                                                                        var thisElement = $(this).parents('.H_mark').next();
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax.php',
                                                                            data: "action=Custom_content_shop_box_resound&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$lang_filter?>',
                                                                            success: function (result) {
                                                                                //$('#Custom_content_shop_box<?//=$j?>//').html(result);
                                                                                thisElement.empty();
                                                                                thisElement.append(result);
                                                                            }
                                                                        });

                                                                    });


                                                                    $(".content_news_class_shop").change(function () {

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax.php',
                                                                            data: "action=Custom_content_shop_box_resound&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$lang_filter?>',
                                                                            success: function (result) {
                                                                                $('#Custom_content_shop_box').html(result);
                                                                            }
                                                                        });
                                                                    });

                                                                </script>

                                                                </br>
                                                            </div>
                                                            <!-- /section:download/download.link -->
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>

                                        </center>
                                    </div>
                                </div>
                            <? }
                            ?>
                            <!-- /section:blocks/menubar.menu -->

                            <? if ($menu_mode == 3 || ($menu_type == 3 && $edit_id > "")) {
                            ?>
                                <div class="form-group row mlr0" id="Tabs_menu">
                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">عنوان اصلی داخل هدر </span>
                                            <input id="arezo_icon_btn_Tab_asli" name="choose_kesho_or_url"
                                                   type="radio" <? if (isset($choose_kesho_or_url) && $choose_kesho_or_url == 1) {
                                                echo 'checked';
                                            } ?>
                                                   value="1">
                                        </label>
                                    </div>
                                    <!------------------------------------------this code for tag input   -->
                                    <div class="form-group row mlr0" id="arezo_Tabs_asli">
                                        <div class="form-group row mlr0" id="arezo_onvan">
                                            <label class="col-md-2 control-label" for="group_name">عنوان هدر </label>
                                            <div class="form-group col-md-4">
                                                <input type="text" value="<? if (isset($onvan)) echo $onvan; ?>"
                                                       name="onvan" id="onvan" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mlr0" id="arezo_type">
                                            <label class="col-md-2 control-label" for="family">محتوا</label>
                                            <div class="form-group col-md-4">
                                                <select name="type" id="type" class="form-control" rows="3">
                                                    <option value="">انتخاب کنيد</option>
                                                    <option value="1" <? if ($type == 1) echo 'selected' ?>>ليست صفحات
                                                        داخلی
                                                    </option>
                                                    <option value="2" <? if ($type == 2) echo 'selected' ?>>پيوند
                                                    </option>
                                                    <option value="3" <? if ($type == 3) echo 'selected' ?>>دايناميک
                                                    </option>
                                                    <!--option value="4">فرم های آنلاین</option-->
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mlr0" id="add_temp">
                                            <label class="col-md-3 control-label">ليست صفحات</label>
                                            <div class="form-group col-md-6">
                                                <input name='static_page' type="text" id="static_page"
                                                       autocomplete="off"
                                                       autocorrect="off" autocapitalize="off" spellcheck="false"
                                                       class="select2-input select2-default"
                                                       placeholder="<? if (isset($title_static_page) && $type == 1) echo $title_static_page; else "صفحات مورد نظر خود را انتخاب کنيد"; ?>"
                                                       style="width: 100%; ">
                                            </div>
                                        </div>
                                        <div class="form-group row mlr0" id="add_temp2">
                                            <label class="col-md-2 control-label" for="family">پيوند</label>
                                            <div class="form-group col-md-6">
                                                <input type="text" name="link" id="link" class="form-control"
                                                       placeholder="<? if (isset($link) && $type == 2) echo $link; else echo "http://sample.com/"; ?>"
                                                       style="direction: ltr;">
                                            </div>
                                        </div>
                                        <div class="form-group row mlr0" id="add_temp3">
                                            <label class="col-md-3 control-label" for="family">دايناميک</label>
                                            <div class="form-group col-md-6">
                                                <select name="daynamic" id="daynamic_Tab" class="form-control" rows="3">
                                                    <option value="login" <? if ($link == 'login' && $type == 3) echo 'selected'; ?>>
                                                        صفحه ورود
                                                    </option>
                                                    <option value="register" <? if ($link == 'register' && $type == 3) echo 'selected'; ?>>
                                                        صفحه ثبت نام
                                                    </option>
                                                    <option value="contact_us" <? if ($link == 'contact_us' && $type == 3) echo 'selected'; ?>>
                                                        تماس با ما
                                                    </option>
                                                    <!--option value="2">پرسش و پاسخ</option>
                                                    <option value="2">سوالات متداول</option-->
                                                    <? $query = "select link,name from new_modules where status='0'";
                                                    $result = $coms_conect->query($query);
                                                    while ($RS1 = $result->fetch_assoc()) {
                                                        $str = '';
                                                        if (isset($link) && strcmp($link, $RS1['link']) == 0 && $type == 3)
                                                            $str = 'selected';
                                                        echo "<option $str   value='{$RS1['link']}' >{$RS1['name']}</option> ";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <img src="/waiting.gif" id="dynamic_pic_Tab" style="display:none">
                                        <div id="file_name_div_Tab">
                                            <? if ($edit_id) {

                                                if ($link != 'login' && $link != 'contact_us' && $link != 'home' && $link != 'fotter' && $link != 'register' && $type == 3) {
                                                    $id = get_result("select id from new_modules where link ='$link'", $coms_conect);
                                                    echo '<div class="form-group row mlr0" id="add_temp30">
			<label class="col-md-3 control-label" for="family">' . $view_choose_cat . '</label> 
			<div class="form-group col-md-6">
				<select name="modual_cat" id="modual_cat" class="form-control" rows="3">';
                                                    echo '<option value="0">' . $view_select . '</option>';
                                                    $query = "select id,name from new_modules_cat where type=$id and la='$la'";
                                                    $result = $coms_conect->query($query);
                                                    while ($RS1 = $result->fetch_assoc()) {
                                                        $str_new = '';
                                                        if (isset($name_module) && strcmp($name_module, $RS1['name']) == 0)
                                                            $str_new = 'selected';
                                                        echo "<option  $str_new value='{$RS1['id']}'>{$RS1['name']}</option> ";
                                                    }
                                                    echo '	</select>
			</div>
		</div>';
                                                } else
                                                    echo '';
                                            }
                                            ?>
                                        </div>

                                        <div class="form-group row mlr0" id="arezo-show_open">

                                            <label class="col-md-4 p0">
                                                <span class="col-md-5 ">باز کردن
                                            در پنجره جديد</span>
                                                <input id="show_open" <? if (isset($show_open) && $show_open == 1) echo 'checked' ?> name="show_open" class="ace ace-switch ace-switch-6" type="checkbox" >
                                                <span class="mt0 lbl"></span>

                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group row mlr0" id="a-icon">

                                        <label class="col-md-4 p0">
                                            <span class="col-md-5 ">زیر عنوان </span>
                                            <input id="arezo_icon_btn_Tab_zir_menu" name="choose_kesho_or_url"
                                                   type="radio" <? if (isset($choose_kesho_or_url) && $choose_kesho_or_url == 2) {
                                                echo 'checked';
                                            } ?>
                                                   value="2">
                                        </label>
                                    </div>

                                    <!--------------------------------end choose header or zir majmoe in menu----------------------------------------->



                                    <!-- -----------------------------------------------this code for active icon--------------------------------->

                                    <!------------------------------------------------Tabs aflatoni code-------------------------------------------------------->

                                    <div class="form-group row mlr0 " id="arezo_Tabs_zir_menu">
                                        <div class="form-group row mlr0" id="arezo_onvan">
                                            <label class="col-md-2 control-label" for="group_name">متن زیر عنوان   </label>
                                            <div class="form-group col-md-4">
                                                <input type="text" value="<? if (isset($onvan_label)) echo $onvan_label; ?>"
                                                       name="onvan_label" id="onvan1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="bhoechie-tab-content " id="Tabs_custom_title">
                                            <center>
                                                <?

                                                $query = "select * from new_menu_tabs_shop where title='$edit_id' and name like 'Custom_content_Tabs%' ";
                                                $result = $coms_conect->query($query);
                                                $RS = $result->fetch_assoc();
                                                $Custom_content_Tabs_box = array("show_name" => $RS["show_name"], "filter_show" => $RS["filter_show"], "title" => $RS["title"], "id_modules" => $RS["id_modules"], "link" => $RS["link"], "number" => $RS["number"]);
                                                ?>

                                                <div id="download_link3" class="tab-pane">
                                                    <div class="page-content-area" id="more7">
                                                        <div class="page-body" style="margin-top: 25px;">
                                                            <fieldset>
                                                                <div class="col-md-12">

                                                                    <div id="ads_Custom_content_Tabs" class="seyed"
                                                                         style="opacity: 1;">
                                                                        <div class="form-group mb33">
                                                                            <div class="form-group col-md-12">

                                                                                <div class=" H_mark col-md-4 input-group">
                                                                                    <input type="hidden"
                                                                                           id="Custom_content_Tabs_subcat_val"
                                                                                           name="Custom_content_Tabs_subcat_val"
                                                                                           value="<? if (isset($Custom_content_Tabs_box['id_modules'])) echo $Custom_content_Tabs_box['id_modules']; ?>">

                                                                                    <select id="content_news_cat"
                                                                                            data-selectid="1"
                                                                                            class="form-control H_content_news_class_Tabs"
                                                                                            name="content_news_cat">
                                                                                        <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                        $result1 = $coms_conect->query($sql1);

                                                                                        echo "<option value='0'>انتخاب کنید</option>";
                                                                                        while ($row = $result1->fetch_assoc()) {
                                                                                            $str = '';
                                                                                            if ($row['id'] == $Custom_content_Tabs_box['link'])

                                                                                                $str = 'selected';
                                                                                            echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                        }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>

                                                                                <div id="Custom_content_Tabs_box"
                                                                                     class="col-md-4 input-group">

                                                                                </div>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=Custom_content_Tabs_box_resound&id=" + $("#content_news_cat").val() + "&value=" + $("#Custom_content_Tabs_subcat_val").val() + "&field_nmae=" + '<?=$lang_filter?>',
                                                                                            success: function (result) {
                                                                                                $('#Custom_content_Tabs_box').html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                </script>
                                                                                <div class="col-md-3 input-group">
                                                                                    <select id="Fixed_selection_cat"
                                                                                            data-selectid="1"
                                                                                            class="form-control modules_class"
                                                                                            name="Fixed_selection_cat">
                                                                                        <option <?
                                                                                        if ($Custom_content_Tabs_box['filter_show'] == 0) echo 'selected'; ?>
                                                                                                value='0'>جدیدترین ها
                                                                                        </option>
                                                                                        <option <?
                                                                                        if ($Custom_content_Tabs_box['filter_show'] == 1) echo 'selected'; ?>
                                                                                                value='1'>پربازدیدترین
                                                                                            ها
                                                                                        </option>
                                                                                        <option <?
                                                                                        if ($Custom_content_Tabs_box['filter_show'] == 2) echo 'selected'; ?>
                                                                                                value='2'>پربحث ترین ها
                                                                                        </option>
                                                                                    </select>

                                                                                </div>
                                                                                <div class="col-md-1 input-group">
                                                                                    <input type="text"
                                                                                           id="name_slidshow-ads_Tabs"
                                                                                           value="<?
                                                                                           if (isset ($Custom_content_Tabs_box["number"])) echo $Custom_content_Tabs_box["number"]; ?>"
                                                                                           class="form-control"
                                                                                           placeholder="تعداد"
                                                                                           name="Custom_content_Tabs_number">
                                                                                </div>


                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                    <script>

                                                                        $(document).on('change', '.H_content_news_class_Tabs', function () {
                                                                            var thisElement = $(this).parents('.H_mark').next();
                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: 'New_ajax.php',
                                                                                data: "action=Custom_content_Tabs_box_resound&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$lang_filter?>',
                                                                                success: function (result) {
                                                                                    //$('#Custom_content_Tabs_box<?//=$j?>//').html(result);
                                                                                    thisElement.empty();
                                                                                    thisElement.append(result);
                                                                                }
                                                                            });

                                                                        });


                                                                        $(".content_news_class_Tabs").change(function () {

                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: 'New_ajax.php',
                                                                                data: "action=Custom_content_Tabs_box_resound&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$lang_filter?>',
                                                                                success: function (result) {
                                                                                    $('#Custom_content_Tabs_box').html(result);
                                                                                }
                                                                            });
                                                                        });

                                                                    </script>

                                                                    </br>
                                                                </div>
                                                                <!-- /section:download/download.link -->
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                            </center>
                                        </div>

                                    </div>

                                    </div>

                            <? }

                            ?>
                                    <!--------------------------------------------------end code aflatoni code -------------------------------------------------------------->

                                </div>


                            <div class="panel-footer bttools">
                                <button type="submit" id="submit_page" class="btn btn-success"><span
                                            class="flaticon-verified9"></span><span>ذخیره</span></button>
                                <!--button type="button" onclick="location.href = '<?= $custom_url ?>';" class="btn btn-primary"><span class="flaticon-add149"></span><span>جدید</span></button-->
                            </div>


            </form>
        </div>
    </div>


    <div src="" id='sortDBfeedback'></div>

    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">مرتب سازی منو</h3>
            </div>
            <div class="panel-body">
                <!-- #section:blocks/menubar.table -->
                <img src="/waiting.gif" id="order_pic" style="display:none">
                <?

                //this condition for menu type doesn't exit.


                $sql = "SELECT status,unic_id,id,name,link, menu_type, onvan_label , choose_kesho_or_url FROM new_menu WHERE parent_id='0' and site_id='$site_filter' and float_menu=0 and la='$lang_filter'   ORDER BY rang";
                $result = $coms_conect->query($sql);

                echo "<div class='cf nestable-lists'>\n";
                echo "<div class='dd' id='nestableMenu'>\n\n";
                echo "<ol class='dd-list'>\n";


                while ($row = $result->fetch_assoc()) {
                    $str = "";
                    $status = $row['status'];
                    if ($status == 1) $str = 'checked';
                    echo "\n";
                    $id = $row['unic_id'];
                    $ide = $row['id'];
                    $menu_type = $row['menu_type'];
                    $choose_kesho_or_url = $row['choose_kesho_or_url'];

                    switch ($menu_type) {
                        case 1:
                            $name_menu_type = "آبشاری";
                            break;
                        case 2:
                            $name_menu_type = "استاندارد";
                            break;
                        case 3:
                            $name_menu_type = "تبز";
                            break;
                        case 4:
                            $name_menu_type = "ویژگی ها";
                            break;
                        case 5:
                            $name_menu_type = "مگاآیتم";
                            break;
                        case 6:
                            $name_menu_type = "تماس با ما";
                            break;
                        case 7:
                            $name_menu_type = "خرید";
                            break;
                    }


                    echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";
                 if($menu_type!=3 ||($menu_type==3 && $choose_kesho_or_url==1))   echo "<div class='dd-handle' > <a target='_blank' href='{$row['link']}'>{$row['name']} </a>";
                 elseif ($menu_type==3 && $choose_kesho_or_url==2)echo "<div class='dd-handle' > <a target='_blank' href='{$row['link']}'>{$row['onvan_label']} </a>";
                    echo '	<div class="pull-right action-buttons"><span class="label label-primary">' . $name_menu_type . '</span>
																<a class="blue" href="javascript:void(0)">
																	<input ' . $str . ' id=' . $id . ' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	<span class="lbl"></span>
																	</a>';
                    if ($_SESSION["can_edit"] == 1) {
                        ?>
                        <a id="<?= $ide ?>" class="edit_menu blue icon"
                           href="newcoms.php?yep=new_Menubar&menu_mode=<?= $menu_type ?>&edit_id=<?= $ide ?>">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                        </a>
                        <?
                    }
                    if ($_SESSION["can_delete"] == 1) {
                        echo '<a id=' . $id . ' value="' . $ide . '" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a> ';
                    }
                    echo '</div>
														</div>';
                    menu_showNested(0, $row['id'], $site_filter, $lang_filter, $coms_conect);
                    echo "</li>\n";

                }
                echo "</ol>\n\n";
                echo "</div>\n";
                echo "</div>\n\n";


                ?>
                <!-- /section:blocks/menubar.table -->
            </div>


        </div>
        <textarea id="nestable1-output" style="display:none"></textarea>


    </div>
</div>

<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>

<script>
    $("#manage_lang").change(function () {
        $("#onvan").val('');
        $("#menu1").submit();
    });
</script>
<? $_SESSION["del_item"] = 'del_new_menu';
$_SESSION["edit_secend_item"] = 'edit_new_manebar';
$_SESSION["edit_item"] = 'edit_new_menu'; ?>
<script src="ajax_js/menu_bar.js"></script>


<script>
    //    ajax code for pop up----------------arezo code-----------------------------------------------------------------------
    $(".a-modal-menu").click(function () {
        var menu_id = $(this).data('menu_id');
        //  document.write(menu_id);
        $.post("New_ajax.php",
            {
                menu_image_big_hidden: menu_id
            },
            function (data, status) {
                ("Data: " + data + "\nStatus: " + status);
                $("#arezo-img-popup").attr("src", data);// set the src with the return data from the ajax code , from the page of New_page.php.

            });
    });

    // this code for come map in page----------------end arezo code-----------------------------------------------------------------------


    $("#daynamic").change(function () {
        $("#dynamic_pic").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic").hide();
                $("#file_name_div").html(result);
            }
        });
    });
    // ----------------end code this code for come map in page---  arezo code


    $("#daynamic_megaitem").change(function () {
        $("#dynamic_pic_megaitem").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_megaitem").hide();
                $("#file_name_div_megaitem").html(result);
            }
        });
    });


    $("#daynamic_Tab").change(function () {
        $("#dynamic_pic_Tab").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_Tab").hide();
                $("#file_name_div_Tab").html(result);
            }
        });
    });


    $("#daynamic_dropdown").change(function () {
        $("#dynamic_pic_megaitem").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_dropdown").hide();
                $("#file_name_div_dropdown").html(result);
            }
        });
    });

    $("#daynamic_Feature").change(function () {
        $("#dynamic_pic_Feature").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_Feature").hide();
                $("#file_name_div_Feature").html(result);
            }
        });
    });


    $("#daynamic_call").change(function () {
        $("#dynamic_pic_call").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_call").hide();
                $("#file_name_div_call").html(result);
            }
        });
    });

    $("#daynamic_shop").change(function () {
        $("#dynamic_pic_shop").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=change_menu_module&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&secend_value=" + $("#manage_lang_filter").val(),
            success: function (result) {
                $("#dynamic_pic_shop").hide();
                $("#file_name_div_shop").html(result);
            }
        });
    });
    // ----------------end code this code for come map in page---  arezo code

    //  ------------this code for popup in file manager------arezo code
    $(document).ready(function () {
        $('.iframe-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false
        });
//end code------this code for popup in file manager------end arezo code


        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });


        $('#menu1').formValidation({
            framework: 'bootstrap',
            fields: {
                onvan: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                },
                menu_type: { //this is for necessary field for  selecting menu type --- arezo code
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                }, //this is for necessary field for  selecting menu type ---end  arezo code


                description: { //this is for necessary field for  filling tilte button --- arezo code
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                }, //this is for necessary field for  filling title button ---end  arezo code

                onvan_btn_standard: { //this is for necessary field for  filling onvan satndard menu
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                }, //this is for necessary field for  filling donvan stndard menu header_icon_link


                show_name: { //this is for necessary field for  shop for selecting nahve namayesh dar ghesmat entekhab mohtava
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                },
                type: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن اين فيلد الزامي است'
                        }
                    }
                }
            }
        });

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                menu_updatesort(window.JSON.stringify(list.nestable('serialize')));

            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        //these conditions for showing menu , max depth tedad menuhaye ke mitavanad jabeja shavad ra neshan midahad.
        $('#nestableMenu').nestable({
            group: 1,
            maxDepth: 6,
            collapsedClass: 'dd-collapsed'
        }).nestable('collapseAll');

        $('#nestableMenu').nestable({
            group: 1,
            maxDepth: 6
        }).on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestableMenu').data('output', $('#nestable1-output')));

        jQuery(function ($) {

            $('.dd').nestable();

            $('.dd-handle a').on('mousedown', function (e) {
                e.stopPropagation();
            });

            $('[data-rel="tooltip"]').tooltip();

        });


        <? $sql = "SELECT id, menu_type,parent_id, name,link, onvan_label   FROM new_menu ORDER BY rang";
        $result = $coms_conect->query($sql);
        while ($row = $result->fetch_assoc()) {

        ?>
        var id_new =<?=$row['id'];?>;

        if (<?=$row['parent_id']?>!=0)
        {
            <?
            switch ($row['menu_type']) {
                case 1:
                    $name_menu_type = "آبشاری";
                    break;
                case 2:
                    $name_menu_type = "استاندارد";
                    break;
                case 3:
                    $name_menu_type = "تبز";
                    break;
                case 4:
                    $name_menu_type = "ویژگی ها";
                    break;
                case 5:
                    $name_menu_type = "مگاآیتم";
                    break;
                case 6:
                    $name_menu_type = "تماس با ما";
                    break;
                case 7:
                    $name_menu_type = "خرید";
                    break;
            }
            ?>
            $('.dd-item').find("[data-id='" + id_new + "']").find('.pull-right').first().prepend("<span class='label label-primary'><?=$name_menu_type?></span>");
        }
        <? } ?>

        $(document).on('click', '[data-action="expand"]', function (e) {
            $(this).hide();
            $(this).prev().show();
            $(this).closest('.dd-item').removeClass('dd-collapsed').find('.dd-list').show();
            var xq = $(this).next().find('.label-primary').text();
            // var c=$(this).next().siblings().find('.label-primary').text();
            // var n=  xq.localeCompare(c);
            // if(n==0)
            // {
            $(this).closest('.dd-item').siblings().hide();
            $(this).closest('.dd-item').siblings().has('span:contains("' + xq + '")').show();
            //     $("span:contains('c')").closest('.dd-item').show();
            // }
            // else {
            //     $(this).closest('.dd-item').siblings().hide();
            // }
            // for accordian mode
            var siblings = $(this).closest('.dd-item').siblings().addClass('dd-collapsed');
            siblings.children('[data-action="expand"]').show();
            <?
            $sql = "SELECT  menu_type, onvan_label , choose_kesho_or_url , parent_id, id, name   FROM new_menu ORDER BY rang";
            $result = $coms_conect->query($sql);
            while ($row = $result->fetch_assoc()) {
            if($row['menu_type']==3 && $row['choose_kesho_or_url']==2  && $row['parent_id']!=0){
            ?>
            $('.dd-item').find("[data-id='" + <?= $row['id']?> + "']").find('.edit_menu').attr('href', 'newcoms.php?yep=new_Menubar&menu_mode=<?= $row['menu_type'] ?>&edit_id=<?= $row['id'] ?>');
            $('.dd-item').find("[data-id='" + <?= $row['id']?> + "']").find('a').first().replaceWith("<a target='_blank' href=''><?=$row['onvan_label']?></a>" );

            <? }
            elseif($row['parent_id']!=0)
            {?>

            $('.dd-item').find("[data-id='" + <?= $row['id']?> + "']").find('.edit_menu').attr('href', 'newcoms.php?yep=new_Menubar&menu_mode=<?= $row['menu_type'] ?>&edit_id=<?= $row['id'] ?>');
            $('.dd-item').find("[data-id='" + <?= $row['id']?> + "']").find('a').first().replaceWith("<a target='_blank' href=''><?=$row['name']?></a>" );
            <?   }}
            ?>

            siblings.children('[data-action="collapse"]').hide();
        });

        $(document).on('click', '[data-action="collapse"]', function (e) {
            $(this).hide();
            $(this).next().show();
            $(this).closest('.dd-item').addClass('dd-collapsed').find('.dd-list').hide();
            $(this).closest('.dd-item').siblings().show();
        });

    });

</script>


<script>
    $('#manage_site_filter').change(function () {
        var a = '<?=$url?>';
        if (a.indexOf("&site_filter=") >= 0) {
            var b = a.split('&site_filter=');
            var c = b[1].split('&');
            var e = "";
            if (c[1] > "")
                e = "&" + c[1];
            a = b[0] + "&site_filter=" + $(this).val() + e;
        }
        else
            a += '&site_filter=' + $(this).val();
        window.location.href = a;
    });


    $('#manage_lang_filter').change(function () {
        var a = '<?=$url?>';
        if (a.indexOf("&lang_filter=") >= 0) {
            var b = a.split('&lang_filter=');
            var c = b[1].split('&');
            var e = "";
            if (c[1] > "")
                e = "&" + c[1];
            a = b[0] + "&lang_filter=" + $(this).val() + e;
        }
        else
            a += '&lang_filter=' + $(this).val();
        window.location.href = a;
    });


    $('#manager_filter').change(function () {
        var a = '<?=$url?>';
        if (a.indexOf("&manager_filter=") >= 0) {
            var b = a.split('&manager_filter=');
            var c = b[1].split('&');
            var e = "";
            if (c[1] > "")
                e = "&" + c[1];
            a = b[0] + "&manager_filter=" + $(this).val() + e;
        }
        else
            a += '&manager_filter=' + $(this).val();
        window.location.href = a;
    });


    // ----------------------------------this code for coming map--------------------------------------------------------
    $("#google_address").click(function () {
        $("#show_waiting_search").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=add_google_contact_menu&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val() + "&secend_value=" + $("#call_us_google").val(),
            success: function (result) {
                //  alert( $("#call_us_google").val());
                $("#show_waiting_search").hide();
                $("#show_related").html(result);
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_google_contact_menu&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
            success: function (result) {

                $("#call_us_google").val(result);
                $("#call_us_google_frame").attr('src', result);
                // alert($("#call_us_google_frame").attr('src'));
            }
        });
    });

    $("#lang_map").change(function () {
        $("#show_waiting_search").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_google_contact_menu&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
            success: function (result) {
                $("#call_us_google").val(result);
                $("#show_waiting_search").hide();
            }
        });
    });

    $("#site_map").change(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_google_contact_menu&id=" + $("#lang_map").val() + "&value=" + $("#site_map").val(),
            success: function (result) {
                $("#call_us_google").val(result);
            }
        });
    });


    $("#about_us").click(function () {
        $("#showaboutus_pic").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=add_about_us_menu&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val() + "&secend_value=" + tinyMCE.activeEditor.getContent(),
            success: function (result) {
                alert($("#about_us_lang").val());
                $("#showaboutus_pic").hide();
                $("#show_about_us").html(result);
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_about_us_menu&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
            success: function (result) {

                $("#about_us_text").val(result);
            }
        });
    });

    $("#about_us_lang").change(function () {
        $("#showaboutus_pic").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_about_us_menu&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
            success: function (result) {
                tinymce.get('about_us_text').getBody().innerHTML = result;
                $("#showaboutus_pic").hide();
            }
        });
    });

    $("#about_us_site").change(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_about_us_menu&id=" + $("#about_us_lang").val() + "&value=" + $("#about_us_site").val(),
            success: function (result) {
                tinymce.get('about_us_text').getBody().innerHTML = result;
            }
        });
    });


    // ----------------------------------end code this code for coming map

</script>

<!-------------------------------------------------arezo code ------------------------------------------------->
<!--this code for script list keshoyi -->
<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
<!-------------------------------------------------end arezo code ------------------------------------------------->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">عدم انتخاب زیر منوی مناسب</h4>
            </div>
            <div class="modal-body">
                1-فقط منوهای از یک نوع می توانند در یک مجموعه قرار بگیرند.
                <br>
                2-اگر پیغام آلارم با این موضوع دیدید سعی کنید حتما منوی مورد نظر را در زیر دسته مناسب قرار
                دهید.
                <br>
                3-لطفا به راهنمای منوبار مراجعه کنید.

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">بستن</button>

            </div>
        </div>
    </div>
</div>
<!--===========================popup img mahsolat=============================-->
<script>
    $('.without-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 600 // don't foget to change the duration also in CSS
        }
    });

    $('.with-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
            }
        },
        zoom: {
            enabled: true
        }
    });


</script>
<!--===========================End popup img mahsolat=============================-->







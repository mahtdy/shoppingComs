<?$_SESSION["modual_type"]=8?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#cat_filter').select2({
            data: [
                <?
                $query="select id,name from new_modules_cat where type=8";$i=0;
                $result = $coms_conect->query($query);
                while($RS1 = $result->fetch_assoc()) {
                    $id=$RS1["id"];
                    $name=$RS1["name"];
                    if(in_array($id,$_SESSION['manager_page_cat'])){
                        //echo $id.'<br>';
                        if($i==0)
                            echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
                        else
                            echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
                        $i++;
                    }

                }
                ?>
            ],
            allowClear: true,
            multiple: true,
            formatNoMatches: function(term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>


<?###چک کردن مدير
$now=time();
$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>0){
    $temp_user=get_result("select user_id from new_video where id= $edit_mode",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
    $temp_user=get_result("select user_id from new_video where id= $edit_id",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$manager_filter=injection_replace($_GET['manager_filter']);
$q=injection_replace($_GET['q']);
$duration=injection_replace($_POST['duration']);
$totla_article=injection_replace($_POST['totla_article']);
$navication_pic=injection_replace($_POST['navication_pic']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$video_source=injection_replace($_POST['video_source']);
$video_videos=injection_replace($_POST['video_videos']);
$pic_type=injection_replace($_POST['pic_type']);


//exit;
if($pic_type==2){
    $video_pic=injection_replace($_POST['video_pic']);
}
else if($pic_type==1){
    $videos_name=basename($video_videos);
    $temp=explode(".",$videos_name);
    $videos_name=$temp[0].'.jpg';
    $video_pic="source/comsroot/video_pic/$videos_name";
}

//===start  resize pics
if ($video_pic!=''){
    $modual_type= $_SESSION["modual_type"];
    $fcount = get_result("select count(modual_type) from new_setting_pic_resize where la='$la' AND  modual_type='$modual_type'", $coms_conect);
    $i=0;
    for ($x = 1; $x <= $fcount; $x++) {
        $img_resize_query = get_PSR_result($la, $modual_type, $coms_conect);
        if ($img_resize_query[$i]['width'] > "") {
            resize_image_M($video_pic, $img_resize_query[$i]['width'], $img_resize_query[$i]['height'],$img_resize_query[$i]['address_link_save'],$img_resize_query[$i]['quality']);
        }
        $i++;  }
}
//====end resize pics===


if(isset($_POST['text'])) {
    $adrs_reimg = 'yep_theme/img/img_content_resize/';
    $deatils = resize_image_content($_POST['deatils'], $adrs_reimg);

}else {
    $deatils= ($_POST['deatils']);
}


$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$can_comment=injection_replace($_POST['can_comment']);
$is_importand=injection_replace($_POST['is_importand']);
if($is_importand=='')$is_importand=0;

$spesial_start_date=(injection_replace($_POST['spesial_start_date'])=="") ? 0 : injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=(injection_replace($_POST['spesial_finish_date'])=="") ? 0 : injection_replace($_POST['spesial_finish_date']);

$array_value=injection_replace($_POST['array_value']);
if($array_value>0){
    $array_valu=explode(",",$array_value);
    $tempp=(array_diff($array_valu,$_SESSION["manager_page_cat"]));
    if(count($tempp)>0){
        header('Location: new_manager_signout.php');exit();}
}
$cat_arr=explode(",",$array_value);
# SEO Tab
$meta_label= ($_POST['meta_label']);

if($meta_label>""){
    get_label_count($meta_label,$coms_conect);
}
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

if(isset($_POST['publish_date']))
    $publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi(injection_replace($_POST['publish_date']))) : '';

#slideshow
$slide=injection_replace($_POST['slide']);
if($slide=="")$slide=0;
$slide_img1=injection_replace($_POST['slide_img1']);
$slide_img2=injection_replace($_POST['slide_img2']);
$start_date=injection_replace($_POST['start_date']);
$finish_date=injection_replace($_POST['finish_date']);
$slide_title=injection_replace($_POST['slide_title']);
$text1=injection_replace($_POST['text1']);
$text2=injection_replace($_POST['text2']);
$text3=injection_replace($_POST['text3']);

#اخبار مرتبط
$totla_related=injection_replace($_POST['totla_related']);

##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_lang']);
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])||($manage_lang>""&&!in_array($manage_lang,$_SESSION["manager_title_lang"]))){
    header('Location: new_manager_signout.php');exit;
}
#########################چک کردن زير سايت#############
$manage_site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);
if(($manage_site>0&&!in_array($manage_site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
    header('Location: new_manager_signout.php');exit;
}
############################################
if($edit_mode==0&&$title>""&&($_SESSION["can_add"]==1||$_SESSION["can_draft"]==1)&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    if($_SESSION["can_add"]!=1)
        $status=0;
    $arr=array("pic_type"=>$pic_type,"duration"=>$duration,"publish_date"=>$publish_date ,"navication_pic"=>$navication_pic,"video_source"=>$video_source,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"deatils"=>$deatils ,"user_id"=>$_SESSION['manager_id'],"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
    $id=insert_to_data_base($arr,'new_video',$coms_conect);


    ####label
    if(!empty($meta_label)){
        foreach($meta_label as $value){
            if($meta_label>""){
                $label_arr=array("id"=>$id,"type"=>8,"label_id"=>$value);
                insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
            }
        }
    }

    #####دسته بندي#######
    foreach($cat_arr as $value){
        if($value!=-1){
            $arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>8);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }
    }
    ##اخبار مرتبط
    $related=explode(",",$totla_related);
    foreach($related as $value){
        if($value!=0){
            $arr=array("id"=>$value,"page_id"=>$id,"type"=>8);
            insert_to_data_base($arr,'new_related_madual',$coms_conect);
        }
    }

    ### slide show add
    if($slide==1){
        $slide_link="/news/$manage_lang/$id/".insert_dash("$title");
        $arr_slide=array("link"=>$slide_link,'site'>=$manage_site,'la'>=$manage_lang,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>8 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
        insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
    }

    if($video_pic>""){
        $gallery_arr=array("id"=>$id,"type"=>8,"adress"=>$video_pic,"name"=>'video_pic');
        insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
    }

    if($video_videos>""){
        $gallery_arr=array("id"=>$id,"type"=>8,"adress"=>$video_videos,"name"=>'video_videos');
        insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
    }



    show_msg($new_successfull);

}else if($edit_mode>0&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $condition="id=$edit_mode";
    $arr=array("pic_type"=>$pic_type,"duration"=>$duration,"publish_date"=>$publish_date ,"navication_pic"=>$navication_pic,"video_source"=>$video_source,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand  ,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"deatils"=>$deatils ,"edit_user_id"=>$_SESSION['manager_id'],"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
    update_data_base($arr,'new_video',$condition,$coms_conect);


    ####label
    $condition="id=$edit_mode and type=8";
    delete_from_data_base('new_mudoal_label',$condition,$coms_conect);
    if(!empty($meta_label)){
        foreach($meta_label as $value){
            if($meta_label>""){
                $label_arr=array("id"=>$edit_mode,"type"=>8,"label_id"=>$value);
                insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
            }
        }
    }

#####دسته بندي#######
    $query1="delete from new_modules_catogory where page_id='$edit_mode' and type=8";
    $coms_conect->query($query1);
    foreach($cat_arr as $value){
        if($value!=-1){
            $arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>8);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }
    }

    $query1="delete from new_file_path where id='$edit_mode' and type=8 and name='video_videos'";
    $coms_conect->query($query1);
    if($video_videos>""){
        $gallery_arr=array("id"=>$edit_id,"type"=>8,"adress"=>$video_videos,"name"=>'video_videos');
        insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
    }

    $query1="delete from new_file_path where id='$edit_mode' and type=8 and name='video_pic'";
    $coms_conect->query($query1);
    if($video_pic>""){
        $gallery_arr=array("id"=>$edit_id,"type"=>8,"adress"=>$video_pic,"name"=>'video_pic');
        insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
    }


#####related
    $query1="delete from new_related_madual where page_id='$edit_mode' and type=8";
    $coms_conect->query($query1);
    $related=explode(",",$totla_related);
    foreach($related as $value){
        if($value!=0){
            $arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>8);
            insert_to_data_base($arr,'new_related_madual',$coms_conect);
        }
    }
    ### slide show update
    if($slide==1){
        $slide_link="/news/$manage_lang/$edit_mode/".insert_dash("$title");
        $query1="select count(id) as count from new_slideshow where page_id='$edit_mode' and type=8";
        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count=$row['count'];
        if($count!=0){
            $condition="page_id=$edit_mode";
            $arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>8 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
            update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);

        }
        else{
            $arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>8 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
            insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
        }
    }else{
        $query1="delete from new_slideshow where page_id='$edit_mode' and type=8";
        $coms_conect->query($query1);
    }
    show_msg($new_successfull);
}
create_session_token();
##################################
?>

<fieldset>
    <div class="modal fade" id="show_contact" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                          مطالب مرتبط
                    </div>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="tt">
                            <div class="row-fluid">
                                <div class="col-md-6">
                                    <div class="form-group"><div class="input-group input-group-sm">
                                            <input type="text" id="related_search" class="form-control search2" placeholder="" style="top: 0px !important; ">
                                            <span class="input-group-addon" style="padding: 0px;"><input type="button" class="btn btn-primary" value="جستجو" name="relate_btn" id="relate_btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 28px;padding-top: 2px;"></span>
                                        </div><img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none">
                                    </div>
                                </div>

                            </div>
                            <div id="show_related"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" id="btn_ok_news" value="" data-dismiss="modal" class="btn btn-primary conbtnGetAll" ><span class="glyphicon glyphicon-ok-sign"></span> افزودن </button>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>
</fieldset>


<style>
    .desm{display: inline-flex !important;}
</style>
<script>
    $(document).ready(function(){
        $("#drop4").hide();

        var boxes = $('input.conchkNumber');
        boxes.on('change', function () {
            $('#drop4').toggleClass("desm", boxes.is(":checked"));
        });

        var boxall = $('input.conchkSelectAll');
        boxall.on('change', function () {
            $('#drop4').toggleClass("desm", boxes.is(":checked"));
        });
    });


    $(document).on('click', '#close_video_modual', function() {
        $("#show_add_video_modual").attr('src','');
        $("#example_video_1 video")[0].load();
    });
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتويات زير اطمينان داريد؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok_page"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show_add_video" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id='close_video_modual' class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">نمایش</h4>
            </div>
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="100%" height="400px"
                       data-setup="{}">
                    <source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'  style="display:none"/>
                </video>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="del_reated_news" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>  آيا از حذف محتويات زير اطمينان داريد؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_related_news"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="del_ajax_article" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتويات زير اطمينان داريد؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_ajax_article"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
            </div>
        </div>
    </div>
</div>

<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get" enctype="multipart/form-data">
    <input type="hidden" value="new_video" name='yep'>
    <fieldset>
        <div class="modal fade" id="searching" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">جستجوي پيشرفته</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_name">عنوان جستجو</label>
                                <div class="col-md-4">
                                    <?$search_txt=injection_replace($_GET['search_txt'])?>
                                    <input id="search_txt" name="search_txt" value="<?=$search_txt?>" type="text" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">فيلد</label>
                                <div class="col-md-4">
                                    <?$field=injection_replace($_GET['field'])?>
                                    <select class="dropdown" rows="5" name="field">
                                        <option <?if($field==0) echo 'selected'?> value="0">همه</option>
                                        <option <?if($field==1) echo 'selected'?> value="1">عنوان</option>
                                        <option <?if($field==6) echo 'selected'?> value="6">شماره ویدئو</option>
                                        <option <?if($field==2) echo 'selected'?> value="2">شرح مطلب</option>
                                        <option <?if($field==3) echo 'selected'?> value="3">منبع فایل</option>
                                        <option <?if($field==4) echo 'selected'?> value="4">Meta Keywords</option>
                                        <option <?if($field==5) echo 'selected'?> value="5">Meta Description</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">دسته بندي</label>
                                <div class="col-md-4">
                                    <?$cat_filter=injection_replace($_GET['cat_filter'])?>
                                    <input  type="text" name="cat_filter" value="<?=$cat_filter?>" id="cat_filter" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
                                    </select>
                                </div>
                            </div>
                            <?$mudoal_lock_filter=(injection_replace($_GET['mudoal_lock_filter']));?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوع انتشار</label>
                                <div class="col-md-4">
                                    <select id="mudoal_lock_filter" name="mudoal_lock_filter" class="form-control">
                                        <option value="" <?if($mudoal_lock_filter=="") echo 'selected'?>>همه</option>
                                        <option value="1" <?if($mudoal_lock_filter==1) echo 'selected'?>>ويژه اعضاء</option>
                                        <option value="0" <?if($mudoal_lock_filter==0) echo 'selected'?>>عمومي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ترتيب اهميت</label>
                                <div class="col-md-4">
                                    <?$is_importand_filter=(injection_replace($_GET['is_importand_filter']));?>
                                    <select id="is_importand_filter" name="is_importand_filter" class="form-control">
                                        <option value="" <?if($is_importand_filter=="") echo 'selected'?>>همه</option>
                                        <option value="0" <?if($is_importand_filter==0) echo 'selected'?>>عادي</option>
                                        <option value="1" <?if($is_importand_filter==1) echo 'selected'?>>ويژه</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="edit_tozihat" class="col-md-3 control-label">وضعيت</label>
                                <div class="col-md-4">
                                    <?$search_status=injection_replace($_GET['search_status']);?>
                                    <select class="dropdown" rows="5" name="search_status">
                                        <option <?if($search_status==0) echo 'selected';?> value="0">پيش نويس</option>
                                        <option   <?if($search_status==1) echo 'selected';?> value="1">منتشر شده</option>
                                        <option <?if($search_status=='') echo 'selected';?> value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button id="singlebutton"  class="btn btn-primary">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>


<!-- switch lock unlock -->
<style>
    input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
    input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}

</style>

</br>
<div class="tabbable">
    <ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
        <li class="pull-right" style="right:1%;">
            <i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span data-toggle="tab" href="#write" title="صفحه جديد"><i class="ace-icon fa fa-plus bigger-110"></i></span>
            </i>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                        <i class="ace-icon fa fa-plus bigger-110"></i>
                        صفحه جديد</a>
                </ul>
            </div>
        </li>

        <li style="display:none;" class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
                مديريت محتوا </a></li>
    </ul>
    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:video/video.head -->
            <div class="sectitle">
                <div class="icon">
                    <span class="flaticon-videoplayer5" style=""></span>
                </div>
                <div class="title">
                    <p class="titr">ویدئو</p><p class="lead">توضيحات اين بخش</p>
                </div>
            </div>
            <!-- /section:video/video.head -->

            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <?if($_SESSION['can_add']==1||$_SESSION['can_draft']==1){?> 
                        <li id="newpag" class="addicon">
                            <a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن ویدئو جدید" >
                                <span class="flaticon-add149"></span>
                            </a>
                        </li>
                    <?}?>
                    <li>
                        <a  data-toggle="modal" data-target="#searching" data-placement="top"    title="جستجوي پيشرفته" >
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
            <!-- #section:video/video.table -->
            <div class="tt">
                <div class="row-fluid">
                    <div class="col-md-10">
                        <div class="dropdown pull-left yepco">
                            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" class="btn pull-left btn-primary btn-sm" href="/page.html">
                                 امکانات <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li class="dropdown-submenu"><a href="#" tabindex="-1" >انتقال به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
                                    <ul class="dropdown-menu">
                                        <?create_sub_site_menu($site_id,$coms_conect,$_SESSION["manager_title_site"],'cut_site')?>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#" tabindex="-1" >کپي به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
                                    <ul class="dropdown-menu">
                                        <?create_sub_site_menu($site_id,$coms_conect,$_SESSION["manager_title_site"],'copy_site')?>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="pull-left btn-xs yepco" id="drop4">
                            <i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
                                <span class="sr-only">Toggle navigation</span>
                                <span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
                            </i>
                            <?if($_SESSION["can_delete"]==1){ ?>
                                <div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
                                    <ul class="nav navbar-nav navbar-left">
                                        <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
                                            حذف
                                        </a>
                                    </ul>
                                </div>
                            <?}?>
                        </div>
                        <?if($lang_filter==""&&$_SESSION['lang_filter']=='')
                            $lang_filter=$_SESSION['page_languege'];?>
                        <div class="form-group yepco">
                            <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                <input type="hidden" name="yep"  value="new_video">
                                <input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
                                <input type="hidden" name="site_filter" value="<?=$site_filter?>">
                                <input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
                                <input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
                            </form>



                            <div class="pull-right btn-default btn-xs yepco">
                                <?if ($manager_filter>"")
                                    $_SESSION['manager_filter']=$manager_filter;
                                create_manager_filter($_SESSION['manager_filter'],$coms_conect,$_SESSION["manager_user_permisson"])?>
                            </div>
                            <div class="pull-right btn-default btn-xs yepco">
                                <?if ($lang_filter>"")
                                    $_SESSION['lang_filter']=$lang_filter;
                                else
                                    $lang_filter=$_SESSION['lang_filter'];
                                create_lang_filter($_SESSION['lang_filter'],$coms_conect,$_SESSION["manager_title_lang"])?>
                            </div>
                            <div class="pull-right btn-default btn-xs yepco">
                                <?if ($site_filter>"")
                                    $_SESSION['site_filter']=$site_filter;
                                create_sub_site_filter($_SESSION['site_filter'],$coms_conect,$_SESSION['manager_title_site'])?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: #fff;margin-right: 0;margin-left: 0;">
                    <div class="col-md-12 vitems">
                        <div class="row">
                            <?$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]);
                            $manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
                            $manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";


                            if($site_filter==-1){
                                $str_site=" and a.site in ($manager_title_site)";
                                $site_page="&site_filter=$site_filter";
                            }
                            else if($site_filter>""){
                                $str_site=" and a.site='$site_filter'";
                                $site_page="&site_filter=$site_filter";
                            }
                            if($q>""){
                                $str_q="  and(a.title like '%$q%'  or a.deatils like '%$q%' or a.video_source like '%$q%')";
                                $manager_q="&q=$q";
                            }
                            if($lang_filter==-1){

                                $str_lang=" and a.la in ($manager_title_lang)";
                                $lang_page="&lang_filter=$lang_filter";
                            }
                            else if($lang_filter>""){
                                $str_lang=" and a.la='$lang_filter'";
                                $lang_page="&lang_filter=$lang_filter";
                            }

                            if($manager_filter>0){
                                $str_manager=" and  a.user_id='$manager_filter'";
                                $manager_page="&manager_filter=$manager_filter";
                            }
                            else
                                $str_manager=" and  a.user_id in ($manager_user_permisson)";

                            ####جستجوی پیشرفته
                            $search_status=injection_replace($_GET['search_status']);
                            if($search_status>""){
                                $str_status=" and a.status='$search_status'";
                                $status_page="&status_filter=$search_status";
                            }

                            $search_status=injection_replace($_GET['search_status']);
                            if($search_status>""){
                                $str_status=" and a.status='$search_status'";
                                $status_page="&status_filter=$search_status";
                            }


                            if($mudoal_lock_filter>""){
                                $str_lock=" and a.mudoal_lock='$mudoal_lock_filter'";
                                $lock_filter="&lock_filter=$mudoal_lock_filter";
                            }
                            if($field>""){
                                $field_page="&field=$field&search_txt=$search_txt";
                                switch ($field) {
                                    case 0:
                                        $str_field=" and (a.title like '%$search_txt%' 
										or 	a.deatils like '%$search_txt%'
										or 	a.video_source like '%$search_txt%'
										or 	a.meta_keyword like '%$search_txt%'
										or 	a.meta_desciption like '%$search_txt%'
										)";
                                        break;
                                    case 1:
                                        $str_field=" and a.title like '%$search_txt%'";
                                        break;
                                    case 2:
                                        $str_field=" and a.deatils like '%$search_txt%'";
                                        break;
                                    case 3:
                                        $str_field=" and a.video_source like '%$search_txt%'";
                                        break;
                                    case 4:
                                        $str_field=" and a.meta_keyword like '%$search_txt%'";
                                        break;
                                    case 5:
                                        $str_field=" and a.meta_desciption like '%$search_txt%'";
                                    case 6:
                                        $str_field=" and a.id = $search_txt";
                                        break;
                                }
                            }
                            $cat_filter=injection_replace($_GET['cat_filter']);
                            if($cat_filter>""){
                                $str_cat=" and b.cat_id in($cat_filter)";
                                $cat_page="&cat_filter=$cat_filter";
                            }else
                                $str_cat=" and b.cat_id in({$_SESSION['manager_page_cat_str']})";
                            ################################################################
                            $sql1 = "select count(*)as cnt from (SELECT count(id) as cnt  from new_video a,new_modules_catogory b   
								where id>0 and a.id=b.page_id and b.type=8 
								$str_site $str_lang $str_manager $str_q $str_cat  $str_field $str_lock  $str_status
								group by b.page_id)q";
                            $result = $coms_conect->query($sql1);
                            $RS = $result->fetch_assoc();
                            $page=injection_replace($_GET["page"]);
                            $a=new_pgsel((int)$page,$RS["cnt"],9,9,"$root/newcoms.php?yep=new_video$lang_page$site_page$manager_page$lock_filter$manager_q$status_page$download_type$cat_page$field_page");
                            $from=$a[0];
                            $to=$a[1];
                            $pgsel=$a[2];
                            $sql12 = "SELECT a.can_comment,a.duration,a.mudoal_lock,a.site,a.la,a.title,a.id,a.name ,a.view,a.status   from new_video a,new_modules_catogory b   
								where id>0 and a.id=b.page_id and b.type=8 
								$str_site $str_lang $str_manager $str_q $str_cat   $str_field  $str_lock $str_status
								group by b.page_id
								order by a.id desc
								LIMIT $from,$to";
                            //	echo $sql12;
                            ################################################################
                            $resultd1 = $coms_conect->query($sql12);
                            if($page>1)$k=($page-1)*10;else $k=0;$k++;
                            while($row = $resultd1->fetch_assoc()) {
                                $sql11="select adress from new_file_path where type=8 and name='video_videos' and id ={$row['id']}";
                                $result1 = $coms_conect->query($sql11);
                                $row1 = $result1->fetch_assoc();
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    <div id="<?if($row['status']==1)echo 'active';else echo 'deactive'?>" class="ic">
                                        <div class="vl">
                                            <a id="<?=$row1['adress']?>" class="show_video_modual" data-title="delete" data-toggle="modal" data-target="#show_add_video" data-placement="top"><span class="play-button"></span></a>
                                            <div class="details">
                                                <?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
                                                <a href="<?="/$domain/video/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" target="_blank"><p><span class="title"><?=$row['title']?></span></p></a>
                                            </div>
                                            <img src="<?=get_modual_address($row['id'],$coms_conect)?>">
                                        </div>
                                        <div class="tools">
                                            <div class="vi">
                                                <span class="flaticon-videoplayer5"></span><span class="time"><?=$row['duration']?></span>
                                            </div>
                                            <div class="ticons">

                                                <?if($_SESSION["can_edit"]==1){?>
                                                    <a   href="/newcoms.php?yep=new_video&edit_id=<?=$row['id']?>" data-placement="bottom" title="ویرایش"><span class="edit flaticon-note32"></span></a>
                                                <?}if($_SESSION["can_delete"]==1){?>
                                                    <a   href="#" id="<?=$row['id']?>" class="del_menu red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 3px 0 3px;">
                                                        <span class="delet flaticon-recycling10"></span></a>
                                                <?}?>
                                                <label><input id="<?=$row['id']?>" name="switch-field-1" <?if($row['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4 can_comment" type="checkbox">
                                                    <span title="" class="lbl" data-original-title="مخصوص اعضا"></span></label>
                                                <a target="_blank" href="/newcoms.php?yep=new_video_comments" data-placement="bottom" title="نظرات">
                                                    <?=mudoal_comment_count($row['id'],8,$coms_conect)?><span class="comment flaticon-speechballoons1"></span>
                                                </a>
                                                <a   title="وضعیت"><span class="<?if($row['status']==1) echo 'ac flaticon-round68';else echo 'dac flaticon-round73'?>"></span></a>
                                                <div style="display: inline-block">
                                                    <label></label>
                                                    <input  id="<?=$row['id']?>" name="switch-field-1" <?if($row['can_comment']==1) echo 'checked'?> class="ace ace-switch ace-switch-5 can_comment"  type="checkbox" />
                                                    <span title="نظر سنجی"class="lbl"></span>
                                                </div>
                                                <label class="position-relative">
                                                    <input id='<?=$row['id']?>' type="checkbox"   class="conchkNumber"/>
                                                    <span class="lbl"></span>
                                                </label>
                                                <?=$row['site']?> 
                                                <span style="background-color: white;-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);-ms-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);border: 1px solid #ebeced;position: relative;top: -4px;padding-left: 4px;padding-right: 4px;">تعداد بازدید : <?=$row['view']?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
            <?=$pgsel;?>
        </div>


        <div class="tab-pane   <?if($edit_id>"") echo 'active'; else echo '';?>" id="write">


            <form class="form-horizontal" id="article_form" name="article_form" action="" role="form" method="post" enctype="multipart/form-data"
                  data-fv-framework="bootstrap"
                  data-fv-message="This value is not valid"
                  data-fv-icon-validating="glyphicon glyphicon-refresh">
                <input type="hidden"  id="edit_mode" name="edit_mode" value="<?if($edit_id>0) echo $edit_id ;else echo 0;?>">
                <input type="hidden" id="array_value" name="array_value" value="0">
                <input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
                <input type="hidden" id="check_value" name="check_value" value="0">
                <input type="hidden" name="status" id="status" value="<?=$status?>">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <input type='submit'  id='submit_btn' style='display:none'>
                    <?if($_SESSION["can_add"]==1){?>
                        <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخيره">
							<span class="flaticon-verified9">
							</span>
                        </a>
                    <?}if($_SESSION["can_draft"]==1){?>
                        <a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پیش نویس">
							<span class="flaticon-browser93 ">
							</span>
                        </a>
                    <?}?>
                    <a href="newcoms.php?yep=new_video" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
                    </a>


                    <!--	<div class="message-bar">
                            <h2 style="color: #2a8bcb;">صفحه جديد / ويرايش</h2>
                        </div>-->

                    <div style="display:none;">
                        <div class="messagebar-item-left" id="btnback">
                            <a href="newcoms.php?yep=new_Pages"  class="active">
                                <i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
                                <b class="middle bigger-110">برگشت </b>
                            </a>
                        </div>
                         
                        <div class="messagebar-item-right">
									<span class="inline btn-send-message">
										<!--button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-file-text"></i>
											<span class="bigger-110">پيش نويس</span>
										</button-->
                                        <?if($_SESSION["can_add"]==1){?>
                                            <button type="submit" id="submit_page" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-check"></i>
											<span class="bigger-110">ذخيره</span>
										</button>
                                        <?}?>
									</span>
                        </div>
                    </div>
                </div>
                </br>

                <fieldset style="margin-top: -16px;">
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab3">
                            <li class="active">
                                <a data-toggle="tab" href="#home3">
                                    <p class="flaticon-file23">محتوا</p>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#cat3">
                                    <p class="flaticon-squares36"></p>
                                    دسته بندی
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#navication">
                                    <p class="flaticon-gallery7"></p>
                                    تصوير نوار ناوبری
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#SEO3">
                                    <p class="flaticon-search103"></p>
                                    SEO
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#slide">
                                    <p class="flaticon-folder23"></p>
                                    تنظيمات اسلايد شو
                                </a>
                            </li>
                            <li>
                                <a id="video_li" data-toggle="tab" href="#blog_video_div">
                                    <p class="flaticon-upload36"></p>
                                    ویدئو
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#relatednews">
                                    <p class="flaticon-copy23"></p>
                                    ویدئوی مرتبط
                                </a>
                            </li>
                        </ul>
                        <?###############نمايش در حالت ويرايش#################
                        $title='';
                        $video_source='';
                        $deatils='';
                        $video_videos='';
                        $meta_desciption='';
                        $publish_date='';


                        if($edit_id>""){
                            $query="SELECT * FROM new_video where id='$edit_id'";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $status=$row['status'];
                            $title=$row['title'];
                            $pic_type=$row['pic_type'];
                            $attach_file=$row['attach_file'];
                            $slide=$row['slide'];

                            $publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
                            $video_source=$row['video_source'];
                            $la=$row['la'];
                            $site=$row['site'];
                            $label='';
                            $query="select label_id from new_mudoal_label where id='$edit_id' and type=8";
                            $result = $coms_conect->query($query);
                            while($RS1 = $result->fetch_assoc()) {
                                $label[]=$RS1['label_id'];
                            }
                            $meta_keyword=$row['meta_keyword'];
                            $meta_desciption=$row['meta_desciption'];
                            if($row['spesial_start_date']>0)
                                $spesial_start_date=miladitojalaliuser(date('Y-m-d',$row['spesial_start_date']));

                            if($row['spesial_finish_date']>0)
                                $spesial_finish_date=miladitojalaliuser(date('Y-m-d',$row['spesial_finish_date']));
                            $deatils=$row['deatils'];
                            $can_comment=$row['can_comment'];
                            $navication_pic=$row['navication_pic'];
                            $mudoal_lock=$row['mudoal_lock'];
                            $is_importand=$row['is_importand'];
                            #Query from new_slideshow
                            $query="SELECT * FROM new_slideshow where page_id='$edit_id' and type=8";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $slide_img1=$row['slide_img1'];
                            $slide_img2=$row['slide_img2'];
                            if($row['start_date']>0)
                                $start_date=miladitojalaliuser(date('Y-m-d',$row['start_date']));
                            if($row['finish_date']>0)
                                $finish_date=miladitojalaliuser(date('Y-m-d',$row['finish_date']));
                            $slide_title=$row['title'];
                            $duration=$row['duration'];
                            $text1=$row['text1'];
                            $text2=$row['text2'];
                            $text3=$row['text3'];





                            $query="SELECT id FROM new_related_madual a  where page_id='$edit_id'  and type=8";
                            $result = $coms_conect->query($query);
                            $totla_related="";$i=1;
                            while($row = $result->fetch_assoc()){
                                if($i!=1)$str=',';$i++;
                                $totla_related .=$str.$row['id'];
                            }
                            $query="select adress from new_file_path where id='$edit_id' and type=8 and name='video_videos'";
                            $result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
                            while($RS1 = $result->fetch_assoc()) {
                                if($i!=1)$str=',';
                                $articles_list .=$str.$RS1['adress'];$i++;
                            }

                            $video_pic=get_result("select adress from new_file_path where id='$edit_id' and type=8 and name='video_pic'",$coms_conect);

                            $query="select adress from new_file_path where id='$edit_id' and type=8 and name='video_videos'";
                            $result = $coms_conect->query($query);$i=1;$str='';
                            $RS1 = $result->fetch_assoc();
                            $video_video =$RS1['adress'];


//echo $articles_list.'fffffffffffff';exit;
//echo $articles_list.'fffffffffffff';exit;
                        }







                        ?>
                        <div class="tab-content">
                            <div id="home3" class="tab-pane in active">

                                <div class="row-fluid" style="margin-top:25px">
                                    <!-- #section:video/video.base -->
                                    <div style="padding-left:0;" class="col-md-12">
                                        <div class="row-fluid">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">عنوان *</label>
                                                        <input id="title" name="title"  value="<?=$title?>" type="text" placeholder="" class="form-control"
                                                               data-fv-notempty="true"
                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">منبع </label>
                                                        <input id="video_source" name="video_source"  value="<?=$video_source?>" type="text" placeholder="http://google.com" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="group_name">سايت</label>
                                                        <?create_sub_site_title($site,$coms_conect,$_SESSION["manager_title_site"]);?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="group_name">زبان</label>
                                                        <?create_lang_title($la,$coms_conect,$_SESSION["manager_title_lang"]);?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label" for="deatils">شرح</label>
                                                        <textarea  id="text" name="deatils"  class="form-control" rows="3"><?=$deatils?></textarea>
                                                        <!--<script>CKEDITOR.replace( 'text' );</script>-->
                                                        <script>
                                                            tinymce.init({
                                                                selector: "#text",
                                                                height: 300,
                                                                width:"99.5%",
                                                                directionality : 'rtl',
                                                                language : 'fa_IR',
                                                                menubar:true,

                                                                skin: 'flat',
                                                                plugins: [
                                                                    "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
                                                                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                                                                    "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
                                                                ],

                                                                image_advtab: true,
                                                                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",

                                                                image_advtab: true ,
                                                                external_filemanager_path:"/filemanager/",
                                                                filemanager_title:"مديريت فايل" ,
                                                                external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},

                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                            <style>
                                                @media (min-width: 998px){
                                                    .mdate{padding-left: 0px !important;text-align: left;}
                                                    .startend{text-align:center;}}
                                            </style>

                                            <div class="col-md-4 mset">
                                                <div class="form-group">
                                                    <div class="col-md-6 mdate">
                                                        <label class="control-label" for="publish_date">تاريخ انتشار</label>
                                                        <a href="#"><span class="dateicon flaticon-calendar53"></span></a>
                                                    </div>
                                                    <div  class="col-md-6">
                                                        <input id="publish_date" name="publish_date" value="<?if($publish_date==""||$publish_date==$now){ echo miladitojalaliuser(date('Y-m-d'));}else echo $publish_date;?>" class="dateinput" type="text"   style="max-width: 120px;height: 34px;">
                                                    </div>
                                                </div>

                                                <!-- Select Basic -->
                                                <div class="form-group">
                                                    <label class="control-label col-md-6" for="mudoal_lock">نوع انتشار</label>
                                                    <div  class="col-md-6">
                                                        <select id="mudoal_lock" name="mudoal_lock" class="form-control">
                                                            <option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه اعضاء</option>
                                                            <option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عمومي</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Select Basic -->
                                                <div class="form-group">
                                                    <label class="control-label col-md-6" for="is_importand">ترتيب اهميت</label>
                                                    <div class="col-md-6">
                                                        <select id="is_importand" name="is_importand" class="form-control">
                                                            <option value="0" <?if($is_importand==0) echo 'selected'?>>عادي</option>
                                                            <option value="1" <?if($is_importand==1) echo 'selected'?>>ويژه</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" id="add_temp0" <?if($is_importand!=1){?>style="display:none"<?}?>>
                                                    <div class="col-md-12 startend">
                                                        <label class="control-label" for="family" >مدت نمايش خبر (پايان- شروع )</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="input-daterange input-group">
                                                            <input type="text" value="<?if($spesial_start_date>0) echo $spesial_start_date?>" class="input-sm form-control" name="spesial_start_date" id="spesial_start_date" palceholder="از"/>
                                                            <span class="input-group-addon">
																			<i class="fa fa-exchange"></i>
																		</span>
                                                            <input type="text" class="input-sm form-control" value="<?if($spesial_finish_date>0) echo $spesial_finish_date?>" name="spesial_finish_date" id="spesial_finish_date" palceholder="تا"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group" style="text-align:center;">
                                                    <label class="control-label" for="family">امکان نظردهی وجود داشته باشد</label>
                                                    <div class="form-group col-md-12">
                                                        <label class="radio-inline" for="pay_type">
                                                            <input type="radio" name="can_comment" id="can_comment" value="1" <?if($can_comment==1) echo 'checked';?>>
                                                            بله
                                                        </label>
                                                        <label class="radio-inline" for="radios-1">
                                                            <input type="radio" name="can_comment" id="radios-1" value="0" <?if($can_comment==0) echo 'checked';?>>
                                                            خير
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /section:video/video.base -->
                                </div>
                            </div>

                            <?$type=8;
                            include 'newcoms/main/new_modual_catogory.php4';?>
                            <?include 'newcoms/main/new_nav_pic.php4';?>


                            <div id="blog_video_div" class="tab-pane">
                                <div class="page-body"  style="margin-top:25px">
                                    <!-- #section:video/video.vid -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="singlebutton" style="width: 120px;text-align: right;">فایل ویدئو (MP4)</label>
                                            <div class="form-group input-group">
                                                <div class="form-group"><input id="video_video" value="<?=$video_video?>" name="video_videos" class="imginput" type="text" data-fv-notempty="true"
                                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
                                                    <a href="/filemanager/dialog.php?type=3&amp;field_id=video_video" class="holam btn btn-primary iframe-btn"><span class="holam flaticon-search85"></span></a>
                                                    <a href="#" id="add_videos" class="holam btn btn-success  " title="افزودن"><span class="holam flaticon-round68"></span></a>
                                                    <a href="#" id="del_videos" class="holam btn btn-danger  " title="حذف"><span class="holam flaticon-delete84"></span></a>
                                                </div>
                                                <!--div class="form-group"><input type="button" id="add_videos" class="form-control" value="اضافه کردن" style="margin-bottom: -12px;"></div>
                                                <div class="form-group"><input type="button" id="del_videos" class="form-control" value="پاک کردن"></div-->
                                                <img id="show_waiting_video" src="waiting.gif" dir="center" style="display:none">
                                            </div>
                                        </div>

                                        <!--grid video start-->
                                        <label class="control-label col-md-12" style="text-align:right">
                                            <input type="radio" name="pic_type" <?if($pic_type!=2) echo 'checked';?> id="pic_type1" value="1" checked>
                                            تصویر گرفته شده خودکار
                                        </label>
                                        <div <?if($pic_type!=2) echo 'style="display:block;"';else echo 'style="display:none;"'; ?>  id="show_video" class="row red box">

                                        </div>

                                        <label class="control-label col-md-12" style="text-align:right">
                                            <input type="radio" name="pic_type" <?if($pic_type==2) echo 'checked';?> id="pic_type2" value="2">
                                            انتخاب از رسانه های قبلی
                                        </label>

                                        <div class="form-group green box" <?if($pic_type==2) echo 'style="display:block;"';else echo 'style="display:none;"'; ?>>
                                            <div class="form-group col-md-6">
                                                <div class="imgdemo"><img id="aks_vide_thumb" src="/yep_theme/default/rtl/images/pic.png"></div>
                                                <!--img data-src="holder.js/100%x100%" id="aks_news_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                <div style="display: inline-flex;">
                                                    <script>
                                                        setInterval(check_address,2000)
                                                        function check_address() {
                                                            var aks_news = $('#video_pic').val();
                                                            if(aks_news!="")
                                                                $('#aks_vide_thumb').attr("src",aks_news);
                                                            else
                                                                $('#aks_vide_thumb').attr("src",'/new_gallery/video.jpg');
                                                        }
                                                    </script>
                                                    <a href="/filemanager/dialog.php?type=2&amp;field_id=video_pic" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
                                                    <input type="text" name="video_pic" value="<?if($pic_type==2) echo $video_pic?>" id="video_pic" class="imginput">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-info">
                                            <strong><span class="flaticon-information51" style="color: #124C69;"></span><span style="    vertical-align: super;margin-right: 5px;font-size: 12pt;color: #124C69;">راهنما</span></strong>
                                            <p> متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما</p>
                                        </div>
                                    </div>
                                    <!-- /section:video/video.vid -->
                                </div>
                                <?if($edit_id>""&&$video_video>""){?>
                                    <script>
                                        if($("#video_video").val()){
                                            $("#show_waiting_video").show();
                                            $.ajax({
                                                type:'POST',
                                                url:'New_ajax.php',
                                                data:"action=show_videos&id="+$("#video_video").val()+"&secend_value=<?=$edit_id?>",
                                                success: function(result){
                                                    $("#show_waiting_video").hide();
                                                    $("#show_video").html(result);
                                                }
                                            });
                                        }
                                    </script>


                                <?}?>


                                </br>
                                </br>
                                </br>
                                </br>
                            </div>

                            <?include 'newcoms/main/new_modual_seo.php4';?>
                            <?include 'newcoms/main/new_modual_slide.php4';?>

                            <img id="show_waiting_related" src="waiting.gif" dir="center" style="display:none">
                            <script>
                                $(function () {
                                    $.ajax({
                                        type:'POST',
                                        url:'New_ajax.php',
                                        data:"action=show_related_video_show&id=<?=$totla_related?>",
                                        success: function(result){
                                            $("#relatednews").html(result);
                                        }
                                    });
                                });
                            </script>
                            <div id="relatednews" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                    </br>
                    <div class="panel-footer bttools">
                        <?if($_SESSION["can_draft"]==1){?>
                            <a   id="save-draft2" class="btn btn-primary save-draft2"><span class="flaticon-browser93"></span><span>پیش نویس</span></a>
                        <?}if($_SESSION["can_add"]==1){?>
                            <a  id="submit2" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>انتشار</span></a>
                        <?}?>
                        <script>
                            $(function () {
                                $(".save-draft2").click(function(){
                                    $("#status").val("0");
                                    $("#submit_btn").click();
                                });
                                $(".submit2").click(function(){
                                    $("#status").val("1");
                                    $("#submit_btn").click();
                                });
                            });
                        </script>
                    </div>
                </fieldset>
            </form> </div>

    </div>
</div>

<?$_SESSION["del_item"]='del_video';
$_SESSION["edit_item"]='change_lock_video';
$_SESSION["change_chideman"]='change_chideman';
$_SESSION["copy_site"]='copy_site_page';
$_SESSION["cut_site"]='cut_site_page';?>
<style>
    .editableform .form-control {
        width: auto;
        direction: ltr;
    }
    .editable-clear-x {
        width: 0px;
    }
</style>
<script>
    $(document).ready(function(){
        $("#newpag").show();
        $("#newpag").click(function(){
            $("#newpag").hide();
        });
    });

    /////////////// radio show hide upload image
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="1"){
            $(".box").not(".red").hide();
            $(".red").show();
        }
        if($(this).attr("value")=="2"){
            $(".box").not(".green").hide();
            $(".green").show();
        }
    });
</script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/new_plugin/video-js/js/video.js"></script>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script src="ajax_js/video.js"></script>
<script type="text/javascript">
    $(function() {
        $.fn.editable.defaults.mode = 'inline';

        $('.status_news').editable({
            type: 'select',
            name:'change_status_article',
            url: '/New_ajax.php',
            source:"{1: 'منتشر شده',0: 'پيش نويس'}",
            ajaxOptions: {
                type: 'get',
            },
            error: function(response) {
                alert(response);
            }
        });
    });
</script>

<script>
    $("#spesial_start_date").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#spesial_finish_date").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });

    $('.iframe-btn').fancybox({
        'width'   : 880,
        'height'  : 570,
        'type'    : 'iframe',
        'autoScale'   : false
    });
    $("#start2").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#end2").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#publish_date").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $('#manage_site_filter').change( function(){
        var a ='<?=$url?>';
        if (a.indexOf("&site_filter=") >= 0){
            var b=a.split('&site_filter=');
            var c=b[1].split('&');
            var e="";
            if(c[1]>"")
                e="&"+c[1];
            a=b[0]+"&site_filter="+$(this).val()+e;
        }
        else
            a +='&site_filter='+$(this).val();
        window.location.href = a;
    });
    $('#manage_lang_filter').change( function() {
        var a ='<?=$url?>';
        if (a.indexOf("&lang_filter=") >= 0){
            var b=a.split('&lang_filter=');
            var c=b[1].split('&');
            var e="";
            if(c[1]>"")
                e="&"+c[1];
            a=b[0]+"&lang_filter="+$(this).val()+e;
        }
        else
            a +='&lang_filter='+$(this).val();
        window.location.href = a;
    });
    $('#manager_filter').change( function() {
        var a ='<?=$url?>';
        if (a.indexOf("&manager_filter=") >= 0){
            var b=a.split('&manager_filter=');
            var c=b[1].split('&');
            var e="";
            if(c[1]>"")
                e="&"+c[1];
            a=b[0]+"&manager_filter="+$(this).val()+e;
        }
        else
            a +='&manager_filter='+$(this).val();
        window.location.href = a;
    });
    $("#publish_search").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#end_Slide_show").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#start_Slide_show").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });

    $(document).ready(function(){
        hidevizhe = function () {
            $("#add_temp0").hide();
            $("#spesial_start_date").val('');
            $("#spesial_finish_date").val('');

        };
        handleNewSelection = function () {
            hidevizhe();
            switch ($(this).val()) {
                case '1':
                    $("#add_temp0").show();
                    break;
            }
        };
        $("#is_importand").change(handleNewSelection);                                                                                                                                     });

</script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<style>
    .fvalid{
        color:green;
    }
    .fvalid:before{
        display:block;
    }
    p:before{
        display:block;
    }
    .fnotvalid{
        color:red;
    }
    .fnotvalid:before{
        display:block;
    }
</style>
<script>
    $('#article_form').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            validating: 'glyphicon glyphicon-refresh'
        },
        locale: 'fr_FR',
        fields: {
            abstract: {
                validators: {
                    notEmpty: {
                        message: 'پر کردن اين فيلد الزامي است'
                    }
                }
            }
        }
    })
        .on('err.field.fv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
                .parent()
                .find('p')
                //.removeClass('fvalid')
                .addClass('fnotvalid');
        })

        // Called when a field is valid
        .on('success.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                    .parent()
                    .find('p')
                    //.removeClass('fa-check fa-times');
                    .removeClass('fnotvalid');
            //.addClass('fvalid');

            // Check if all fields in tab are valid
            var isValidTab = data.fv.isValidContainer($tabPane);
            if (isValidTab !== null) {
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        });
</script>
<script type="text/javascript">
    $(function () {
        $('.conchkNumber').click( function() {
            if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
                $('.conchkSelectAll').prop('checked', true);
            }
            else {
                $('.conchkSelectAll').prop('checked', false);
            }
        });
    });
</script>
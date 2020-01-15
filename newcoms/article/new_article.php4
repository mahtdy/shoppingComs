<?$_SESSION["modual_type"]=7?>
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

<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#cat_filter').select2({
            data: [
                <?
                $query="select id,name from new_modules_cat where type=7";$i=0;
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

<div id="seo_ajax"></div>

<?###چک کردن مدیر
$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>0){
    $temp_user=get_result("select user_id from new_article where id= $edit_mode",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
    $temp_user=get_result("select user_id from new_article where id= $edit_id",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$manager_filter=injection_replace($_GET['manager_filter']);
$q=injection_replace($_GET['q']);
$totla_article=injection_replace($_POST['totla_article']);
$navication_pic=injection_replace($_POST['navication_pic']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
if(isset($_POST['text'])) {
    $adrs_reimg = 'yep_theme/img/img_content_resize/';
    $abstract = resize_image_content($_POST['abstract'], $adrs_reimg);

}else {
    $abstract= ($_POST['abstract']);
}


$author=injection_replace($_POST['author']);
$translator=injection_replace($_POST['translator']);
$publisher=injection_replace($_POST['publisher']);
$article_base=injection_replace($_POST['article_base']);
$website=injection_replace($_POST['website']);
$bublish=injection_replace($_POST['bublish']);
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$can_comment=injection_replace($_POST['can_comment']);
$is_importand=injection_replace($_POST['is_importand']);
if($is_importand=='')$is_importand=0;
$text=injection_replace($_POST['text']);
$spesial_start_date=(injection_replace($_POST['spesial_start_date'])=="") ? 0 : injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=(injection_replace($_POST['spesial_finish_date'])=="") ? 0 : injection_replace($_POST['spesial_finish_date']);


if(isset($_POST['publish_date']))
    $publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi(injection_replace($_POST['publish_date']))) : $now;

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

#file upload field
$article_image=injection_replace($_POST['article_image']);

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
$spesial_date=jdate('Y/m/d');





##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_lang']);
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])||($manage_lang>0&&!in_array($manage_lang,$_SESSION["manager_title_lang"]))){
    header('Location: new_manager_signout.php');exit;
}
#########################چک کردن زیر سایت#############
$manage_site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);
if(($manage_site>0&&!in_array($manage_site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
    header('Location: new_manager_signout.php');exit;
}
############################################
if($edit_mode==0&&$title>""&&$_SESSION["can_add"]==1&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $arr=array("navication_pic"=>$navication_pic,"author"=>$author,"translator"=>$translator,"publisher"=>$publisher,"article_base"=>$article_base,"website"=>$website,"bublish"=>$bublish,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand,  "title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"publish_date"=>$publish_date,"user_id"=>$_SESSION['manager_id'],"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
    $id=insert_to_data_base($arr,'new_article',$coms_conect);

    ##pic
    $arr_imag=array("id"=>$id,"type"=>7,"adress"=>$article_image,"name"=>'article_image');
    insert_to_data_base($arr_imag,'new_file_path',$coms_conect);

    ####label
    if(!empty($meta_label)){
        foreach($meta_label as $value){
            if($meta_label>""){
                $label_arr=array("id"=>$id,"type"=>7,"label_id"=>$value);
                insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
            }
        }
    }

    #####دسته بندي#######
    foreach($cat_arr as $value){
        if($value!=-1){
            $arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>7);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }
    }
    ##اخبار مرتبط
    $related=explode(",",$totla_related);
    foreach($related as $value){
        if($value!=0){
            $arr=array("id"=>$value,"page_id"=>$id,"type"=>7);
            insert_to_data_base($arr,'new_related_madual',$coms_conect);
        }
    }

    ### slide show add
    if($slide==1){
        $slide_link="/news/$manage_lang/$id/".insert_dash("$title");
        $arr_slide=array("link"=>$slide_link,'site'>=$manage_site,'la'>=$manage_lang,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>7 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
        insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
    }
    ####=مقاله ها	###
    if(!empty($totla_article)){
        $temp_article=explode(",",$totla_article);
        foreach($temp_article as $image){
            if($image>""){
                $gallery_arr=array("id"=>$id,"type"=>7,"adress"=>$image,"name"=>'articles');
                insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
            }
        }
    }
    //exit;
    show_msg($new_successfull);

}else if($edit_mode>0&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $condition="id=$edit_mode";
    $arr=array("navication_pic"=>$navication_pic,"author"=>$author,"translator"=>$translator,"publisher"=>$publisher,"article_base"=>$article_base,"website"=>$website,"bublish"=>$bublish,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand  ,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"publish_date"=>$publish_date,"edit_user_id"=>$_SESSION['manager_id'],"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
    update_data_base($arr,'new_article',$condition,$coms_conect);

    $condition="id=$edit_mode && name='article_image'";
    $arr_imag=array("id"=>$edit_mode,"type"=>7,"adress"=>$article_image,"name"=>'article_image');
    update_data_base($arr_imag,'new_file_path',$condition,$coms_conect);

    ####label
    $condition="id=$edit_mode and type=7";
    delete_from_data_base('new_mudoal_label',$condition,$coms_conect);
    if(!empty($meta_label)){
        foreach($meta_label as $value){
            if($meta_label>""){
                $label_arr=array("id"=>$edit_mode,"type"=>7,"label_id"=>$value);
                insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
            }
        }
    }

#####دسته بندي#######
    $query1="delete from new_modules_catogory where page_id='$edit_mode' and type=7";
    $coms_conect->query($query1);
    foreach($cat_arr as $value){
        if($value!=-1){
            $arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>7);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }
    }
    ####=مقاله ها	###
    $query1="delete from new_file_path where id='$edit_mode' and type=7 and name='articles'";
    $coms_conect->query($query1);
    if(!empty($totla_article)){
        $temp_article=explode(",",$totla_article);
        foreach($temp_article as $image){
            if($image>""){
                $gallery_arr=array("id"=>$edit_mode,"type"=>7,"adress"=>$image,"name"=>'articles');
                insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
            }
        }
    }


#####related
    $query1="delete from new_related_madual where page_id='$edit_mode' and type=7";
    $coms_conect->query($query1);
    $related=explode(",",$totla_related);
    foreach($related as $value){
        if($value!=0){
            $arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>7);
            insert_to_data_base($arr,'new_related_madual',$coms_conect);
        }
    }
    ### slide show update
    if($slide==1){
        $slide_link="/news/$manage_lang/$edit_mode/".insert_dash("$title");
        $query1="select count(id) as count from new_slideshow where page_id='$edit_mode' and type=7";
        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count=$row['count'];
        if($count!=0){
            $condition="page_id=$edit_mode";
            $arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>7 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
            update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);

        }
        else{
            $arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>7 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
            insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
        }
    }else{
        $query1="delete from new_slideshow where page_id='$edit_mode' and type=7";
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
                          مقاله مرتبط
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


<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
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
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok_page"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
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
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف مقاله مرتبط اطمینان دارید؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_related_news"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
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
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آيا از حذف مقاله مرتبط اطمینان دارید؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_ajax_article"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
            </div>
        </div>
    </div>
</div>

<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get" enctype="multipart/form-data">
    <input type="hidden" value="new_article" name='yep'>
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
                                        <option <?if($field==2) echo 'selected'?> value="2">نویسنده</option>
                                        <option <?if($field==3) echo 'selected'?> value="3">مترجم</option>
                                        <option <?if($field==4) echo 'selected'?> value="4">ناشر</option>
                                        <option <?if($field==5) echo 'selected'?> value="5">زمینه تحقیقاتی</option>
                                        <option <?if($field==6) echo 'selected'?> value="6">وب سایت</option>
                                        <!--option <?if($field==7) echo 'selected'?> value="7">برچسب</option-->
                                        <option <?if($field==8) echo 'selected'?> value="8">چکیده</option>
                                        <option <?if($field==9) echo 'selected'?> value="9">Meta Keywords</option>
                                        <option <?if($field==10) echo 'selected'?> value="10">Meta Description</option>
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
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">تاريخ انتشار</label>
                                <div class="col-md-4">
                                    <?if($_GET['publish_search']>"")$publish_search=(injection_replace($_GET['publish_search']))?>
                                    <input type="text" value="<?=$publish_search?>" class="input-sm form-control" name="publish_search" id="publish_search" />
                                    </select>
                                </div>
                            </div>
                            <?$mudoal_lock_filter=(injection_replace($_GET['mudoal_lock_filter']));?>
                            <div class="form-group">
                                <label class="col-md-3 control-label">نوع انتشار</label>
                                <div class="col-md-4">
                                    <select id="mudoal_lock_filter" name="mudoal_lock_filter" class="form-control">
                                        <option value="" <?if($mudoal_lock_filter=="") echo 'selected'?>>همه</option>
                                        <option value="1" <?if($mudoal_lock_filter==1) echo 'selected'?>>ویژه اعضاء</option>
                                        <option value="0" <?if($mudoal_lock_filter==0) echo 'selected'?>>عمومی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">ترتیب اهمیت</label>
                                <div class="col-md-4">
                                    <?$is_importand_filter=(injection_replace($_GET['is_importand_filter']));?>
                                    <select id="is_importand_filter" name="is_importand_filter" class="form-control">
                                        <option value="" <?if($is_importand_filter=="") echo 'selected'?>>همه</option>
                                        <option value="0" <?if($is_importand_filter==0) echo 'selected'?>>عادی</option>
                                        <option value="1" <?if($is_importand_filter==1) echo 'selected'?>>ویژه</option>
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
                <span data-toggle="tab" href="#write" title="صفحه جدید"><i class="ace-icon fa fa-plus bigger-110"></i></span>
            </i>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                        <i class="ace-icon fa fa-plus bigger-110"></i>
                        صفحه جدید</a>
                </ul>
            </div>
        </li>

        <li style="display:none;" class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
                مدیریت محتوا </a></li>
    </ul>
    <div class="msheet tab-content">

        <div class="secfhead">
            <!-- #section:article/article.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">لیست مقاله ها</p><p class="lead">توضیحات این بخش</p></div>
            </div>
            <!-- /section:article/article.head -->

            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

                    <li id="newpag" class="addicon">
                        <a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن مقاله جدید" >
                            <span class="flaticon-add149"></span>
                        </a>
                    </li>

                    <li>
                        <a  data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته" >
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
            <!-- #section:article/article.table -->
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
                            <div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
                                <ul class="nav navbar-nav navbar-left">
                                    <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
                                        حذف
                                    </a>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group yepco">
                            <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                <input type="hidden" name="yep"  value="new_article">
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

                <table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                    <thead>
                    <tr >
                        <th class="center">ردیف</th>
                        <th class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="conchkSelectAll" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th class="center">عنوان مقاله</th>
                        <th class="center">نام نویسنده</th>
                        <th class="center">تاریخ انتشار</th>
                        <th class="center">نام سایت</th>
                        <th class="center">نوع</th>
                        <th class="center">بازدید</th>
                        <th class="center">وضعیت</th>
                        <th class="center">امکانات</th>
                    </tr>
                    </thead>
                    <tbody>
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
                        $str_q="  and(a.title like '%$q%' or a.author like'%$q%' or a.translator like '%$q%' or a.publisher like '%$q%' or a.article_base like '%$q%' or a.abstract like'%$q%')";
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

                    if($mudoal_lock_filter>""){
                        $str_lock=" and a.mudoal_lock='$mudoal_lock_filter'";
                        $lock_filter="&lock_filter=$mudoal_lock_filter";
                    }
                    if($is_importand_filter>""){
                        $str_important=" and a.is_importand='$is_importand_filter'";
                        $important_filter="&important_filter=$is_importand_filter";
                    }

                    if($publish_search>""){
                        $today_expire=strtotime(jalalitomiladi($publish_search));
                        $str_expire=" and a.publish_date='$today_expire'";
                        $expire_page="&publish_search=$publish_search";
                    }
                    if($field>""){
                        $field_page="&field=$field&search_txt=$search_txt";
                        switch ($field) {
                            case 0:
                                $str_field=" and (a.title like '%$search_txt%' 
									or 	a.author like '%$search_txt%'
									or 	a.translator like '%$search_txt%'
									or 	a.article_base like '%$search_txt%'
									or 	a.website like '%$search_txt%'
									or 	a.abstract like '%$search_txt%'
									or 	a.meta_keyword like '%$search_txt%'
									or 	a.meta_desciption like '%$search_txt%'
									or	a.publisher like '%$search_txt%' )";
                                break;
                            case 1:
                                $str_field=" and a.title like '%$search_txt%'";
                                break;
                            case 2:
                                $str_field=" and a.author like '%$search_txt%'";
                                break;
                            case 3:
                                $str_field=" and a.translator like '%$search_txt%'";
                                break;
                            case 4:
                                $str_field=" and a.publisher like '%$search_txt%'";
                                break;
                            case 5:
                                $str_field=" and a.article_base like '%$search_txt%'";
                                break;
                            case 6:
                                $str_field=" and a.website like '%$search_txt%'";
                                break;
                            case 7:
                                $str_field=" and a.name like '%$search_txt%'";
                                break;
                            case 8:
                                $str_field=" and a.abstract like '%$search_txt%'";
                                break;
                            case 9:
                                $str_field=" and a.meta_keyword like '%$search_txt%'";
                                break;
                            case 10:
                                $str_field=" and a.meta_desciption like '%$search_txt%'";
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
                    $sql1 = "SELECT count(id) as cnt  from new_article a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=7 
							$str_site $str_lang $str_manager $str_q $str_cat $str_expire $str_lock $str_important $str_status
							";

                    $result = $coms_conect->query($sql1);
                    $RS = $result->fetch_assoc();
                    $page=injection_replace($_GET["page"]);
                    $a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_article$lang_page$site_page$manager_page$important_filter$lock_filter$manager_q$status_page$expire_page$cat_page$field_page");
                    $from=$a[0];
                    $to=$a[1];
                    $pgsel=$a[2];

                    $sql12 = "SELECT a.site,a.la,a.title,a.id,a.author,a.publish_date,a.mudoal_lock,a.view,a.status   from new_article a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=7 
							$str_site $str_lang $str_manager $str_q $str_cat $str_expire $str_lock $str_important $str_status
							group by b.page_id
							order by a.id desc
							LIMIT $from,$to";
                    // echo $sql1;		exit;
                    ################################################################
                    $resultd1 = $coms_conect->query($sql12);
                    if($page>1)$k=($page-1)*10;else $k=0;$k++;
                    while($row = $resultd1->fetch_assoc()) {
                        $ide=$row['id'];
                        $id=$row['id'];
                        ?>
                        <tr>
                            <td class="center"><?=$k?></td>
                            <td class="center" style="border-right: none;border-left: none;">
                                <label class="position-relative">
                                    <input id='<?=$id?>' type="checkbox"   class="conchkNumber"/>
                                    <span class="lbl"></span>
                                </label> 
                            </td>
                            <?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
                            <td><a href="/<?="$domain/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" target="_blank"><?=$row['title']?></a></td>

                            <td> <?=$row['author']?></a></td>

                            <td><?=miladitojalaliuser(date('Y-m-d',$row["publish_date"]))?></td>
                            <td><a href="/<?=$domain?>" target="_blank"><?=$row['site']?></a></td>
                            <td><?if($row['mudoal_lock']==1) echo 'ویژه اعضا';else echo 'عادی';?></td>
                            <td><?=$row['view']?></td>
                            <td>
                                <span class="status_news editable editable-click" data-pk="<?=$row["id"]?>" ><?if($row["status"]==1){echo 'منتشر شده';}else{echo 'پیش نویس';}?></span>
                            </td>
                            <td>
                                <?if($_SESSION["can_edit"]==1){?>
                                    <a target="_blank" id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_article&edit_id=<?=$id?>">
                                        <i class="ace-icon fa fa-edit bigger-120" title="ویرایش"></i>
                                    </a>
                                <?}if($_SESSION["can_delete"]==1){?>
                                    <a    href="#" id="<?=$id?>" class="del_menu red icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                    </a>
                                    <?if(get_result("select count(id) from new_madules_comment where type=7 and status=0 and madul_id={$row['id']}",$coms_conect)){?>
                                        <a target="_blank" href="/newcoms.php?yep=new_article_comment" class="del_menu green icon">
                                            <?=mudoal_comment_count($row['id'],7,$coms_conect)?><i class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
                                        </a>
                                    <?}?>
                                    <a href="/<?="$domain/article/{$row['title']}/{$row['la']}/".insert_dash($row['title'])?>" target="_blank"  class="del_menu blue icon">
                                        <i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
                                    </a>

                                <?}?>
                                <label></label>
                                <input  id="<?=$id?>" name="switch-field-1" <?if($row['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
                                <span title="فعال سازی"class="lbl"></span>
                            </td>
                        </tr>
                        <?$k++;}?>

                    </tbody>
                </table>

            </div>
            <!-- /section:article/article.table -->
        </div>
        <?=$pgsel;?>

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
                    <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
                    </a>
                    <a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پیش نویس">
							<span class="flaticon-browser93">
							</span>
                    </a>
                    <a href="newcoms.php?yep=new_article" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
                    </a>


                    <!--	<div class="message-bar">
                            <h2 style="color: #2a8bcb;">صفحه جدید / ویرایش</h2>
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
											<span class="bigger-110">پیش نویس</span>
										</button-->
										<button type="submit" id="submit_page" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-check"></i>
											<span class="bigger-110">ذخیره</span>
										</button>
									</span>
                        </div>
                    </div>
                </div>
                </br>

                <fieldset style="margin-top: -15px;">
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab3">
                            <li class="active">
                                <a data-toggle="tab" href="#home3">
                                    <p class="flaticon-file23">اطلاعات پایه</p>

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
                                    تصویر نوار ناوبری
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
                                    تنظیمات اسلاید شو
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#upfiles">
                                    <p class="flaticon-upload36"></p>
                                    آپلود فایل های مقاله
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#relatednews">
                                    <p class="flaticon-copy23"></p>
                                    مقاله مرتبط
                                </a>
                            </li>
                        </ul>
                        <?###############نمايش در حالت ويرايش#################
                        if($edit_id>""){
                            $query="SELECT * FROM new_article where id='$edit_id'";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $status=$row['status'];
                            $title=$row['title'];
                            $text=$row['text'];
                            $slide=$row['slide'];
                            $la=$row['la'];
                            $site=$row['site'];
                            $label='';
                            $query="select label_id from new_mudoal_label where id='$edit_id' and type=7";
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
                            $publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
                            $abstract=$row['abstract'];
                            $can_comment=$row['can_comment'];
                            $author=$row['author'];
                            $translator=$row['translator'];
                            $publisher=$row['publisher'];
                            $article_base=$row['article_base'];
                            $navication_pic=$row['navication_pic'];
                            $website=$row['website'];
                            $bublish=$row['bublish'];
                            $mudoal_lock=$row['mudoal_lock'];
                            $is_importand=$row['is_importand'];


                            #Query from new_slideshow
                            $query="SELECT * FROM new_slideshow where page_id='$edit_id' and type=7";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $slide_img1=$row['slide_img1'];
                            $slide_img2=$row['slide_img2'];
                            if($row['start_date']>0)
                                $start_date=miladitojalaliuser(date('Y-m-d',$row['start_date']));
                            if($row['finish_date']>0)
                                $finish_date=miladitojalaliuser(date('Y-m-d',$row['finish_date']));
                            $slide_title=$row['title'];
                            $text1=$row['text1'];
                            $text2=$row['text2'];
                            $text3=$row['text3'];

                            #Query from new_file_path
                            $query="SELECT adress FROM new_file_path where id='$edit_id' && name='article_image' and type=7";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $article_image=$row['adress'];

                            $query="SELECT id FROM new_related_madual a  where page_id='$edit_id'  and type=7";
                            $result = $coms_conect->query($query);
                            $totla_related="";$i=1;
                            while($row = $result->fetch_assoc()){
                                if($i!=1)$str=',';$i++;
                                $totla_related .=$str.$row['id'];
                            }

                            $query="select adress from new_file_path where id='$edit_id' and type=7 and name='articles'";
                            $result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
                            while($RS1 = $result->fetch_assoc()) {
                                if($i!=1)$str=',';
                                $articles_list .=$str.$RS1['adress'];$i++;
                            }

                        }?>
                        <div class="tab-content">
                            <div id="home3" class="tab-pane in active">

                                <div class="row-fluid" style="margin-top:25px">
                                    <!-- #section:article/article.base -->
                                    <div style="padding-left:0;" class="col-md-12">
                                        <div class="row-fluid">
                                            <div class="col-md-8">

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">عنوان*</label>
                                                        <input name="title" value="<?=$title?>" id="title" class="form-control"
                                                               data-fv-notempty="true"
                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="group_name">سایت</label>

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
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="singlebutton">افزودن تصویر</label>
                                                        <div class="imgdemo"><img id='article_pic_previwe' src="/yep_theme/default/rtl/images/pic.png"></div>
                                                        <div style="display: inline-flex;">
                                                            <script>
                                                                setInterval(check_address,2000)
                                                                function check_address() {
                                                                    var aks_news = $('#article_image').val();
                                                                    if(aks_news!=""){
                                                                        $('#article_pic_previwe').attr("src",aks_news);
                                                                    }
                                                                }
                                                            </script>
                                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=article_image"   class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;    vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
                                                            <input id="article_image" value="<?=$article_image?>" name="article_image" class="imginput" type="text"  >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">نویسنده*</label>
                                                        <input id="author" name="author"  value="<?=$author?>" type="text" placeholder="" class="form-control"
                                                               data-fv-notempty="true"
                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">مترجم</label>
                                                        <input id="translator" value="<?=$translator?>" name="translator" type="text" placeholder="" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label">ناشر</label>
                                                        <input id="publisher" name="publisher"  value="<?=$publisher?>" type="text" placeholder="" class="form-control">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="bublish">نوع</label>
                                                        <select id="bublish" name="bublish" class="form-control">
                                                            <option value="0" <?if($is_importand==0) echo 'selected'?>>ترجمه</option>
                                                            <option value="1" <?if($is_importand==1) echo 'selected'?>>تألیف</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="article_base">زمینه تحقیقاتی</label>
                                                        <input id="article_base" value="<?=$article_base?>" name="article_base" type="text" placeholder="" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="website">آدرس وبسایت</label>
                                                        <input style="text-align: left; font-family: monospace;" value="<?=$website?>" id="website" name="website" type="text" placeholder="www.domain.com" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label" for="abstract">چکیده</label>
                                                        <textarea  id="text" name="abstract"  class="form-control" rows="3"><?=$abstract?></textarea>
                                                        <!--<script>CKEDITOR.replace( 'text' );</script>-->
                                                        <script>
                                                            tinymce.init({
                                                                selector: "#text",
                                                                height: 300,
                                                                width:"99.5%",
                                                                directionality : 'rtl',
                                                                language : 'fa_IR',
                                                                menubar:true,

                                                                //skin: 'flat',
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
                                                        <label class="control-label" for="publish_date">تاریخ انتشار</label>
                                                        <a href="#"><span class="dateicon flaticon-calendar53"></span></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input id="publish_date" name="publish_date" value="<?if($publish_date==""){ echo miladitojalaliuser(date('Y-m-d'));}else echo $publish_date;?>" class="dateinput" type="text" style="max-width: 120px;height: 34px;">
                                                    </div>
                                                </div>
                                                <!-- Select Basic -->
                                                <!--div class="form-group">
                                                  <label class="col-md-2 control-label" for="selectbasic" style="width: 118px;">اجازه انتشار</label>
                                                  <div style="padding-left:0;" class="col-md-7 ">
                                                    <select id="selectbasic" name="selectbasic" class="form-control">
                                                      <option value="1">دارد</option>
                                                      <option value="2">ندارد</option>
                                                    </select>
                                                  </div>
                                                </div-->

                                                <!-- Select Basic -->
                                                <!--div class="form-group">
                                                  <label class="col-md-2 control-label" for="status" style="width: 118px;">وضعیت انتشار</label>
                                                  <div style="padding-left:0;" class="col-md-7 ">
                                                    <select id="publish_status" name="publish_status" class="form-control">
                                                      <option value="1">پیش نویس</option>
                                                      <option value="2">منتشرشده</option>
                                                    </select>
                                                  </div>
                                                </div-->

                                                <!-- Select Basic -->
                                                <div class="form-group">
                                                    <label class="control-label col-md-6" for="mudoal_lock">نوع انتشار</label>
                                                    <div class="col-md-6">
                                                        <select id="mudoal_lock" name="mudoal_lock" class="form-control">
                                                            <option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ویژه اعضاء</option>
                                                            <option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عمومی</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Select Basic -->
                                                <div class="form-group">
                                                    <label class="control-label col-md-6" for="is_importand">ترتیب اهمیت</label>
                                                    <div class="col-md-6">
                                                        <select id="is_importand" name="is_importand" class="form-control">
                                                            <option value="0" <?if($is_importand==0) echo 'selected'?>>عادی</option>
                                                            <option value="1" <?if($is_importand==1) echo 'selected'?>>ویژه</option>
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
                                                <div class="form-group" style="text-align: -webkit-center;">
                                                    <label class="control-label" for="family">امکان نظردهي وجود داشته باشد</label>
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
                                    <!-- /section:article/article.base -->
                                </div>

                            </div>


                            <?$type=7;
                            include 'newcoms/main/new_modual_catogory.php4';?>
                            <?include 'newcoms/main/new_nav_pic.php4';?>
                            <?include 'newcoms/main/new_modual_seo.php4';?>
                            <?include 'newcoms/main/new_modual_slide.php4';?>
                            <div id="upfiles" class="tab-pane fade">
                                <div class="uploadbts" style="margin-top: 25px;">
                                    <!-- #section:article/article.upload -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">آپلود مقاله</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" value="" id="news_gallery">
                                            <a href="/filemanager/dialog.php?type=2&amp;field_id=news_gallery" class="holam btn btn-primary iframe-btn" title="انتخاب"><span class="holam flaticon-search85"></span></a>
                                            <a class="btn btn-success holam" href="#" id="add-image-to-gallery" title="افزودن"><span class="holam flaticon-round68"></span></a>
                                            <img id="show_waiting" src="waiting.gif" style="display:none;z-index=90000">
                                        </div>
                                        <?if($edit_id>""){?>
                                            <script>
                                                $(function () {
                                                    var aks = '<?=$articles_list?>';
                                                    if (aks!=""){
                                                        $("#add-image-to-gallery").attr("disabled", false);
                                                        $("#articles_list").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
                                                        $("#news_gallery").val("");//empty textbox
                                                        $("#show_waiting").show();

                                                        $.ajax({
                                                            type:'POST',
                                                            url:'New_ajax.php',
                                                            data:"action=add_articles&id=<?=$articles_list?>",
                                                            success: function(result){
                                                                $("#show_waiting").hide();
                                                                var b=result.split('~~');
                                                                $("#add_articles").html(b[0]);
                                                                $("#btn_del_related_news").val('');

                                                            }
                                                        });
                                                    }
                                                });
                                            </script>
                                        <?}?>

                                        <?if($edit_id>""){?>
                                            <script>
                                                $(function () {
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'New_ajax.php',
                                                        data:"action=show_related_article_show&id=<?=$totla_related?>",
                                                        success: function(result){
                                                            $("#relatednews").html(result);
                                                        }
                                                    });
                                                });
                                            </script>
                                        <?}?>




                                        <script>
                                            $( "#add-image-to-gallery" ).click(function(event) {
                                                event.preventDefault();
                                                var aks = $("#news_gallery").val();
                                                var index = aks.lastIndexOf("/") + 1;
                                                var filename = aks.substr(index);
                                                if (aks!=""){
                                                    $("#show_waiting").show();
                                                    $("#add-image-to-gallery").attr("disabled", false);
                                                    $("#articles_list").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
                                                    $("#news_gallery").val("");//empty textbox
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'New_ajax.php',
                                                        data:"action=add_articles&id="+$("#articles_list").val()+"&value="+$("#edit_mode").val(),
                                                        success: function(result){

                                                            $("#show_waiting").hide();
                                                            var b=result.split('~~');
                                                            $("#add_articles").html(b[0]);
                                                            $("#btn_del_related_news").val('');
                                                        }
                                                    });
                                                }
                                            });
                                            $(document).on('click', '#delete_image', function(event) {
                                                event.preventDefault();
                                                var address = $(this).parentsUntil("ul").find('img').attr("src");
                                                $(this).parentsUntil("ul").remove();
                                                $("#imagelist option[value='"+address+"']").remove();
                                            });
                                        </script>
                                        <select hidden id="articles_list" name="articles_list[]" multiple="multiple">
                                            <?
                                            $query="SELECT * FROM new_file_path where id='$edit_id' && name='news_gallery'";
                                            $gallery_result = $coms_conect->query($query);
                                            while($RS1 = $gallery_result->fetch_assoc()) {
                                                $adress=$RS1["adress"];
                                                echo '<option value="'.$adress.'" selected="selected">'.$adress.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <ul id="add_articles" class="ace-thumbnails clearfix">
                                        <!-- #section:pages/gallery -->
                                        </br>
                                        <!-- /section:article/article.upload -->
                                </div>

                            </div>

                            <img id="show_waiting_related" src="waiting.gif" dir="center" style="display:none">
                            <div id="relatednews" class="tab-pane fade">
                                <!-- #section:article/article.relate -->
                                <div class="uploadbts">

                                    <a   data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add133"></span><span>افزودن مقاله</span></button></a>
                                </div>
                                <!-- /section:article/article.relate -->
                            </div>
                        </div>
                    </div>

                    </br>
                    <div class="panel-footer bttools">

                        <a   id="save-draft2" class="btn  btn-primary save-draft2"><span class="flaticon-browser93"></span><span>پیش نویس</span></a>
                        <a  id="submit2" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>انتشار</span></a>
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

            </form></div>



    </div>
</div>
<?
$_SESSION["del_item"]='del_page';
$_SESSION["edit_item"]='change_lock_article';
$_SESSION["change_chideman"]='change_chideman';
$_SESSION["copy_site"]='copy_site_page';
$_SESSION["cut_site"]='cut_site_page';
?>
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
</script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script src="ajax_js/article.js"></script>
<?$_SESSION["del_item"]='del_article';?>

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
    $('#manage_site_filter').change( function() {
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
        excluded: [':disabled']
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
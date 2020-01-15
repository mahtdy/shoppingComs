<?$_SESSION["modual_type"]=9?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/daterangepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<!----ajax uploder-->
<link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css" />
<!---->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#cat_filter').select2({
            data: [
                <?
                $query="select id,name from new_modules_cat where type=9";$i=0;
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
<?$edit_id=injection_replace($_GET['edit_id']);
$label_lang='fa';
if($edit_id>0){
    $label_lang=get_result("SELECT la FROM new_gallery where id='$edit_id'",$coms_conect);
}

?>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<?###چک کردن مدير
$publish_date='';
$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>0){
    $temp_user=get_result("select user_id from new_gallery where id= $edit_mode",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
    $temp_user=get_result("select user_id from new_gallery where id= $edit_id",$coms_conect);
    if(!in_array($temp_user,$_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}

$files = glob('new_gallery/watermark/*');
foreach($files as $file){
    if(is_file($file))
        unlink($file);
}
$manager_filter=injection_replace($_GET['manager_filter']);
if($manager_filter=='')
    $manager_filter=$_SESSION["manager_id"];

$q=injection_replace($_GET['q']);
$totla_article=injection_replace($_POST['totla_article']);
$navication_pic=injection_replace($_POST['navication_pic']);
$cameraman=injection_replace($_POST['cameraman']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$pic_source=injection_replace($_POST['pic_source']);
$pic_source_link=injection_replace($_POST['pic_source_link']);
$gallery_edit_id=injection_replace($_POST['gallery_edit_id']);
$video_videos=injection_replace($_POST['video_videos']);

if(isset($_POST['text'])) {
    $adrs_reimg = 'yep_theme/img/img_content_resize/';
    $deatils = resize_image_content($_POST['deatils'], $adrs_reimg);

}else {
    $deatils= ($_POST['deatils']);
}


$mudoal_lock=injection_replace($_POST['mudoal_lock']);


$album_type=injection_replace($_POST['album_type']);
if(get_modual_setting_result('main','fa','gallery_up_in_ftp',$coms_conect)==1&&$album_type>0&&$_POST['galery_pic']>""){
    $ftp_setting= get_tem_result('main','fa',"ftp_setting",'defualt',$coms_conect);
    $album_type=3;
    foreach($_POST['galery_pic'] as $val) {
        $temp=explode($ftp_setting['pic'],$val);
        if($temp[1]>"")
            $galery_pic[]=$val;
        else
            $galery_pic[]=$ftp_setting['pic'].'uploads/'.date("Y")."/".date("m")."/".date("d")."/".$val;
    }
}else if($album_type==2)
    $galery_pic= $_POST['imagelist'];
else if($album_type==1&&$_POST['galery_pic']>""){
    foreach($_POST['galery_pic'] as $val) {
        $temp=explode("new_gallery/files",$val);
        if($temp[1]>"")
            $galery_pic[]=$val;
        else
            $galery_pic[]='http://'.$_SERVER["HTTP_HOST"].'/new_gallery/files/'.$val;
    }
}

//print_r($galery_pic);
$count_array=count($galery_pic);
for ($i_count=0;$i_count<=$count_array;$i_count++) {
    $news_image=$galery_pic[$i_count];
//===start  resize pics
    if ($news_image != '') {
        $modual_type = $_SESSION["modual_type"];
//echo $la.$manage_site;
        $fcount = get_result("select count(modual_type) from new_setting_pic_resize where la='$la' AND  modual_type='$modual_type'", $coms_conect);
//                echo $header1_link_count;
        $i = 0;

        for ($x = 1; $x <= $fcount; $x++) {
//            echo $x;
            $img_resize_query = get_PSR_result($la, $modual_type, $coms_conect);
//                 print_r($img_smallBox1);
//    print_r($img_resize_query[2]);

            if ($img_resize_query[$i]['width'] > "") {
                resize_image_M($news_image, $img_resize_query[$i]['width'], $img_resize_query[$i]['height'], $img_resize_query[$i]['address_link_save'], $img_resize_query[$i]['quality']);
            }
            $i++;
        }
    }
}
//====end resize pics===


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
$meta_label=  ($_POST['meta_label']);

if($meta_label>""){
    get_label_count($meta_label,$coms_conect);
}
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

if(isset($_POST['publish_date']))
    $publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi(injection_replace($_POST['publish_date']))) : $now;

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
$manage_lang=($_POST['manage_lang']);
$lang_filter=injection_replace($_GET['lang_filter']);


#########################چک کردن زير سايت#############
$manage_site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);
if(($manage_site>0&&!in_array($manage_site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
    echo 'site';exit;
    header('Location: new_manager_signout.php');exit;
}
############################################
if($edit_mode==0&&$title>""&&($_SESSION["can_add"]==1||$_SESSION["can_draft"]==1)&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $gallery_id=time();
    $k=0;

    if($_SESSION["can_add"]!=1)
        $status=0;
    foreach($manage_lang as $lang){
        $arr=array('album_type'=>$album_type,'gallery_id'=>$gallery_id,"cameraman"=>$cameraman ,"publish_date"=>$publish_date ,"navication_pic"=>$navication_pic,"pic_source_link"=>$pic_source_link,"pic_source"=>$pic_source,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"deatils"=>$deatils ,"user_id"=>$_SESSION['manager_id'],"date"=>$now,"la"=>$lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
        $id=insert_to_data_base($arr,'new_gallery',$coms_conect);

        $arr_lang=array('id'=>$id,"gallery_id"=>$gallery_id ,"la"=>$lang,'date'=>$now);
        insert_to_data_base($arr_lang,'new_main_gallery',$coms_conect);
        ####label
        if(!empty($meta_label)){

            foreach($meta_label as $value){
                if($meta_label>""){
                    $label_arr=array("id"=>$id,"type"=>9,"label_id"=>$value);
                    insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
                }
            }
        }

        #####دسته بندي#######
        if($k==0){
            foreach($cat_arr as $value){
                if($value!=-1){
                    $arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>9);
                    insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
                }
            }
        }else{
            $cat_lang=get_result("SELECT id FROM new_modules_cat WHERE la='$lang' and type=9",$coms_conect);
            $arr=array("cat_id"=>$cat_lang,"page_id"=>$id,"type"=>9);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }


        //foreach($cat_arr as $value){
        //if($value!=-1){

        //}
        //}
        ##اخبار مرتبط
        $related=explode(",",$totla_related);
        foreach($related as $value){
            if($value!=0){
                $arr=array("id"=>$value,"page_id"=>$id,"type"=>9);
                insert_to_data_base($arr,'new_related_madual',$coms_conect);
            }
        }

        ### slide show add
        if($slide==1){
            $slide_link="/gallery/$lang/$id/".insert_dash("$title");
            $arr_slide=array("link"=>$slide_link,'site'>=$manage_site,'la'>=$lang,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>9 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
            insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
        }

        if($video_videos>""){
            $gallery_arr=array("id"=>$id,"type"=>9,"adress"=>$video_videos,"name"=>'video_videos');
            insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
        }


        ####گالری	###
        if(!empty($galery_pic)){
            foreach($galery_pic as $image){
                if($image>""){
                    $gallery_arr=array("id"=>$id,"type"=>9,"adress"=>$image,"name"=>'galery_pic');
                    insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
                }
            }
        }
        $k++;
    }
    show_msg($new_successfull);
}else if($edit_mode>0&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );


    $condition="id=$edit_mode";
    $arr=array('album_type'=>$album_type,"cameraman"=>$cameraman ,"publish_date"=>$publish_date ,"navication_pic"=>$navication_pic,"pic_source_link"=>$pic_source_link,"pic_source"=>$pic_source,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand  ,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"deatils"=>$deatils ,"edit_user_id"=>$_SESSION['manager_id'],"edit_date"=>$now,"la"=>$manage_lang[0],"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
    update_data_base($arr,'new_gallery',$condition,$coms_conect);


    ####label
    $condition="id=$edit_mode and type=9";
    delete_from_data_base('new_mudoal_label',$condition,$coms_conect);
    if(!empty($meta_label)){
        foreach($meta_label as $value){
            if($meta_label>""){
                $label_arr=array("id"=>$edit_mode,"type"=>9,"label_id"=>$value);
                insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
            }
        }
    }

    #####دسته بندي#######
    $query1="delete from new_modules_catogory where page_id='$edit_mode' and type=9";
    $coms_conect->query($query1);
    foreach($cat_arr as $value){
        if($value!=-1){
            $arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>9);
            insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
        }
    }

    $query1="delete from new_file_path where id='$edit_mode' and type=9 and name='video_videos'";
    $coms_conect->query($query1);
    if($video_videos>""){
        $gallery_arr=array("id"=>$edit_id,"type"=>9,"adress"=>$video_videos,"name"=>'video_videos');
        insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
    }




    ####گالری	###
    $queryw1="delete from new_file_path where id='$edit_mode' and type=9 and name='galery_pic'";
    $coms_conect->query($queryw1);
    if(!empty($galery_pic)){
        foreach($galery_pic as $image){
            if($image>""){
                $gallery_arr=array("id"=>$edit_mode,"type"=>9,"adress"=>$image,"name"=>'galery_pic');
                insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
            }
        }
    }


    #####related
    $query1="delete from new_related_madual where page_id='$edit_mode' and type=9";
    $coms_conect->query($query1);
    $related=explode(",",$totla_related);
    foreach($related as $value){
        if($value!=0){
            $arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>9);
            insert_to_data_base($arr,'new_related_madual',$coms_conect);
        }
    }
    ### slide show update
    if($slide==1){
        $slide_link="/gallery/$lang/$edit_mode/".insert_dash("$title");
        $query1="select count(id) as count from new_slideshow where page_id='$edit_mode' and type=9";
        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count=$row['count'];
        if($count!=0){
            $condition="page_id=$edit_mode";
            $arr_slide=array("link"=>$slide_link,"la"=>$lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>9 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
            update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);

        }
        else{
            $arr_slide=array("link"=>$slide_link,"la"=>$lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>9 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
            insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
        }
    }else{
        $query1="delete from new_slideshow where page_id='$edit_mode' and type=9";
        $coms_conect->query($query1);
    }

    show_msg($new_successfull);
}
##################################
create_session_token();
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
    <input type="hidden" value="new_gallery" name='yep'>
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
            <!-- #section:gallery/gallery.head -->
            <div class="sectitle">
                <div class="icon">
                    <span class="fa fa-picture-o" style=""></span>
                </div>
                <div class="title">
                    <p class="titr">گالری</p><p class="lead">توضيحات اين بخش</p>
                </div>
            </div>
            <!-- /section:gallery/gallery.head -->

            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <?if($_SESSION['can_add']==1||$_SESSION['can_draft']==1){?> 
                        <li class="addicon newpag">
                            <a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن گالری جدید" >
                                <span class="flaticon-add149"></span>
                            </a>
                        </li>
                    <?}?>

                    <li class="newpag">
                        <a  data-toggle="modal" data-target="#searching" data-placement="top"    title="جستجوي پيشرفته" >
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
            <!-- #section:gallery/gallery.table -->
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
                                <input type="hidden" name="yep"  value="new_gallery">
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
                            <div class="pull-right col-md-2 btn-default btn-xs yepco">
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
                                $str_q="  and(a.title like '%$q%' or a.id='$q' or a.deatils like '%$q%' or a.pic_source like '%$q%' or a.pic_source_link like '%$q%')";
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
										or 	a.pic_source like '%$search_txt%'
										or 	a.pic_source_link like '%$search_txt%'
										or 	a.meta_keyword like '%$search_txt%'
										or 	a.meta_desciption like '%$search_txt%'
										or a.id='$search_txt'
										)";
                                        break;
                                    case 1:
                                        $str_field=" and a.title like '%$search_txt%'";
                                        break;
                                    case 2:
                                        $str_field=" and a.deatils like '%$search_txt%'";
                                        break;
                                    case 3:
                                        $str_field=" and a.pic_source like '%$search_txt%'";
                                        break;
                                    case 4:
                                        $str_field=" and a.meta_keyword like '%$search_txt%'";
                                        break;
                                    case 5:
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
                            $sql1 = "select count(a)as cnt from (SELECT count(id) a   from new_gallery a,new_modules_catogory b   
								where id>0 and a.id=b.page_id and b.type=9 
								$str_site $str_lang $str_manager $str_q $str_cat  $str_field $str_lock  $str_status
								group by b.page_id)q";
                            //  echo $sql1;
                            $result = $coms_conect->query($sql1);
                            $RS = $result->fetch_assoc();
                            $page=injection_replace($_GET["page"]);
                            $a=pgsel((int)$page,$RS["cnt"],9,9,"$root/newcoms.php?yep=new_gallery$lang_page$site_page$manager_page$lock_filter$manager_q$status_page$download_type$cat_page$field_page");
                            $from=$a[0];
                            $to=$a[1];
                            $pgsel=$a[2];
                            $sql12 = "SELECT  a.album_type,a.can_comment,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b   
								where id>0 and a.id=b.page_id and b.type=9 
								$str_site $str_lang $str_manager $str_q $str_cat   $str_field  $str_lock $str_status
								group by b.page_id
								order by a.id desc
								LIMIT $from,$to";

                            // echo $sql12;
                            ################################################################
                            $resultd1 = $coms_conect->query($sql12);
                            if($page>1)$k=($page-1)*10;else $k=0;$k++;
                            while($row = $resultd1->fetch_assoc()) {
                                $sql11="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row['id']}";
                                $result1 = $coms_conect->query($sql11);
                                $row1 = $result1->fetch_assoc();
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 item">
                                    <div id="<?if($row['status']==1)echo 'active';else echo 'deactive'?>" class="ic">
                                        <div class="vl">
                                            <a id="<?=$row1['adress']?>" class="show_video_modual" data-title="delete" data-toggle="modal" data-target="#show_add_video" data-placement="top"></a>
                                            <div class="details">
                                                <p><span class="title"><?=$row['title']?></span></p>
                                            </div>
                                            <?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
                                            <a href="<?="/$domain/gallery/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" target="_blank">
                                                <img src="<?=get_gallery_thumbnail($row1['adress'],$row['album_type'])?>"></a>
                                        </div>
                                        <div class="tools">
                                            <div class="vi">

                                            </div>
                                            <div class="ticons">
                                                <?if($_SESSION["can_edit"]==1){?>
                                                    <a  href="/newcoms.php?yep=new_gallery&edit_id=<?=$row['id']?>" data-placement="bottom" title="ویرایش"><span class="edit flaticon-note32"></span></a>
                                                <?}if($_SESSION["can_delete"]==1){?>
                                                    <a   href="#" id="<?=$row['id']?>" class="del_menu red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 3px 0 3px;">
                                                        <span class="delet flaticon-recycling10"></span></a>
                                                <?}?>
                                                <label>
                                                    <input  id="<?=$row['id']?>" name="switch-field-1" <?if($row['can_comment']==1) echo 'checked'?> class="ace ace-switch ace-switch-5 can_comment"  type="checkbox" />

                                                    <span title="نظرسنجی" class="lbl"></span></label>

                                                <a target="_blank" href="/newcoms.php?yep=new_gallery_comment" data-placement="bottom" title="نظرات" style="margin: -2px;"><span class="comment flaticon-speechballoons1"></span><?=mudoal_comment_count($row['id'],9,$coms_conect)?></a>
                                                <a title="فعال"><span class="<?if($row['status']==1) echo 'ac flaticon-round68';else echo 'dac flaticon-round73'?>"></span></a>
                                                <label>
                                                    <input id="<?=$row['id']?>" name="switch-field-1" <?if($row['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
                                                    <span title="مشاهده توسط اعضای سایت" class="lbl"></span></label>

                                                <span style="text-align: center;padding-right: 2px;">
											<input id='<?=$row['id']?>' type="checkbox" class="ace conchkNumber sr-check"/>
											<span class="lbl"></span>
											</span>
                                                <span style="background-color: white;-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);-ms-box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);border: 1px solid #ebeced;position: relative;top: -4px;padding-left: 4px;padding-right: 4px;"><?=$row['site']?></span>
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
                <input type="hidden" id="gallery_edit_id" name="gallery_edit_id" value="<?=$gallery_id?>">
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
                    <a href="newcoms.php?yep=new_gallery" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
					<span class="flaticon-left-arrow9">
					</span>
                    </a>
                    <div style="display:none;">
                        <div class="messagebar-item-left" >
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
                                    آلبوم تصاویر
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#relatednews">
                                    <p class="flaticon-copy23"></p>
                                    گالری مرتبط
                                </a>
                            </li>
                        </ul>
                        <?###############نمايش در حالت ويرايش#################
                        $title='';
                        $pic_source_link='';
                        $pic_source='';
                        $cameraman='';
                        $deatils='';
                        $publish_date='';



                        $album_type=0;

                        if($edit_id>""){
                            $query="SELECT * FROM new_gallery where id='$edit_id'";
                            $result = $coms_conect->query($query);
                            $row = $result->fetch_assoc();
                            $status=$row['status'];
                            $gallery_id=$row['gallery_id'];
                            $cameraman=$row['cameraman'];
                            $title=$row['title'];
                            $main_type=$row['album_type'];

                            $album_type=$row['album_type'];
                            if($album_type==3)
                                $album_type=1;
                            $attach_file=$row['attach_file'];
                            $slide=$row['slide'];

                            $publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
                            $pic_source=$row['pic_source'];
                            $pic_source_link=$row['pic_source_link'];
                            $la=$row['la'];
                            $site=$row['site'];
                            $label='';
                            $query="select label_id from new_mudoal_label where id='$edit_id' and type=9";
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
                            $query="SELECT * FROM new_slideshow where page_id='$edit_id' and type=9";
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





                            $query="SELECT id FROM new_related_madual a  where page_id='$edit_id'  and type=9";
                            $result = $coms_conect->query($query);
                            $totla_related="";$i=1;
                            while($row = $result->fetch_assoc()){
                                if($i!=1)$str=',';$i++;
                                $totla_related .=$str.$row['id'];
                            }


                        }?>
                        <div class="tab-content">
                            <div id="home3" class="tab-pane in active">
                                <div class="row-fluid" style="margin-top:25px">
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
                                                        <label class="control-label">عکاس </label>
                                                        <input id="cameraman" name="cameraman"  value="<?=$cameraman?>" type="text" placeholder="" class="form-control">
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
                                                        <?create_lang_title($la,$coms_conect,$_SESSION["manager_title_lang"],1);?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="group_name"></label>
                                                        <div class="alert alert-info" role="alert" style="border-radius: 6px;margin: 7px;padding: 7px;">
                                                            برای انتخاب چند زبان می توانید Shift را نگه داشته و زبان های مورد نظر را انتخاب کنید</div>
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
                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-5">
                                                        <label class="control-label">منبع </label>
                                                        <input id="pic_source" name="pic_source"  value="<?=$pic_source?>" type="text" placeholder="" class="form-control">
                                                    </div>

                                                    <div  class="form-group col-md-1">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label class="control-label">لینک منبع </label>
                                                        <input id="pic_source" name="pic_source_link"  value="<?=$pic_source_link?>" type="text" placeholder="" class="form-control">
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
                                                    <div class="col-md-6">
                                                        <input id="publish_date" name="publish_date" value="<?if($publish_date==""){ echo miladitojalaliuser(date('Y-m-d'));}else echo $publish_date;?>" class="dateinput " type="text" style="max-width: 120px;height: 34px;">
                                                    </div>
                                                </div>

                                                <!-- Select Basic -->
                                                <div class="form-group">
                                                    <label class="control-label col-md-6" for="mudoal_lock">نوع انتشار</label>
                                                    <div class="col-md-6">
                                                        <select id="mudoal_lock" name="mudoal_lock" class="form-control">
                                                            <option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه اعضاء</option>
                                                            <option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عمومي</option>
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
                                </div>
                            </div>

                            <?$type=9;
                            include 'newcoms/main/new_modual_catogory.php4';?>
                            <?include 'newcoms/main/new_nav_pic.php4';?>
                            <?include 'newcoms/main/new_modual_seo.php4';?>
                            <?include 'newcoms/main/new_modual_slide.php4';?>
                            <div id="relatednews" class="tab-pane fade">
                            </div>
                            <div id="blog_video_div" class="tab-pane">
                                <div class="col-md-12" style="margin-top:25px; padding-right:0;">
                                    <!-- #section:gallery/gallery.vid -->
                                    <div class="col-md-4"  style=" padding-right:0;">
                                        <label class="control-label">
                                            <input type="radio" name="album_type" <?if($album_type!=2)echo 'checked'?> id="radios-11" value="1" >
                                            الصاق از فایل کامپیوتر
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="control-label">
                                            <input type="radio" name="album_type" <?if($album_type==2)echo 'checked'?> id="radios-12" value="2" >
                                            انتخاب از رسانه های قبلی
                                        </label>

                                        <div class="col-md-7 red box form-group pull-right" id="album_type2" style="<?if($album_type==2)echo 'display:block';else echo 'display:none'?>">

                                            <input type="text" value="" id="news_gallery">
                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery" class="holam btn btn-primary iframe-btn" title="انتخاب"><span class="holam flaticon-search85"></span></a>
                                            <a class="btn btn-success holam" href="#" id="add-image-to-gallery" title="افزودن"><span class="holam flaticon-round68"></span></a>
                                            <img id="show_waiting" src="waiting.gif" style="display:none">
                                            <select hidden id="imagelist" name="imagelist[]" multiple="multiple">
                                                <?if($album_type==2){
                                                    $query="SELECT * FROM new_file_path where id='$edit_id' and type=9 and name='galery_pic'";

                                                    $gallery_result = $coms_conect->query($query);
                                                    while($RS1 = $gallery_result->fetch_assoc()) {
                                                        $adress=$RS1["adress"];
                                                        echo '<option value="'.$adress.'" selected="selected">'.$adress.'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <ul id="gallery-img" class="ace-thumbnails clearfix">
                                                </br>
                                                <?if($album_type==2){
                                                    $query="select adress from new_file_path where id='$edit_id' and type=9 and name='galery_pic'";
                                                    $gallery_result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
                                                    while($RSG = $gallery_result->fetch_assoc()) {
                                                        $adress=$RSG["adress"];

                                                        ?>
                                                        <li>
                                                            <div>
                                                                <img width="105" height="105" alt="105x105" src="<?=$adress?>" />
                                                                <div class="text">
                                                                    <div class="inner">
                                                                        <span><?=basename($adress)?></span>
                                                                        <div class="tools">
                                                                            <a href="<?=$adress?>" data-rel="colorbox" class="cboxElement">
                                                                                <i class="ace-icon fa fa-search-plus"></i>
                                                                            </a>
                                                                            <a id="delete_image" href="#">
                                                                                <i class="ace-icon fa fa-times red"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    <?}}?>

                                                <a style="display:none" href="<?=$adress?>" data-rel="colorbox" class="cboxElement"></a>
                                            </ul>


                                        </div>
                                        <script>
                                            //$( "#add-image-to-gallery" ).click(function(event) {
                                            $(document).on("click", "#add-image-to-gallery", function() {
                                                event.preventDefault();
                                                var aks = $("#news_gallery").val();
                                                var index = aks.lastIndexOf("/") + 1;
                                                var filename = aks.substr(index);
                                                if (aks!=""){
                                                    $("#show_waiting").show();
                                                    $("#add-image-to-gallery").attr("disabled", false);
                                                    var html_string = '<li><div><img width="105" height="105" alt="105x105" src="'+aks+'"/><div class="text"><div class="inner"><span>'+filename+'</span><div class="tools"><a href="'+aks+'" data-rel="colorbox" class="cboxElement"><i class="ace-icon fa fa-search-plus"></i></a><a data-id="'+aks+'" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
                                                    $("#gallery-img").append(html_string);
                                                    $("#imagelist").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
                                                    $("#news_gallery").val("");//empty textbox
                                                    $("#show_waiting").hide();
                                                }
                                            });
                                            $(document).ready(function(){
                                                $(document).on('click', '#delete_image', function(event) {
                                                    event.preventDefault();
                                                    var address = $(this).parentsUntil("ul").find('img').attr("src");
                                                    $(this).parentsUntil("ul").remove();
                                                    $("#imagelist option[value='"+address+"']").remove();
                                                    $.ajax({
                                                        type:'POST',
                                                        url:'New_ajax.php',
                                                        data:"action=delete_ajax_gallerypic&id="+$(this).attr('data-id')+"&value="+$(this).attr('data-addres'),
                                                        success: function(result){
                                                        }

                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <br><br><br><br>
                                <hr>
                                <div class="col-xs-12 form-group blue box" id="album_type1" style="<?if($album_type!=2)echo 'display:block';else echo 'display:none'?>">
                                    <div id="fffffffffffff">
                                        <input type="checkbox" id="watermark_check">
                                        <label class="control-label"> افزودن واتر مارک</label>
                                        <img src="/waiting.gif" id="watermark_check_pic" style="display:none; margin-right:25%;">
                                    </div>
                                    <div class="ui-sortable" style="float:right"><div id="galery_pic" orakuploader="on"></div>
                                        <?if($edit_id>0&&$album_type==1){
                                            $query="select adress from new_file_path where id='$edit_id' and type=9 and name='galery_pic'";
                                            $result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
                                            $pic_str='';
                                            while($RS1 = $result->fetch_assoc()) {
                                                $galery_pic=$RS1['adress'];
                                                $address=$RS1['adress'];
                                                if($main_type==1){
                                                    $temp=explode("/new_gallery/files/",$address);
                                                    $pic_thumbnail=$temp[0]."/new_gallery/files/tn/".$temp[1];
                                                }if($main_type==3){
                                                    $temp=explode("/",$address);
                                                    $file_name=end($temp);
                                                    unset($temp[count($temp)-1]);
                                                    $address=implode('/',$temp);
                                                    $pic_thumbnail= $address."/tn/".$file_name;
                                                }
                                                $div_id=explode(".",$galery_pic);
                                                if(get_modual_setting_result('main','fa','gallery_up_in_ftp',$coms_conect)==1){
                                                    $temp_array=explode("/",$galery_pic);

                                                    $RS1['adress']=end($temp_array);

                                                }

                                                $pic_str .= "<div class='multibox file' style='cursor: move;' id='{$RS1['adress']}' filename='{$RS1['adress']}'>";
                                                $pic_str .= "<div class='picture_delete'  ></div>";
                                                $pic_str .= "<img src='".$pic_thumbnail."' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                $pic_str .= "<input type='hidden' value='$galery_pic' name='galery_pic[]' />";
                                                $pic_str .= "</div>";
                                            }
                                        }?>
                                    </div>
                                </div>
                                <!-- /section:gallery/gallery.vid -->
                            </div>
                            <div id="orakuploader_uploader">
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#galery_pic').orakuploader({
                                            orakuploader_path : 'new_orakuploader/',
                                            orakuploader_main_path : 'new_gallery/files',
                                            orakuploader_thumbnail_path : 'new_gallery/files/tn',
                                            orakuploader_use_main : false,
                                            orakuploader_use_sortable : true,
                                            orakuploader_use_dragndrop : true,
                                            <?if(get_modual_setting_result('main','fa','gallery_up_in_ftp',$coms_conect)==1){?>
                                            orakuploader_upload_to_ftp : true,
                                            <?}?>
                                            orakuploader_add_image : 'new_orakuploader/images/add.png',
                                            orakuploader_add_label : 'آپلود تصویر',
                                            orakuploader_resize_to : <?=get_result("select address from new_default_navbar where name='gallery_pic_size'  and la='fa' and site='main'",$coms_conect)?>,
                                            orakuploader_thumbnail_size : 400,
                                            orakuploader_watermark : 'new_gallery/watermark/water_mark.png',
                                        });

                                        $('#galery_pic').html("<?=$pic_str?>");
                                    });
                                </script>
                            </div>
                            <script>
                                $("#start_Slide_show").datepicker({
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
                                $("#end_Slide_show").datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    isRTL: true,
                                    dateFormat: "yy/mm/dd"
                                });
                            </script>

                            <img id="show_waiting_related" src="waiting.gif" dir="center" style="display:none; margin-right:40%;">
                            <script>
                                $(function () {
                                    $.ajax({
                                        type:'POST',
                                        url:'New_ajax.php',
                                        data:"action=show_related_gallery_show&id=<?=$totla_related?>",
                                        success: function(result){
                                            $("#relatednews").html(result);
                                        }
                                    });
                                });
                            </script>

                        </div>
                        <div class="panel-footer bttools">
                            <?if($_SESSION["can_draft"]==1){?>
                                <a id="save_draft32" class="btn btn-primary save-draft2"><span class="flaticon-browser93"></span><span> پيش نويس</span></a>
                            <?}if($_SESSION["can_add"]==1){?>
                                <a id="qazzaq" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>انتشار</span></a>
                            <?}?>
                        </div>
                    </div>
                    </br>
                </fieldset>
            </form> </div>
    </div>
</div>

<?$_SESSION["del_item"]='del_gallery';
$_SESSION["edit_item"]='change_lock_gallery';
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
    /////////// active tab write hide icon plus & search
    $(document).on('click.bs.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
        e.preventDefault()
        if($(this).parent().prop('tagName')!=='LI')
        {

            $('ul.nav li a[href="' + $(this).attr('href') + '"]').tab('show');
        }
        else
        {
            $(this).tab('show');
            $(".newpag").hide();
        }
    })


    /////////////// radio show hide upload gallery
    $(document).ready(function(){
        $('input[name$="album_type"]').click(function(){
            if($(this).attr("value")=="2"){
                $(".box").not(".red").hide();
                $(".red").show();
            }
            if($(this).attr("value")=="1"){
                $(".box").not(".blue").hide();
                $(".blue").show();
            }
        });
    });
</script>


<script src="/yep_theme/default/rtl/assets/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/new_plugin/video-js/js/video.js"></script>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script src="ajax_js/gallery.js"></script>

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


    jQuery(function($) {
        var $overflow = '';
        var colorbox_params = {
            rel: 'colorbox',
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="ace-icon fa fa-arrow-left"></i>',
            next:'<i class="ace-icon fa fa-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                $overflow = document.body.style.overflow;
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = $overflow;
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };

        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange'></i>");//let's add a custom loading icon
    })
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
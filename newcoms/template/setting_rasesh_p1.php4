<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet"
      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">

<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/zozo.tabs.min.css">

<style>
    hr {
        border-top: 1px solid #000;
    }
</style>

<?

$img_page_main= 'yep_theme/img/img_page_main/';

if ($_GET['lang_filter'] > "")
    $la = injection_replace($_GET["lang_filter"]);
else
    $la = injection_replace($_POST["manage_lang_filter"]);
if ($la == '')
    $la = $default_lang;

if ($_GET['site_filter'] > "")
    $site = injection_replace($_GET["site_filter"]);
else
    $site = injection_replace($_POST["manage_site_filter"]);
if ($site == '')
    $site = $default_site;
//===============================================================================================================
if ($_POST['send_flag'] == 1) {

    #################################################################بازگشت به حالت قبل tab ############################################
    $temp_tab = injection_replace($_POST["temp_tab"]);
    $number_tab = injection_replace($_POST["number_tab"]);
    $num_con_tab = injection_replace($_POST["num_con_tab"]);

    insert_templdate($site, '', $la, $number_tab, $temp_tab, '', $num_con_tab, "temp_tab", 'rasesh', $coms_conect);


    ########################################################### باکس اول ویدیو #####################################
    $rasesh_p1_boxOne_pic_adress = 0;
    $rasesh_p1_boxOne_pic_adress = injection_replace($_POST["rasesh_p1_boxOne_pic_adress"]);
    $rasesh_p1_boxOne_title = injection_replace($_POST["rasesh_p1_boxOne_title"]);
    $rasesh_p1_boxOne_link = injection_replace($_POST["rasesh_p1_boxOne_link"]);
    $rasesh_p1_boxOne_text = $_POST["rasesh_p1_boxOne_text"];
    $rasesh_p1_boxOne_pic= injection_replace($_POST["rasesh_p1_boxOne_pic"]);
    $rasesh_p1_boxOne_pic = resize_image_M($rasesh_p1_boxOne_pic,1423,800,$img_page_main,'');
    $rasesh_p1_boxOne_pic_avatar_orak = injection_replace($_POST["rasesh_p1_boxOne_pic_avatar_orak"][0]);
    if($rasesh_p1_boxOne_pic_avatar_orak>""){
        $rasesh_p1_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $rasesh_p1_boxOne_pic_avatar_orak;
        $rasesh_p1_boxOne_pic = resize_image_M($rasesh_p1_boxOne_pic,1423,800,$img_page_main,'');
    }
    insert_templdate($site, $rasesh_p1_boxOne_pic_adress, $la, $rasesh_p1_boxOne_text, $rasesh_p1_boxOne_title, $rasesh_p1_boxOne_link, $rasesh_p1_boxOne_pic, "rasesh_p1_boxOne", 'rasesh', $coms_conect);

    $rasesh_p1_boxOne_video_cat = injection_replace_pic($_POST["rasesh_p1_boxOne_video_cat"]);
    $boxOne_P2_dr_subcat_cat = injection_replace_pic($_POST["boxOne_P2_dr_subcat_cat"]);
    $boxOne_P2_dr_subcat_cat_content = injection_replace_pic($_POST["boxOne_P2_dr_subcat_cat_content"]);
    if($boxOne_P2_dr_subcat_cat_content>0)
        insert_templdate($site, $boxOne_P2_dr_subcat_cat_content, $la, '', '', $rasesh_p1_boxOne_video_cat, $boxOne_P2_dr_subcat_cat, "rasesh_p1_boxOne_video", 'rasesh', $coms_conect);

    ########################################################### box2 ########################################################

    $rasesh_p1_boxTwo_pic_adress = 0;
    $rasesh_p1_boxTwo_pic_adress= injection_replace($_POST["rasesh_p1_boxTwo_pic_adress"]);
    $rasesh_p1_boxTwo_title= injection_replace($_POST["rasesh_p1_boxTwo_title"]);
    $rasesh_p1_boxTwo_text= injection_replace($_POST["rasesh_p1_boxTwo_text"]);
    $rasesh_p1_boxTwo_pic= injection_replace($_POST["rasesh_p1_boxTwo_pic"]);
    $rasesh_p1_boxTwo_link= injection_replace($_POST["rasesh_p1_boxTwo_link"]);
    $rasesh_p1_boxTwo_link= resize_image_M($rasesh_p1_boxTwo_link,357,530,$img_page_main,'');
    $rasesh_p1_boxTwo_link_avatar_orak = injection_replace($_POST["rasesh_p1_boxTwo_link_avatar_orak"][0]);
    if ($rasesh_p1_boxTwo_link_avatar_orak > "") {
        $rasesh_p1_boxTwo_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $rasesh_p1_boxTwo_link_avatar_orak;
        $rasesh_p1_boxTwo_link= resize_image_M($rasesh_p1_boxTwo_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $rasesh_p1_boxTwo_pic_adress, $la, $rasesh_p1_boxTwo_text, $rasesh_p1_boxTwo_title, $rasesh_p1_boxTwo_link, $rasesh_p1_boxTwo_pic, "rasesh_p1_boxTwo", 'rasesh', $coms_conect);

    $rasesh_p1_faq_que_pic_adress = 0;
    $rasesh_p1_faq_que_pic_adress= injection_replace($_POST["rasesh_p1_faq_que_pic_adress"]);
    $rasesh_p1_faq_que_pic = 0;
    $rasesh_p1_faq_que_pic= injection_replace($_POST["rasesh_p1_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $rasesh_p1_faq_que_link = injection_replace_pic($_POST["rasesh_p1_faq_que_link"]);
    insert_templdate($site, $rasesh_p1_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $rasesh_p1_faq_que_link, $rasesh_p1_faq_que_pic, "rasesh_p1_faq_que", 'rasesh', $coms_conect);

    $rasesh_p1_pop_faq_title= injection_replace($_POST["rasesh_p1_pop_faq_title"]);
    $rasesh_p1_pop_faq_text= injection_replace($_POST["rasesh_p1_pop_faq_text"]);
    $rasesh_p1_pop_faq_pic= injection_replace($_POST["rasesh_p1_pop_faq_pic"]);
    $rasesh_p1_pop_faq_link= injection_replace($_POST["rasesh_p1_pop_faq_link"]);
    $rasesh_p1_pop_faq_pic_adress= injection_replace($_POST["rasesh_p1_pop_faq_pic_adress"]);
    insert_templdate($site, $rasesh_p1_pop_faq_pic_adress, $la, $rasesh_p1_pop_faq_text, $rasesh_p1_pop_faq_title, $rasesh_p1_pop_faq_link, $rasesh_p1_pop_faq_pic, "rasesh_p1_pop_faq", 'rasesh', $coms_conect);

    ########################################################### box3 ########################################################

    $rasesh_p1_boxThree_pic_adress = 0;
    $rasesh_p1_boxThree_pic_adress = injection_replace($_POST["rasesh_p1_boxThree_pic_adress"]);


    $rasesh_p1_boxThree_text = $_POST["rasesh_p1_boxThree_text"];
    $rasesh_p1_boxThree_pic= injection_replace($_POST["rasesh_p1_boxThree_pic"]);
    $rasesh_p1_boxThree_pic = resize_image_M($rasesh_p1_boxThree_pic,1423,800,$img_page_main,'');
    $rasesh_p1_boxThree_pic_avatar_orak = injection_replace($_POST["rasesh_p1_boxThree_pic_avatar_orak"][0]);
    if($rasesh_p1_boxThree_pic_avatar_orak>""){
        $rasesh_p1_boxThree_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $rasesh_p1_boxThree_pic_avatar_orak;
        $rasesh_p1_boxThree_pic = resize_image_M($rasesh_p1_boxThree_pic,1423,800,$img_page_main,'');
    }
    insert_templdate($site, $rasesh_p1_boxThree_pic_adress, $la, $rasesh_p1_boxThree_text, '', '', $rasesh_p1_boxThree_pic, "rasesh_p1_boxThree", 'rasesh', $coms_conect);

    $rasesh_p1_boxThree_btns_del = "name like 'rasesh_p1_boxThree_btns%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $rasesh_p1_boxThree_btns_del, $coms_conect);
    $rasesh_p1_boxThree_btns_count = injection_replace_pic($_POST["rasesh_p1_boxThree_btns_count"]);

    for ($k = 1; $k <= $rasesh_p1_boxThree_btns_count; $k++) {
        $rasesh_p1_boxThree_btns_title = injection_replace_pic($_POST["rasesh_p1_boxThree_btns_title{$k}"]);
        $rasesh_p1_boxThree_btns_text = injection_replace_pic($_POST["rasesh_p1_boxThree_btns_text{$k}"]);

        insert_templdate($site, '', $la, $rasesh_p1_boxThree_btns_text, $rasesh_p1_boxThree_btns_title, '', '', "rasesh_p1_boxThree_btns$k", 'rasesh', $coms_conect);
    }
    ########################################################### box4 ########################################################
    $rasesh_p1_boxFour_pic_adress = 0;
    $rasesh_p1_boxFour_pic_adress= injection_replace($_POST["rasesh_p1_boxFour_pic_adress"]);
    $rasesh_p1_boxFour_title= injection_replace($_POST["rasesh_p1_boxFour_title"]);
    $rasesh_p1_boxFour_text= injection_replace($_POST["rasesh_p1_boxFour_text"]);

    insert_templdate($site, $rasesh_p1_boxFour_pic_adress, $la, $rasesh_p1_boxFour_text, $rasesh_p1_boxFour_title, '', '', "rasesh_p1_boxFour", 'rasesh', $coms_conect);


    $ValSelectActive_rasesh_p1_boxFour_title = injection_replace($_POST["ValSelectActive_rasesh_p1_boxFour_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_rasesh_p1_boxFour_title, '', '', "ValSelectActive_rasesh_p1_boxFour", 'rasesh', $coms_conect);

    $condition_first_choice_rasesh_p1_boxFour = "name like 'first_choice_rasesh_p1_boxFour%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_rasesh_p1_boxFour, $coms_conect);
    $first_choice_rasesh_p1_boxFour_count = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFour_count"]);
    for ($i = 1; $i <= $first_choice_rasesh_p1_boxFour_count; $i++) {

        $first_choice_rasesh_p1_boxFour_cat = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFour_cat{$i}"]);
        $first_choice_Dr_boxFour_subcat_cat = injection_replace_pic($_POST["first_choice_Dr_boxFour_subcat_cat{$i}"]);
        $first_choice_Dr_boxFour_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_Dr_boxFour_Fixed_selection_cat{$i}"]);
        $first_choice_rasesh_p1_boxFour_number = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFour_number{$i}"]);
        if ($first_choice_Dr_boxFour_subcat_cat > "")
            insert_templdate($site, $first_choice_rasesh_p1_boxFour_number, $la, $first_choice_Dr_boxFour_Fixed_selection_cat, '', $first_choice_rasesh_p1_boxFour_cat, $first_choice_Dr_boxFour_subcat_cat, "first_choice_rasesh_p1_boxFour$i", 'rasesh', $coms_conect);
    }

    $condition_second_choice_rasesh_p1_boxFour = "name like 'second_choice_rasesh_p1_boxFour%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_rasesh_p1_boxFour, $coms_conect);
    $second_choice_rasesh_p1_boxFour_count = injection_replace_pic($_POST["second_choice_rasesh_p1_boxFour_count"]);
    for ($i = 1; $i <= $second_choice_rasesh_p1_boxFour_count; $i++) {

        $second_choice_rasesh_p1_boxFour_cat = injection_replace_pic($_POST["second_choice_rasesh_p1_boxFour_cat{$i}"]);
        $second_choice_Dr_boxFour_subcat_cat = injection_replace_pic($_POST["second_choice_Dr_boxFour_subcat_cat{$i}"]);
        $second_choice_Dr_boxFour_subcat_cat_content = injection_replace_pic($_POST["second_choice_Dr_boxFour_subcat_cat_content{$i}"]);
        if ($second_choice_Dr_boxFour_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_Dr_boxFour_subcat_cat_content, $la, '', '', $second_choice_rasesh_p1_boxFour_cat, $second_choice_Dr_boxFour_subcat_cat, "second_choice_rasesh_p1_boxFour$i", 'rasesh', $coms_conect);
    }

    $condition_third_choice_rasesh_p1_boxFour = "name like 'third_choice_rasesh_p1_boxFour%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_rasesh_p1_boxFour, $coms_conect);
    $third_choice_rasesh_p1_boxFour_count = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFour_count"]);
    for ($x = 1; $x <= $third_choice_rasesh_p1_boxFour_count; $x++) {


        $third_choice_rasesh_p1_boxFour_title = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFour_title{$x}"]);
        $third_choice_rasesh_p1_boxFour_link = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFour_link{$x}"]);
        $third_choice_rasesh_p1_boxFour_pic_adress = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFour_pic_adress{$x}"]);
        $third_choice_rasesh_p1_boxFour_pic_adress = resize_image_M($third_choice_rasesh_p1_boxFour_pic_adress, 237, 177, $img_page_main, '');
        $third_choice_rasesh_p1_boxFour_avatar7 = injection_replace($_POST["third_choice_rasesh_p1_boxFour_avatar7{$x}"][0]);
        if ($third_choice_rasesh_p1_boxFour_avatar7 > "") {
            $third_choice_rasesh_p1_boxFour_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_rasesh_p1_boxFour_avatar7;
            $third_choice_rasesh_p1_boxFour_pic_adress = resize_image_M($third_choice_rasesh_p1_boxFour_pic_adress, 237, 177, $img_page_main, '');
        }
        if ($third_choice_rasesh_p1_boxFour_title > "") {
            insert_templdate($site, $third_choice_rasesh_p1_boxFour_pic_adress, $la, '', $third_choice_rasesh_p1_boxFour_title, $third_choice_rasesh_p1_boxFour_link, '', "third_choice_rasesh_p1_boxFour$x", 'rasesh', $coms_conect);
        }
    }
    ########################################################### box5 ########################################################
    $rasesh_p1_boxFive_pic_adress = 0;
    $rasesh_p1_boxFive_pic_adress= injection_replace($_POST["rasesh_p1_boxFive_pic_adress"]);
    $rasesh_p1_boxFive_title= injection_replace($_POST["rasesh_p1_boxFive_title"]);
    $rasesh_p1_boxFive_text= injection_replace($_POST["rasesh_p1_boxFive_text"]);

    insert_templdate($site, $rasesh_p1_boxFive_pic_adress, $la, $rasesh_p1_boxFive_text, $rasesh_p1_boxFive_title, '', '', "rasesh_p1_boxFive", 'rasesh', $coms_conect);

    $ValSelectActive_rasesh_p1_boxFive_title = injection_replace($_POST["ValSelectActive_rasesh_p1_boxFive_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_rasesh_p1_boxFive_title, '', '', "ValSelectActive_rasesh_p1_boxFive", 'rasesh', $coms_conect);

    $condition_first_choice_rasesh_p1_boxFive = "name like 'first_choice_rasesh_p1_boxFive%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_rasesh_p1_boxFive, $coms_conect);
    $first_choice_rasesh_p1_boxFive_count = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFive_count"]);
    for ($i = 1; $i <= $first_choice_rasesh_p1_boxFive_count; $i++) {

        $first_choice_rasesh_p1_boxFive_cat = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFive_cat{$i}"]);
        $first_choice_Dr_boxFive_subcat_cat = injection_replace_pic($_POST["first_choice_Dr_boxFive_subcat_cat{$i}"]);
        $first_choice_Dr_boxFive_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_Dr_boxFive_Fixed_selection_cat{$i}"]);
        $first_choice_rasesh_p1_boxFive_number = injection_replace_pic($_POST["first_choice_rasesh_p1_boxFive_number{$i}"]);
        if ($first_choice_Dr_boxFive_subcat_cat > "")
            insert_templdate($site, $first_choice_rasesh_p1_boxFive_number, $la, $first_choice_Dr_boxFive_Fixed_selection_cat, '', $first_choice_rasesh_p1_boxFive_cat, $first_choice_Dr_boxFive_subcat_cat, "first_choice_rasesh_p1_boxFive$i", 'rasesh', $coms_conect);
    }

    $condition_second_choice_rasesh_p1_boxFive = "name like 'second_choice_rasesh_p1_boxFive%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_rasesh_p1_boxFive, $coms_conect);
    $second_choice_rasesh_p1_boxFive_count = injection_replace_pic($_POST["second_choice_rasesh_p1_boxFive_count"]);
    for ($i = 1; $i <= $second_choice_rasesh_p1_boxFive_count; $i++) {

        $second_choice_rasesh_p1_boxFive_cat = injection_replace_pic($_POST["second_choice_rasesh_p1_boxFive_cat{$i}"]);
        $second_choice_Dr_boxFive_subcat_cat = injection_replace_pic($_POST["second_choice_Dr_boxFive_subcat_cat{$i}"]);
        $second_choice_Dr_boxFive_subcat_cat_content = injection_replace_pic($_POST["second_choice_Dr_boxFive_subcat_cat_content{$i}"]);
        if ($second_choice_Dr_boxFive_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_Dr_boxFive_subcat_cat_content, $la, '', '', $second_choice_rasesh_p1_boxFive_cat, $second_choice_Dr_boxFive_subcat_cat, "second_choice_rasesh_p1_boxFive$i", 'rasesh', $coms_conect);
    }

    $condition_third_choice_rasesh_p1_boxFive = "name like 'third_choice_rasesh_p1_boxFive%' and tem_name='rasesh'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_rasesh_p1_boxFive, $coms_conect);
    $third_choice_rasesh_p1_boxFive_count = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFive_count"]);
    for ($x = 1; $x <= $third_choice_rasesh_p1_boxFive_count; $x++) {

        $third_choice_rasesh_p1_boxFive_title = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFive_title{$x}"]);
        $third_choice_rasesh_p1_boxFive_text = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFive_text{$x}"]);
        $third_choice_rasesh_p1_boxFive_link = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFive_link{$x}"]);
        $third_choice_rasesh_p1_boxFive_pic_adress = injection_replace_pic($_POST["third_choice_rasesh_p1_boxFive_pic_adress{$x}"]);
        $third_choice_rasesh_p1_boxFive_pic_adress = resize_image_M($third_choice_rasesh_p1_boxFive_pic_adress, 213, 190, $img_page_main, '');
        $third_choice_rasesh_p1_boxFive_avatar7 = injection_replace($_POST["third_choice_rasesh_p1_boxFive_avatar7{$x}"][0]);
        if ($third_choice_rasesh_p1_boxFive_avatar7 > "") {
            $third_choice_rasesh_p1_boxFive_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_rasesh_p1_boxFive_avatar7;
            $third_choice_rasesh_p1_boxFive_pic_adress = resize_image_M($third_choice_rasesh_p1_boxFive_pic_adress, 213, 190, $img_page_main, '');
        }
        if ($third_choice_rasesh_p1_boxFive_title > "") {
            insert_templdate($site, $third_choice_rasesh_p1_boxFive_pic_adress, $la, $third_choice_rasesh_p1_boxFive_text, $third_choice_rasesh_p1_boxFive_title, $third_choice_rasesh_p1_boxFive_link, '', "third_choice_rasesh_p1_boxFive$x", 'rasesh', $coms_conect);
        }
    }
}
?>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر
                    زير اطمينان داريد؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خير
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", ".del_menu", function (e) {
        $("#btn_ok").val($(this).attr('id'));
    });
    $(document).ready(function () {
        $('#page_catogory').select2({
            data: [
                <?
                $query = "select id,name from new_modules_cat where type=1 and status=1 and la='$la'";

                $result = $coms_conect->query($query);
                $i = 0;
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    $name = $RS1["name"];
                    if (in_array($id, $_SESSION['manager_page_cat'])) {
                        //echo $id.'<br>';
                        if ($i == 0)
                            echo '{' . 'id' . ':' . $id . ',' . 'text' . ':' . "'" . $name . "'" . "}";
                        else
                            echo ',' . '{' . 'id' . ':' . $id . ',' . 'text' . ':' . "'" . $name . "'" . "}";
                        $i++;
                    }

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


<div class="msheet tab-content H_mt15">
    <div class="secfhead">
        <div class="sectitle">
            <div class="icon"><span class="flaticon-text150" style=""></span>
            </div>
            <div class="title"><p class="titr">تنظیمات مربوط به قالب</p>
                <p class="lead">امکان مدیریت و افزودن و ویرایش کردن بلوک های داخل صفحه اول در این قسمت فراهم شده
                    است.</p>
            </div>
        </div>

    </div>
    <div class="panel-body H_pt0">
        <form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form"
              enctype="multipart/form-data">
            <input type="hidden" name="send_flag" value="1">

            <!-- vertical tab bootsnipp -->
            <div class="">

                <div class="col-md-12 bhoechie-tab-container"><br>
                    <!--                        <label class="col-md-1 form-group">زبان</label>-->
                    <div class="col-md-2 form-group H_ml0">
                        <? create_lang_filter_none($la, $coms_conect, $_SESSION["manager_title_lang"]) ?>
                    </div>
                    <div class="container">
                        <!--                        <label class="col-md-1 form-group">سایت</label>-->
                        <div class="col-md-2 form-group">
                            <? create_sub_site_filter_none($site, $coms_conect, $_SESSION['manager_title_site']) ?>
                        </div>
                    </div>
                    <div class="row H_mt30">
                        <div class="col-md-12">
                            <div id="clean-demo"
                                 class="tabbed-nav hover clean medium z-icons-dark z-shadows z-bordered z-multiline z-tabs horizontal top-compact top white"
                                 data-options="">
                                <? $temp_tab = get_tem_result($site, $la, "temp_tab", 'rasesh', $coms_conect); ?>
                                <input type="hidden" name="temp_tab" value="<?= $temp_tab['title'] ?>">
                                <input type="hidden" name="number_tab" value="<?= $temp_tab['text'] ?>">
                                <input type="hidden" name="num_con_tab" value="<?= $temp_tab['pic'] ?>">

                                <ul class="z-tabs-nav z-tabs-desktop H_float_r">

                                    <li class="z-tab H_style_header z-active" data-link="tab1">
                                        <a class="z-link">cervical_disk</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------rasesh_p1---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $rasesh_p1_box1 = get_tem_result($site, $la, "rasesh_p1_box1", 'rasesh', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_rasesh_p1_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $rasesh_p1_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_rasesh_p1_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_rasesh_p1_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_rasesh_p1_box1 H_dis_none"
                                                               name="rasesh_p1_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $rasesh_p1_box2 = get_tem_result($site, $la, "rasesh_p1_box2", 'rasesh', $coms_conect); ?>
                                                    <a id="H_input_rename_rasesh_p1_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $rasesh_p1_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_rasesh_p1_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_rasesh_p1_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_rasesh_p1_box2 H_dis_none"
                                                               name="rasesh_p1_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $rasesh_p1_title_box3 = get_tem_result($site, $la, "rasesh_p1_title_box3", 'rasesh', $coms_conect); ?>
                                                    <a id="H_input_rename_rasesh_p1_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $rasesh_p1_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_rasesh_p1_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_rasesh_p1_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_rasesh_p1_title_box3 H_dis_none"
                                                               name="rasesh_p1_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $rasesh_p1_title_box4 = get_tem_result($site, $la, "rasesh_p1_title_box4", 'rasesh', $coms_conect); ?>
                                                    <a id="H_input_rename_rasesh_p1_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $rasesh_p1_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_rasesh_p1_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_rasesh_p1_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_rasesh_p1_title_box4 H_dis_none"
                                                               name="rasesh_p1_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $rasesh_p1_title_box5 = get_tem_result($site, $la, "rasesh_p1_title_box5", 'rasesh', $coms_conect); ?>
                                                    <a id="H_input_rename_rasesh_p1_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $rasesh_p1_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_rasesh_p1_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_rasesh_p1_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_rasesh_p1_title_box5 H_dis_none"
                                                               name="rasesh_p1_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>



                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>
                                                        <? $rasesh_p1_boxOne = get_tem_result($site, $la, "rasesh_p1_boxOne", 'rasesh', $coms_conect);
                                                        $edit_text1=ta_latin_num($rasesh_p1_boxOne['text']);
                                                        ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxOne_title"
                                                                           value="<?= $rasesh_p1_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxOne_link"
                                                                           value="<?= $rasesh_p1_boxOne['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="rasesh_p1_boxOne_pic"
                                                                               value="<?=$rasesh_p1_boxOne["pic"]?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="rasesh_p1_boxOne_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=rasesh_p1_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="rasesh_p1_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_rasesh_p1_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_rasesh_p1_boxOne_pic">

                                                                        <a href="<?= $rasesh_p1_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $rasesh_p1_boxOne["pic"] ?>" alt="<?= $rasesh_p1_boxOne["title"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#rasesh_p1_boxOne_pic_avatar_orak').orakuploader({
                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                orakuploader_use_main: false,
                                                                                //orakuploader_use_sortable : true,
                                                                                orakuploader_use_dragndrop: true,
                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                orakuploader_add_label: '',
                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                orakuploader_thumbnail_size: 400,
                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                orakuploader_maximum_uploads: 1
                                                                            });

                                                                            $('#rasesh_p1_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-group col-sm-12">
                                                                <label class="control-label">متن </label>
                                                                <textarea id="rasesh_p1_boxOne_text" name="rasesh_p1_boxOne_text"  class="form-control" rows="3"><?= $edit_text1 ?></textarea>
                                                                <script>
                                                                    tinymce.init({
                                                                        selector: "#rasesh_p1_boxOne_text",
                                                                        height: 300,
                                                                        width:"105.5%",
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
                                                                        font_formats: 'iraniansans=iraniansans',
                                                                        image_advtab: true ,
                                                                        external_filemanager_path:"/filemanager/",
                                                                        filemanager_title:"مديريت فايل" ,
                                                                        external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«انتخاب ویدیو »</h5>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?$rasesh_p1_boxOne_video = get_tem_result($site, $la, "rasesh_p1_boxOne_video", 'rasesh', $coms_conect); ?>

                                                                            <div id="div_mother_second_choicedel_rasesh_p1_boxOne_video" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class=" H_rasesh_p1_boxOne_video col-md-3 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="rasesh_p1_boxOne_video_subcat_val"
                                                                                                   name="rasesh_p1_boxOne_video_subcat_val"
                                                                                                   value="<?= $rasesh_p1_boxOne_video['pic'] ?>">
                                                                                            <input type="hidden"
                                                                                                   id="rasesh_p1_boxOne_video_subcat_link"
                                                                                                   name="rasesh_p1_boxOne_video_subcat_link"
                                                                                                   value="<?= $rasesh_p1_boxOne_video['pic_adress'] ?>">

                                                                                            <select id="rasesh_p1_boxOne_video_cat"
                                                                                                    data-selectid=""
                                                                                                    class="form-control H_rasesh_p1_boxOne_video_cat"
                                                                                                    name="rasesh_p1_boxOne_video_cat">
                                                                                                <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                echo "<option value='0'>انتخاب کنید</option>";
                                                                                                while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                    $str = '';

                                                                                                    if ($row0['id'] == $rasesh_p1_boxOne_video['link'])

                                                                                                        $str = 'selected';
                                                                                                    echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div id="rasesh_p1_boxOne_video"
                                                                                             class="col-md-3 input-group">
                                                                                        </div>

                                                                                        <div id="rasesh_p1_boxOne_video_content"
                                                                                             class="col-md-6 input-group">
                                                                                        </div>

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=boxOne_P2_dr&id=" + $("#rasesh_p1_boxOne_video_cat").val() + "&value=" + $("#rasesh_p1_boxOne_video_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#rasesh_p1_boxOne_video').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                            $(document).ready(function () {
                                                                                                //   alert( $("#rasesh_p1_boxOne_video_subcat_link").val());
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=boxOne_P2_dr_content&id=" + $("#rasesh_p1_boxOne_video_subcat_val").val() + "&value=" + $("#rasesh_p1_boxOne_video_subcat_link").val() + "&secend_value=" + $("#rasesh_p1_boxOne_video_subcat_link").val()+ "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#rasesh_p1_boxOne_video_content').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <script>
                                                                                $(document).on('change', '.H_rasesh_p1_boxOne_video_cat', function () {
                                                                                    var thisElement = $(this).parents('.H_rasesh_p1_boxOne_video').next();

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=boxOne_P2_dr&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                        success: function (result) {
                                                                                            thisElement.empty();
                                                                                            thisElement.append(result);
                                                                                        }
                                                                                    });
                                                                                });

                                                                                $(".boxOne_P2_dr_neshane").change(function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=boxOne_P2_dr&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#rasesh_p1_boxOne_video').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                                $(document).on('change', '.boxOne_P2_dr_neshane', function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=boxOne_P2_dr_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#rasesh_p1_boxOne_video_content').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>

                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box2------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $rasesh_p1_boxTwo = get_tem_result($site, $la, "rasesh_p1_boxTwo", 'rasesh', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxTwo_title"
                                                                           value="<?= $rasesh_p1_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxTwo_text"
                                                                           value="<?= $rasesh_p1_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxTwo_pic"
                                                                           value="<?= $rasesh_p1_boxTwo['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $rasesh_p1_faq_que = get_tem_result($site, $la, "rasesh_p1_faq_que", 'rasesh', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_startup_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $rasesh_p1_faq_que['text'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «پرسش و پاسخ»  </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_startup_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $rasesh_p1_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $rasesh_p1_pop_faq = get_tem_result($site, $la, "rasesh_p1_pop_faq", 'rasesh', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_pop_faq_title"
                                                                           value="<?= $rasesh_p1_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_pop_faq_text"
                                                                           value="<?= $rasesh_p1_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_pop_faq_pic"
                                                                           value="<?= $rasesh_p1_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_pop_faq_link"
                                                                           value="<?= $rasesh_p1_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_pop_faq_pic_adress"
                                                                           value="<?= $rasesh_p1_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_faq_que_link"
                                                                           value="<?= $rasesh_p1_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="rasesh_p1_boxTwo_link"
                                                                               value="<?=$rasesh_p1_boxTwo['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="rasesh_p1_boxTwo_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=rasesh_p1_boxTwo_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="rasesh_p1_boxTwo_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_rasesh_p1_boxTwo_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_rasesh_p1_boxTwo_link">
                                                                        <a href="<?= $rasesh_p1_boxTwo["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $rasesh_p1_boxTwo["link"] ?>" alt="<?= $rasesh_p1_boxTwo["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#rasesh_p1_boxTwo_link_avatar_orak').orakuploader({
                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                orakuploader_use_main: false,
                                                                                //orakuploader_use_sortable : true,
                                                                                orakuploader_use_dragndrop: true,
                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                orakuploader_add_label: '',
                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                orakuploader_thumbnail_size: 400,
                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                orakuploader_maximum_uploads: 1
                                                                            });

                                                                            $('#rasesh_p1_boxTwo_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box3------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $rasesh_p1_boxThree = get_tem_result($site, $la, "rasesh_p1_boxThree", 'rasesh', $coms_conect);
                                                        $edit_text1=ta_latin_num($rasesh_p1_boxThree['text']);
                                                        ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="rasesh_p1_boxThree_pic"
                                                                               value="<?=$rasesh_p1_boxThree["pic"]?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="rasesh_p1_boxThree_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=rasesh_p1_boxThree_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="rasesh_p1_boxThree_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_rasesh_p1_boxThree_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_rasesh_p1_boxThree_pic">

                                                                        <a href="<?= $rasesh_p1_boxThree["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $rasesh_p1_boxThree["pic"] ?>" alt="<?= $rasesh_p1_boxThree["title"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#rasesh_p1_boxThree_pic_avatar_orak').orakuploader({
                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                orakuploader_use_main: false,
                                                                                //orakuploader_use_sortable : true,
                                                                                orakuploader_use_dragndrop: true,
                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                orakuploader_add_label: '',
                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                orakuploader_thumbnail_size: 400,
                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                orakuploader_maximum_uploads: 1
                                                                            });

                                                                            $('#rasesh_p1_boxThree_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-group col-sm-12">
                                                                <label class="control-label">متن </label>
                                                                <textarea id="rasesh_p1_boxThree_text" name="rasesh_p1_boxThree_text"  class="form-control" rows="3"><?= $edit_text1 ?></textarea>
                                                                <script>
                                                                    tinymce.init({
                                                                        selector: "#rasesh_p1_boxThree_text",
                                                                        height: 300,
                                                                        width:"105.5%",
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
                                                                        font_formats: 'iraniansans=iraniansans',
                                                                        image_advtab: true ,
                                                                        external_filemanager_path:"/filemanager/",
                                                                        filemanager_title:"مديريت فايل" ,
                                                                        external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>

                                                        <div id="boxThree_btns10" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $rasesh_p1_boxThree_btnsd = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'rasesh_p1_boxThree_btns%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $rasesh_p1_boxThree_btnsd; $k++) {
                                                                                $rasesh_p1_boxThree_btns = get_tem_result($site, $la, "rasesh_p1_boxThree_btns$k", 'rasesh', $coms_conect);
                                                                                if ($rasesh_p1_boxThree_btns['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_rasesh_p1_boxThree_btns<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_rasesh_p1_boxThree_btns"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">                                                                                        دکمه و لینک<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="rasesh_p1_boxThree_btns-title-ads<?= $k ?>"
                                                                                                           value="<?= $rasesh_p1_boxThree_btns["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="rasesh_p1_boxThree_btns_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="rasesh_p1_boxThree_btns-title-ads<?= $k ?>"
                                                                                                           value="<?= $rasesh_p1_boxThree_btns["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="rasesh_p1_boxThree_btns_text<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_rasesh_p1_boxThree_btns = $k;
                                                                            ?>
                                                                            <input type="hidden" id="rasesh_p1_boxThree_btns_count"
                                                                                   name="rasesh_p1_boxThree_btns_count"
                                                                                   value="<?= --$count_rasesh_p1_boxThree_btns ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_rasesh_p1_boxThree_btns').on("click", function () {
                                                                                        var someText = '<div id="ads_rasesh_p1_boxThree_btns' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_rasesh_p1_boxThree_btns" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">دکمه و لینک' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="rasesh_p1_boxThree_btns_title' + i + '" value="" class="form-control" placeholder=" عنوان" name="rasesh_p1_boxThree_btns_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="rasesh_p1_boxThree_btns_text' + i + '" value="" class="form-control" placeholder="لینک" name="rasesh_p1_boxThree_btns_text' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_rasesh_p1_boxThree_btns' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#rasesh_p1_boxThree_btns_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_rasesh_p1_boxThree_btns', function () {
                                                                                        var id = '';
                                                                                        var p = $('#rasesh_p1_boxThree_btns_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_rasesh_p1_boxThree_btns' + id).remove();
                                                                                        $('#rasesh_p1_boxThree_btns_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_rasesh_p1_boxThree_btns"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </center>
                                                </div>
                                                <!-------------------box4------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $rasesh_p1_boxFour = get_tem_result($site, $la, "rasesh_p1_boxFour", 'rasesh', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_boxFour['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_boxFour_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxFour_title"
                                                                           value="<?= $rasesh_p1_boxFour['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxFour_text"
                                                                           value="<?= $rasesh_p1_boxFour['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <? $ValSelectActive_rasesh_p1_boxFour = get_tem_result($site, $la, "ValSelectActive_rasesh_p1_boxFour", 'rasesh', $coms_conect); ?>
                                                        <div class="col-md-6 input-group mt30_r180" style="margin-bottom: 40px">
                                                            <select id="select_type_rasesh_p1_boxFour"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_rasesh_p1_boxFour"
                                                                    name="select_type_rasesh_p1_boxFour">

                                                                <option  <?if ($ValSelectActive_rasesh_p1_boxFour["title"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                                                <option   <?if ($ValSelectActive_rasesh_p1_boxFour["title"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($ValSelectActive_rasesh_p1_boxFour["title"]==3){echo 'selected';}?> value='3'> اختصاصی</option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div style="clear: both">
                                                            <input name="ValSelectActive_rasesh_p1_boxFour_title" type="hidden" value="<?= $ValSelectActive_rasesh_p1_boxFour["title"] ?>">

                                                            <div  class="tab-pane opt_rasesh_p1_boxFour Dr_boxFour_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_rasesh_p1_boxFour = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'first_choice_rasesh_p1_boxFour%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_rasesh_p1_boxFour; $j++) {
                                                                                    $first_choice_rasesh_p1_boxFour = get_tem_result($site, $la, "first_choice_rasesh_p1_boxFour$j", 'rasesh', $coms_conect);
                                                                                    if ($first_choice_rasesh_p1_boxFour['pic_adress'] > "") {?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_rasesh_p1_boxFour<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_rasesh_p1_boxFour"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_rasesh_p1_boxFour col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_rasesh_p1_boxFour_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_rasesh_p1_boxFour_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_rasesh_p1_boxFour['pic'] ?>">

                                                                                                        <select id="first_choice_rasesh_p1_boxFour_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_rasesh_p1_boxFour_cat"
                                                                                                                name="first_choice_rasesh_p1_boxFour_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_rasesh_p1_boxFour['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_rasesh_p1_boxFour<?= $j ?>" class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_Dr_boxFour&id=" + $("#first_choice_rasesh_p1_boxFour_cat<?=$j?>").val() + "&value=" + $("#first_choice_rasesh_p1_boxFour_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_rasesh_p1_boxFour<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_rasesh_p1_boxFour_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_rasesh_p1_boxFour_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFour['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>جدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFour['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>پربازدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFour['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>پربحث ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_rasesh_p1_boxFour_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_rasesh_p1_boxFour["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_rasesh_p1_boxFour_number<?= $j ?>">
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden" id="first_choice_rasesh_p1_boxFour_count"
                                                                                       name="first_choice_rasesh_p1_boxFour_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_rasesh_p1_boxFour_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_rasesh_p1_boxFour').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_Dr_boxFour&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_Dr_boxFour<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_rasesh_p1_boxFour').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_rasesh_p1_boxFour' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_rasesh_p1_boxFour" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_rasesh_p1_boxFour col-md-4 input-group"><input type="hidden" id="first_choice_rasesh_p1_boxFour_subcat_val' + i + '"  name="first_choice_rasesh_p1_boxFour_subcat_val' + i + '" value=""> <select id="first_choice_rasesh_p1_boxFour_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_rasesh_p1_boxFour_cat" name="first_choice_rasesh_p1_boxFour_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_rasesh_p1_boxFour' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_rasesh_p1_boxFour_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_rasesh_p1_boxFour_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_rasesh_p1_boxFour_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_rasesh_p1_boxFour_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_rasesh_p1_boxFour' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_rasesh_p1_boxFour_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_rasesh_p1_boxFour', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_rasesh_p1_boxFour_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_rasesh_p1_boxFour' + id).remove();
                                                                                            $('#first_choice_rasesh_p1_boxFour_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_first_choice_rasesh_p1_boxFour"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                            <!-- /section:download/download.link -->
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane opt_rasesh_p1_boxFour Dr_boxFour_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_rasesh_p1_boxFour = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'second_choice_rasesh_p1_boxFour%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_rasesh_p1_boxFour; $j++) {
                                                                                    $second_choice_rasesh_p1_boxFour = get_tem_result($site, $la, "second_choice_rasesh_p1_boxFour$j", 'rasesh', $coms_conect);
                                                                                    if ($second_choice_rasesh_p1_boxFour['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_rasesh_p1_boxFour<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_rasesh_p1_boxFour"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i class="fa fa-trash text-danger remove"
                                                                                                                   title="حذف" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_rasesh_p1_boxFour col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_rasesh_p1_boxFour_subcat_val<?=$j?>"
                                                                                                               name="second_choice_rasesh_p1_boxFour_subcat_val<?=$j?>"
                                                                                                               value="<?= $second_choice_rasesh_p1_boxFour['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_rasesh_p1_boxFour_subcat_link<?=$j?>"
                                                                                                               name="second_choice_rasesh_p1_boxFour_subcat_link<?=$j?>"
                                                                                                               value="<?= $second_choice_rasesh_p1_boxFour['pic_adress'] ?>">

                                                                                                        <select id="second_choice_rasesh_p1_boxFour_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_rasesh_p1_boxFour_cat"
                                                                                                                name="second_choice_rasesh_p1_boxFour_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_rasesh_p1_boxFour['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_rasesh_p1_boxFour<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_rasesh_p1_boxFour_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_Dr_boxFour&id=" + $("#second_choice_rasesh_p1_boxFour_cat<?=$j?>").val() + "&value=" + $("#second_choice_rasesh_p1_boxFour_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_rasesh_p1_boxFour<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_rasesh_p1_boxFour_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_Dr_boxFour_content&id=" + $("#second_choice_rasesh_p1_boxFour_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_rasesh_p1_boxFour_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_rasesh_p1_boxFour_subcat_link<?=$j?>").val()+ "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_rasesh_p1_boxFour_content<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount=$j;
                                                                                ?>
                                                                                <input type="hidden" id="second_choice_rasesh_p1_boxFour_count"
                                                                                       name="second_choice_rasesh_p1_boxFour_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_rasesh_p1_boxFour_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_rasesh_p1_boxFour').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFour&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_rasesh_p1_boxFour<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_Dr_boxFour_neshane").change(function () {
                                                                                        var j=$("#second_choice_rasesh_p1_boxFour_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFour&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_rasesh_p1_boxFour'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_Dr_boxFour_neshane', function () {
                                                                                        var j=$("#second_choice_rasesh_p1_boxFour_count").val();
                                                                                        //  $(".second_choice_rasesh_p1_boxFour_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFour_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_rasesh_p1_boxFour_content'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_rasesh_p1_boxFour').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_rasesh_p1_boxFour' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_rasesh_p1_boxFour" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_rasesh_p1_boxFour col-md-3 input-group"><input type="hidden" id="second_choice_rasesh_p1_boxFour_subcat_val' + i + '"  name="second_choice_rasesh_p1_boxFour_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_rasesh_p1_boxFour_subcat_link' + i + '"  name="second_choice_rasesh_p1_boxFour_subcat_link' + i + '" value=""> <select id="second_choice_rasesh_p1_boxFour_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_rasesh_p1_boxFour_cat" name="second_choice_rasesh_p1_boxFour_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_rasesh_p1_boxFour' + i + '" class="col-md-3 input-group"></div><div id="second_choice_rasesh_p1_boxFour_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_rasesh_p1_boxFour' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_rasesh_p1_boxFour_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_rasesh_p1_boxFour', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_rasesh_p1_boxFour_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_rasesh_p1_boxFour' + id).remove();
                                                                                            $('#second_choice_rasesh_p1_boxFour_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_second_choice_rasesh_p1_boxFour"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_rasesh_p1_boxFour Dr_boxFour_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_rasesh_p1_boxFour = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'third_choice_rasesh_p1_boxFour%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_rasesh_p1_boxFour; $x++) {
                                                                                    $third_choice_rasesh_p1_boxFour = get_tem_result($site, $la, "third_choice_rasesh_p1_boxFour$x", 'rasesh', $coms_conect);

                                                                                    if ($third_choice_rasesh_p1_boxFour['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_rasesh_p1_boxFour<?= $x ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_rasesh_p1_boxFour"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFour_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_rasesh_p1_boxFour["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_rasesh_p1_boxFour_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFour_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_rasesh_p1_boxFour["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_rasesh_p1_boxFour_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFour_pic_adress<?= $x ?>"
                                                                                                               value="<?=$third_choice_rasesh_p1_boxFour["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_rasesh_p1_boxFour_pic_adress<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_rasesh_p1_boxFour_pic_adress<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_rasesh_p1_boxFour<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div  id="third_choice_rasesh_p1_boxFour_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="third_choice_rasesh_p1_boxFour_avatar7_link<?= $x ?>" name="third_choice_rasesh_p1_boxFour_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_rasesh_p1_boxFour<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group" id="image_show_third_choice_rasesh_p1_boxFour<?= $x ?>">
                                                                                                        <? $third_choice_rasesh_p1_boxFour = get_tem_result($site, $la, "third_choice_rasesh_p1_boxFour$x", 'rasesh', $coms_conect);?>
                                                                                                        <a href="<?= $third_choice_rasesh_p1_boxFour["pic_adress"] ?>" class=" without-caption" >
                                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_rasesh_p1_boxFour["pic_adress"] ?>" alt="<?= $third_choice_rasesh_p1_boxFour["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_rasesh_p1_boxFour_avatar7<?=$x?>').orakuploader({
                                                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                                                orakuploader_use_main: false,
                                                                                                                //orakuploader_use_sortable : true,
                                                                                                                orakuploader_use_rasesh_p1agndrop: true,
                                                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                                                orakuploader_add_label: '',
                                                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                                                orakuploader_thumbnail_size: 400,
                                                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                                                orakuploader_maximum_uploads: 1
                                                                                                            });

                                                                                                            $('#third_choice_rasesh_p1_boxFour_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $xcount_mahsol = $x;
                                                                                ?>
                                                                                <input type="hidden" id="third_choice_rasesh_p1_boxFour_count"
                                                                                       name="third_choice_rasesh_p1_boxFour_count"
                                                                                       value="<?=--$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_rasesh_p1_boxFour-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_rasesh_p1_boxFour' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_rasesh_p1_boxFour" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_rasesh_p1_boxFour_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_rasesh_p1_boxFour_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_rasesh_p1_boxFour_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_rasesh_p1_boxFour_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_rasesh_p1_boxFour_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="third_choice_rasesh_p1_boxFour_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_rasesh_p1_boxFour_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_rasesh_p1_boxFour' + i + '" style="padding: 0px;"><div  id="third_choice_rasesh_p1_boxFour_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_rasesh_p1_boxFour_avatar7_link' + i + '" name="third_choice_rasesh_p1_boxFour_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_rasesh_p1_boxFour' + i + '" style="float:right;"></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_rasesh_p1_boxFour' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_rasesh_p1_boxFour_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_rasesh_p1_boxFour_avatar7' + i + '').orakuploader({
                                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                                orakuploader_use_main: false,
                                                                                                //orakuploader_use_sortable : true,
                                                                                                orakuploader_use_dragndrop: true,
                                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                                orakuploader_add_label: '',
                                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                                orakuploader_thumbnail_size: 400,
                                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                                orakuploader_maximum_uploads: 1
                                                                                            });

                                                                                            $('#third_choice_rasesh_p1_boxFour_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_rasesh_p1_boxFour' + i + '').find("div").first().next().css('width','100px');
                                                                                            $('.input-group-addon.H_third_choice_rasesh_p1_boxFour' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                            //    ---end orakuploader
                                                                                            i++;});
                                                                                        $(document).on('click', '.del_third_choice_rasesh_p1_boxFour', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_rasesh_p1_boxFour_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_rasesh_p1_boxFour' + id).remove();
                                                                                            $('#third_choice_rasesh_p1_boxFour_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_third_choice_rasesh_p1_boxFour-ads"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function(){
                                                                    var val = $("[name='ValSelectActive_rasesh_p1_boxFour_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_rasesh_p1_boxFour"]', function(){
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_rasesh_p1_boxFour_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });
                                                                    function toggleForm(val){
                                                                        $('.opt_rasesh_p1_boxFour').hide();
                                                                        $('.Dr_boxFour_option'+val).show();

                                                                        //console.log($('.Dr_boxFour_option'+val));
                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $rasesh_p1_boxFive = get_tem_result($site, $la, "rasesh_p1_boxFive", 'rasesh', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($rasesh_p1_boxFive['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="rasesh_p1_boxFive_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxFive_title"
                                                                           value="<?= $rasesh_p1_boxFive['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="rasesh_p1_boxFive_text"
                                                                           value="<?= $rasesh_p1_boxFive['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <? $ValSelectActive_rasesh_p1_boxFive = get_tem_result($site, $la, "ValSelectActive_rasesh_p1_boxFive", 'rasesh', $coms_conect); ?>
                                                        <div class="col-md-6 input-group mt30_r180" style="margin-bottom: 40px">
                                                            <select id="select_type_rasesh_p1_boxFive"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_rasesh_p1_boxFive"
                                                                    name="select_type_rasesh_p1_boxFive">

                                                                <option  <?if ($ValSelectActive_rasesh_p1_boxFive["title"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                                                <option   <?if ($ValSelectActive_rasesh_p1_boxFive["title"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($ValSelectActive_rasesh_p1_boxFive["title"]==3){echo 'selected';}?> value='3'> اختصاصی</option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div style="clear: both">
                                                            <input name="ValSelectActive_rasesh_p1_boxFive_title" type="hidden" value="<?= $ValSelectActive_rasesh_p1_boxFive["title"] ?>">

                                                            <div  class="tab-pane opt_rasesh_p1_boxFive Dr_boxFive_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_rasesh_p1_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'first_choice_rasesh_p1_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_rasesh_p1_boxFive; $j++) {
                                                                                    $first_choice_rasesh_p1_boxFive = get_tem_result($site, $la, "first_choice_rasesh_p1_boxFive$j", 'rasesh', $coms_conect);
                                                                                    if ($first_choice_rasesh_p1_boxFive['pic_adress'] > "") {?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_rasesh_p1_boxFive<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_rasesh_p1_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_rasesh_p1_boxFive col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_rasesh_p1_boxFive_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_rasesh_p1_boxFive_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_rasesh_p1_boxFive['pic'] ?>">

                                                                                                        <select id="first_choice_rasesh_p1_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_rasesh_p1_boxFive_cat"
                                                                                                                name="first_choice_rasesh_p1_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_rasesh_p1_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_rasesh_p1_boxFive<?= $j ?>" class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_Dr_boxFive&id=" + $("#first_choice_rasesh_p1_boxFive_cat<?=$j?>").val() + "&value=" + $("#first_choice_rasesh_p1_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_rasesh_p1_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_rasesh_p1_boxFive_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_rasesh_p1_boxFive_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFive['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>جدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFive['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>پربازدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_rasesh_p1_boxFive['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>پربحث ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_rasesh_p1_boxFive_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_rasesh_p1_boxFive["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_rasesh_p1_boxFive_number<?= $j ?>">
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden" id="first_choice_rasesh_p1_boxFive_count"
                                                                                       name="first_choice_rasesh_p1_boxFive_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_rasesh_p1_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_rasesh_p1_boxFive').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_Dr_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_rasesh_p1_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_rasesh_p1_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_rasesh_p1_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_rasesh_p1_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_rasesh_p1_boxFive col-md-4 input-group"><input type="hidden" id="first_choice_rasesh_p1_boxFive_subcat_val' + i + '"  name="first_choice_rasesh_p1_boxFive_subcat_val' + i + '" value=""> <select id="first_choice_rasesh_p1_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_rasesh_p1_boxFive_cat" name="first_choice_rasesh_p1_boxFive_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_rasesh_p1_boxFive' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_rasesh_p1_boxFive_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_rasesh_p1_boxFive_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_rasesh_p1_boxFive_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_rasesh_p1_boxFive_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_rasesh_p1_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_rasesh_p1_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_rasesh_p1_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_rasesh_p1_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_rasesh_p1_boxFive' + id).remove();
                                                                                            $('#first_choice_rasesh_p1_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_first_choice_rasesh_p1_boxFive"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                            <!-- /section:download/download.link -->
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane opt_rasesh_p1_boxFive Dr_boxFive_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_rasesh_p1_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'second_choice_rasesh_p1_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_rasesh_p1_boxFive; $j++) {
                                                                                    $second_choice_rasesh_p1_boxFive = get_tem_result($site, $la, "second_choice_rasesh_p1_boxFive$j", 'rasesh', $coms_conect);
                                                                                    if ($second_choice_rasesh_p1_boxFive['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_rasesh_p1_boxFive<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_rasesh_p1_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i class="fa fa-trash text-danger remove"
                                                                                                                   title="حذف" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_rasesh_p1_boxFive col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_rasesh_p1_boxFive_subcat_val<?=$j?>"
                                                                                                               name="second_choice_rasesh_p1_boxFive_subcat_val<?=$j?>"
                                                                                                               value="<?= $second_choice_rasesh_p1_boxFive['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_rasesh_p1_boxFive_subcat_link<?=$j?>"
                                                                                                               name="second_choice_rasesh_p1_boxFive_subcat_link<?=$j?>"
                                                                                                               value="<?= $second_choice_rasesh_p1_boxFive['pic_adress'] ?>">

                                                                                                        <select id="second_choice_rasesh_p1_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_rasesh_p1_boxFive_cat"
                                                                                                                name="second_choice_rasesh_p1_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_rasesh_p1_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_rasesh_p1_boxFive<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_rasesh_p1_boxFive_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_Dr_boxFive&id=" + $("#second_choice_rasesh_p1_boxFive_cat<?=$j?>").val() + "&value=" + $("#second_choice_rasesh_p1_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_rasesh_p1_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_rasesh_p1_boxFive_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_Dr_boxFive_content&id=" + $("#second_choice_rasesh_p1_boxFive_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_rasesh_p1_boxFive_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_rasesh_p1_boxFive_subcat_link<?=$j?>").val()+ "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_rasesh_p1_boxFive_content<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount=$j;
                                                                                ?>
                                                                                <input type="hidden" id="second_choice_rasesh_p1_boxFive_count"
                                                                                       name="second_choice_rasesh_p1_boxFive_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_rasesh_p1_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_rasesh_p1_boxFive').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_rasesh_p1_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_Dr_boxFive_neshane").change(function () {
                                                                                        var j=$("#second_choice_rasesh_p1_boxFive_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_rasesh_p1_boxFive'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_Dr_boxFive_neshane', function () {
                                                                                        var j=$("#second_choice_rasesh_p1_boxFive_count").val();
                                                                                        //  $(".second_choice_rasesh_p1_boxFive_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_Dr_boxFive_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_rasesh_p1_boxFive_content'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_rasesh_p1_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_rasesh_p1_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_rasesh_p1_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_rasesh_p1_boxFive col-md-3 input-group"><input type="hidden" id="second_choice_rasesh_p1_boxFive_subcat_val' + i + '"  name="second_choice_rasesh_p1_boxFive_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_rasesh_p1_boxFive_subcat_link' + i + '"  name="second_choice_rasesh_p1_boxFive_subcat_link' + i + '" value=""> <select id="second_choice_rasesh_p1_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_rasesh_p1_boxFive_cat" name="second_choice_rasesh_p1_boxFive_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_rasesh_p1_boxFive' + i + '" class="col-md-3 input-group"></div><div id="second_choice_rasesh_p1_boxFive_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_rasesh_p1_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_rasesh_p1_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_rasesh_p1_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_rasesh_p1_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_rasesh_p1_boxFive' + id).remove();
                                                                                            $('#second_choice_rasesh_p1_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_second_choice_rasesh_p1_boxFive"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_rasesh_p1_boxFive Dr_boxFive_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_third_choice_rasesh_p1_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='rasesh' and name like 'third_choice_rasesh_p1_boxFive%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_rasesh_p1_boxFive; $x++) {
                                                                                    $third_choice_rasesh_p1_boxFive = get_tem_result($site, $la, "third_choice_rasesh_p1_boxFive$x", 'rasesh', $coms_conect);
                                                                                    if ($third_choice_rasesh_p1_boxFive['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_rasesh_p1_boxFive<?= $x ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_rasesh_p1_boxFive"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFive_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_rasesh_p1_boxFive["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_rasesh_p1_boxFive_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFive_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_rasesh_p1_boxFive["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_rasesh_p1_boxFive_link<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_rasesh_p1_boxFive_pic_adress<?= $x ?>"
                                                                                                               value="<?=$third_choice_rasesh_p1_boxFive["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_rasesh_p1_boxFive_pic_adress<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_rasesh_p1_boxFive_pic_adress<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_rasesh_p1_boxFive<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div  id="third_choice_rasesh_p1_boxFive_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="third_choice_rasesh_p1_boxFive_avatar7_link<?= $x ?>" name="third_choice_rasesh_p1_boxFive_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_rasesh_p1_boxFive<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group" id="image_show_third_choice_rasesh_p1_boxFive<?= $x ?>">
                                                                                                        <? $third_choice_rasesh_p1_boxFive = get_tem_result($site, $la, "third_choice_rasesh_p1_boxFive$x", 'rasesh', $coms_conect);?>
                                                                                                        <a href="<?= $third_choice_rasesh_p1_boxFive["pic_adress"] ?>" class=" without-caption" >
                                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_rasesh_p1_boxFive["pic_adress"] ?>" alt="<?= $third_choice_rasesh_p1_boxFive["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_rasesh_p1_boxFive_avatar7<?=$x?>').orakuploader({
                                                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                                                orakuploader_use_main: false,
                                                                                                                //orakuploader_use_sortable : true,
                                                                                                                orakuploader_use_dragndrop: true,
                                                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                                                orakuploader_add_label: '',
                                                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                                                orakuploader_thumbnail_size: 400,
                                                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                                                orakuploader_maximum_uploads: 1
                                                                                                            });

                                                                                                            $('#third_choice_rasesh_p1_boxFive_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="form-group col-md-11">
                                                                                                    <textarea rows="4" cols="50" type="text"
                                                                                                              id="third_choice_rasesh_p1_boxFive_text<?= $x ?>"
                                                                                                              class="form-control"
                                                                                                              placeholder="متن"
                                                                                                              name="third_choice_rasesh_p1_boxFive_text<?= $x ?>"><?=$third_choice_rasesh_p1_boxFive["text"] ?>
                                                                                                    </textarea>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $xcount_mahsol = $x;
                                                                                ?>
                                                                                <input type="hidden" id="third_choice_rasesh_p1_boxFive_count"
                                                                                       name="third_choice_rasesh_p1_boxFive_count"
                                                                                       value="<?=--$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_rasesh_p1_boxFive-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_rasesh_p1_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_rasesh_p1_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_rasesh_p1_boxFive_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_rasesh_p1_boxFive_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_rasesh_p1_boxFive_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_rasesh_p1_boxFive_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_rasesh_p1_boxFive_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="third_choice_rasesh_p1_boxFive_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_rasesh_p1_boxFive_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_rasesh_p1_boxFive' + i + '" style="padding: 0px;"><div  id="third_choice_rasesh_p1_boxFive_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_rasesh_p1_boxFive_avatar7_link' + i + '" name="third_choice_rasesh_p1_boxFive_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_rasesh_p1_boxFive' + i + '" style="float:right;"></div></div><div class="form-group col-md-11"><textarea rows="4" cols="50" type="text" id="third_choice_rasesh_p1_boxFive_text' + i + '" class="form-control" placeholder="متن" name="third_choice_rasesh_p1_boxFive_text' + i + '"></textarea></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_rasesh_p1_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_rasesh_p1_boxFive_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_rasesh_p1_boxFive_avatar7' + i + '').orakuploader({
                                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                                orakuploader_use_main: false,
                                                                                                //orakuploader_use_sortable : true,
                                                                                                orakuploader_use_dragndrop: true,
                                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                                orakuploader_add_label: '',
                                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                                orakuploader_thumbnail_size: 400,
                                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                                orakuploader_maximum_uploads: 1
                                                                                            });

                                                                                            $('#third_choice_rasesh_p1_boxFive_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_rasesh_p1_boxFive' + i + '').find("div").first().next().css('width','100px');
                                                                                            $('.input-group-addon.H_third_choice_rasesh_p1_boxFive' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                            //    ---end orakuploader
                                                                                            i++;});
                                                                                        $(document).on('click', '.del_third_choice_rasesh_p1_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_rasesh_p1_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_rasesh_p1_boxFive' + id).remove();
                                                                                            $('#third_choice_rasesh_p1_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_third_choice_rasesh_p1_boxFive-ads"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function(){
                                                                    var val = $("[name='ValSelectActive_rasesh_p1_boxFive_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_rasesh_p1_boxFive"]', function(){
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_rasesh_p1_boxFive_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });
                                                                    function toggleForm(val){
                                                                        $('.opt_rasesh_p1_boxFive').hide();
                                                                        $('.Dr_boxFive_option'+val).show();

                                                                        //console.log($('.Dr_boxFive_option'+val));
                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </br>     
            <div class="panel-footer">
                <button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button>
            </div>
        </form>
    </div>


</div>


<script>
    $(document).ready(function () {
        $('.iframe-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false
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

    });
</script>
<script>
    jQuery(document).ready(function ($) {
        $("#clean-demo").zozoTabs({
            theme: "silver",
            animation: {
                duration: 800,
                effects: "slideH"
            }
        })
    });
</script>
<!-- show box for edit name block-->
<script>
    $(document).ready(function () {

        //-------------------------------


        $("div.bhoechie-tab-menu.H1>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();

            $("div.bhoechie-tab.H1>div.bhoechie-tab-content.H1").removeClass("active");
            $("div.bhoechie-tab.H1>div.bhoechie-tab-content.H1").eq(index).addClass("active");
        });

        //----------rasesh_p1---------------------
        $(".H_rename_rasesh_p1_box1").click(function () {
            $(this).hide();
            $('.H_rename_rasesh_p1_box1_save').show();
            $(".H_input_rename_rasesh_p1_box1").toggle(300);
        });
        $(".H_rename_rasesh_p1_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'rasesh' + "&name=" + 'rasesh_p1_box1' + "&value=" + $(".H_input_rename_rasesh_p1_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_rasesh_p1_box1 > span.temp").text($(".H_input_rename_rasesh_p1_box1").val());
            $(this).hide();
            $('.H_rename_rasesh_p1_box1').show();
            $(".H_input_rename_rasesh_p1_box1").hide();
            $(".H_rename_rasesh_p1_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_rasesh_p1_box2").click(function () {
            $(this).hide();
            $('.H_rename_rasesh_p1_box2_save').show();
            $(".H_input_rename_rasesh_p1_box2").toggle(300);
        });
        $(".H_rename_rasesh_p1_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'rasesh' + "&name=" + 'rasesh_p1_box2' + "&value=" + $(".H_input_rename_rasesh_p1_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_rasesh_p1_box2 > span.temp").text($(".H_input_rename_rasesh_p1_box2").val());
            $(this).hide();
            $('.H_rename_rasesh_p1_box2').show();
            $(".H_input_rename_rasesh_p1_box2").hide();
            $(".H_rename_rasesh_p1_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_rasesh_p1_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box3_save').show();
            $(".H_input_rename_rasesh_p1_title_box3").toggle(300);
        });
        $(".H_rename_rasesh_p1_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'rasesh' + "&name=" + 'rasesh_p1_title_box3' + "&value=" + $(".H_input_rename_rasesh_p1_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_rasesh_p1_title_box3 > span.temp").text($(".H_input_rename_rasesh_p1_title_box3").val());
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box3').show();
            $(".H_input_rename_rasesh_p1_title_box3").hide();
            $(".H_rename_rasesh_p1_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_rasesh_p1_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box4_save').show();
            $(".H_input_rename_rasesh_p1_title_box4").toggle(300);
        });
        $(".H_rename_rasesh_p1_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'rasesh' + "&name=" + 'rasesh_p1_title_box4' + "&value=" + $(".H_input_rename_rasesh_p1_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_rasesh_p1_title_box4 > span.temp").text($(".H_input_rename_rasesh_p1_title_box4").val());
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box4').show();
            $(".H_input_rename_rasesh_p1_title_box4").hide();
            $(".H_rename_rasesh_p1_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_rasesh_p1_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box5_save').show();
            $(".H_input_rename_rasesh_p1_title_box5").toggle(300);
        });
        $(".H_rename_rasesh_p1_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'rasesh' + "&name=" + 'rasesh_p1_title_box5' + "&value=" + $(".H_input_rename_rasesh_p1_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_rasesh_p1_title_box5 > span.temp").text($(".H_input_rename_rasesh_p1_title_box5").val());
            $(this).hide();
            $('.H_rename_rasesh_p1_title_box5').show();
            $(".H_input_rename_rasesh_p1_title_box5").hide();
            $(".H_rename_rasesh_p1_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });


    });
</script>


</div>

<!---------------return last tabs------------------>
<script>
    $(document).ready(function () {

        $("ul.z-tabs-desktop").find('li.z-active').removeClass('z-active');
        $("ul.z-tabs-desktop").find('[data-link=<?= $temp_tab['title'] ?>]').addClass('z-active');

        $("#clean-demo .z-container > div").removeClass('z-active').siblings().css('display', 'none');
        $("#clean-demo .z-container").find('.<?= $temp_tab['title'] ?>').addClass('z-active').css({
            'display': 'block',
            'position': 'relative'
        }).find('div.bhoechie-tab-content.active');

        $("#clean-demo .z-container > div.z-active div.list-group a").removeClass('active');
        $("#clean-demo .z-container > div.z-active div.list-group").find('[id=<?= $temp_tab['text'] ?>]').addClass('active');

        $("#clean-demo .z-container div.z-active div.bhoechie-tab-content").removeClass('active');
        $("#clean-demo .z-container div.z-active div.bhoechie-tab").find('[id=<?= $temp_tab['pic'] ?>]').addClass('active');


    });
    $("form").submit(function () {
        var val = $("ul.z-tabs-desktop").find('li.z-active').attr("data-link");
        $('[name="temp_tab"]').val(val);
        var number = $("#clean-demo .z-container div.z-active div.list-group a.active").attr("id");
        $('[name="number_tab"]').val(number);
        var num_con = $("#clean-demo .z-container div.z-active div.bhoechie-tab-content.active").attr("id");
        $('[name="num_con_tab"]').val(num_con);




    });
</script>
<!---------------End return last tabs------------------>

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
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        zoom: {
            enabled: true
        }
    });
</script>
<!--===========================End popup img mahsolat=============================-->

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
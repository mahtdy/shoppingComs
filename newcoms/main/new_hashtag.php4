<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<style>
    .error {
        color : red;
    }
</style>
<script>
    $(function() {
        $('#new_language').validate({
            rules: {
                name: {
                    required:true
                },
                title: {
                    required:true
                }
            },
            messages: {
                name: {
                    required:"<?=$pro_field_mandatory_fill?>"
                },
                title: {
                    required:"<?=$pro_field_mandatory_fill?>"
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? '<?=$pro_1field_missing?>'
                        : '' + errors + '<?=$pro_field_missing?>';
                    $("div.errorHandler button").after(message);
                    $("div.errorHandler").show();
                } else {
                    $("div.errorHandler").hide();
                }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>
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
                <h4 class="modal-title custom_align" id="Heading"><?=$s_Pages_delete?></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    فقط کلماتی حذف میشوند که تا الان مورد استفاده قرار نگرفته باشند
                    <br>
                    <span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف محتویات زیر اطمینان دارید؟ </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok"  data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
            </div>
        </div>
    </div>
</div>


<form class="form-horizontal" action="" method="post" name="new_addon" id="new_addon" enctype="multipart/form-data">
    <input  type='hidden' name="edit_mode" id="edit_mode" value="0">
    <div class="modal fade" id="addon" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">افزودن</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" style="text-align: center;"> زبان</label>
                        <div class="form-group col-md-6">
                            <select id="manage_lang" name="manage_lang" class="form-control">
                                <?$query="select title,name from new_language where status=1";
                                $result = $coms_conect->query($query);
                                while($RS1 = $result->fetch_assoc()) {
                                    $title=$RS1['title'];
                                    $name=$RS1['name'];
                                    if(in_array($title,$_SESSION['manager_title_lang']))
                                        echo "<option value='$title' $str>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"  style="text-align: center;">عنوان</label>
                        <div class="form-group col-md-6">
                            <input type="text" name="name" id="name" class="form-control" >
                        </div>

                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit"   class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;افزودن</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?@session_start();
if(isset($_GET['show_lang'])){
    $la=injection_replace($_GET['show_lang']);
}


$str=injection_replace($_GET['str']);
$name=injection_replace($_POST['name']);
$manage_lang=injection_replace($_POST['manage_lang']);

$edit_mode=injection_replace($_POST['edit_mode']);
if($name>""&&$_SESSION['can_add']==1&&$edit_mode==0){
    $la=$manage_lang;
    if(get_result("select id from new_hashtag where name='$name' and la='$manage_lang'",$coms_conect)==""){

        $arr_slide=array("name"=>$name,"la"=>$manage_lang);
        insert_to_data_base($arr_slide,'new_hashtag',$coms_conect);
        show_msg($new_successfull);
    }else
        show_msg_warninig($new_repaet_keyword);
}if($name>""&&$_SESSION['can_edit']==1&&$edit_mode>0){
    $la=$manage_lang;
    if(get_result("select id  from new_hashtag where name='$name' and id <>$edit_mode and la='$manage_lang'",$coms_conect)==''){
        $condition="id=$edit_mode";
        $arr=array("name"=>$name);
        update_data_base($arr,'new_hashtag',$condition,$coms_conect);
        show_msg($new_successfull);
    }else
        show_msg_warninig($new_repaet_keyword);
}
###

function remove_utf8_bom($text){
    $text = str_replace("\r\n", '', $text);
    return $text;
}

$attach_file=injection_replace($_POST['attach_file']);
$manage_lang_group=injection_replace($_POST['manage_lang_group']);
$pasvand=explode(".",$attach_file);
if($attach_file>""&&$_SESSION['can_add']==1&&end($pasvand)=='txt'){
    $la=$manage_lang_group;
    $myfile = fopen("$attach_file", "r") or die("مشکل در خواندن فایل");
    while(!feof($myfile)) {
        $temp=remove_utf8_bom(fgets($myfile));
        if($temp!=PHP_EOL&$temp>""&&get_result("select id from new_hashtag where name='$temp' and la='$manage_lang_group'",$coms_conect)==""){
            $arr_slide=array("name"=>$temp,"la"=>$manage_lang_group);
            insert_to_data_base($arr_slide,'new_hashtag',$coms_conect);
        }
    }
    fclose($myfile);
    show_msg($new_successfull);
}
?>

<!-- alert panel  -->
<div class="errorHandler alert alert-danger" style="display:none;">
    <button data-dismiss="alert" class="close" sourceindex="208"> x </button>
    <i class="fa fa-times-sign"> </i>
</div>
<!-- /alert panel  -->

<div class="tabbable">

    <div class="msheet tab-content">

        <div class="secfhead">
            <!-- #section:main/keyword.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">مدیریت کلمات کلیدی</p><p class="lead">امکان مدیریت کلیه کلمات کلیدی که در ماژول های مختلف در قسمت seo استفاده می کنید در این قسمت برای شما فراهم شده است</p></div>
            </div>
            <!-- /section:main/keyword.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <!-- #section:main/keyword.add -->
                    <?if($_SESSION['can_add']==1){?>
                        <li id="newpag" class="addicon">
                            <a id="addbtn" data-toggle="modal" data-target="#addon" href="#" data-placement="bottom" title="افزودن" >
                                <span class="flaticon-add149"></span>
                            </a>
                        </li>
                        <!-- /section:main/keyword.add -->
                        <li>
                            <a href="#add_language" data-toggle="tab" data-placement="top" title="وارد کردن کلمات کلیدی">
                                <span class="flaticon-upload36"></span>
                            </a>
                        </li>
                    <?}?>
                </ul>
            </div>

        </div>

        <div class="tab-pane active" id="tab1">
            <!-- #section:main/keyword.table -->
            <div class="tt">
                <div class="row-fluid">
                    <!--div class="col-md-6 yepco"-->
                    <?if($_SESSION['can_delete']==1){?>
                        <div class="pull-left btn-xs yepco" id="drop4">
                            <i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
                                <span class="sr-only">Toggle navigation</span>
                                <span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
                            </i>
                            <div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
                                <ul class="nav navbar-nav navbar-left">
                                    <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <?=$s_Pages_delete?>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    <?}?>
                    <!--/div-->

                    <div class="col-md-10">
                        <div class="form-group yepco">
                            <form action='' method='get' class="navbar-form navbar-left pull-right yepco" role="search">
                                <input name="yep" value='new_hashtag' type="hidden">
                                <input type="text" name="str" class="form-control search2" placeholder="<?=$s_Pages_search?>">
                                &nbsp;&nbsp;&nbsp;
                                <select id="show_lang" name="show_lang" class="pull-right form-control col-md-3" style="  position: relative !important; top: -18px !important; width: 160px !important;">
                                    <?$query="select title,name from new_language where status=1";
                                    $result = $coms_conect->query($query);
                                    while($RS1 = $result->fetch_assoc()) {
                                        $title=$RS1['title'];
                                        $name=$RS1['name'];
                                        $temp="";
                                        if($la==$title)
                                            $temp="selected";
                                        if(in_array($title,$_SESSION['manager_title_lang']))
                                            echo "<option value='$title' $temp>$name</option>";
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>


                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th style="width:25px;">ردیف</th>
                        <th class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="conchkSelectAll" />
                                <span class="lbl"></span>
                            </label>
                        </th>
                        <th>عنوان</th>
                        <th>تعداد مورد استفاده</th>
                        <th><?=$new_sysmenu[2]?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?$i=1;
                    $str_site='';
                    if($str>""){
                        $str_site="and  name like '%$str%'";
                        $site_page="&str=$str";
                    }
                    ################################################################
                    $sql1 = "SELECT count(id) as cnt from new_hashtag where la='$la'
							 $str_site  ";
                    $result = $coms_conect->query($sql1);
                    $RS = $result->fetch_assoc();
                    $page=injection_replace($_GET["page"]);
                    $a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_hashtag$site_page");
                    $from=$a[0];
                    $to=$a[1];
                    $pgsel=$a[2];
                    $sql1 = "SELECT * from new_hashtag  where la='$la' $str_site order by id desc LIMIT $from,$to";
                    $result = $coms_conect->query($sql1);
                    $i=1;
                    while($RS1 = $result->fetch_assoc()){
                        $id=$RS1["id"];
                        ?>
                        <tr>
                            <td class="center">
                                <?if($page>0){ echo $i+(10*($page-1));} else echo $i;?>
                            </td>
                            <td class="center">
                                <label class="position-relative">
                                    <input id="<?=$id?>" value="<?=$id?>" type="checkbox" class="conchkNumber" />
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td><?=$RS1["name"]?></td>
                            <td><?=$RS1["key_count"]?></td>
                            <td>
                                <?if($_SESSION['can_edit']==1){?>
                                    <a id="<?=$RS1["id"]?>" value="<?=$RS1["name"]?>" class="edit_menu blue" href="#add_language" data-toggle="modal" data-target="#addon" href="#" style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-edit bigger-120"></i>
                                    </a>
                                <?}?>
                                <?if($RS1["key_count"]==0&&$_SESSION['can_delete']==1){?>
                                    <a id="<?=$RS1["id"]?>" class="del_menu red" data-title="Delete" data-toggle="modal" title="<?=$c_Poll_del?>" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </a>
                                <?}?>
                            </td>
                        </tr>
                        <?$i++;}?>
                    </tbody>
                </table>
                <?=$pgsel?>
            </div>
            <!-- /section:main/keyword.table -->
        </div>

        <div class="tab-pane" id="add_language">
            <form action="" method="post" id='keyword_form'>
                <input type="hidden" id="check_value" name="check_value" value="0">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save btn_success" data-original-title="ذخیره">
						<span class="flaticon-verified9">
						</span>
                    </a>
                    <a href="newcoms.php?yep=new_hashtag" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
                    </a>

                </div>
                </br>

                <div class="panel-body">
                    <!-- #section:main/keyword.enter -->
                    <div class="col-md-6">

                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: left;">انتخاب زبان</label>
                                <div class="form-group col-md-9">
                                    <select id="manage_lang_group" name="manage_lang_group" class="form-control">
                                        <?$query="select title,name from new_language where status=1";
                                        $result = $coms_conect->query($query);
                                        while($RS1 = $result->fetch_assoc()) {
                                            $title=$RS1['title'];
                                            $name=$RS1['name'];
                                            if(in_array($title,$_SESSION['manager_title_lang']))
                                                echo "<option value='$title' $str>$name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="text-align: left;">آپلود فایل</label>
                                <div class="form-group col-md-9">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" name="attach_file" id="attach_file">
                                        <span class="input-group-btn">
												<a href="/filemanager/dialog.php?type=2&amp;field_id=attach_file" class="btn btn-sm btn-default iframe-btn"  type="button">
													<i class="ace-icon fa fa-upload bigger-110"></i>
													انتخاب
												</a>
											</span>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                    <!-- /section:main/keyword.enter -->
                    <div class="col-md-6">
                        <div class="alert alert-warning ">یک فایل با فرمت txt و یونیکد utf8 را انتخاب نمایید.</br>
                            <a href="newcoms.php?yep=new_hashtag&download=ok">دانلود فایل نمونه</a>
                        </div>
                    </div>
                    <img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none;width: 100px;">
                </div>
                <div class="panel-footer bttools">
                    <button type="button" id='btn-success' class="btn btn_success btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>

                </div>
            </form>

        </div>
    </div>
    </form>
    <style>
        @media (min-width: 767px){
            .panel-body{
                padding-left: 100px;
                padding-right: 100px;
                padding-top: 65px;
            }
        }
        @media (max-width: 768px){
            .panel-body{
                padding-top: 70px;
            }}
    </style>
    <script>
        $(".btn_success").click(function () {
            if($("#attach_file").val()!=''){
                $("#show_waiting_search").show();
                $("#keyword_form").submit();
            }else{
                alert('لطفا فایل را انتخاب نمایید');
            }

        });
    </script>
    <?
    $download=injection_replace($_GET['download']);
    if($download=='ok'){
        if (file_exists("new_help/test.txt")) {
//	echo $file;exit;
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename("new_help/test.txt"));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize("new_help/test.txt"));
            ob_clean();
            flush();
            readfile("new_help/test.txt");
            exit;
        }
    }
    ?>

    <?$_SESSION["del_item"]='del_keyword';?>
    <script src="ajax_js/keyword.js"></script>
    <script type="text/javascript">

        $("#show_lang").change(function () {
            window.location='newcoms.php?yep=new_hashtag&show_lang='+$(this).val();
        });

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

    <script>
        $(function(){
            $('.iframe-btn').fancybox({
                'width'   : 880,
                'height'  : 570,
                'type'    : 'iframe',
                'autoScale'   : false
            });
            $('#download-button').on('click', function() {
                ga('send', 'event', 'button', 'click', 'download-buttons');
            });
            $('.toggle').click(function(){
                var _this=$(this);
                $('#'+_this.data('ref')).toggle(200);
                var i=_this.find('i');
                if (i.hasClass('icon-plus')) {
                    i.removeClass('icon-plus');
                    i.addClass('icon-minus');
                }else{
                    i.removeClass('icon-minus');
                    i.addClass('icon-plus');
                }
            });
        });
    </script>

<script src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>
<script src="/yep_theme/default/rtl/js/blocks/main_blocks_sort.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-duallistbox/bootstrap-duallistbox.min.css">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrap-duallistbox/jquery.bootstrap-duallistbox.js"></script>

<script src="/yep_theme/default/rtl/js/select2.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<script src="/yep_theme/default/rtl/js/jQueryCheckboxButtons/jQueryCheckboxButtons.js"></script>

<?$sort=injection_replace($_GET['sort']);
if($sort>"")
    $block_la=get_result("select la from new_blocks_sorts where id=$sort",$coms_conect);?>
<script>
    $(document).ready(function() {
        $('.block_group').select2({
            data: [
                <?
                $query="select name,id from new_blocks where manage_lang='$block_la' order by id desc";

                $result = $coms_conect->query($query);
                $i=0;
                while($RS1=$result->fetch_assoc()){
                    $id=$RS1["id"];
                    $name=$RS1["name"];
                    //if(in_array($id,$_SESSION['manager_page_cat'])){
                    //echo $id.'<br>';
                    if($i==0)
                        echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
                    else
                        echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
                    $i++;
                    //}

                }
                ?>
            ],
            allowClear: true,
            multiple: false,
            formatNoMatches: function(term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>

<?//

$edit_id=injection_replace($_GET['edit_id']);

$i=0;



$tem_name=injection_replace($_GET['tem']);
if(isset($_GET['type']))
    $back_type=injection_replace($_GET['type']);
if(isset($_POST['block_type']))
    $block_type=injection_replace($_POST['block_type']);
$edit_mode=injection_replace($_POST['edit_mode']);
$name=injection_replace($_POST['name']);
$right_block=injection_replace($_POST['right_block']);
$left_block=injection_replace($_POST['left_block']);
$pages_id=injection_replace($_POST['pages_id']);
$file_name=injection_replace($_POST['file_name']);
$pages_name=($_POST['pages_name']);

##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_la']);
if($manage_lang>""&&!in_array($manage_lang,$_SESSION["manager_title_lang"])){
    header('Location: new_manager_signout.php');
}
#########################چک کردن زیر سایت##########################
$manage_site=injection_replace($_POST['manage_site']);
if($manage_site>""&&!in_array($manage_site,$_SESSION["manager_title_site"]))
    header('Location: new_manager_signout.php');
##########################################



if($file_name<1)
    $file_name=0;
$majol_id=0;
if($pages_id==0){
    $majol_id=injection_replace($_POST['majol_id']);
}else if($_POST['pages_name']>""){
    $majol_id=0;
}else if($_POST['pages_id']>0)
    $majol_id=injection_replace($_POST['pages_id']);
if($left_block=="")
    $left_block=0;
if($right_block=="")
    $right_block=0;
if($right_block+$left_block>12){
    show_msg_warninig('جمع اعداد نباید بیش از 12 باشد');
    $ok=0;
}else{
    $center=12-($left_block+$right_block);
    $ok=1;
}
//exit;new_blocks_sorts
if($name>""&&$edit_mode==0&&$ok==1&&$_SESSION["can_add"]==1&&in_array($manage_site,$_SESSION["manager_title_site"])&&$temp[0]==''){
    $sql="select count(id) as count from new_blocks_sorts where tem_name='$tem_name' and file_name='$file_name' and type='$block_type' and pages_id='$majol_id' and site='$manage_site' and la='$manage_lang' and status=1";
    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();

    if($row['count']==0||$block_type=='p'){
        $query1="insert into new_blocks_sorts(status,la,site,tem_name,file_name,parent_id,pages_id,right_block,left_block,center,type,name,date,user_id,ip)
		values (1,'$manage_lang','$manage_site','$tem_name',$file_name,$manager_id,$majol_id,$right_block,$left_block,$center,'$block_type','$name',NOW(),$manager_id,'$custom_ip')";
        $coms_conect->query($query1);
        ///echo $query1;
        $id=mysqli_insert_id($coms_conect);
        if($block_type=='p'){
            foreach ($pages_name as $value){
                $query1="insert into new_static_page_sort(page_id,sort_id,type) 
				values ('$value',$id,'p')";
                $coms_conect->query($query1);
                //echo $query1.'<br>';
            }
        }

        show_msg($new_successfull);
    }else if($row['count']>=0)
        show_msg_warninig('چیدمان تکراری می باشد');

}else if($name>""&&$edit_mode>0&&$ok==1&&$_SESSION["can_edit"]==1&&in_array($manage_site,$_SESSION["manager_title_site"])&&$temp[0]==''){
    $sql="select user_id from new_blocks_sorts where id='$edit_mode'";

    $result = $coms_conect->query($sql);
    $row = $result->fetch_assoc();

    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"]))
        header('Location: new_manager_signout.php');

    $query1="update new_blocks_sorts set  la='$manage_lang',site='$manage_site',file_name='$file_name', pages_id='$majol_id',center='$center', type='$block_type',name='$name',
		right_block='$right_block',left_block='$left_block'
		,edit_date=NOW(),edit_user_id=$manager_id,ip='$custom_ip' where id=$edit_mode";

    $coms_conect->query($query1);
###########################زبان و سایت#################################
    $query1="delete from new_manage_lang where manager_id='$edit_mode'";
    $coms_conect->query($query1);

    show_msg($new_successfull);
#############################صفحه###################################
    $query1="delete from new_static_page_sort where sort_id='$edit_mode'";
    $coms_conect->query($query1);
    if($block_type=='p'){
        foreach ($pages_name as $value){
            $query1="insert into new_static_page_sort(page_id,sort_id,type) 
				values ('$value',$edit_mode,'p')";
            $coms_conect->query($query1);
        }
    }
}?>

<style>
    .error {
        color : red;
    }
</style>
<script>
    $(function() {
        $('#new_messages').validate({

            rules: {
                shenase: {
                    required:true
                },
                name: {
                    required:true
                }
            },
            messages: {
                shenase: {
                    required:"پر کردن اين فيلد الزامي است"
                },
                name: {
                    required:"پر کردن اين فيلد الزامي است"
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
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
<?if($sort>0){
    $query12="select pages_id,type,user_id from new_blocks_sorts where id=$sort";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();

    $pages_id=$RS121["pages_id"];
    $type=$RS121["type"];
    $user_id=$RS121["user_id"];
    if(!in_array($RS121["user_id"],$_SESSION["manager_user_permisson"])){
//header('Location: new_manager_signout.php');	exit;
    }
    if($type=='p'){
        $query12="select name from new_static_page where id=$pages_id";
        $result12 = $coms_conect->query($query12);
        $RS121 = $result12->fetch_assoc();
        $madual_name=' ماژول '.$RS121["name"];
    }else if($type=='m'){
        $query12="select name from new_modules where id=$pages_id";
        $result12 = $coms_conect->query($query12);
        $RS121 = $result12->fetch_assoc();
        $madual_name=' صفحه '.$RS121["name"];

    }
    ?>

<?}
if($edit_id>0){
    $query12="select left_block,right_block,id,file_name,name,pages_id,type,user_id,site,la from new_blocks_sorts where id=$edit_id";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();

    $edit_pages_id=$RS121["pages_id"];
    $edit_page_id=$RS121["id"];
    $edit_site=$RS121["site"];
    $edit_la=$RS121["la"];
    $edit_name=$RS121["name"];
    $block_type=$RS121["type"];
    $edit_file_name=$RS121["file_name"];
    $edit_left_block=$RS121["left_block"];
    $edit_right_block=$RS121["right_block"];
    $user_id=$RS121["user_id"];
    if(!in_array($RS121["user_id"],$_SESSION["manager_user_permisson"]))
        header('Location: new_manager_signout.php');
    if($block_type=='p'){
        $edit_page_name="";
        $query12="select a.page_id from new_static_page_sort a,new_static_page b  where b.id=a.page_id and sort_id=$edit_page_id";
        $result12 = $coms_conect->query($query12);
        while($RS121 = $result12->fetch_assoc()) {
            $edit_page_name[]=$RS121['page_id'];
        }

    }
}?>
<script>
    $(document).ready(function(){
        hideAllDivs = function () {
            $("#add_temp").hide();
            $("#add_temp2").hide();
            $("#file_name_div").hide();
        };

        handleNewSelection = function () {

            hideAllDivs();

            switch ($(this).val()) {
                case 'p':
                    $("#add_temp").show();

                    break;
                case 'm':{
                    $("#add_temp2").show();
                    $("#file_name_div").show();
                    $("#pages_id").val(0);
                    $("#static_page").val(0);
                    $("#static_page_id").val(0);

                }
                    break;

            }
        };


        $("#majol_id").change(function () {
            if($(this).val()==5||$(this).val()==100)
                $("#file_name option[value='2']").hide();
            else
                $("#file_name option[value='2']").show();
            /*if($(this).val()==100||$(this).val()==99||$(this).val()==11||$(this).val()==18||$(this).val()==1||$(this).val()==6||$(this).val()==7||$(this).val()==8||$(this).val()==9||$(this).val()==10||$(this).val()==5){
                $("#file_name_div").show();

            }else{
                $("#file_name_div").hide();
                $("#file_name").val('0');
            }*/
        });





        $(document).ready(function() {
            $("#block_type").change(handleNewSelection);
            // Run the event handler once now to ensure everything is as it should be
            handleNewSelection.apply($("#block_type"));

        });
    });
</script>
<?//
$type='r';
$tem_name=injection_replace($_GET['tem']);
if(isset($_POST['page_location']))
    $type=injection_replace($_POST['page_location']);

$page_id=injection_replace($_POST['page_id']);
$block_id=injection_replace($_POST['block_name']);
$block_edit_mode=injection_replace($_POST['block_edit_mode']);
$block_name=injection_replace($_POST['tem_block_name']);



if($page_id>""&&$block_edit_mode==0&&$_SESSION["can_add"]==1){
    $query="select id from new_block_location order by id desc";
    $result = $coms_conect->query($query);
    $RS = $result->fetch_assoc();
    $last_id=$RS['id'];
    $last_id++;

    $queryh="select count(id) as count from new_block_location where tem_name='$tem_name' and block_name='$block_name' 
			and type='$type' and block_id='$block_id' and page_id=$page_id";
    $resulth = $coms_conect->query($queryh);
    $RSh = $resulth->fetch_assoc();

    if($RSh['count']==0){
        $query1="insert into new_block_location(block_order,tem_name,block_name,page_id,block_id,type,date,user_id,ip)
				values ($last_id,'$tem_name','$block_name',$page_id,'$block_id','$type',NOW(),$manager_id,'$custom_ip')";
        $coms_conect->query($query1);
        //	echo $query1;
        show_msg($new_successfull);
    }else if($RSh['count']>0)
        show_msg_warninig('بلوک تکراری می باشد');
}else if($page_id>""&&$block_edit_mode>0&&$_SESSION["can_edit"]==1){
    $query1="update new_block_location set  tem_name='$tem_name', block_name='$block_name', block_id='$block_id' where id=$block_edit_mode";
    $coms_conect->query($query1);
    show_msg($new_successfull);
}
//?>
</br>
<form action="" method="post">
    <input type="hidden" name="page_id" id="page_id" value="<?=$sort?>">
    <input type="hidden" name="block_edit_mode" id="block_edit_mode" value="0">
    <input type="hidden" name="page_location" id="page_location" value="<?=$type?>" >
    <div class="modal fade" id="add-block" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">
                        افزودن بلوک
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">نام بلوک</label>
                        <input class="select2-input select2-basir block_group"  id="block_name" type="text" name="block_name"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
                    </div>

                    <div class="form-group">
                        <label class="control-label">بلوک های صفحه اول</label>
                        <select name="tem_block_name" id="tem_block_name" class="form-control" rows="3">
                            <option value="">انتخاب کنید</option>
                            <?if(file_exists("new_template/$tem_name/tem.xml")){//echo $xml->contact.'lllll';exit;
                                $KK= file_get_contents("new_template/$tem_name/tem.xml");
                                $temp=simplexml_load_string($KK);$r=get_object_vars($temp);
                                foreach($r as $name=>$key){?>
                                    <option value="<?=$name?>"><?=$key?></option>
                                <?}}?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ذخیره</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="delete2" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                <button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <input name="block_type_name"	type="hidden" id="block_type_name" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف چیدمان بلوک زیر اطمینان دارید؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok_sort" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
            </div>
        </div>
    </div>
</div>


<fieldset>
    <div class="modal fade" id="show_contact" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                           گیرندگان
                    </div>
                </div>
                <div class="modal-body">
                    </br>
                    <div class="tt">
                        <div class="row-fluid">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group esi">
                                    <form class="navbar-form navbar-left pull-right esi" role="search">
                                        <input type="text" class="form-control search2" placeholder="جستجو" style="top:0px !important;width: 100% !important;">
                                    </form>
                                </div>
                                <input name="static_page" type='hidden' id="static_page" value="<?=$static_page?>">
                                <input name="static_page_id" type='hidden' id="static_page_id" value="<?=$static_page_id?>">
                            </div>
                        </div>
                        <table  cellpadding="0" id="static_psge" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th class="center"><label class="position-relative"><input type="checkbox" class="conchkSelectAll" /><span class="lbl"></span></label></th>

                                <th>عنوان صفحه</th>
                                <th>نام صفحه </th>
                            </tr>
                            </thead>

                            <tbody>
                            <?$query="select title,id,name from new_static_page ";
                            $result = $coms_conect->query($query);
                            while($RS1 = $result->fetch_assoc()) {

                                $id=$RS1["id"];
                                $name=$RS1["name"];
                                $title=$RS1["title"];

                                //?>
                                <tr>
                                    <th class="center"><label class="position-relative">
                                            <input type="checkbox" id="<?=$id?>" name='sel' value="<?=$title?>" class="static_page_name conchkNumber"/><span class="lbl"></span></label></th>
                                    <td><?=$title?></td>
                                    <td><?=$name?></td>

                                </tr>
                            <?}?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add_static_page" value="" data-dismiss="modal" class="btn btn-primary conbtnGetAll" ><span class="glyphicon glyphicon-ok-sign"></span> افزودن </button>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>
</fieldset>



<script>
    $("#add_static_page").click(function () {
        $("#pages25").val($("#static_page").val());
        $("#pages_id").val($("#static_page_id").val());
    });




    $(".static_page_name").click(function () {
        var searchval = $("#static_psge input:checkbox:checked").map(function(){
            return $(this).val();
        }).get();
        var searchIDs = $("#static_psge input:checkbox:checked").map(function(){
            return $(this).attr('id');
        }).get();
        $("#static_page").val(searchval);
        $("#static_page_id").val(searchIDs);
    });

</script>
<?//=$type.'eeeeeeeeeee'?>

<div class="tabbable" id="table" >
    <!--ul class="nav nav-tabs">
        <li class="pull-right" style="right:1%;">
            <i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span data-toggle="tab" href="#add_templates0" title="چیدمان جدید"><i class="ace-icon fa fa-plus bigger-110"></i></span>
                <span data-toggle="tab" href="#add_templates0" title="بازگشت به قالب"><i class="ace-icon fa fa-plus bigger-110"></i></span>
            </i>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                <a data-toggle="tab" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                    <i class="ace-icon fa fa-plus bigger-110"></i>
                    چیدمان جدید</a>
                    <a   href="/newcoms.php?yep=templates" style="background-color: #892E65 !important;border-color: #2a8bcb;color: white;padding: 4px; ">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    بازگشت به قالب</a>
                </ul>
            </div>
        </li>

        <li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
        مدیریت چیدمان بلوک </a></li>

    </ul-->
    <div class="msheet tab-content">

        <div class="secfhead">
            <!-- #section:blocks/alignments.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">مدیریت چیدمان بلوک</p><p class="lead">توضيحات اين بخش</p></div>
            </div>
            <!-- /section:blocks/alignments.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <?if($_SESSION['can_add']==1){?>
                        <li id="newpag" class="addicon">
                            <a data-toggle="tab" href="#add_templates" id="new_news_sorting" data-placement="bottom" title="چیدمان جدید" >
                                <span class="flaticon-add149"></span>
                            </a>
                        </li>
                    <?}?>
                    <!-- #section:blocks/alignments.tem -->
                    <li>
                        <a  href="/newcoms.php?yep=templates" data-toggle="tooltip" data-placement="bottom" class="cancel" title="بازگشت به قالب" >
                            <span class="flaticon-left-arrow9"></span>
                        </a>
                    </li>
                    <!-- /section:blocks/alignments.tem -->
                </ul>
            </div>
        </div>

        <div class="tab-pane " style="<?if($sort!='' || ($edit_id!="")) echo 'display:none;'; else echo 'display:block;';?>" id="tab1">
            <?$madual_page_id=injection_replace($_GET['page']);
            $tem=injection_replace($_GET['tem']);
            $str=injection_replace($_GET['str']);?>
            <!-- #section:blocks/alignments.table -->
            <div class="tt" id="tableshowing">
                <div class="row-fluid">
                    <div class="col-md-10">
                        <?$site_filter=injection_replace($_GET['site_filter']);
                        $lang_filter=injection_replace($_GET['lang_filter']);
                        if($lang_filter==""&&$_SESSION['lang_filter']=='')
                            $lang_filter=$_SESSION['page_languege'];?>
                        <div class="form-group yepco">
                            <form class="navbar-form navbar-left pull-right yepco" role="search">
                                <input name='yep'  value='new_Alignments' type='hidden' class="form-control search2" placeholder="جستجو">
                                <input name='tem'  value='<?=$tem?>' type='hidden' class="form-control search2" placeholder="">
                                <input type="text" value='<?=$str?>' name='str' class="form-control search2" placeholder="">
                                <input type="hidden" name="site_filter" value="<?=$site_filter?>">
                                <input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
                            </form>
                            <?if ($lang_filter>"")
                                $_SESSION['lang_filter']=$lang_filter;
                            else
                                $lang_filter=$_SESSION['lang_filter'];?>
                            <div class="pull-right btn-default btn-xs yepco">
                                <?if ($lang_filter>"")
                                    $_SESSION['lang_filter']=$lang_filter;
                                create_lang_filter($_SESSION['lang_filter'],$coms_conect,$_SESSION["manager_title_lang"])?>
                            </div>
                            <div class="pull-right btn-default btn-xs yepco">
                                <?if ($site_filter>"")
                                    $_SESSION['site_filter']=$site_filter;
                                create_sub_site_filter_none($_SESSION['site_filter'],$coms_conect,$_SESSION['manager_title_site'])?>
                            </div>
                        </div>
                    </div>
                </div>

                <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <!--th>شناسه</th-->
                        <th> عنوان</th>

                        <th>چپ</th>
                        <th>وسط</th>
                        <th>راست</th>
                        <th>سایت</th>
                        <th>زبان</th>
                        <th>مدیر</th>
                        <th>جایگذاری بلوک در چیدمان</th>
                        <th>امکانات</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?################################################################
                    $manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
                    $manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
                    if($site_filter==-1){
                        $str_site=" and site in ($manager_title_site)";
                        $site_page="&site_filter=$site_filter";
                    }
                    else if($site_filter>0){
                        $str_site=" and site='$site_filter'";
                        $site_page="&site_filter=$site_filter";
                    }

                    if($lang_filter==-1){

                        $str_lang=" and la in ($manager_title_lang)";
                        $lang_page="&lang_filter=$lang_filter";
                    }
                    else if($lang_filter>""){

                        $str_lang=" and la='$lang_filter'";
                        $lang_page="&lang_filter=$lang_filter";
                    }
                    if($str)
                        $temp_str=" and  name like '%$str%'";
                    $sql1 = "SELECT count( id) as cnt from    new_blocks_sorts  where id>0 and tem_name='$tem_name' $temp_str $str_site  $str_lang";
                    $result = $coms_conect->query($sql1);
                    $RS = $result->fetch_assoc();
                    $a= pgsel((int)$madual_page_id,$RS["cnt"],10,10,"/newcoms.php?yep=new_Alignments&tem=$tem&str=$str$lang_page$site_page");
                    $from=$a[0];
                    $to=$a[1];
                    $pgsel=$a[2];
                    $query11="select * from new_blocks_sorts where tem_name='$tem_name'  $temp_str $str_site  $str_lang order by id desc LIMIT $from,$to";
                    $result11 = $coms_conect->query($query11);
                    while($RS1 = $result11->fetch_assoc()){
                        $id=$RS1["id"];
                        $center=($RS1["center"]);
                        $right_block=($RS1["right_block"]);
                        $left_block=$RS1["left_block"];

                        $name=$RS1["name"];?>
                        <tr>
                            <?if($RS1['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $RS1['site'].'.'.$domain_name;?>

                            <!--td>home</td-->
                            <td><?=$name?></td>
                            <td><?=$left_block?></td>
                            <td><?=$center?></td>
                            <td><?=$right_block?></td>
                            <td><a href="/<?=$domain?>" target="_blank"><?=$RS1["site"]?></a></td>
                            <td><?=$RS1['la']?></td>
                            <td><?=get_result("select name from new_managers where id={$RS1['user_id']}",$coms_conect); $RS1['la']?></td>
                            <td><a id="<?=$id?>" class="green editManage" href="newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>&sort=<?=$id?>"  style="font-size: 15px !important;"><span class="ace-icon fa fa-th-list bigger-120"></span></a></td>
                            <!--td><a class="green editManage" href="#manage_block" data-toggle="tab" style="font-size: 15px !important;"><span class="ace-icon fa fa-th-list bigger-120"></span></a></td-->
                            <td>
                                <?if($_SESSION["can_edit"]==1){?>
                                    <a id="<?=$id?>" class="edit_menu blue" href="newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>&edit_id=<?=$id?>" title="ویرایش" style="font-size: 15px !important;"><span class="ace-icon fa fa-edit bigger-120"></span></a>
                                <?}if($_SESSION["can_delete"]==1){?>
                                    <a id="<?=$id?>" class="del_block red" data-title="Delete" data-toggle="modal" data-target="#delete2" data-placement="top" rel="tooltip" title="حذف" style="font-size: 15px !important;"><span class="ace-icon fa fa-trash-o bigger-120"></span></a>
                                <?}?>
                                <label></label>
                                <input  id="<?=$id?>" name="switch-field-1" <?if($RS1['status']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
                                <span title="فعال سازی"class="lbl"></span>
                            </td>
                        </tr>
                    <?}?>
                    </tbody>
                </table>


            </div>
            <!-- /section:blocks/alignments.table -->
            <?=$pgsel?>
        </div>

        <div class="tab-pane <?if($edit_id!="")echo 'active';?>" id="add_templates">
            <form class="form-horizontal" id="new_messages" name="new_messages" action="" role="form" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit_mode" name="edit_mode" value="<?if($edit_id>0) echo $edit_id ;else echo 0;?>">

                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <?if($_SESSION['can_add']==1){?>
                        <a type="submit" id="submit_page" href="#"   title="" class="save submit2" data-original-title="ذخيره">
						<span class="flaticon-verified9">
						</span>
                        </a>
                    <?}?>
                    <a href="newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
                    </a>
                    <!--div>
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن چیدمان / ویرایش</h2>
						</div>
						<div class="messagebar-item-left">
							<a href="newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>" class="active">
								<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
								<b class="middle bigger-110">برگشت</b>
							</a>
						</div>

						<div class="messagebar-item-right">
							<span class="inline btn-send-message">
								<button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
									<i class="ace-icon fa fa-check"></i>
									<span class="bigger-110">ذخیره</span>
								</button>
							</span>
						</div>
					</div-->
                </div>
                </br>

                <div class="page-body" style="margin-top: 60px;margin-right: 106px;">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- #section:blocks/alignments.form -->
                            <div class="row-fluid">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان*</label>
                                        <div class="form-group col-md-9">
                                            <input type="text" value="<?=$edit_name?>" name="name" id="name" class="form-control" >
                                        </div>
                                    </div>
                                    <div id="show_check_box" class="form-group "></div>
                                    <div class="form-group" id="show_sites" >
                                        <label class="col-md-3 control-label" for="group_name">سایت*</label>
                                        <div class="form-group col-md-9">
                                            <?create_sub_site_title($edit_site,$coms_conect,$_SESSION["manager_title_site"]);?>
                                        </div>
                                    </div><?//=$site_id?>
                                    <div class="form-group" id="show_lang">
                                        <label class="col-md-3 control-label">انتخاب زبان</label>
                                        <div class="form-group col-md-9">
                                            <?	$sql = "SELECT title,name FROM new_language where status=1";
                                            $result = $coms_conect->query($sql);
                                            echo "<select name='manage_la' id='manage_la' class='form-control' rows='2'  >";

                                            while($row = $result->fetch_assoc()) {
                                                $name=$row['name'];
                                                $id=$row['title'];
                                                $str="";
                                                if($edit_la==$id)
                                                    $str="selected";
                                                if(in_array($id,$_SESSION["manager_title_lang"]))
                                                    echo "<option $str value='$id'>$name</option> ";
                                            }
                                            echo '</select>';
                                            ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">نوع</label>
                                        <div class="form-group col-md-9">

                                            <select name="block_type" id="block_type" class="form-control" rows="3">
                                                <option value="">انتخاب کنيد</option>
                                                <option value="p" <?if($block_type=='p') echo 'selected'?>>صفحات</option>
                                                <option value="m" <?if($block_type=='m') echo 'selected'?>>ماژول ها</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group" id="add_temp">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="form-group col-md-10">
                                            <select id="pages_name" multiple="multiple" size="10" name="pages_name[]">
                                                <?$query="select title,id,name from new_static_page a    where user_id in ({$_SESSION["manager_user_permisson_string"]}) and id not in(select page_id from new_static_page_sort where  type='p')";
                                                //echo $query;
                                                $result = $coms_conect->query($query);
                                                while($RS1 = $result->fetch_assoc()) {
                                                    if(in_array($RS1['id'],$edit_page_name))
                                                        $page_str='selected';else $page_str='';
                                                    ?>
                                                    <option <?=$page_str?> value="<?=$RS1['id']?>"><?=$RS1['name'].'('.$RS1['title'].')'?></option>
                                                <?}?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!--div class="form-group" id="add_temp">
											<label class="col-md-3 control-label">صفحات</label>
											<div class="form-group col-md-9">
												<div class="input-group">
													<input readonly value="<?=$edit_page_name?>" type="text" name="pages25" id="pages25" class="form-control">
													<input readonly type="hidden" name="pages_id" id="pages_id" class="form-control" value="0">
													<span class="input-group-addon success" href="#show_table" data-title="show_table" data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip" style="color: rgb(255, 255, 255);background-color: rgb(92, 184, 92);border-color: rgb(76, 174, 76);"><span class="glyphicon glyphicon-plus"></span></span>
												</div>
											</div>
										</div-->
                                    <div class="form-group" id="add_temp2">
                                        <label class="col-md-3 control-label" for="family">ماژول ها</label>
                                        <div class="form-group col-md-9">
                                            <select name="majol_id" id="majol_id" class="form-control" rows="3">
                                                <?$query="select name,id from new_modules where status=0";
                                                $result = $coms_conect->query($query);
                                                while($RS1 = $result->fetch_assoc()) {
                                                    $id=$RS1["id"];
                                                    $name=$RS1["name"];
                                                    $str='';
                                                    if($id==$edit_pages_id)
                                                        $str='selected';
                                                    echo "<option $str value='$id'>$name</option>";
                                                }
                                                $str='';
                                                if($edit_pages_id==100||$edit_pages_id==98||$edit_pages_id==99)
                                                    $str='selected';
                                                echo "<option $str value='100'>سوالات متداول</option>";
                                                echo "<option $str value='99'>پرسش و پاسخ</option>";
                                                //echo "<option $str value='98'>نمایش پرسش و پاسخ</option>";

                                                //?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="file_name_div" <?if($edit_id&&$edit_file_name>0){}else{?> style="display:none"<?}?>>
                                        <label class="col-md-3 control-label" for="family">نام فایل</label>
                                        <div class="form-group col-md-9">
                                            <select name="file_name" id="file_name"  class="form-control" rows="3">
                                                <option <?if($edit_file_name==1) echo 'selected';?> value="1">لیست ماژول</option>
                                                <option <?if($edit_file_name==2) echo 'selected';?> value="2">فایل نمایش ماژول</option>
                                                <option <?if($edit_file_name==3) echo 'selected';?> value="3">فایل دسته بندی ماژول</option>
                                                <option <?if($edit_file_name==4) echo 'selected';?> value="4">فایل جستجو و کلید واژه ها</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">

                                </div>
                            </div>
                            <?if($edit_id>0){?>
                                <script>
                                    $(document).ready(function() {
                                        <?if($edit_left_block>0){?>
                                        $("#left_block").prop("disabled", false);
                                        <?}if($edit_right_block>0){?>
                                        $("#right_block").prop("disabled", false);

                                        <?}if($block_type=='p'){?>
                                        $("#add_temp").show();
                                        $("#add_temp2").hide();
                                        <?}if($block_type=='m'){?>
                                        $("#file_name_div").show();
                                        $("#add_temp2").show();
                                        $("#add_temp").hide();
                                        <?}?>
                                    });
                                </script>
                            <?}?>
                            <script>
                                $(document).ready(function() {
                                    $('#manage_lang').select2('val',[<?=$edit_lang?>]);
                                    $("#check-left").click(function() {
                                        if ($(this).is(":checked")) {
                                            $("#left_block").prop("disabled", false);
                                        } else {
                                            $("#left_block").prop("disabled", true);
                                            $("#left_block").val("");

                                        }
                                    });
                                    $("#check-center").click(function() {
                                        if ($(this).is(":checked")) {
                                            $("#center-col").prop("disabled", false);
                                        } else {
                                            $("#center-col").prop("disabled", true);
                                        }
                                    });
                                    $("#check-right").click(function() {
                                        if ($(this).is(":checked")) {
                                            $("#right_block").prop("disabled", false);
                                        } else {
                                            $("#right_block").prop("disabled", true);
                                            $("#right_block").val("");
                                        }
                                    });
                                });
                            </script>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="group_name"> ستون سمت چپ</label>
                                    <div class="form-group col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><input <?if($edit_left_block>0) echo 'checked';?> type="checkbox" id="check-left" value="feedback"/></span>
                                            <input type="text" id="left_block" value="<?=$edit_left_block?>" name="left_block" class="form-control" placeholder="عرض ستون بین 1 تا 12" disabled>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="group_name"> ستون سمت راست</label>
                                    <div class="form-group col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><input  <?if($edit_right_block>0) echo 'checked';?> type="checkbox" id="check-right" value="feedback"/></span>
                                            <input type="text" name="right_block" value="<?=$edit_right_block?>" id="right_block" class="form-control" placeholder="عرض ستون بین 1 تا 12" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /section:blocks/alignments.form -->
                        </div>
                    </div>
                </div>


                <!--div class="panel-footer">
                    <button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
                </div-->
            </form>
        </div>
        <script>
            $(".submit2").click(function () {
                $("#new_messages").submit();
            });
        </script>
        <div class="tab-pane" style="<? if($sort) echo 'display:block;'; else echo 'display:none;'; ?>" id="manage_block">

            <form class="form-horizontal" id="new_pages" name="new_pages" action="" role="form" method="post" enctype="multipart/form-data">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <?if($_SESSION['can_add']==1){?> 
                        <a type="btn" href="#add-block" data-toggle="modal" data-placement="bottom" title="" data-original-title="افزودن">
										<span class="ace-icon fa fa-plus">
										</span>
                        </a>
                    <?}?>
                    <a href="newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
										<span class="flaticon-left-arrow9">
										</span>
                    </a>
                </div>

                <fieldset style="margin-top: -74px;">
                    <div class="tabbable tabs-left" style="margin-top: 74px;" style="<? //if($sort) echo 'display:block;' else echo 'display:none;'?>">
                        <ul class="nav nav-tabs" id="myTab3" style="margin-top:69px;  min-width: 0px;">
                            <li <?if(($type!='c'&&$type!='l')&&($back_type!='c'&&$back_type!='l')) echo 'class="active"';?> style="width: 126px;">
                                <a data-toggle="tab" id="rigth_block" href="#col-right-layout">
                                    <i class="blue ace-icon fa fa-align-right bigger-110"></i>
                                    ستون راست
                                </a>
                            </li>

                            <li <?if($type=='c'||$back_type=='c') echo 'class="active"';?> style="width: 126px;">
                                <a data-toggle="tab" id="center_block" href="#col-center-layout">
                                    <i class="pink ace-icon fa fa-align-center bigger-110"></i>
                                    ستون وسط
                                </a>
                            </li>

                            <li <?if($type=='l'||$back_type=='l') echo 'class="active"';?> style="width: 126px;">
                                <a data-toggle="tab" id="left_blocks" href="#col-left-layout">
                                    <i class="green ace-icon fa fa-align-left bigger-110"></i>
                                    ستون چپ
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div id="col-right-layout" class="tab-pane  <?if(($type!='c'&&$type!='l')&&($back_type!='c'&&$back_type!='l')) echo 'active';?>">

                                <style>
                                    .dd {
                                        max-width: 50%;
                                    }
                                </style>
                                <div class="dd" id="rigth_blocks">
                                    <ol class="dd-list">
                                        <?$query1t2="select block_id,id,block_name,block_order from new_block_location b where b.type='r'  and b.page_id='$sort' order by block_order";
                                        $i=1;

                                        $result1t2 = $coms_conect->query($query1t2);
                                        while($RS121 = $result1t2->fetch_assoc()) {

                                            $id=$RS121["id"];
                                            $block_name=$RS121["block_name"];
                                            $block_id=$RS121["block_id"];
                                            if($block_name==""){
                                                $query102="select name from new_blocks b where id='$block_id' ";
                                                $result102 = $coms_conect->query($query102);
                                                $RS1201 = $result102->fetch_assoc();
                                                $block_name=$RS1201["name"];
                                            }
                                            //?>

                                            <li class="dd-item dd-nodrag" data-id="<?=$id?>">
                                                <div class="dd-handle">
                                                    <?=$block_name?>
                                                    <div class="pull-right action-buttons">
                                                        <?if($_SESSION["can_edit"]==1){?>
                                                            <a id="<?=$id?>" class="edit_block blue" href="#add-block" data-toggle="modal" title="ویرایش">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                        <?}if($_SESSION["can_delete"]==1){?>
                                                            <a id="<?=$id?>" value='r' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="حذف">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?}?>

                                    </ol>
                                </div>
                                <textarea id="nestableMenu-output" style="display:none"></textarea>

                            </div>

                            <div id="col-center-layout" class="tab-pane <?if($type=='c'||$back_type=='c') echo 'active';?>">

                                <div class="dd" id="center_blocks">
                                    <ol class="dd-list">
                                        <?$query12="select block_id,id,block_name,block_order from new_block_location b where b.type='c'  and b.page_id='$sort' order by block_order";

                                        $i=1;
                                        $result12 = $coms_conect->query($query12);
                                        while($RS121 = $result12->fetch_assoc()) {

                                            $id=$RS121["id"];
                                            $block_name=$RS121["block_name"];
                                            $block_id=$RS121["block_id"];
                                            if($block_name==""){
                                                $query102="select name from new_blocks b where id='$block_id' ";
                                                $result102 = $coms_conect->query($query102);
                                                $RS1201 = $result102->fetch_assoc();
                                                $block_name=$RS1201["name"];
                                            }
                                            //?>

                                            <li class="dd-item dd-nodrag" data-id="<?=$id?>">
                                                <div class="dd-handle">
                                                    <?=$block_name?>
                                                    <div class="pull-right action-buttons">
                                                        <?if($_SESSION["can_edit"]==1){?>
                                                            <a id="<?=$id?>" class="edit_block blue" href="#add-block" data-toggle="modal" title="ویرایش">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                        <?}if($_SESSION["can_delete"]==1){?>
                                                            <a id="<?=$id?>" value="c" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="حذف">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?}?>

                                    </ol>
                                </div>



                            </div>

                            <div id="col-left-layout" class="tab-pane <?if($type=='l'||$back_type=='l') echo 'active';?>">

                                <div class="dd" id="left_blocks">
                                    <ol class="dd-list">
                                        <?$query12="select block_id,id,block_name,block_order from new_block_location b where b.type='l'  and b.page_id='$sort' order by block_order";
                                        $i=1;
                                        $result12 = $coms_conect->query($query12);
                                        while($RS121 = $result12->fetch_assoc()) {
                                            $id=$RS121["id"];
                                            $block_name=$RS121["block_name"];
                                            $block_id=$RS121["block_id"];
                                            if($block_name==""){
                                                $query102="select name from new_blocks b where id='$block_id' ";
                                                $result102 = $coms_conect->query($query102);
                                                $RS1201 = $result102->fetch_assoc();
                                                $block_name=$RS1201["name"];
                                            }
                                            //?>

                                            <li class="dd-item dd-nodrag" data-id="<?=$id?>">
                                                <div class="dd-handle">
                                                    <?=$block_name?>
                                                    <div class="pull-right action-buttons">
                                                        <?if($_SESSION["can_edit"]==1){?>
                                                            <a id="<?=$id?>" class="edit_block blue" href="#add-block" title="ویرایش" data-toggle="modal">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                        <?}if($_SESSION["can_delete"]==1){?>
                                                            <a id="<?=$id?>" value="l" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="حذف">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        <?}?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?}?>
                                    </ol>
                                </div>


                            </div>
                        </div>
                    </div>
                </fieldset>
                </br>

            </form>

            <div class="hr hr-24"></div>


        </div>
    </div>
</div>
<?$_SESSION["del_action"]='del_sort_blocks';
$_SESSION["edit_action"]='edit_sort_blocks';
$_SESSION["del_action_block"]='del_blocks_from_sort';
$_SESSION["edit_action_block"]='edit_action_block';
?>
<script src="ajax_js/sort_block.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#new_news_sorting").click(function(){
            $( "#tableshowing").hide();
        });
        $("#btn_ok_sort").click(function () {
            $.ajax({
                type:'POST',
                url:'New_ajax.php',
                data:"action=del_sort_blocks&id="+$(this).val(),
                success: function(result){
                    window.location.href = "newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>&sort=<?=$sort?>&type="+$("#block_type_name").val();
                }
            });
        });


        $(".del_block").click(function () {
            $("#btn_ok").val($(this).attr('id'));

        });
        $("#btn_ok").click(function () {
            $.ajax({
                type:'POST',
                url:'New_ajax.php',
                data:"action=del_blocks_from_sort&id="+$(this).val(),
                success: function(result){

                    window.location.href = "newcoms.php?yep=new_Alignments&tem=<?=$tem_name?>";
                }
            });
        });

        $(".edit_block").click(function () {
            $.ajax({
                type:'POST',
                url:'New_ajax.php',
                data:"action=edit_action_block&id="+$(this).attr('id'),
                success: function(result){
                    var b=result.split('^');
                    if(b[0]==0)
                        $("#tem_block_name").val(b[1]);
                    else
                        $("#block_name").select2("val", b[0]);
                    //$("#block_name").attr('value',b[0]);
                    $("#block_edit_mode").val(b[2]);
                }
            });
        });




        $(function () {
            $(document).on('click', '.conbtnGetAll', function(event) {



                if($('.conchkNumber:checked').length) {
                    var chkId = '';
                    $('.conchkNumber:checked').each(function() {
                        chkId += $(this).val() + ",";
                    });
                    chkId =  chkId.slice(0,-1);
                }
                else {
                    alert('موردي انتخاب نشده است');
                }
            });
            $('.conchkSelectAll').click( function() {
                $('.conchkNumber').prop('checked', $(this).is(':checked'));
                var searchval = $("#static_psge input:checkbox:checked").map(function(){
                    if($(this).val()!='on')
                        return $(this).val();
                    //alert($(this).val());
                }).get();
                var searchIDs = $("#static_psge input:checkbox:checked").map(function(){
                    return $(this).attr('id');
                }).get();
                $("#static_page").val(searchval);
                $("#static_page_id").val(searchIDs);
            });
            $('.conchkNumber').click( function() {
                if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
                    $('.conchkSelectAll').prop('checked', true);
                }
                else {
                    $('.conchkSelectAll').prop('checked', false);
                }
            });
        });
    });

</script>



<script>
    $(document).ready(function(){

        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
                //alert(window.JSON.stringify(list.nestable('serialize')));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list menu
        $('.dd').nestable({
            group: 1,
            maxDepth: 7,
        })
            .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('.dd').data('output', $('#nestableMenu-output')));

        jQuery(function($){

            $('.dd').nestable();

            $('.dd-handle a').on('mousedown', function(e){
                e.stopPropagation();
            });

            $('[data-rel="tooltip"]').tooltip();

        });
    });

    $(function () {
        $('.conchkNumber_4').click( function() {
            if($(this).prop('checked'))
                var a=1;
            else
                a=0;
            $.ajax({
                type:'POST',
                url:'New_ajax.php',
                data:"action=change_lock_aligment&value="+a+"&id="+$(this).attr('id'),
                success: function(result){

                }
            });
        });
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



    // demo1 dual list script
    var demo1 = $('select[name="pages_name[]"]').bootstrapDualListbox();
    /*$("#new_messages").submit(function() {
        alert($('[name="pages_name[]"]').val());
        return false;
    });*/
</script>
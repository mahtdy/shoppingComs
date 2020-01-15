<style>body {
        font-family: Arial, sans-serif;
        background: #ddd;
    }

    h1 {
        text-align: center;
        font-family: "Trebuchet MS", Tahoma, Arial, sans-serif;
        color: #333;
        text-shadow: 0 1px 0 #fff;
        margin: 50px 0;
    }

    #wrapper {
        /*width: 100px;*/
        /*margin: 0 auto;*/
        /*background: #fff;*/
        padding: 20px;
        /*border: 10px solid #aaa;*/
        /*border-radius: 15px;*/
        /*background-clip: padding-box;*/
        text-align: center;
    }

    .button {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 13px;
        padding: 5px 10px;
        border: 1px solid #aaa;
        background-color: #eee;
        background-image: linear-gradient(top, #fff, #f0f0f0);
        border-radius: 2px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
        color: #666;
        text-decoration: none;
        text-shadow: 0 1px 0 #fff;
        cursor: pointer;
        transition: all 0.2s ease-out;
    }

    .button:hover {
        border-color: #999;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
    }

    .button:active {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        transition: opacity 200ms;
        visibility: hidden;
        opacity: 0;
    }

    .overlay:target {
        visibility: visible;
        opacity: 1;
        z-index: 99999;
    }

    .popup {
        height: 400px;
        margin: 75px auto;
        padding: 20px;
        background: #fff;
        border: 1px solid #666;
        width: 600px;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
        position: relative;
    }

    h2 {
        margin-top: 0;
        color: #666;
        font-family: "Trebuchet MS", Tahoma, Arial, sans-serif;
    }

    .close {
        position: absolute;
        width: 20px;
        height: 20px;
        top: 20px;
        left: 20px;
        /*opacity: 0.8;*/
        /*transition: all 200ms;*/
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: #666;
    }

    .close:hover {
        opacity: 1;
    }

    p {
        margin: 0 0 1em;
    }

    p:last-child {
        margin: 0;
    }


</style>


<?
///echo 'new_dynamics/defult/new_company.php4';
//echo 'ff';
$type = 20;

@session_start();
if ($madual_page_id == '')
    $madual_page_id = 1;
$paging = ($madual_page_id * 9) - 8;
$_SESSION['content_order'] = 1;
view_module(20, $coms_conect);


//$action = injection_replace($_POST['action']);
//$valuecomment = injection_replace($_POST['valuecomment']);
//$idcomment = injection_replace($_POST['idcomment']);
//echo 'saaaallaaaammmmmmmmm';
//if($action=='can_comment_agahi'){
//    echo 'salam'.$idcomment;
//    $sql="select user_id,la,site from new_agahi where id=$id";
//    echo  $sql;exit;
//    $result = $coms_conect->query($sql);
//     echo $id;
//     print_r($result);
//    $row = $result->fetch_assoc();
//    check_lang_title($row["la"],$_SESSION["manager_title_lang"]);
//    check_lang_title($row["site"],$_SESSION["manager_title_site"]);
//    if(!in_array($row["user_id"],$_SESSION["manager_user_permisson"])||$can_edit!=1)
//        sign_out();
//    else{
//        $query1="update new_agahi set can_comment=$value where id=$id";
//        $coms_conect->query($query1);
//        echo $query1;
//    }
//}


$query = "select a.user_id,a.la,a.can_comment,a.date,a.name,title,la,a.id,publish_date,text,view from new_company a where status=1  and la='$madual_lang' and site='$site' and a.id='$madual_id' and publish_date<=$now";
//echo $query;exit;
$result = $coms_conect->query($query);
$row = $result->fetch_assoc();
?>
<script src="/yep_theme/default/rtl/js/jquery.maskedinput.min.js"></script>

<!--<body>-->
<!--<h1>Popup/Modal Windows without JavaScript</h1>-->
<!--<div id="wrapper">-->
<!--    <p><a class="button" href="#popup1">Click Me</a></p>-->
<!--    <!--    <p><a class="button" href="#popup2">Click Me Too</a></p>-->
<!--</div>-->
<!--<form action="" type="post">-->
<div id="popup1" class="overlay" style="text-align: right;">
    <div class="popup">
        <h2 style="text-align: right;">مشخصات خود وارد کنید...</h2>
<!--        <a id="cancle_cancle" class="close" href="#">&times;</a>-->
        <div class="col-md-12 content" style="text-align: right;">
            <!--            <div class="row">-->
            <div class="col-md12">
                <label for="pop_name" style="text-align: right;">نام :</label>
                <input id="pop_name" name="pop_name" type="text" value="" style="text-align: right;">
            </div>

            <div class="col-md12">
                <label for="pop_family" style="text-align: right;">نام خانوادگی :</label>
                <input id="pop_family" name="pop_family" type="text" value="" style="text-align: right;">
            </div>

            <div class="col-md12">
                <label for="pop_mobile" style="text-align: right;"> شماره همراه :</label>
                <input id="pop_mobile" name="pop_mobile" type="text" value="" style="text-align: right;">
            </div>
            <!--            </div>-->
            <hr>

            <p style="text-align: right;">در اولین فرصت با شما تماس گرفته خواهد شد..</p>
<!--            <a class="close" href="#">-->
                <button id="cancle_cancel" class="button">انصراف</button>
<!--            </a>-->
            <input type="submit" id="submit_popup" value="ذخیره" class="button">
            <div style="">
                <span id="okok"  style="color: green">اطلاعات شما با موفقیت ثبت شد..</span>
                <span id="nono" style="color: red">فیلدهای خالی را وارد کنید..</span>
            </div>
        </div>

    </div>
</div>

<!--</form>-->
<!--</body>-->
<!--<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">-->
<div class="container">
    <main>
        <center>
            <? $i = 0;
            $query = "select id,name,title from new_agahi where  la='$defult_lang' and site='$defult_site'";
            $result = $coms_conect->query($query);
            while ($RS = $result->fetch_assoc()) {
                $i++; ?>

                <div class="col-md-12" style="border-bottom: 1px solid;">
                    <div id="wrapper" class="col-md-2">
                        <p><a  href="#popup1" style="margin: 10px;">
                                <button class="button btn btn-info btn-lg" id="botbot" value="<?= $i ?>">درخواست برای این آگهی</button>
                            </a></p>

                        <!--                        درخواست برای این آگهی<button  title="انتخاب آگهی" style="margin: 10px;" class="button btn btn-info btn-lg">درخواست برای این آگهی-->
                        <!--                        </button>-->
                    </div>

                    <div class="col-md-6">
                        <p style="margin: 10px;">
                            <?= $RS['title'] ?>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" id="pop_id<?= $i ?>" name="pop_id" value="<?= $RS['id'] ?>">
                        <h4>  <?= $RS['name'] ?>
                        </h4>
                    </div>
                    <div class="col-md-1">
                        <h5>
                            <span style="margin: 10px;"><?= $i ?></span>
                        </h5>
                    </div>
<!--                    <input type="text" value="--><?//=time()?><!--">-->
                </div>

                <hr>


            <? } ?>

        </center>
    </main>
</div>

<script>
    var popid = '';
    $(document).ready(function () {
        $('span#okok').css('display','none');
        $('span#nono').css('display','none');
        // $('#okok').attr("style":"visibility",hidden);
        $('#nono').hide();
        $('#pop_mobile').mask("(0999) 999-9999", {placeholder: ""});
        $('#cancle_cancel').click(function () {
            $('.overlay').hide();
        });
    });
    $(document).on('click', '#botbot', function () {

        $('.overlay').show();
        var divid = $(this).val();
        // alert(divid);
        popid = $('#pop_id' + divid).val();
        // const popid;
        // alert(popid);
    });
    $('#submit_popup').click(function () {
        // alert(popid);
        var popname = $('#pop_name').val();
        var popfamily = $('#pop_family').val();
        var popmobile = $('#pop_mobile').val();

        var array_sabt = [popid, popname, popfamily, popmobile];
        if (popname > '' && popmobile != '') {
            $.ajax({
                type: 'POST',
                url: '/New_ajax_company.php',
                data: "action=sabt_agahi&arr_sabt=" + array_sabt,
                success: function (result) {
                    // alert(array_sabt);
                    // setInterval(function() {
                        $('.overlay').fadeOut("slow");
                        // }, 800);
                    // alert(result);
                    $('span#okok').css('display','block');
                    $('span#nono').css('display','none');
                    // $('#nono').hide();
                    // $('.overlay').hide();
                    $('#pop_name').val('');
                    $('#pop_family').val('');
                    $('#pop_mobile').val('');
                }
                // });

            });
        }else{
            $('span#nono').css('display','block');
        }
    });

    <!--$arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $id_com);-->

</script>
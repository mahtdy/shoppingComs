<? $_SESSION['add_contact_us_pm'] = 0; ?>
<style>
    .error {
        color: red;
    }
</style>
<? $call_us_text = get_tem_result($defult_site, $defult_lang, 'call_us_text', 'default', $coms_conect); ?>
<!-- Start Slider -->
<section class="slider pimg animated fadeIn col-xs-12 map">

    <iframe src="<?= get_result("SELECT address  FROM new_map_address where la='$defult_lang' and site='$defult_site'", $coms_conect) ?>"
            width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>

</section>
<!-- Start breadcrumb -->
<section class="breadcrumb-sec animated fadeIn">
    <div class="container">
        <ol class="breadcrumb rtl">
            <li><a href="/"><span class="fa fa-home"></span></a></li>
            <li><a href="/<?= "contact_us/$defult_lang" ?>"><span class="active"><?= $call_us_text['title'] ?></a></li>
        </ol>
    </div>
</section>
</header>
<!-- End Header -->
<!-- Start Page Title -->
<div class="ptitle">
    <div class="container">

        <span class="fa fa-user"></span>

        <h1 class="title"><?= $call_us_text['title'] ?></h1>
        <span class="pdesc"><?= $call_us_text['link'] ?></span>

    </div>
</div>
<!-- End Page Title -->
<div id="show_comment_message_div"></div>
<div class="container">
    <main>
        <!-- Start Main -->
        <div class="contact">


            <form id="form-comment" method='post' action="">

                <div class="col-md-7 col-sm-12 col-xs-12 pull-right">
                    <div class="col-sm-8 col-xs-12 form-group pull-right rtl">
                        <input class="form-control" name='name' id="name" placeholder="<?= $view_name ?>">
                    </div>
                    <div class="col-sm-8 col-xs-12 form-group pull-right rtl">
                        <input class="form-control" name='email' type="email" id="emial"
                               placeholder="<?= $view_email ?>">
                    </div>
                    <div class="col-sm-8 col-xs-12 form-group pull-right rtl">
                        <input class="form-control" name='mobile' type="mobile" id="mobile"
                               placeholder="<?= $view_mobile ?>">
                    </div>
                    <div class="col-sm-8 col-xs-12 form-group pull-right rtl">
                        <? $query1 = "select id,name,semat from new_contact_us where site='$site' and la='$madual_lang' order by id";
                        $result1 = $coms_conect->query($query1); ?>
                        <select name="user" class="form-control">
                            <? while ($RS1 = $result1->fetch_assoc()) {
                                $cid = $RS1["id"];
                                $ctitle = $RS1["title"]; ?>
                                <option value="<?= $RS1["id"]; ?>"><?= $RS1["name"] . '  ( ' . $RS1["semat"] . ' )'; ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="col-sm-8 col-xs-12 form-group pull-right rtl">
                        <input class="form-control" name='subject' id="subject" placeholder="موضوع">
                    </div>
                    <div class="col-xs-12 form-group pull-right rtl">
                        <textarea rows="7" name="message" class="form-control"
                                  placeholder="<?= $view_message ?> ..."></textarea>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right rtl">
                        <div class="input-group"><input class="form-control" name="comment_captcha"
                                                        placeholder="<?= $view_captcha ?>"
                                                        style="border-top-left-radius: 0;border-bottom-left-radius: 0;">

                            <span class="input-group-addon"
                                  style="background-color:transparent;padding: 0px;border: none;"><img
                                        src="<? crate_capcha_pic($madual_lang) ?>" style="width: 93px;"></span>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                        <button type='submit' class="btn btn-success fullwidth"><?= $view_send_message ?></button>
                        <img src="/waiting.gif" id="show_pic_comment" style="display:none">
                    </div>
                </div>


                <div class="col-md-5 col-sm-12 col-xs-12 pull-right">
                    <? $query = "SELECT  * from new_contact_us where la='$madual_lang' limit 0,3";
                    // echo $query;
                    $result = $coms_conect->query($query);
                    while ($RS1 = $result->fetch_assoc()) {
                        ?>
                        <div class="col-xs-12 pull-right rtl">
                            <? if ($RS1['department'] > "") {
                                ?>
                                <p>
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span><?= $view_depratman ?> :</span>
                                    <?= $RS1['department'] ?>
                                </p>
                            <? } ?>
                            <? if ($RS1['phone'] > "") {
                                ?>
                                <p>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span><?= $s_Members_tel ?> :</span>
                                    <?= $RS1['phone'] ?>
                                </p>
                            <? } ?>
                            <? if ($RS1['fax'] > "") {
                                ?>
                                <p>
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                    <span><?= $pro_fax ?></span>
                                    <?= $RS1['fax'] ?>
                                </p>
                            <? } ?>
                            <? if ($RS1['email'] > "") {
                                ?>
                                <p>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span><?= $s_MemberInfo_email ?> :</span>
                                    <?= $RS1['email'] ?>
                                </p>
                            <? } ?>
                            <hr>
                        </div>
                    <? } ?>


                </div>

            </form>

            <hr>
            <? ####ارتباط با ما?>
            <div class="col-md-12 col-sm-12 col-xs-12 pull-right">
                <? echo html_entity_decode($call_us_text['text']); ?>
            </div>


        </div>
        <!-- end main row -->
    </main>
    <!-- end main -->
</div>
<script>
    // JQuery Script to submit Form
    $(document).ready(function () {
        $('#show_comment_message_div').empty();
        $("#form-comment").validate({
            submitHandler: function () {
                $("#show_pic_comment").show();
// your function if, validate is success
                $.ajax({
                    type: "POST",
                    url: '/New_members_ajax.php',
                    data: 'action=add_contact_us_pm&' + $('#form-comment').serialize(),
                    success: function (data) {
                        $("#show_pic_comment").hide();
                        $('#show_comment_message_div').html(data);
                    }
                });
            },
            rules: {
                name: "required",
                mobile: "required",
                message: "required",
                email: {
                    required: true,
                    email: true
                },
                comment: "required",
                comment_captcha: "required"
            },
            messages: {
                name: "<?=$view_field_required?>",
                mobile: "<?=$view_field_required?>",
                message: "<?=$view_field_required?>",
                email: {
                    required: "<?=$view_field_required?>",
                    email: "<?=$view_email_required?>",
                },
                comment: "<?=$view_field_required?>",
                comment_captcha: "<?=$view_field_required?>",
            }
        });
    });
</script>
<script src="<? //=$subdomian_add?>///yep_theme/default/rtl/js/jquery.validate.min.js"></script>


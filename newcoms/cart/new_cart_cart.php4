
<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
<!--<script type="text/javascript" src="--><?//=$dir?><!--/js/iconset-fontawesome-4.1.0.min.js"></script>-->
<!-- Bootstrap-Iconpicker -->
<!--<script type="text/javascript" src="/new_template/ddddddddddddd/--><?//=$dir?><!--/js/bootstrap-iconpicker.js"></script>-->
<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html">
<!--<link rel="stylesheet" href="/new_template/ddddddddddddd/--><?//=$dir?><!--/css/bootstrap-iconpicker.min.css"/>-->
<!--<script type="text/javascript" src="/filemanager/plugin.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>




















<script>
    $(document).ready(function() {
        $('#btn_add_bank').click(function () {
            $('#add_bank').slideToggle("fast");
        })
    });
</script>
<br>
<div class="tabbable">
    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:news/newstext.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-text150" style=""></span>
                </div>
                <div class="title"><p class="titr">حسابهای بانکی</p><p class="lead">توضیحات این بخش</p>
                </div>
            </div>
            <!-- /section:news/newstext.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                </ul>
            </div>
        </div>

        <div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1" style="background-color: #fff;">

            <div class="well">
                <i class="fa fa-question-circle blue"></i>
                <span class="blue">در صورت فعال سازی این گزینه امکان ساخت تخفیف های ثابت و شناور برای شما فراهم می شود و کاربران سایت می توانند در هنگام سفارش از این تخفیف ها های ساخته شده زماندار استفاده کنند.
				</span>
            </div>

            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="<?if($tab_number!=1) echo 'active'?>"><a href="#tab21" data-toggle="tab">حسابهای بانکی</a></li>
                    <li class="<?if($tab_number==1) echo 'active'?>"><a href="#tab2" data-toggle="tab">درگاه پرداخت آنلاین</a></li>
                </ul>
                <div class="tab-content" style="min-height: 0px;padding: 5px;">
                    <div class="tab-pane <?if($tab_number!=1) echo 'active'?>" id="tab21" style="background-color: white;">
                        <div class="uploadbts" id="btn_add_bank" style="margin-top: 25px;">
                            <a data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add139"></span><span>حساب بانکی جدید</span></button></a>
                        </div>
                        <br>
                        <div class="well" id="add_bank" style="display: none;">
                            <form id="" name="">
                                <div class="form-group row">
                                    <label for="" class="control-label col-md-2 col-md-offset-3">نام درگاه</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="control-label col-md-2 col-md-offset-3">Api</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="control-label col-md-2 col-md-offset-3">آدرس سایت</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
<!--                                <div class="form-group row">-->
<!--                                    <label for="" class="control-label col-md-2 col-md-offset-3">درآمد سال</label>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <input type="text" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="" class="control-label col-md-2 col-md-offset-3">تعداد کل واریزی</label>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <input type="text" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <label for="" class="control-label col-md-2 col-md-offset-3">کل مبلغ واریزی</label>-->
<!--                                    <div class="col-md-4">-->
<!--                                        <input type="text" class="form-control">-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group row">
                                    <div class="col-md-6 col-md-offset-5">
                                        <button type="submit" class="btn btn-success" name="">افزودن</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <h3 class="blue">لیست درگاه های آنلاین</h3>
                        <hr>
                        <div class="tt">
                            <div class="row-fluid">
                                <div class="col-md-10">
                                    <div class="form-group yepco">
                                        <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                            <input type="hidden" name="yep"  value="new_newstext">
                                            <input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="وارد کنید...">
                                            <input type="hidden" name="site_filter" value="<?=$site_filter?>">
                                            <input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
                                            <input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
                                            <button class="btn btn-success" style="bottom: 18px;">جستجو</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>لوگوی درگاه</th>
                                <th>نام درگاه</th>
                                <th>Api درگاه</th>
                                <th>آدرس سایت</th>
<!--                                <th>تعداد کل واریزی</th>-->
<!--                                <th>کل مبلغ واریزی</th>-->
                                <th>امکانات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>ملت</td>
                                <td>12569458852</td>
                                <td>1200000</td>
                                <td>98000000</td>
                                <td>
                                    <a>
                                        <input id="user_info_send" name="user_info_send" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
                                        <span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت" style="margin-top: 0px;"></span>
                                    </a>
                                    <a id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_ads_turnover&edit_id=<?=$id?>">
                                        <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                    </a>
                                    <a href="#" id="<?=$id?>" class="blue del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <i class="ace-icon fa fa-vimeo-square bigger-120" title="vimeo"></i>
                                    </a>
                                    <a href="#" id="<?=$id?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="tab-pane <?if($tab_number==1) echo 'active'?>" id="tab2" style="background-color: white;">
                        <h3 class="blue">مدیریت پرداخت های آنلاین</h3>
                        <hr>
                        <div class="tt">
                            <div class="row-fluid">
                                <div class="col-md-10">
                                    <div class="form-group yepco">
                                        <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                            <input type="hidden" name="yep"  value="new_newstext">
                                            <input type="text" value="<?=$q?>" name="mn" id="mn" class="form-control search2" placeholder="وارد کنید...">
                                            <input type="hidden" name="site_filter" value="<?=$site_filter?>">
                                            <input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
                                            <input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
                                            <button class="btn btn-success" style="bottom: 18px;">جستجو</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>لوگو</th>
                                <th>نام بانک (حساب)</th>
                                <th>شماره حساب</th>
                                <th>درآمد ماه</th>
                                <th>درآمد سال</th>
                                <th>تعداد کل واریزی</th>
                                <th>کل مبلغ واریزی</th>
                                <th>امکانات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td>ملت</td>
                                <td>12569458852</td>
                                <td>1200000</td>
                                <td>98000000</td>
                                <td>5</td>
                                <td>12580</td>
                                <td>
                                    <a>
                                        <input id="user_info_send" name="user_info_send" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
                                        <span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت" style="margin-top: 0px;"></span>
                                    </a>
                                    <a id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_ads_turnover&edit_id=<?=$id?>">
                                        <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                    </a>
                                    <a href="#" id="<?=$id?>" class="blue del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <i class="ace-icon fa fa-vimeo-square bigger-120" title="vimeo"></i>
                                    </a>
                                    <a href="#" id="<?=$id?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                        <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                    </a>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- modal delete -->
<fieldset>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">حذف</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر زير اطمينان داريد؟</div>
                </div>
                <div class="modal-footer ">
                    <button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
                    <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<!-- end modal delete-->
<style>
    input[type="checkbox"].ace.ace-switch.ace-switch-7 + .lbl::before {
        content: "فعال\a0\a0\a0\a0\a0\a0\a0\a0\a0غیرفعال\a0\a0\a0\a0\a0\a0\a0\a0\a0\a0";
        font-weight: bolder;
        font-size: 11px;
        text-align: right;
        float: right;
        background-color: rgb(255, 255, 255);
        box-shadow: none;
        color: rgb(170, 170, 170);
        width: 84px;
        height: 26px;
        line-height: 22px;
        text-indent: 5px;
        display: inline-block;
        position: relative;
        border-width: 2px;
        border-style: solid;
        border-color: rgb(170, 170, 170);
        border-image: initial;
        border-radius: 0px;
        overflow: hidden;
        transition: all 0.2s ease;
    }
    input[type=checkbox].ace.ace-switch.ace-switch-7+.lbl::after {
        content: '\f00d';
        font-family: FontAwesome;
        font-size: 16px;
        position: absolute;
        top: 3px;
        left: 52px;
        width: 30px;
        height: 20px;
        line-height: 18px;
        text-align: center;
        text-indent: 0px;
        background-color: rgb(170, 170, 170);
        color: rgb(255, 255, 255);
        box-shadow: none;
        padding: 0px;
        border-radius: 0px;
        transition: all 0.2s ease-in-out;
    }
</style>
<!---->
<!--<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->-->
<!--<script type="text/javascript" src="/new_template/ddddddddddddd/--><?//=$dir?><!--/js/iconset-fontawesome-4.1.0.min.js"></script>-->
<!--<!-- Bootstrap-Iconpicker -->-->
<!--<script type="text/javascript" src="/new_template/ddddddddddddd/--><?//=$dir?><!--/js/bootstrap-iconpicker.js"></script>-->

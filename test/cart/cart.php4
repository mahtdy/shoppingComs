<!--<script src="../../yep_theme/default/rtl/css/doctor/jquery.min.js"></script>-->
<!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/M_style.css">-->
<!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/select3.css"/>-->
<!--    <script src="../../yep_theme/default/rtl/js/select2.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--    <script src="../../yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>-->

<!--<link rel="stylesheet"-->
<!--      href="../.css/3c71b72.css"/>-->
<script src="../../yep_theme/default/rtl/js/fix-persian-number.js"></script>
<!--<link rel="stylesheet"-->
<!--      href="css//94c86141.css" media="screen and (max-width: 1365px)"/>-->
<!--<link rel="stylesheet"-->
<!--      href="css//1e013cb5.css" media="screen and (min-width: 1025px)"/>-->
<!--<link rel="stylesheet"-->
<!--      href="css//c9030d49.css" media="screen and (min-width: 1366px)"/>-->
<!--<link rel="stylesheet"-->
<!--      href="css//5af4e755.css" media="screen and (min-width: 1680px)"/>-->


<?
//include "../../newcoms/functions_pay.php";

include '../../newcoms/function.php';
//echo 'new_dynamics/defult/new_product.php4';
//echo 'ff';
$type=4;

@session_start();
if($madual_page_id=='')
    $madual_page_id=1;
$paging=($madual_page_id*9)-8;
$_SESSION['content_order']=1;
view_module(4,$coms_conect);




$list_list=injection_replace($_POST['list_list']);
$name=injection_replace($_POST['name-family']);
$list_list=injection_replace($_POST['list_list']);
$food_arr=injection_replace($_POST['food_arr']);

echo $list_list;
echo '====';


$api = 'test';
$amount = "110000";
$mobile = "56516561";
$factorNumber = "1414";
$description = "توضیحاتتوضیحاتتوضیحاتتوضیحات";
$redirect = 'http://localhost/pay/fa/';
$result = send($api, $amount, $redirect, $mobile, $factorNumber, $description);
//print_r($result);echo 'qq';

$result = json_decode($result);
print_r($result);echo 'ss';
if($result->status) {
$go = "https://pay.ir/pg/$result->token";
print_r($go);echo '=go';
header("Location: $go");
} else {
echo $result->errorMessage;
}
$status=injection_replace($_GET['status']);
$token_token=injection_replace($_GET['token']);
echo '=tokentoken='.$token_token;
echo '=$status='.$status;

$api = 'test';
$token = $result->token;
echo 'token='.$token.'=';
$result = json_decode(verify($api,$token));
print_r($result);echo 'ss';

if(isset($result->status)){
if($result->status == 1){
echo "<h1>Success</h1>";
} else {
echo "<h1>Failed</h1>";
}
} else {
if($_GET['status'] == 0){
echo "<h1>Failed</h1>";
}
}

exit;
?>

























































<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--    <script src="../../yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>-->
    <!--    <script type="text/javascript" src="../../filemanager/plugin.min.js"></script>-->
    <!--    <link rel="stylesheet" type="text/css" href="../../filemanager/css/jquery.fancybox.css" media="screen"/>-->
    <!--    <script type="text/javascript" src="../../filemanager/js/jquery.fancybox.pack.js"></script>-->
    <!--    <link rel="stylesheet" href="../../new_plugin/video-js/css/video-js.min.css">-->
    <!-- page specific plugin scripts -->
    <!--script src="../../assets/js/fuelux/data/fuelux.tree-sample-demo-data.js"></script-->
    <!--    <script src="../../yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/datatables/datatables.css">-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css"/>-->
    <!--[if lt IE 9]>
    <script src="../../js/jsTree/respond.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/datatables/datatables.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/jasny-input/jasny-bootstrap.min.css"/>-->
    <!--    <script src="../../yep_theme/default/rtl/js/jasny-input/jasny-bootstrap.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/assets/css/daterangepicker.css"/>-->
    <!--    <script src="../../yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/bootstrap-datepicker.min.css"/>-->
    <!--    <script src="../../yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/dropdown-menu-trigger.css">-->
    <!--    <script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/select3.css"/>-->
    <!--    <script src="../../yep_theme/default/rtl/js/select2.js"></script>-->

    <!--    <link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>-->
    <!--    <script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>-->
    <!--    <script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">-->

    <!--    <script src="../../yep_theme/default/rtl/js/jquery.maskedinput.min.js"></script>-->
    <!--    <script src="../../yep_theme/default/rtl/js/dropzone.min.js"></script>-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/dropzone.min.css">-->
    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/H_style.css">-->

    <!--    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/doctor/bootstrap.min.css">-->
    <!--<script src="../../yep_theme/default/rtl/css/doctor/bootstrap.min.js"></script>-->
    <script src="../../yep_theme/default/rtl/css/doctor/jquery.min.js"></script>
    <link rel="stylesheet" href="../../yep_theme/default/rtl/css/M_style.css">
    <!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/select3.css"/>-->
    <!--    <script src="../../yep_theme/default/rtl/js/select2.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet"
          href="css//03c71b72.css"/>
    <link rel="stylesheet"
          href="css//1c373a65.css" media="screen and (max-height: 1184px)"/>
    <link rel="stylesheet"
          href="css//94c86141.css" media="screen and (max-width: 1365px)"/>
    <link rel="stylesheet"
          href="css//1e013cb5.css" media="screen and (min-width: 1025px)"/>
    <link rel="stylesheet"
          href="css//c9030d49.css" media="screen and (min-width: 1366px)"/>
    <link rel="stylesheet"
          href="css//5af4e755.css" media="screen and (min-width: 1680px)"/>


    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font: inherit;
            margin: 0;
        }

        /*.navbar a:hover, .dropdown:hover .dropbtn {*/
        /*background-color: red;*/
        /*}*/

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            width: 30%;
            left: 0;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content .header {
            background: red;
            /*padding: 16px;*/
            /*color: white;*/
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: right;
            width: 100%;
            padding: 10px;
            background-color: #ccc;
            height: 250px;
        }

        .column a {
            float: none;
            color: black;
            padding: 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .column a:hover {
            background-color: #ddd;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>

<div class="navbar">

    <div class="dropdown">
        <button class="dropbtn ">سبد خرید
            <i class=" add_num">0</i>
           کالا
            <i class=" fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <div class="header sabad">
                <h2>لیست خرید</h2>
            </div>

            <div class="row">
                <div class="column col-md lis_sabad">
                    <!--                    <h3>Category 1</h3>-->
                    <ul class="ul-sabad" id="ul-sabad">
                        <li>

                         <a href="#">کالای اول<img src="image/12.png" alt=""></a>
                        </li>
                        <li>
                         <a href="#"><img src="image/1111.jpg" alt="">کالای دوم</a>
                        </li>
                        <li>
                         <a href="#">کالای سوم</a>
                        </li>



            </ul></div>
                <!--                <div class="column">-->
                <!--                    <h3>Category 2</h3>-->
                <!--                    <a href="#">Link 1</a>-->
                <!--                    <a href="#">Link 2</a>-->
                <!--                    <a href="#">سیبسیب 3</a>-->
                <!--                </div>-->
                <!--                <div class="column">-->
                <!--                    <h3>Category 3</h3>-->
                <!--                    <a href="#">Link 1</a>-->
                <!--                    <a href="#">Link 2</a>-->
                <!--                    <a href="#">Link 3</a>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
</div>

<div style="padding:16px">
    <ul class="c-listing__items">
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="1133318" data-index="1" data-title-fa="گوشی موبایل سامسونگ مدل Galaxy A7 2018 دو سیم‌کارت"
                 data-title-en="Samsung Galaxy A7 2018 Dual SIM Mobile Phone" data-price="۴,۵۵۰,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:1133318,&quot;name&quot;:&quot;گوشی موبایل سامسونگ مدل Galaxy A7 2018 دو سیم‌کارت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Samsung&quot;,&quot;variant&quot;:2456855,&quot;price&quot;:45500000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دی جی لند پلاس
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:1133318,&quot;position&quot;:1,&quot;product_url&quot;:&quot;/product/dkp-1133318/گوشی-موبایل-سامسونگ-مدل-galaxy-a7-2018-دو-سیمکارت&quot;}"
                   href="/product/dkp-1133318/گوشی-موبایل-سامسونگ-مدل-galaxy-a7-2018-دو-سیمکارت"
                   dideo-checked="true">
                    <img
                            src="https://dkstatics-public.digikala.com/digikala-products/5489218.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل سامسونگ مدل Galaxy A7 2018 دو سیم‌کارت">
                </a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-1133318/گوشی-موبایل-سامسونگ-مدل-galaxy-a7-2018-دو-سیمکارت"
                                    target="_blank" dideo-checked="true">گوشی موبایل سامسونگ مدل Galaxy A7 2018 دو
                                سیم‌کارت</a></div>
                        <div class="c-product-box__title-en">Samsung Galaxy A7 2018 Dual SIM Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #c99212;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #2196f3;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه</label><input type="button" class="btn_cart" id="btn_cart" onclick="ff1()" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <del>۵,۵۱۲,۴۰۳</del>
                                <div class="c-price__discount-oval"><span>
                                        ٪۱۷
                                             </span></div>
                                <div class="c-price__value-wrapper">
                                    ۴,۵۵۰,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دی جی لند پلاس
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه داریا همراه پایتخت
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 128 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 4 گیگابایت</li>
                        <li>رزولوشن عکس: 24.0 مگاپیکسل</li>
                        <li>باتری قابل تعویض:</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="809328" data-index="2"
                 data-title-fa="گوشی موبایل هوآوی مدل Y5 Prime 2018 DRA-LX2 دو سیم کارت ظرفیت 16 گیگابایت"
                 data-title-en="Huawei Y5 Prime 2018 DRA-LX2 Dual SIM 16GB Mobile Phone" data-price="۱,۴۷۵,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:809328,&quot;name&quot;:&quot;گوشی موبایل هوآوی مدل Y5 Prime 2018 DRA-LX2 دو سیم کارت ظرفیت 16 گیگابایت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Huawei&quot;,&quot;variant&quot;:2445902,&quot;price&quot;:14750000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:809328,&quot;position&quot;:2,&quot;product_url&quot;:&quot;/product/dkp-809328/گوشی-موبایل-هوآوی-مدل-y5-prime-2018-dra-lx2-دو-سیم-کارت-ظرفیت-16-گیگابایت&quot;}"
                   href="/product/dkp-809328/گوشی-موبایل-هوآوی-مدل-y5-prime-2018-dra-lx2-دو-سیم-کارت-ظرفیت-16-گیگابایت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/3706276.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل هوآوی مدل Y5 Prime 2018 DRA-LX2 دو سیم کارت ظرفیت 16 گیگابایت"
                            data-second-src="https://dkstatics-public.digikala.com/digikala-products/3753388.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-809328/گوشی-موبایل-هوآوی-مدل-y5-prime-2018-dra-lx2-دو-سیم-کارت-ظرفیت-16-گیگابایت"
                                    target="_blank" dideo-checked="true">گوشی موبایل هوآوی مدل Y5 Prime 2018 DRA-LX2 دو
                                سیم کارت ظرفیت 16 گیگابایت</a></div>
                        <div class="c-product-box__title-en">Huawei Y5 Prime 2018 DRA-LX2 Dual SIM 16GB Mobile Phone
                        </div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #c99212;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #2196f3;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۱,۴۷۵,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه مایکروتل
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 16 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 2 گیگابایت</li>
                        <li>رزولوشن عکس: 13.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="1485490" data-index="3"
                 data-title-fa="گوشی موبایل هوآوی مدل Y9 2019 دو سیم کارت ظرفیت 64 گیگابایت"
                 data-title-en="Huawei Y9 2019 Dual SIM 64GB Mobile Phone" data-price="۳,۰۸۰,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:1485490,&quot;name&quot;:&quot;گوشی موبایل هوآوی مدل Y9 2019 دو سیم کارت ظرفیت 64 گیگابایت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Huawei&quot;,&quot;variant&quot;:3859075,&quot;price&quot;:30800000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دی جی لند پلاس
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:1485490,&quot;position&quot;:3,&quot;product_url&quot;:&quot;/product/dkp-1485490/گوشی-موبایل-هوآوی-مدل-y9-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت&quot;}"
                   href="/product/dkp-1485490/گوشی-موبایل-هوآوی-مدل-y9-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/110450482.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل هوآوی مدل Y9 2019 دو سیم کارت ظرفیت 64 گیگابایت"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-1485490/گوشی-موبایل-هوآوی-مدل-y9-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت"
                                    target="_blank" dideo-checked="true">گوشی موبایل هوآوی مدل Y9 2019 دو سیم کارت ظرفیت
                                64 گیگابایت</a></div>
                        <div class="c-product-box__title-en">Huawei Y9 2019 Dual SIM 64GB Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #00fff0;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۳,۰۸۰,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دی جی لند پلاس
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه مدیاپردازش
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 64 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 4 گیگابایت</li>
                        <li>رزولوشن عکس: 13.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="1133903" data-index="4"
                 data-title-fa="گوشی موبایل سامسونگ مدل Galaxy J6 Plus SM-J610 دو سیم‌ کارت"
                 data-title-en="Samsung Galaxy J6 Plus SM-J610 Dual SIM Mobile Phone" data-price="۲,۶۷۲,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:1133903,&quot;name&quot;:&quot;گوشی موبایل سامسونگ مدل Galaxy J6 Plus SM-J610 دو سیم‌ کارت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Samsung&quot;,&quot;variant&quot;:3825597,&quot;price&quot;:26720000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:1133903,&quot;position&quot;:4,&quot;product_url&quot;:&quot;/product/dkp-1133903/گوشی-موبایل-سامسونگ-مدل-galaxy-j6-plus-sm-j610-دو-سیم-کارت&quot;}"
                   href="/product/dkp-1133903/گوشی-موبایل-سامسونگ-مدل-galaxy-j6-plus-sm-j610-دو-سیم-کارت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/5489234.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل سامسونگ مدل Galaxy J6 Plus SM-J610 دو سیم‌ کارت"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-1133903/گوشی-موبایل-سامسونگ-مدل-galaxy-j6-plus-sm-j610-دو-سیم-کارت"
                                    target="_blank" dideo-checked="true">گوشی موبایل سامسونگ مدل Galaxy J6 Plus SM-J610
                                دو سیم‌ کارت</a></div>
                        <div class="c-product-box__title-en">Samsung Galaxy J6 Plus SM-J610 Dual SIM Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۲,۶۷۲,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه داریا همراه پایتخت
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 32 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 3 گیگابایت</li>
                        <li>رزولوشن عکس: 13.0 مگاپیکسل</li>
                        <li>باتری قابل تعویض:</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="807170" data-index="5"
                 data-title-fa="گوشی موبایل هوآوی مدل Nova 3i INE-LX1M دو سیم کارت ظرفیت 128 گیگابایت"
                 data-title-en="Huawei Nova 3i INE-LX1M Dual SIM 128GB Mobile Phone" data-price="۴,۵۹۰,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:807170,&quot;name&quot;:&quot;گوشی موبایل هوآوی مدل Nova 3i INE-LX1M دو سیم کارت ظرفیت 128 گیگابایت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Huawei&quot;,&quot;variant&quot;:3681500,&quot;price&quot;:45900000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:807170,&quot;position&quot;:5,&quot;product_url&quot;:&quot;/product/dkp-807170/گوشی-موبایل-هوآوی-مدل-nova-3i-ine-lx1m-دو-سیم-کارت-ظرفیت-128-گیگابایت&quot;}"
                   href="/product/dkp-807170/گوشی-موبایل-هوآوی-مدل-nova-3i-ine-lx1m-دو-سیم-کارت-ظرفیت-128-گیگابایت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/3694075.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل هوآوی مدل Nova 3i INE-LX1M دو سیم کارت ظرفیت 128 گیگابایت"
                            data-second-src="https://dkstatics-public.digikala.com/digikala-products/3753375.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-807170/گوشی-موبایل-هوآوی-مدل-nova-3i-ine-lx1m-دو-سیم-کارت-ظرفیت-128-گیگابایت"
                                    target="_blank" dideo-checked="true">گوشی موبایل هوآوی مدل Nova 3i INE-LX1M دو سیم
                                کارت ظرفیت 128 گیگابایت</a></div>
                        <div class="c-product-box__title-en">Huawei Nova 3i INE-LX1M Dual SIM 128GB Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #9C27B1;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۴,۵۹۰,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه مدیاپردازش
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 128 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 4 گیگابایت</li>
                        <li>رزولوشن عکس: 16.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="1133810" data-index="6"
                 data-title-fa="گوشی موبایل سامسونگ مدل Galaxy J4 Core SM-J410 دو سیم‌ کارت"
                 data-title-en="Samsung Galaxy J4 Core SM-J410 Dual SIM Mobile Phone" data-price="۱,۸۷۹,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:1133810,&quot;name&quot;:&quot;گوشی موبایل سامسونگ مدل Galaxy J4 Core SM-J410 دو سیم‌ کارت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Samsung&quot;,&quot;variant&quot;:3825608,&quot;price&quot;:18790000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:1133810,&quot;position&quot;:6,&quot;product_url&quot;:&quot;/product/dkp-1133810/گوشی-موبایل-سامسونگ-مدل-galaxy-j4-core-sm-j410-دو-سیم-کارت&quot;}"
                   href="/product/dkp-1133810/گوشی-موبایل-سامسونگ-مدل-galaxy-j4-core-sm-j410-دو-سیم-کارت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/5489249.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل سامسونگ مدل Galaxy J4 Core SM-J410 دو سیم‌ کارت"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-1133810/گوشی-موبایل-سامسونگ-مدل-galaxy-j4-core-sm-j410-دو-سیم-کارت"
                                    target="_blank" dideo-checked="true">گوشی موبایل سامسونگ مدل Galaxy J4 Core SM-J410
                                دو سیم‌ کارت</a></div>
                        <div class="c-product-box__title-en">Samsung Galaxy J4 Core SM-J410 Dual SIM Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #c99212;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #2196f3;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۱,۸۷۹,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه داریا همراه پایتخت
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 16 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 1 گیگابایت</li>
                        <li>رزولوشن عکس:</li>
                        <li>باتری قابل تعویض:</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="1507168" data-index="7"
                 data-title-fa="گوشی موبایل هوآوی مدل P Smart 2019 دو سیم کارت ظرفیت 64 گیگابایت"
                 data-title-en="Huawei P Smart 2019 Dual SIM 64GB Mobile Phone" data-price="۲,۷۱۹,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:1507168,&quot;name&quot;:&quot;گوشی موبایل هوآوی مدل P Smart 2019 دو سیم کارت ظرفیت 64 گیگابایت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Huawei&quot;,&quot;variant&quot;:3858686,&quot;price&quot;:27190000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:1507168,&quot;position&quot;:7,&quot;product_url&quot;:&quot;/product/dkp-1507168/گوشی-موبایل-هوآوی-مدل-p-smart-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت&quot;}"
                   href="/product/dkp-1507168/گوشی-موبایل-هوآوی-مدل-p-smart-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/110568518.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل هوآوی مدل P Smart 2019 دو سیم کارت ظرفیت 64 گیگابایت"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-1507168/گوشی-موبایل-هوآوی-مدل-p-smart-2019-دو-سیم-کارت-ظرفیت-64-گیگابایت"
                                    target="_blank" dideo-checked="true">گوشی موبایل هوآوی مدل P Smart 2019 دو سیم کارت
                                ظرفیت 64 گیگابایت</a></div>
                        <div class="c-product-box__title-en">Huawei P Smart 2019 Dual SIM 64GB Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #2196f3;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه
                        </label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۲,۷۱۹,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه مدیاپردازش
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 64 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 3 گیگابایت</li>
                        <li>رزولوشن عکس: 13.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="558310" data-index="8" data-title-fa="گوشی موبایل هوآوی مدل Y7 Prime 2018 دو سیم کارت"
                 data-title-en="Huawei Y7 Prime 2018 Dual SIM Mobile Phone" data-price="۲,۳۳۴,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:558310,&quot;name&quot;:&quot;گوشی موبایل هوآوی مدل Y7 Prime 2018 دو سیم کارت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Huawei&quot;,&quot;variant&quot;:3721443,&quot;price&quot;:23340000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دی جی لند پلاس
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:558310,&quot;position&quot;:8,&quot;product_url&quot;:&quot;/product/dkp-558310/گوشی-موبایل-هوآوی-مدل-y7-prime-2018-دو-سیم-کارت&quot;}"
                   href="/product/dkp-558310/گوشی-موبایل-هوآوی-مدل-y7-prime-2018-دو-سیم-کارت" dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/2310961.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل هوآوی مدل Y7 Prime 2018 دو سیم کارت"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-558310/گوشی-موبایل-هوآوی-مدل-y7-prime-2018-دو-سیم-کارت"
                                    target="_blank" dideo-checked="true">گوشی موبایل هوآوی مدل Y7 Prime 2018 دو سیم
                                کارت</a></div>
                        <div class="c-product-box__title-en">Huawei Y7 Prime 2018 Dual SIM Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #2196f3;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #c99212;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #212121;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه</label><input type="button" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۲,۳۳۴,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دی جی لند پلاس
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه مدیاپردازش
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 32 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 3 گیگابایت</li>
                        <li>رزولوشن عکس: 13.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>
        <li>
            <div class="c-product-box c-promotion-box js-product-box
        has-more

         is-plp" data-id="974308" data-index="9"
                 data-title-fa="گوشی موبایل اپل مدل iPhone XS Max دو سیم‌ کارت ظرفیت 256 گیگابایت"
                 data-title-en="Apple iPhone XS Max Dual SIM 256GB Mobile Phone" data-price="۱۹,۶۷۹,۰۰۰"
                 data-enhanced-ecommerce="{&quot;id&quot;:974308,&quot;name&quot;:&quot;گوشی موبایل اپل مدل iPhone XS Max دو سیم‌ کارت ظرفیت 256 گیگابایت&quot;,&quot;category&quot;:&quot;گوشی موبایل&quot;,&quot;brand&quot;:&quot;Apple&quot;,&quot;variant&quot;:2005167,&quot;price&quot;:196790000,&quot;quantity&quot;:0}">
                <div class="c-product__seller-details c-product__seller-details--item-grid"><span
                            class="c-product__main-seller js-seller-text"><span class="c-product__seller-details-label">فروشنده: </span>
                        دیجی‌کالا
                    </span><span class="c-product__seller-details-badge-container"></span></div>
                <a class="c-product-box__img c-promotion-box__image js-url js-product-item " target="_blank"
                   data-snt-event="dkProductClicked"
                   data-snt-params="{&quot;productId&quot;:974308,&quot;position&quot;:9,&quot;product_url&quot;:&quot;/product/dkp-974308/گوشی-موبایل-اپل-مدل-iphone-xs-max-دو-سیم-کارت-ظرفیت-256-گیگابایت&quot;}"
                   href="/product/dkp-974308/گوشی-موبایل-اپل-مدل-iphone-xs-max-دو-سیم-کارت-ظرفیت-256-گیگابایت"
                   dideo-checked="true"><img
                            src="https://dkstatics-public.digikala.com/digikala-products/4560689.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"
                            alt="گوشی موبایل اپل مدل iPhone XS Max دو سیم‌ کارت ظرفیت 256 گیگابایت"
                            data-second-src="https://dkstatics-public.digikala.com/digikala-products/4560837.jpg?x-oss-process=image/resize,m_lfit,h_500,w_500/quality,q_80"></a>
                <div class="c-product-box__content">
                    <div class="c-product-box__content--row">
                        <div class="c-product-box__title"><a
                                    href="/product/dkp-974308/گوشی-موبایل-اپل-مدل-iphone-xs-max-دو-سیم-کارت-ظرفیت-256-گیگابایت"
                                    target="_blank" dideo-checked="true">گوشی موبایل اپل مدل iPhone XS Max دو سیم‌ کارت
                                ظرفیت 256 گیگابایت</a></div>
                        <div class="c-product-box__title-en">Apple iPhone XS Max Dual SIM 256GB Mobile Phone</div>
                        <ul class="c-product-box__variants" data-title="رنگ ها:">
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #c99212;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #9E9E9E;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                            <li><span class="c-variant c-variant--color"
                                      style="background-color: #dedede;border: 1px solid rgb(233, 233, 233);"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-product-box__rate-comparision"><label
                                class="c-ui-checkbox-min c-product-box__compare-action c-product-box__rate-comparision--comparision js-product-compare-btn"><input
                                    type="checkbox" name="compare" id="" value="0"><span></span>
                            مقایسه</label><input type="button" class="btn_cart" class="btn_cart" id="btn_cart" value="میخریم"></div>
                    <div class="c-product-box__row c-product-box__row--price">
                        <div class="c-price">
                            <div class="c-price__value c-price__value--plp">
                                <div class="c-price__value-wrapper">
                                    ۱۹,۶۷۹,۰۰۰ <span class="c-price__currency">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="c-product-box__tags ">
                        <div class="c-product-box__tags-container"></div>
                        <ul class="c-product__seller-details c-product__seller-details--item">
                            <li class="c-product__main-seller js-seller-text">
                                دیجی‌کالا
                            </li>
                            <li class="c-product__main-guarantee">
                                گارانتی 18 ماهه هما تلکام
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="c-product-box__params "><span>ویژگی‌ها</span>
                    <ul>
                        <li>حافظه داخلی: 256 گیگابایت</li>
                        <li>شبکه های ارتباطی: 2G,3G,4G</li>
                        <li>مقدار RAM: 4 گیگابایت</li>
                        <li>رزولوشن عکس: 12.0 مگاپیکسل</li>
                    </ul>
                </div>
            </div>
        </li>

    </ul>
    <script>
        // $(document).on( '.has-more', function () {
function ff1() {
    var src=document.querySelector("div img").src;
    alert('srcmassod='+src);
}
            // alert('dd='+idid);

        $(document).on('click', '#btn_cart', function () {
            var idid=$(this).parents('.has-more').attr('data-id');
            // alert('id='+idid);
            // $('.dropdown').val('sss');
            var addnum=$('.add_num').text();
            // alert('addnum='+addnum);

            addnum=Number(addnum);
            addnum=addnum+1;
            $('.add_num').text(addnum);
            // alert('addnum='+addnum);

            var value = $('.js-url').attr('href'); // = 9
            var srcimg = document.querySelectorAll('img').src;
            alert('src='+srcimg);
            // = 9
// alert(value);
            var ul=document.getElementById('ul-sabad');
var li = document.createElement("li");
var aa = document.createElement("a");
var img = document.createElement("img");
// document.write(li);
aa.setAttribute('href',idid);
aa.innerHTML=idid;
li.appendChild(aa);
// li.innerHTML="salal";
ul.appendChild(li);
            // alert(li);          // do something with the value here...
        });
       //  $('.btn_cart').click(function () {
       //      $(this).parents('.has-more');
       //  })
// });
    </script>
</div>

</body>
</html>

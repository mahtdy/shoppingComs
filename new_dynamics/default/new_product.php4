<!--<script src="../../yep_theme/default/rtl/css/doctor/jquery.min.js"></script>-->
<!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/M_style.css">-->
<!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/select3.css"/>-->
<!--    <script src="../../yep_theme/default/rtl/js/select2.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="../../yep_theme/default/rtl/css/doctor/bootstrap.min.js"></script>-->
<!--<script src="../../yep_theme/default/rtl/css/doctor/jquery.min.js"></script>-->
<link rel="stylesheet" href="../../yep_theme/default/rtl/css/M_style.css">
<!--<link rel="stylesheet" href="../../yep_theme/default/rtl/css/select3.css"/>-->
<!--    <script src="../../yep_theme/default/rtl/js/select2.js"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
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

<!--<style>-->
<!--    * {-->
<!--        box-sizing: border-box;-->
<!--    }-->
<!---->
<!--    body {-->
<!--        margin: 0;-->
<!--    }-->
<!---->
<!--    .navbar {-->
<!--        overflow: hidden;-->
<!--        background-color: #333;-->
<!--        font-family: Arial, Helvetica, sans-serif;-->
<!--    }-->
<!---->
<!--    .navbar a {-->
<!--        float: left;-->
<!--        font-size: 16px;-->
<!--        color: white;-->
<!--        text-align: center;-->
<!--        padding: 14px 16px;-->
<!--        text-decoration: none;-->
<!--    }-->
<!---->
<!--    .dropdown {-->
<!--        float: left;-->
<!--        overflow: hidden;-->
<!--    }-->
<!---->
<!--    .dropdown .dropbtn {-->
<!--        font-size: 16px;-->
<!--        border: none;-->
<!--        outline: none;-->
<!--        color: white;-->
<!--        padding: 14px 16px;-->
<!--        background-color: inherit;-->
<!--        font: inherit;-->
<!--        margin: 0;-->
<!--    }-->
<!---->
<!--    /*.navbar a:hover, .dropdown:hover .dropbtn {*/-->
<!--    /*background-color: red;*/-->
<!--    /*}*/-->
<!---->
<!--    .dropdown-content {-->
<!--        display: none;-->
<!--        position: absolute;-->
<!--        background-color: #f9f9f9;-->
<!--        width: 30%;-->
<!--        left: 0;-->
<!--        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);-->
<!--        z-index: 1;-->
<!--    }-->
<!---->
<!--    .dropdown-content .header {-->
<!--        background: red;-->
<!--        /*padding: 16px;*/-->
<!--        /*color: white;*/-->
<!--    }-->
<!---->
<!--    .dropdown:hover .dropdown-content {-->
<!--        display: block;-->
<!--    }-->
<!---->
<!--    /* Create three equal columns that floats next to each other */-->
<!--    .column {-->
<!--        float: right;-->
<!--        width: 100%;-->
<!--        padding: 10px;-->
<!--        background-color: #ccc;-->
<!--        height: 250px;-->
<!--    }-->
<!---->
<!--    .column a {-->
<!--        float: none;-->
<!--        color: black;-->
<!--        padding: 16px;-->
<!--        text-decoration: none;-->
<!--        display: block;-->
<!--        text-align: left;-->
<!--    }-->
<!---->
<!--    .column a:hover {-->
<!--        background-color: #ddd;-->
<!--    }-->
<!---->
<!--    /* Clear floats after the columns */-->
<!--    .row:after {-->
<!--        content: "";-->
<!--        display: table;-->
<!--        clear: both;-->
<!--    }-->
<!--</style>-->
<?


//echo 'new_dynamics/defult/new_product.php4';
//echo 'ff';
$type=4;

@session_start();
if($madual_page_id=='')
    $madual_page_id=1;
$paging=($madual_page_id*9)-8;
$_SESSION['content_order']=1;
view_module(4,$coms_conect);
?>
<section class="breadcrumb-sec animated fadeIn">
    <div class="container">
        <ol class="breadcrumb rtl">
            <li><a href="/"><span class="fa fa-home"></span></a></li>
            <li class="active"><a href='<?="/product/$madual_lang"?>'><?=$view_product_list?></a></li>
<!--            --><?//=$view_product_list;?>
        </ol>
    </div>
</section>
<!-- Start Page Title -->
<div class="ptitle">
    <div class="container">
        <span class="fa fa-newspaper-o"></span>
        <h1 class="title"><?=$view_product_list?></h1>
        <span class="pdesc"> </span>
    </div>
</div>
<!-- End Page Title -->
<div class="container">
    <main>
        <div class="navbar">

            <div class="dropdown"  >
                <button class="dropbtn " id="list_sabad">سبد خرید
                    <i class=" add_num">0</i>
                    کالا
                    <i class=" fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" >
                    <div class="header sabad" >
                        <h2>لیست خرید</h2>
                    </div>

                    <div class="row" id="matn_sabad">
                        <div id="lis_sabad" class="column col-md lis_sabad">
                            <!--                    <h3>Category 1</h3>-->
<!--                            <ul class="ul-sabad" id="ul-sabad">-->
<!--                                <li>-->
<!---->
<!--                                    <a href="#">کالای اول<img src="image/12.png" alt=""></a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="#"><img src="image/1111.jpg" alt="">کالای دوم</a>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <a href="#">کالای سوم</a>-->
<!--                                </li>-->
<!--                           </ul>-->
                        </div>

                    </div>
                    <form class="form-horizontal" id="content_search" name="content_search"
                          action="/cart/fa" role="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="list_arr" id="list_arr" value="">
                        <input type="hidden" name="food_arr" id="food_arr" value="" >
                        <a  ><button type="submit" value="/cart/fa" id="sabt_buy">ثبت خرید</button></a>
                    </form>
                </div>
            </div>
        </div>

    </main>
<!--    <script>-->
<!--        $('#list_sabad').click(function () {-->
<!--            // alert('sa');-->
<!--            // $(this).hide();-->
<!--            $('#matn_sabad').show();-->
<!---->
<!--        });-->
<!--    </script>-->
  <?
   $sql1 = "select * from new_product a, new_file_path b WHERE a.id=b.id AND b.type=4 ORDER BY a.id DESC";
  $result = $coms_conect->query($sql1);
  while ($RS1 = $result->fetch_assoc()) {


  ?>
    <div class="row" style="padding-top:10px; margin-bottom:10px; border-top:#dddddd 1px solid;">
        <div class="col-md-3 col-sm-3 col-xs-6"><?=$RS1['id']?>
            <img id="<?=$RS1['id']?>" src="<?=$RS1['adress']?>" width="134" height="97" style="border:#666 1px solid;" alt="">

        </div>
        <div class="col-md-4 col-sm-3 col-xs-6" style="min-height:97px;">
            <span id="<?=$RS1['id']?>"><?=$RS1['title'];?></span>
            <br>
            <span style="font-size:10pt;color: #666;"><?=$RS1['text']?></span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-nowrap text-center"  id="p<?=$RS1['id']?>" style="margin-top:8px;"> تومان <?=$RS1['price'];?></div>
        <div class="col-md-2 col-sm-3 col-xs-6" style="margin-top:8px;font-size: 18px;">
            <a onclick="addfood('<?=$RS1['id']?>','<?=$RS1['title']?>','p<?=$RS1['id']?>')" dideo-checked="true">
                <i class="fa fa-plus-square fa-lg" style="cursor: pointer; cursor: hand; font-size:1.6em;margin-left: 5px"></i>
            </a>
        </div>
    </div>
    <?}?>
    <div id="pishfaktor">
<!--        <div id="majmoo"></div>-->
<!--        <div id="vat"></div>-->
<!--        <div id="majmookol"></div>-->
  <!--      <div id="ted"<?=$RS1['id']?>></div>
        <div id="tedfood<?=$RS1['id']?>"></div> -->
    </div>
    <script>

        //  function num_farsi(srt){
        //   var en_num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        //   var fa_num = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        //     return str.replace(en_num, fa_num);
        // }
    var foodids = [];
    var sabt_arr_ids = [];
    // var i=0;
    function addfood(id,f1,p1) {
        // alert  ('id='+id+'f1='+f1+'p1='+p1);
        var foodname = document.getElementById(id).innerHTML;
        var srcimg = $('img#'+id+'').attr('src');
        // var srcimg = document.querySelectorAll('img').src;
        var pricename = document.getElementById(p1).innerHTML;


        // alert('srcimg='+srcimg);

        pricename = pricename.replace(/,/g, "");
        pricename = pricename.replace("تومان", "");
        pricename =fixPersianNumber(pricename);
            // alert('pp='+pricename+1);

            var a = foodids.indexOf(id);

            if (a==-1) {

                foodids.push(id);

                document.getElementById("lis_sabad").innerHTML +='<div id="majmoo"></div><div class="tedfood'+id+'[0]" id=""></div><div id="majmookol"></div>' +
                    '<div class="leftmr" id="kol'+id+'"><a onClick="delElement(kol'+id+','+id+')" ><i class="fa fa-times-circle-o fa-lg" style="cursor: pointer; cursor: hand;"></i></a>' +
                    '<input  type="hidden" class="jjj" name="'+id+'" id="inp'+id+'" value="1">'+foodname+'<div class="text-left tfn" ><img src="'+srcimg+'" alt="'+foodname+'" width="40" height="40" style="border:#666 1px solid;">' +
                    '<div class="pull-right" id="price'+id+'">'+pricename+'</div>' +
                    '<a onClick="increase('+id+')">' +
                    '<i class="fa fa-plus-square fa-lg" style="cursor: pointer; cursor: hand;"></i></a>  ' +
                    '<span  style="font-size: 20px;"  id="ted'+id+'">1</span> ' +
                    ' <a onClick="decrease('+id+')">' +
                    '<i class="fa fa-minus-square fa-lg" style="cursor: pointer; cursor: hand;">' +
                    '</i></a><br><br></div></div>';
                // var tes=Number(pricename);
                // alert('tes='+tes);
                var j=Number(document.getElementById("majmoo").innerHTML)+Number(pricename);
                // alert('j='+j);

                document.getElementById("majmoo").innerHTML=j;

                // var j2=Math.round(j*0/100);
                // alert('j2='+j2);
                //
                // document.getElementById("vat").innerHTML=j2;

                // document.getElementById("majmookol").value=j2+j;
                document.getElementById("majmookol").value=j;

                var bb=Number(document.getElementById("ted"+id).innerHTML);

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=bb;
                //
                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=bb;
                // sabt_arr_ids={"id="+id,"ted="+ted}

            } else {

                var b=Number(document.getElementById("ted"+id).innerHTML)+1;
                // alert('b='+b);

                document.getElementById("ted"+id).innerHTML=b;

                document.getElementById("inp"+id).value=b;



                var j=Number(document.getElementById("majmoo").innerHTML)+Number(pricename);

                document.getElementById("majmoo").innerHTML=j;

                // var j2=Math.round(j*0/100);
                //
                // document.getElementById("vat").innerHTML=j2;

                // document.getElementById("majmookol").value=j2+j;
                document.getElementById("majmookol").value=j;

                var bb=Number(document.getElementById("ted"+id).innerHTML);

//    console.log(bb);

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=bb;

                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=bb;

            }



        }
    function increase(id) {

        var b=Number(document.getElementById("ted"+id).innerHTML)+1;

        document.getElementById("ted"+id).innerHTML=b;

        document.getElementById("inp"+id).value=b;

        var k=Number(document.getElementById("majmoo").innerHTML)+Number(document.getElementById("price"+id).innerHTML);

        document.getElementById("majmoo").innerHTML=k;

        // var k2=Math.round(k*0/100);
        //
        // document.getElementById("vat").innerHTML=k2;
        //
        // document.getElementById("majmookol").value=k2+k;
        document.getElementById("majmookol").value=k;

        // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
        //
        // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

    }
        function decrease(id) {

            var b=Number(document.getElementById("ted"+id).innerHTML)-1;

            var z=Number(document.getElementById("majmoo").innerHTML)-Number(document.getElementById("price"+id).innerHTML);

            document.getElementById("majmoo").innerHTML=z;

            // var z2=Math.round(z*0/100);
            //
            // document.getElementById("vat").innerHTML=z2;
            //
            // document.getElementById("majmookol").value=z2+z;
            document.getElementById("majmookol").value=+z;

            if (b==0) {

//document.getElementById("kol"+id).innerHTML='';



                removeElement( document.getElementById("kol"+id));

                var c = foodids.indexOf(id);

                foodids.splice(c, 1);

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
                //
                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

            } else {

                document.getElementById("ted"+id).innerHTML=b;

                document.getElementById("inp"+id).value=b;

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
                //
                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

            }

        }
        function delElement(element,id=0) {
        // alert('ele='+element+id);
            // var b33=document.getElementById("ted"+id).innerHTML;
            // alert('b33='+b33);

            var b=Number(document.getElementById("ted"+id).innerHTML);
            // alert('b='+b);
            if (b>0){
                var bbb=(b*Number(document.getElementById("price"+id).innerHTML));
                var ccc=Number(document.getElementById("majmoo").innerHTML);
                // alert('b*='+bbb);
                // alert('c*='+ccc);
            var z=Number(document.getElementById("majmoo").innerHTML)-(b*Number(document.getElementById("price"+id).innerHTML));
            // alert('z='+z);
            if(z<0)z=0;
            document.getElementById("majmoo").innerHTML=z;
            document.getElementById("majmookol").value=+z;


            document.getElementById("ted"+id).innerHTML=0;
            var c = foodids.indexOf(id);

            foodids.splice(c, 1);
        }



            element && element.parentNode && element.parentNode.removeChild(element);

        }
        function removeElement(element) {
            // alert('ele='+element+id);
            // var b33=document.getElementById("ted"+id).innerHTML;
            // alert('b33='+b33);

            // var b=Number(document.getElementById("ted"+id).innerHTML);
            // // alert('b='+b);
            // if (b>0){
            //     // var bbb=(b*Number(document.getElementById("price"+id).innerHTML));
            //     // var ccc=Number(document.getElementById("majmoo").innerHTML);
            //     // alert('b*='+bbb);
            //     // alert('c*='+ccc);
            //     var z=Number(document.getElementById("majmoo").innerHTML)-(b*Number(document.getElementById("price"+id).innerHTML));
            //     // alert('z='+z);
            //     // if(z<0)z=0;
            //     document.getElementById("majmoo").innerHTML=z;
            //     document.getElementById("majmookol").value=+z;
            //
            //
            //     document.getElementById("ted"+id).innerHTML=0;
            //     var c = foodids.indexOf(id);
            //
            //     foodids.splice(c, 1);
            // }



            element && element.parentNode && element.parentNode.removeChild(element);

        }
    </script>

    <script>

        // var j=0;
        $('#sabt_buy').click(function () {
            var list_list=[];
            // list_list=document.querySelectorAll("input.jjj");
            $('.jjj').each(function () {
                list_list.push(($(this).attr('name'))+':'+($(this).attr('value')));
            });
            // alert('i='+list_list);
            // alert('foodid='+foodids);
            console.log(list_list);
            console.log(foodids);
            // $().redirect('new_cart.php4', {'action': 'ok_sabt', 'list_list': list_list});
            var url=$(this).val();
            // window.location = "/cart/fa";
            // alert('url='+url);
            // var ss=list_list.toString();
            var sss=foodids.toString();

            $('#list_arr').val(list_list);
            $('#food_arr').val(foodids);
            // $('#sabt_buy').submit;

            // alert('ss='+ss);
            // alert('sss='+sss);

            // $.ajax({
            //     type: 'POST',
            //     url: url,
            //     data: { action: 'ok_sabt', list_list: list_list , foodids: foodids},
            //     success: function () {
            //         // alert(result);
            //         // location.href="/cart/fa"+data;
            //         window.location = "/cart/fa";
            // //         // $("#show_waiting_search").hide();
            // //         // $("#show_related").html(result);
            // //         // $("#related_search").val('');
            //     }
            // });
            // $.post(url, {action: "ok_sabt", list_list: "list_list"});
            //     $("span").html(result);
            // });
// $.post('new_cart.php4',{'action':'ok_sabt'},function () {
//     window.location = url;
// });
            // list_list+=i;

            // var i;
            // for (i = 0; i < list_list.length; i++) {
            //
            //     alert('ss'+i+'='+list_list[i]);
            // }
        });
    </script>

    <!-- end main row -->

    <!-- end main -->
</div>
<!-- End main container -->
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">

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
<form class="form-horizontal" id="content_search" name="content_search"
      action="/test/cart/test/php/send.php" role="form" method="post" enctype="multipart/form-data">

<div class="row" style="padding-top:10px; margin-bottom:10px; border-top:#dddddd 1px solid;">
    <div class="container">
        <h2>ارسال سفارش</h2>
        <p>لیست محصلات سفارش شده شما</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>محصول</th>
                <th>تصویر محصول</th>
                <th>تعداد</th>
                <th>(تومان)قیمت</th>
                <th>(تومان)قیمت کل</th>
            </tr>
            </thead>

<!--            $int = (int)$num;-->
<?
$_SESSION['list-val'];
$list_arr=injection_replace($_POST['list_arr']);
$food_arr=injection_replace($_POST['food_arr']);
$list_arr=explode(',', $list_arr);
$sum=0;
//echo $food_arr;
//
//    print_r($list_arr);
//    print_r($food_arr);
for ($i=0;$i<count($list_arr);$i++){
    ?><tbody><tr><?
//{ echo $i.'=';
//echo $list_arr[$i].'<br>';
$list_i=explode(':', $list_arr[$i]);
//echo $list_i[0].'<->'.$list_i[1].'<br>';
$sql1 = "select * from new_product a, new_file_path b WHERE a.id=b.id AND a.id='$list_i[0]' AND b.type=4 ORDER BY a.id DESC";
$result = $coms_conect->query($sql1);
while ($RS1 = $result->fetch_assoc()) {


    ?>



                    <td><?=$i+1?></td>
                    <td><?=$RS1['title'];?></td>
                    <td> <img id="<?=$RS1['id']?>" src="<?=$RS1['adress']?>" width="40" height="40" style="border:#666 1px solid;" alt=""></td>
                    <td>
    <a onClick="increase(<?=$list_i[0];?>)">
    <i class="fa fa-plus-square fa-lg" style="cursor: pointer; cursor: hand;"></i></a>
    <span  style="font-size: 20px;" class="ddd" data-name="<?=$list_i[0];?>" id="ted<?=$list_i[0];?>"><?=$list_i[1] ?></span>
    <a onClick="decrease(<?=$list_i[0];?>)">
    <i class="fa fa-minus-square fa-lg" style="cursor: pointer; cursor: hand;"></i></a></td>
                    <td id="price<?=$list_i[0];?>"><?=$RS1['price'];?></td>
                       <td id="majmoo<?=$list_i[0];?>"><?=((int)$list_i[1]*$RS1['price']); $sum+=((int)$list_i[1]*$RS1['price']);?></td>


<?}?>

<?
}
?>

            </tr>
            <td>جمع کل</td>
            <td id="majmookol"><?=$sum ;?></td>
            </tbody>
    </table>
</div>

    <input type="hidden" id="list_list" name="list_list" value="">
    <input type="hidden" id="list_id" name="list_id" value="">
    <input type="hidden" id="sum" name="sum" value="">

<div>
    <div>
        <label for="name-family">نام و نام خانوادگی</label>
        <input type="text" id="name-family" name="name_family">
    </div>
    <div>
        <label for="mobile"> شماره تلفن همراه</label>
        <input type="text" id="mobile" name="mobile">
    </div>
    <div>
        <label for="address">آدرس سفارش</label>
        <input type="text" id="address" name="address">
    </div>
    <div>
        <label for="text">توضیحات</label>
        <input type="text" id="text" name="text">
    </div>
    <div>
        <label for="offs">کد تخفیف</label>
        <input type="text" id="offs" name="offs">
        <input type="button" value="اعمال تخفیف">
    </div>
    <div>
        <label>روش پرداخت</label>
        <input type="radio" name="mellat" id="mellat" checked><label for="mellat">درگاه بانک ملت</label>
        <input type="radio" name="mellat" id="pasargad"><label for="pasargad">درگاه بانک پاسارگاد</label>
    </div>
    <div>

        <input type="submit" id="sub_sabt" name="" value="ثبت سفارش" >
    </div>



</div>


</form>
<script>
    $('#sub_sabt').click(function () {
        var list_list=[];
        var list_id=[];
        $('.ddd').each(function () {
            list_list.push($(this).attr('data-name')+':'+$(this).text());
            list_id.push($(this).attr('data-name'));
        });
        $('#list_list').val(list_list);
        $('#list_id').val(list_id);
        $('#sum').val($('#majmookol').text());
        // $.session.set("list_val",list_list);
        // alert('lislis='+list_list);
    });

</script>

    <script>

        //  function num_farsi(srt){
        //   var en_num = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        //   var fa_num = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        //     return str.replace(en_num, fa_num);
        // }
    var foodids = [];

//     function addfood(id,f1,p1) {
//         // alert  ('id='+id+'f1='+f1+'p1='+p1);
//
//         var foodname = document.getElementById(id).innerHTML;
//         var srcimg = $('img#'+id+'').attr('src');
//         // var srcimg = document.querySelectorAll('img').src;
//         var pricename = document.getElementById(p1).innerHTML;
//
//
//         // alert('srcimg='+srcimg);
//
//         pricename = pricename.replace(/,/g, "");
//         pricename = pricename.replace("تومان", "");
//         pricename =fixPersianNumber(pricename);
//             // alert('pp='+pricename+1);
//
//             var a = foodids.indexOf(id);
//
//             if (a==-1) {
//
//                 foodids.push(id);
//
//                 document.getElementById("lis_sabad").innerHTML +='<button id="sabt_buy">ثبت خرید</button><div id="majmoo"></div><div class="tedfood'+id+'[0]" id=""></div><div id="majmookol"></div>' +
//                     '<div class="leftmr" id="kol'+id+'"><a onClick="removeElement(kol'+id+','+id+')" ><i class="fa fa-times-circle-o fa-lg" style="cursor: pointer; cursor: hand;"></i></a>' +
//                     '<input type="hidden" name="'+id+'" id="inp'+id+'" value="1">'+foodname+'<div class="text-left tfn"><img src="'+srcimg+'" alt="'+foodname+'" width="40" height="40" style="border:#666 1px solid;">' +
//                     '<div class="pull-right" id="price'+id+'">'+pricename+'</div>' +
//                     '<a onClick="increase('+id+')">' +
//                     '<i class="fa fa-plus-square fa-lg" style="cursor: pointer; cursor: hand;"></i></a>  ' +
//                     '<span  style="font-size: 20px;"  id="ted'+id+'">1</span> ' +
//                     ' <a onClick="decrease('+id+')">' +
//                     '<i class="fa fa-minus-square fa-lg" style="cursor: pointer; cursor: hand;">' +
//                     '</i></a><br><br></div></div>';
//                 // var tes=Number(pricename);
//                 // alert('tes='+tes);
//                 var j=Number(document.getElementById("majmoo").innerHTML)+Number(pricename);
//                 // alert('j='+j);
//
//                 document.getElementById("majmoo").innerHTML=j;
//
//                 // var j2=Math.round(j*0/100);
//                 // alert('j2='+j2);
//                 //
//                 // document.getElementById("vat").innerHTML=j2;
//
//                 // document.getElementById("majmookol").value=j2+j;
//                 document.getElementById("majmookol").value=j;
//
//                 var bb=Number(document.getElementById("ted"+id).innerHTML);
//
//                 // document.getElementsByClassName("tedfood"+id)[0].innerHTML=bb;
//                 //
//                 // document.getElementsByClassName("tedfood"+id)[1].innerHTML=bb;
//
//             } else {
//
//                 var b=Number(document.getElementById("ted"+id).innerHTML)+1;
//                 // alert('b='+b);
//
//                 document.getElementById("ted"+id).innerHTML=b;
//
//                 document.getElementById("inp"+id).value=b;
//
//
//
//                 var j=Number(document.getElementById("majmoo").innerHTML)+Number(pricename);
//
//                 document.getElementById("majmoo").innerHTML=j;
//
//                 // var j2=Math.round(j*0/100);
//                 //
//                 // document.getElementById("vat").innerHTML=j2;
//
//                 // document.getElementById("majmookol").value=j2+j;
//                 document.getElementById("majmookol").value=j;
//
//                 var bb=Number(document.getElementById("ted"+id).innerHTML);
//
// //    console.log(bb);
//
//                 // document.getElementsByClassName("tedfood"+id)[0].innerHTML=bb;
//
//                 // document.getElementsByClassName("tedfood"+id)[1].innerHTML=bb;
//
//             }



        // }
    function increase(id) {

        var b=Number(fixPersianNumber(document.getElementById("ted"+id).innerHTML))+1;
        // alert('b='+b);

        document.getElementById("ted"+id).innerHTML=b;

        // document.getElementById("inp"+id).value=b;

        var k=Number(fixPersianNumber(document.getElementById("majmoo"+id).innerHTML))+Number(fixPersianNumber(document.getElementById("price"+id).innerHTML));
        // alert('k='+k);
        document.getElementById("majmoo"+id).innerHTML=k;
        var f=Number(fixPersianNumber(document.getElementById("price"+id).innerHTML));
        // var k2=Math.round(k*0/100);
        //
        // document.getElementById("vat").innerHTML=k2;
        //
        // document.getElementById("majmookol").value=k2+k;
        document.getElementById("majmookol").innerHTML=Number(fixPersianNumber(document.getElementById("majmookol").innerHTML))+f;

        // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
        //
        // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

    }
        function decrease(id) {
            var b=Number(fixPersianNumber(document.getElementById("ted"+id).innerHTML));
         if (b==0 || b<0) {

//document.getElementById("kol"+id).innerHTML='';
                document.getElementById("ted"+id).innerHTML=0;


                // removeElement( document.getElementById("kol"+id) );

                var c = foodids.indexOf(id);

                foodids.splice(c, 1);

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
                //
                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

            } else{
             var b=Number(fixPersianNumber(document.getElementById("ted"+id).innerHTML))-1;

             var z=Number(fixPersianNumber(document.getElementById("majmoo"+id).innerHTML))-Number(fixPersianNumber(document.getElementById("price"+id).innerHTML));

             document.getElementById("majmoo"+id).innerHTML=z;
             var f=Number(fixPersianNumber(document.getElementById("price"+id).innerHTML));

             // var z2=Math.round(z*0/100);
             //
             // document.getElementById("vat").innerHTML=z2;
             //
             // document.getElementById("majmookol").value=z2+z;
             document.getElementById("majmookol").innerHTML=Number(fixPersianNumber(document.getElementById("majmookol").innerHTML))-f;



             document.getElementById("ted"+id).innerHTML=b;

                // document.getElementById("inp"+id).value=b;

                // document.getElementsByClassName("tedfood"+id)[0].innerHTML=b;
                //
                // document.getElementsByClassName("tedfood"+id)[1].innerHTML=b;

            }

        }
        function removeElement(element,id) {
        // alert('ele='+element);
            var b=Number(document.getElementById("ted"+id).innerHTML);
            // alert('b='+b);
            if (b>0){
            var z=Number(document.getElementById("majmoo").innerHTML)-(b*Number(document.getElementById("price"+id).innerHTML));
            document.getElementById("majmoo").innerHTML=z;
            document.getElementById("majmookol").value=+z;


            document.getElementById("ted"+id).innerHTML=0;
            var c = foodids.indexOf(id);

            foodids.splice(c, 1);
        }



            element && element.parentNode && element.parentNode.removeChild(element);

        }

    </script>



    <!-- end main row -->

    <!-- end main -->
</div>
<!-- End main container -->
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
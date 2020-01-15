{{--@extends('layouts.1.index')--}}
{{--@section('headers')--}}
{{--@extends('index.header')--}}
{{--@endsection--}}
{{----------------------------------------}}

{{-----------------------------------}}
{{--@section('head')--}}
{{--<meta name="csrf-token" content="{{csrf_token()}}">--}}
{{--@endsection--}}
{{-----------------------------------------}}
{{--@section('menu')--}}
{{--@foreach($category as $cat)--}}
{{--<li class="dropdown ">--}}
    {{--<a href="<?=  Url('category/'. $cat->name_subjects) ;?>" class="dropdown-toggle"> {{$cat->name_subjects}} <b class="caret"></b> </a>--}}
    {{--<ul class="dropdown-menu">--}}
        {{--@foreach(getzirmenu($cat->id) as $zirmenu)--}}
            {{--<li class="dropdown">--}}
                {{--<a href="<?= Url('category/'. $zirmenu->name_subjects) ;?>">--}}
                    {{--<i class=" pull-right visible-desktop"></i>{{$zirmenu->name_subjects}}</a>--}}

            {{--</li>--}}
            {{--@endforeach--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@endforeach--}}


{{--<li><a href="about-us.html">درباره ما</a></li>--}}
{{--<li><a href="contact.html">تماس با ما</a></li>--}}
{{--@endsection--}}
{{---------------------------------------cart---------------------------------------------}}
{{--@section('cart')--}}

{{--@include('index.cart')--}}
{{--@endsection--}}
{{--@section('contentstar')--}}
{{--@include('index.contentstar')--}}
{{--@endsection--}}
{{--@section('contentnew')--}}
{{--@foreach($newcontent as $new)--}}
<div class="span3">
    <div class="product">
        <div class="product-img">
            <div class="picture">
                <img src="<?=  Url('assets/imgbooks/'.$new->img_book) ;?>"
                     alt="{{$new->name_book}}" title="{{$new->name_book}}" width="540" height="374" />
                <div class="img-overlay">
                    <a href="<?= Url('book/'.$new->url_book) ;?>" class="btn more btn-primary">توضیحات بیشتر</a>
                    @if($new->state_book =='1' or $new->state_book=='2')
                        <a href="#" class="btn buy btn-danger disabled">کتاب موجود نیست</a>
                    @else
                        <div onclick="add_cart('{{$new->id}}')" class="btn buy btn-danger">افزودن به سبد خرید</div>

                    @endif
                </div>
            </div>
        </div>
        <div class="main-titles no-margin">
            <h4 class="title">{{$new->price_book}}ریال </h4>
            <h5 class="no-margin"> کد کتاب : {{$new->id}}</h5>
        </div>
        <p class="desc">{{$new->name_book}}</p>
        <p class="center-align stars">
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>

        </p>
    </div>
</div> <!-- /product -->
{{--@endforeach--}}

{{--@endsection--}}
{{--@section('contenttop')--}}
{{--@foreach($newtop  as $top )--}}
<div class="span3">
    <div class="product">
        <div class="product-img">
            <div class="picture">
                <img src="<?= Url('assets/imgbooks/'.$top->img_book) ;?>" alt="" width="540" height="412" />
                <div class="img-overlay">
                    <a href="<?= Url('book/'.$top->url_book) ;?>" class="btn more btn-primary">توضیحات بیشتر</a>
                    @if($top->state_book =='1' or $top->state_book=='2')
                        <a href="#" class="btn buy btn-danger disabled">کتاب موجود نیست</a>
                    @else
                        <div onclick="add_cart('{{$top->id}}')" class="btn buy btn-danger">افزودن به سبد خرید</div>

                    @endif
                </div>
            </div>
        </div>
        <div class="main-titles no-margin">
            <h4 class="title">{{$top->price_book}}ریال </h4>
            <h5 class="no-margin"> کد کتاب : {{$top->id}}</h5>
            <h5 class="no-margin">  بازدید{{$top->view_book}}</h5>
        </div>
        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
        <p class="center-align stars">
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>

        </p>
    </div>
</div> <!-- /product -->
{{--@endforeach--}}



{{--@endsection--}}
{{--@section('footer')--}}
<?php   $url=Url('/add');   ?>
<script type="text/javascript">
    add_cart=function(id)
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '<?=  $url ;?>',
            type : 'POST',
            data : 'id_book=' + id,
            success : function(data)
            {
                $("div#cart").html(data);
            }
        });
    }
</script>

<!--  ---------------------------  delete------------------->
<?php   $url1=Url('/remove');   ?>
<script type="text/javascript">
    delete_book=function(id)
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '<?=  $url1 ;?>',
            type : 'POST',
            data : 'id_book=' + id,
            success : function(data)
            {
                $("div#cart").html(data);
            }
        });
    }
</script>
{{-----------------------------------------خالی کردن سبد خرید با ajax-------------------------------}}
<?php   $url11=Url('/empty');   ?>
<script type="text/javascript">
    empty_cart=function()
    {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' :$('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : '<?=  $url11 ;?>',
            type : 'POST',

            success : function(data)
            {
                $("div#cart").html(data);
            }
        });
    }
</script>
{{--@endsection--}}
<?php
//use App\SubjectsModel;
//use App\BookModel;
//function getzirmenu($id)
//{
//    $zirmenu=SubjectsModel::where('replay_subjects',$id)->get();
//    return $zirmenu;
//}
//function getstar1()
//{
//    $star1=BookModel::where('state_book','3')->orderby('id','desc')->take(3)->get();
//    return $star1;
//}
//function getstar2()
//{
//    $star2=BookModel::where('state_book','3')->orderby('id','desc')->skip(3)->take(3)->get();
//    return $star2;
//}
//
//?>
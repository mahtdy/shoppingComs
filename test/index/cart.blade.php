<?php   use App\BookModel;  ?>
@if(!empty(Session::get('cart')))
<div class="cart-container" id="cartContainer">

    <div class="open-panel">
        <?php $price=0; ?>
        @foreach(Session::get('cart') as $key=>$value)
        <div class="item-in-cart clearfix">
            <?php

                   $book=BookModel::find($key);
            ?>
            <div class="image">
                <img src="<?= Url('assets/imgbooks/'. $book->img_book ) ;?>"  width="50" height="50" title="{{$book->name_book}}" alt="{{$book->name_book}}" />
                </div>
                    <div class="desc">
                        <strong><a href="product.html">{{$book->name_book}}</a></strong>
                        <span class="light-clr qty"> تعداد : {{$value}}

                            <div onclick="delete_book({{$book->id}})" class="icon-remove-sign" title="حدف یکی از تعداد"></div>
                        </span>
                    </div>
                <div class="price">
                    <strong>{!! number_format( $book->price_book)!!}ریال</strong>
                    <?php  $price+=($value * $book->price_book)  ;?>
            </div>
        </div>
        @endforeach





        <div class="summary">
            <div class="line">
                <div class="row-fluid">
                    <div class="span6 align-right">60000ریال</div>
                    <div class="span6">هزینه ارسال :</div>

                </div>
            </div>
            <div class="line">
                <div class="row-fluid">
                    <div class="span6 align-right size-16">{!! number_format($price+60000) !!}</div>
                    <div class="span6">جمع کل :</div>

                </div>
            </div>
        </div>
        <div class="proceed">
            <a href="checkout-step-1.html" class="btn btn-danger pull-right bold higher">تصویه حساب <i class="icon-shopping-cart"></i></a>
            <div onclick="empty_cart()" class="btn btn-danger pull-right bold higher">تخلیه سبد خرید</div>

        </div>

    </div>
    <div class="cart">
        <?php $count=sizeof(Session::get('cart'))  ;?>
        <p class="items">سبد خرید <span class="dark-clr">({{$count}})</span></p>
        <p class="dark-clr hidden-tablet">{!!  number_format($price)!!}</p>
        <a href="checkout-step-1.html" class="btn btn-danger">
            <!-- <span class="icon icons-cart"></span> -->
            <i class="icon-shopping-cart"></i>
        </a>
    </div>
</div>
@else
    <div class="cart">


        <p class="dark-clr hidden-tablet">سبد خالی است.</p>
        <a href="checkout-step-1.html" class="btn btn-danger">
            <!-- <span class="icon icons-cart"></span> -->
            <i class="icon-shopping-cart"></i>
        </a>
    </div>
@endif
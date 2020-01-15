<div class="slide">
    <div class="row">

        @foreach(getstar1() as $bookstar )
        <div class="span4">
            <div class="product">
                <div class="product-img featured">
                    <div class="picture">
                        <img src="<?=  Url('assets/imgbooks/'.$bookstar->img_book) ;?>"
                             alt="{{$bookstar->name_book }}" title="{{$bookstar->name_book }}" width="518" height="358" />
                        <div class="img-overlay">
                            <a href="<?= Url('book/'.$bookstar->url_book) ;?>" class="btn more btn-primary">توضیحات بیشتر</a>
                            <div onclick="add_cart('{{$bookstar->id}}')" class="btn buy btn-danger">افزودن به سبد خرید</div>
                        </div>
                    </div>
                </div>
                <div class="main-titles">
                    <h4 class="title">{{$bookstar->price_book}}ریال </h4>
                    <h5 class="no-margin"> کد کتاب : {{$bookstar->id}}</h5>
                </div>
                <p class="desc">{{$bookstar->name_book}}</p>
                <p class="center-align stars">
                    <span class="icon-star stars-clr"></span>
                    <span class="icon-star stars-clr"></span>
                    <span class="icon-star stars-clr"></span>
                    <span class="icon-star stars-clr"></span>
                    <span class="icon-star stars-clr"></span>

                </p>
            </div>
        </div> <!-- /product -->
        @endforeach

    </div>
</div>

<div class="slide">
    <div class="row">

        @foreach(getstar2() as $bookstar2 )
            <div class="span4">
                <div class="product">
                    <div class="product-img featured">
                        <div class="picture">
                            <img src="<?=  Url('assets/imgbooks/'.$bookstar2->img_book) ;?>"
                                 alt="{{$bookstar2->name_book }}" title="{{$bookstar2->name_book }}" width="518" height="358" />
                            <div class="img-overlay">
                                <a href="<?= Url('book/'.$bookstar2->url_book) ;?>" class="btn more btn-primary">توضیحات بیشتر</a>
                                <div onclick="add_cart('{{$bookstar2->id}}')" class="btn buy btn-danger">افزودن به سبد خرید</div>
                            </div>
                        </div>
                    </div>
                    <div class="main-titles">
                        <h4 class="title">{{$bookstar2->price_book}}ریال </h4>
                        <h5 class="no-margin"> کد کتاب : {{$bookstar2->id}}</h5>
                    </div>
                    <p class="desc">{{$bookstar2->name_book}}</p>
                    <p class="center-align stars">
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>
                        <span class="icon-star stars-clr"></span>

                    </p>
                </div>
            </div> <!-- /product -->
        @endforeach

    </div>
</div>
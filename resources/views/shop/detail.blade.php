@extends('layouts.shop-temp')

@section('content')
<div class="col-md-9 col-md-push-3">
    <div class="row">
        <div class="col-sm-6 col-xs-b30 col-sm-b0">

            <div class="main-product-slider-wrapper swipers-couple-wrapper">
                <div class="swiper-container swiper-control-top">
                 <div class="swiper-button-prev hidden"></div>
                 <div class="swiper-button-next hidden"></div>
                 <div class="swiper-wrapper">
                    @foreach($product["product_images"] as $key => $value)
                    <div class="swiper-slide">
                        <div class="swiper-lazy-preloader"></div>
                        <div class="product-big-preview-entry swiper-lazy" data-background="{{asset('storage')}}/{{$value['product_image']}}"></div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="empty-space col-xs-b30 col-sm-b60"></div>

            <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
             <div class="swiper-button-prev hidden"></div>
             <div class="swiper-button-next hidden"></div>
             <div class="swiper-wrapper">
                @foreach($product["product_images"] as $key => $value)
                <div class="swiper-slide">
                    <div class="product-small-preview-entry">
                        <img src="{{asset('storage')}}/{{$value['product_image']}}" alt="" style="width: 70px; height: 70px; " />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
<div class="col-sm-6">
    <div class="simple-article size-3 grey col-xs-b5">{{$product->category['name']}}</div>
    <div class="h3 col-xs-b25">{{$product['name']}}</div>
    <div class="row col-xs-b25">
        <div class="col-sm-7 product_price">
            @if($product->product_resolutions[0]['sale_price'] == null)
            <div class="simple-article size-5 grey">PRICE: <span class="color">{{number_format($product->product_resolutions[0]['price'])}} ₫</span></div>
            @else
            <div class="simple-article size-5 grey">SALE PRICE: <span class="color">{{number_format($product->product_resolutions[0]['sale_price'])}} ₫</span></div>
            <div class="simple-article size-5 grey">PRICE: <span class="line-through">{{number_format($product->product_resolutions[0]['price'])}} ₫</span></div>
            @endif
        </div>
        <div class="col-sm-5 col-sm-text-right">
            <div class="rate-wrapper align-inline">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            <div class="simple-article size-2 align-inline">128 Reviews</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey">{{$product['product_code']}}</span></div>
        </div>
        <div class="col-sm-6 col-sm-text-right product_stock">
            @if($product->product_resolutions[0]['stock'] == null)
            <div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">NO</span></div>
            @else
            <div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">YES</span></div>
            @endif
        </div>
    </div>
    <div class="simple-article size-3 col-xs-b30">{{$product["description"]}}</div>
    <div class="row col-xs-b40">
        <div class="col-sm-3">
            <div class="h6 detail-data-title size-1">resolution:</div>
        </div>
        <div class="col-sm-9">
            <select class="SlectBox">
                @foreach($product->product_resolutions as $value)
                <option value="{{$value["id"]}}" data-qty="{{$value["stock"]}}">{{$value["resolution_name"]}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row col-xs-b40">
        <div class="col-sm-3">
            <div class="h6 detail-data-title size-1">quantity:</div>
        </div>
        <div class="col-sm-9">
            <div class="quantity-select">
                <span class="minus"></span>
                <span class="number">1</span>
                <span class="plus"></span>
            </div>
        </div>
    </div>
    <div class="row m5 col-xs-b40">
        <div class="col-sm-6 col-xs-b10 col-sm-b0">
            <a class="button size-2 style-2 block add2cart" @if($product->product_resolutions[0]["stock"] == 0) style="display: none;" @endif href="#">
                <span class="button-wrapper">
                    <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-2.png" alt=""></span>
                    <span class="text">add to cart</span>
                </span>
            </a>
        </div>
        <div class="col-sm-6">
            <a class="button size-2 style-1 block noshadow" href="#">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    <span class="text">add to favourites</span>
                </span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="h6 detail-data-title size-2">share:</div>
        </div>
        <div class="col-sm-9">
            <div class="follow light">
                <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="tabs-block">
    <div class="tabulation-menu-wrapper text-center">
        <div class="tabulation-title simple-input">description</div>
        <ul class="tabulation-toggle">
            <li><a class="tab-menu active">description</a></li>
            <li><a class="tab-menu">technical specs</a></li>
            <li><a class="tab-menu">testimonials</a></li>
        </ul>
    </div>
    <div class="empty-space col-xs-b30 col-sm-b60"></div>

    <div class="tab-entry visible">
        <div class="row">
            <div class="col-sm-6 col-xs-b30 col-sm-b0">
                <div class="simple-article">
                    <img class="rounded-image" src="{{asset('')}}shop_assets/img/thumbnail-15.jpg" alt="" />
                </div>
                <div class="empty-space col-xs-b25"></div>
                <div class="h5">Nullam et massa nulla</div>
                <div class="empty-space col-xs-b20"></div>
                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet.</div>
            </div>
            <div class="col-sm-6">
                <div class="simple-article">
                    <img class="rounded-image" src="{{asset('')}}shop_assets/img/thumbnail-16.jpg" alt="" />
                </div>
                <div class="empty-space col-xs-b25"></div>
                <div class="h5">Vivamus ut posuere nunc</div>
                <div class="empty-space col-xs-b20"></div>
                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet.</div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="left-right-entry clearfix align-right">
            <div class="preview-wrapper">
                <img class="preview" src="{{asset('')}}shop_assets/img/thumbnail-17.jpg" alt="" />
            </div>
            <div class="description">
                <div class="h5">Aenean a tincidunt felis</div>
                <div class="empty-space col-xs-b15"></div>
                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                <div class="empty-space col-xs-b30 col-sm-b45"></div>
                <div class="h5">Nulla sed arcu ipsum</div>
                <div class="empty-space col-xs-b15"></div>
                <div class="simple-article size-2">Nullam et massa nulla. Quisque nec magna ornare tellus consequat lacinia a quis sem. Vivamus ut posuere nunc. Praesent porttitor vitae augue in semper. Vestibulum non leo et nisi facilisis consequat. Ut volutpat augue faucibus, fermentum turpis convallis, lobortis augue.</div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="left-right-entry clearfix">
            <div class="preview-wrapper">
                <img class="preview" src="{{asset('')}}shop_assets/img/thumbnail-18.jpg" alt="" />
            </div>
            <div class="description">
                <div class="h5">Aenean a tincidunt felis</div>
                <div class="empty-space col-xs-b15"></div>
                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                <div class="empty-space col-xs-b30 col-sm-b45"></div>
                <div class="h5">Nulla sed arcu ipsum</div>
                <div class="empty-space col-xs-b15"></div>
                <div class="simple-article size-2">Nullam et massa nulla. Quisque nec magna ornare tellus consequat lacinia a quis sem. Vivamus ut posuere nunc. Praesent porttitor vitae augue in semper. Vestibulum non leo et nisi facilisis consequat. Ut volutpat augue faucibus, fermentum turpis convallis, lobortis augue.</div>
            </div>
        </div>
    </div>

    <div class="tab-entry">
        <div class="h5">{{$product["name"]}}</div>
        <div class="empty-space col-xs-b15"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">Product_Code:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">{{$product["product_code"]}}</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">model:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">{{$product["model"]}}</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">Operation_system:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">{{$product["operation_system"]}}</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">cpu:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">{{$product["cpu"]}}</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">monitor:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">{{$product["monitor"]}}</div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="simple-article size-2 text-center">
                    <img src="{{asset('')}}shop_assets/img/thumbnail-19.jpg" alt="" />
                    <p><br/>Stainless Steel</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="simple-article size-2 text-center">
                    <img src="{{asset('')}}shop_assets/img/thumbnail-20.jpg" alt="" />
                    <p><br/>Space Black Stainless Steel</p>
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
        <div class="h5">watch 42mm</div>
        <div class="empty-space col-xs-b15"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">height:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">42.0mm</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">width:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">35.9mm</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">depth:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">10.5mm</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">case:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">50g</div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-6">
                <div class="product-description-entry row nopadding">
                    <div class="col-xs-6">
                        <div class="h6">material:</div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <div class="simple-article size-2">Space Black Stainless Steel</div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="empty-space col-xs-b30 col-sm-b60"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="simple-article size-2 text-center">
                    <img src="{{asset('')}}shop_assets/img/thumbnail-21.jpg" alt="" />
                    <p><br/>Stainless Steel</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="simple-article size-2 text-center">
                    <img src="{{asset('')}}shop_assets/img/thumbnail-22.jpg" alt="" />
                    <p><br/>Space Black Stainless Steel</p>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-entry">
        <div class="testimonial-entry">
            <div class="row col-xs-b20">
                <div class="col-xs-8">
                    <img class="preview" src="{{asset('')}}shop_assets/img/testimonial-1.jpg" alt="" />
                    <div class="heading-description">
                        <div class="h6 col-xs-b5">Dorian gray</div>
                        <div class="rate-wrapper align-inline">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="simple-article size-1 grey">20:45 APR 07 / 15</div>
                </div>
            </div>
            <div class="simple-article size-2 col-xs-b15">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit. </div>
            <div class="pros">
                <div class="simple-article size-2 col-xs-b15">Runc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis</div>
            </div>
            <div class="cons">
                <div class="simple-article size-2 col-xs-b25">Do not have</div>
            </div>
        </div>
        <div class="testimonial-entry">
            <div class="row col-xs-b20">
                <div class="col-xs-8">
                    <img class="preview" src="{{asset('')}}shop_assets/img/testimonial-2.jpg" alt="" />
                    <div class="heading-description">
                        <div class="h6 col-xs-b5">alan doe</div>
                        <div class="rate-wrapper align-inline">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="simple-article size-1 grey">20:45 APR 07 / 15</div>
                </div>
            </div>
            <div class="simple-article size-2 col-xs-b15">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit. </div>
            <div class="pros">
                <div class="simple-article size-2 col-xs-b15">Runc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis</div>
            </div>
            <div class="cons">
                <div class="simple-article size-2 col-xs-b25">Do not have</div>
            </div>
        </div>
        <div class="testimonial-entry">
            <div class="row col-xs-b20">
                <div class="col-xs-8">
                    <img class="preview" src="{{asset('')}}shop_assets/img/testimonial-3.jpg" alt="" />
                    <div class="heading-description">
                        <div class="h6 col-xs-b5">samantha rae</div>
                        <div class="rate-wrapper align-inline">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="simple-article size-1 grey">20:45 APR 07 / 15</div>
                </div>
            </div>
            <div class="simple-article size-2 col-xs-b15">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit. </div>
            <div class="pros">
                <div class="simple-article size-2 col-xs-b15">Runc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis</div>
            </div>
            <div class="cons">
                <div class="simple-article size-2 col-xs-b25">Do not have</div>
            </div>
        </div>
        <form>
            <div class="row m10">
                <div class="col-sm-6">
                    <input class="simple-input" type="text" value="" placeholder="Your name" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
                <div class="col-sm-6">
                    <input class="simple-input" type="text" value="" placeholder="Your name" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
                <div class="col-sm-12">
                    <input class="simple-input" type="text" value="" placeholder="Describe the pros" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
                <div class="col-sm-12">
                    <input class="simple-input" type="text" value="" placeholder="Describe cons" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
                <div class="col-sm-12">
                    <textarea class="simple-input" placeholder="Your comment"></textarea>
                    <div class="empty-space col-xs-b20"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="align-inline">
                        <div class="empty-space col-xs-b5"></div>
                        <div class="simple-article size-3">Rating&nbsp;&nbsp;&nbsp;</div>
                        <div class="empty-space col-xs-b5"></div>
                    </div>
                    <div class="rate-wrapper set align-inline">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-xs-6 text-right">
                    <div class="button size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-4.png" alt=""></span>
                            <span class="text">submit</span>
                        </span>
                        <input type="submit" value="">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="swiper-container rounded">
    <div class="swiper-button-prev style-1 hidden"></div>
    <div class="swiper-button-next style-1 hidden"></div>
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="banner-shortcode style-1">
                <div class="background" style="background-image: url({{asset('')}}shop_assets/img/thumbnail-14.jpg);"></div>
                <div class="description valign-middle">
                    <div class="valign-middle-content">
                        <div class="simple-article size-3 light fulltransparent">DON'T MISS!</div>
                        <div class="banner-title color">UP TO 70%</div>
                        <div class="h4 light">best android tv box</div>
                        <div class="empty-space col-xs-b25"></div>
                        <a class="button size-1 style-3" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-4.png" alt=""></span>
                                <span class="text">learn more</span>
                            </span>
                        </a>
                    </div>
                    <div class="empty-space col-xs-b60 col-sm-b0"></div>
                </div>
            </div>
        </div>
        <div class="swiper-slide">
            <div class="banner-shortcode style-1">
                <div class="background" style="background-image: url({{asset('')}}shop_assets/img/thumbnail-10.jpg);"></div>
                <div class="description valign-middle">
                    <div class="valign-middle-content">
                        <div class="simple-article size-3 light fulltransparent">DON'T MISS!</div>
                        <div class="banner-title color">UP TO 70%</div>
                        <div class="h4 light">best android tv box</div>
                        <div class="empty-space col-xs-b25"></div>
                        <a class="button size-1 style-3" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-4.png" alt=""></span>
                                <span class="text">learn more</span>
                            </span>
                        </a>
                    </div>
                    <div class="empty-space col-xs-b60 col-sm-b0"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>
<div class="empty-space col-md-b70"></div>

</div>
@endsection



@section('menu-left')
<div class="col-md-3 col-md-pull-9">
    <div class="h4 col-xs-b10">popular categories</div>
    <ul class="categories-menu transparent">
        @foreach($categories as $key => $category)
        @if($category["parent_id"] == null)
        <li>
            <a href="#">{{$category['name']}}</a>
            <ul>
                <?php $menu_an = ''; ?>
                @foreach($categories as $subcategory)
                @if($subcategory["parent_id"] == $category["id"])
                <li>
                    <a href="#">{{$subcategory["name"]}}</a>
                    <?php $menu_an = true; ?>
                </li>
                @endif
                @endforeach
            </ul>
            <?php if ($menu_an == true): ?>
                <div class="toggle"></div>
            <?php endif ?>
        </li>
        @endif
        @endforeach
    </ul>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Price</div>
    <div id="prices-range"></div>
    <div class="simple-article size-1">PRICE: <b class="grey">$<span class="min-price">40</span> - $<span class="max-price">300</span></b></div>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Brands</div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>LG</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>SAMSUNG</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Apple</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>HTC</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Google</span>
    </label>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Choose Color</div>
    <div class="color-selection size-1">
        <div class="entry active" style="color: #a7f050;"></div>
        <div class="entry" style="color: #50e3f0;"></div>
        <div class="entry" style="color: #eee;"></div>
        <div class="entry" style="color: #4d900c;"></div>
        <div class="entry" style="color: #edb82c;"></div>
        <div class="entry" style="color: #7d3f99;"></div>
        <div class="entry" style="color: #3481c7;"></div>
        <div class="entry" style="color: #bf584b;"></div>
    </div>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Operation System</div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Android</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>IOS</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Windows Phone</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Symbian</span>
    </label>
    <div class="empty-space col-xs-b10"></div>
    <label class="checkbox-entry">
        <input type="checkbox"><span>Blackberry OS</span>
    </label>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Popular Tags</div>
    <div class="tags light clearfix">
        @foreach($tags as $tag)
        <a class="tag">{{$tag['name']}}</a>
        @endforeach
    </div>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>


</div>
<script type="{{asset('')}}shop_assets/js/jquery.mask.min.js"></script>
@endsection

@section('footer')
<script type="text/javascript">
    $('.SlectBox').change(function(){
        var id = $(this).find('option:selected').val();

        $.ajax({
            url: '{{asset('')}}shop/detail/'+id+'/database-resolution',
            type: 'GET',
        })
        .done(function(response) {
            console.log("success");
            $('.product_price').empty();
            $('.product_stock').empty();
            if (response.product_resolution['sale_price'] == null) {
                $('.product_price').append('<div class="simple-article size-5 grey">PRICE: <span class="color price_base">'+response.price+' ₫</span></div>');
            }else {
                $('.product_price').append('<div class="simple-article size-5 grey">SALE PRICE: <span class="color price_base">'+response.sale_price+' ₫</span></div>');
                $('.product_price').append('<div class="simple-article size-5 grey">PRICE: <span class="price_base line-through">'+response.price+' ₫</span></div>');
            }
            if (response.product_resolution['stock'] == 0) {
                $('.product_stock').append('<div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">NO</span></div>');
                $('a.add2cart').css('display', 'none');
            }else {
                $('.product_stock').append('<div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">YES</span></div>');
                $('a.add2cart').css('display', 'block');
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    })
</script>
@endsection
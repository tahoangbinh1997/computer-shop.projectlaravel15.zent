@extends('layouts.shop-temp')
@section('slider-wrapper')
<div class="slider-wrapper">
    <div class="swiper-button-prev visible-lg"></div>
    <div class="swiper-button-next visible-lg"></div>
    <div class="swiper-container" data-parallax="1" data-auto-height="1">
       <div class="swiper-wrapper">
        @foreach($product_lasts as $key => $product_last)
        <div class="swiper-slide">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="cell-view page-height">
                            <div class="col-xs-b40 col-sm-b80"></div>
                            <div data-swiper-parallax-x="-600">
                                <div class="simple-article grey size-5">BEST PRICE: <span class="color">{{number_format($product_lasts[$key]['product_resolutions'][0]['price'])}} ₫</span></div>
                                <div class="col-xs-b5"></div>
                            </div>
                            <div data-swiper-parallax-x="-500">
                                <h1 class="h1">{{$product_last->name}}</h1>
                                <div class="title-underline left"><span></span></div>
                            </div>
                            <div data-swiper-parallax-x="-400">
                                <div class="simple-article size-4 grey" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;max-width: 100%;">{{$product_last['description']}}</div>
                                <div class="col-xs-b30"></div>
                            </div>
                            <div data-swiper-parallax-x="-300">
                                <div class="buttons-wrapper">
                                    <a class="button size-2 style-2" href="{{route('shop.product.detail',$product_last->slug)}}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    <a class="button size-2 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-b40 col-sm-b80"></div>
                        </div>
                    </div>
                </div>
                <div class="slider-product-preview">
                    <div class="product-preview-shortcode">
                        <div class="preview">
                            <div class="swiper-lazy-preloader"></div>
                            @foreach($product_lasts[$key]['product_images'] as $rslkey => $product_value)
                            <div class="entry full-size swiper-lazy active" data-background="{{asset('storage')}}/{{$product_value['product_image']}}"></div>
                            @endforeach
                        </div>
                        <div class="sidebar valign-middle" data-swiper-parallax-x="-300">
                            <div class="valign-middle-content">
                                @foreach($product_lasts[$key]['product_images'] as $rslkey => $product_value)
                                @if($rslkey == 0)
                                <div class="entry active" style="overflow: hidden;"><img src="{{asset('storage')}}/{{$product_value['product_image']}}" alt="" /></div>
                                @else
                                <div class="entry" style="overflow: hidden;"><img src="{{asset('storage')}}/{{$product_value['product_image']}}" alt="" /></div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="empty-space col-xs-b80 col-sm-b0"></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
</div>
@endsection

@section('content')
<div class="col-md-9 col-md-push-3">

    <div class="align-inline spacing-1">
        <div class="h4">Sport gadgets</div>
    </div>
    <div class="align-inline spacing-1">
        <div class="simple-article size-1">SHOWING <b class="grey">15</b> OF <b class="grey">2 358</b> RESULTS</div>
    </div>
    <div class="align-inline spacing-1 hidden-xs">
        <a class="pagination toggle-products-view active"><img src="{{asset('')}}shop_assets/img/icon-14.png" alt="" /><img src="{{asset('')}}shop_assets/img/icon-15.png" alt="" /></a>
        <a class="pagination toggle-products-view"><img src="{{asset('')}}shop_assets/img/icon-16.png" alt="" /><img src="{{asset('')}}shop_assets/img/icon-17.png" alt="" /></a>
    </div>
    <div class="align-inline spacing-1 filtration-cell-width-1">
        <select class="SlectBox small">
            <option disabled="disabled" selected="selected">Most popular products</option>
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
        </select>
    </div>
    <div class="align-inline spacing-1 filtration-cell-width-2">
        <select class="SlectBox small">
            <option disabled="disabled" selected="selected">Show 30</option>
            <option value="volvo">30</option>
            <option value="saab">50</option>
            <option value="mercedes">100</option>
            <option value="audi">200</option>
        </select>
    </div>


    <div class="empty-space col-xs-b25 col-sm-b60"></div>

    <div class="products-content">
        <div class="products-wrapper">
            <div class="row nopadding">
                @foreach($products as $key => $product)
                <div class="col-sm-4">
                    <div class="product-shortcode style-1">
                        <div class="title">
                            <div class="simple-article size-1 color col-xs-b5"><a href="#">{{$products[$key]['category']['name']}}</a></div>
                            <div class="h6 animate-to-green"><a href="#">{{$product['name']}}</a></div>
                        </div>
                        <div class="preview">
                            <img src="{{asset('storage')}}/{{$product['thumbnail']}}" alt="" style="width: 200px; height: 200px; ">
                            <div class="preview-buttons valign-middle">
                                <div class="valign-middle-content">
                                    <a class="button size-2 style-2" href="{{route('shop.product.detail',$product->slug)}}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-1.png" alt=""></span>
                                            <span class="text">Learn More</span>
                                        </span>
                                    </a>
                                    @if($products[$key]["product_resolutions"][0]["stock"] != 0)
                                    <a class="button size-2 style-3 shopadd2cart" data-url={{route('shop.product.add2cart',$product["id"])}} data-resolution-id={{$products[$key]["product_resolutions"][0]["id"]}}>
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{asset('')}}shop_assets/img/icon-3.png" alt=""></span>
                                            <span class="text">Add To Cart</span>
                                        </span>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <div class="simple-article size-4">
                                @if($products[$key]['product_resolutions'][0]['sale_price'] != null)
                                <span class="color">{{number_format($products[$key]['product_resolutions'][0]['sale_price'])}} ₫</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="line-through">{{number_format($products[$key]['product_resolutions'][0]['price'])}} ₫</span>
                                @else
                                <span class="color">{{number_format($products[$key]['product_resolutions'][0]['price'])}} ₫</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endif
                            </div>
                        </div>
                        <div class="description">
                            <div class="simple-article text size-2" style="-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;max-width: 100%;">{{$product['description']}}</div>
                            <div class="icons">
                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="empty-space col-xs-b35 col-sm-b0"></div>
    @if($products->hasPages())
    <?php
    $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
    ?>
    <div class="row">
        <div class="col-sm-3 hidden-xs">
            @if($products->onFirstPage())
            <a class="button size-1 style-5" style="cursor: no-drop;">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                    <span class="text">prev page</span>
                </span>
            </a>
            @else
            @if(isset($q))
            <a class="button size-1 style-5" href="{{$products->appends(['q'=>$q])->previousPageUrl()}}">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                    <span class="text">prev page</span>
                </span>
            </a>
            @else
            <a class="button size-1 style-5" href="{{$products->previousPageUrl()}}">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                    <span class="text">prev page</span>
                </span>
            </a>
            @endif
            @endif
        </div>
        <div class="col-sm-6 text-center">
            <div class="pagination-wrapper">
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $products->currentPage() - $half_total_links;
                $to = $products->currentPage() + $half_total_links;
                if ($products->currentPage() < $half_total_links) {
                    $to += $half_total_links - $products->currentPage();
                }
                if ($products->lastPage() - $products->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($products->lastPage() - $products->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                @if(($products->currentPage() == $i))
                <a class="pagination {{ ($products->currentPage() == $i) ? 'active' : '' }}" style="{{ ($products->currentPage() == $i) ? 'cursor: no-drop' : '' }}">{{$i}}</a>
                @else
                @if(isset($q))
                <a class="pagination {{ ($products->currentPage() == $i) ? 'active' : '' }}" href="{!!$products->appends(['q'=>$q])->url($i)!!}">{{ $i }}</a>
                @else
                <a class="pagination {{ ($products->currentPage() == $i) ? 'active' : '' }}" href="{!!$products->url($i)!!}">{{ $i }}</a>
                @endif
                @endif
                @endif
                @endfor
            </div>
        </div>
        <div class="col-sm-3 hidden-xs text-right">
            @if($products->hasMorePages())
            @if(isset($q))
            <a class="button size-1 style-5" href="{{ $products->appends(['q'=>$q])->nextPageUrl() }}">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="text">next page</span>
                </span>
            </a>
            @else
            <a class="button size-1 style-5" href="{{ $products->nextPageUrl() }}">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="text">next page</span>
                </span>
            </a>
            @endif
            @else
            <a class="button size-1 style-5" style="cursor: no-drop;">
                <span class="button-wrapper">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <span class="text">next page</span>
                </span>
            </a>
            @endif
        </div>
    </div>
    @endif

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
@endsection

@section('best-product')
<div class="row">
    <div class="col-sm-6 col-md-3 col-xs-b25">
        <div class="h4 col-xs-b25">Hot Sale</div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-28.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                <div class="simple-article dark">$98.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-29.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                <div class="simple-article dark">$12.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-30.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                <div class="simple-article"><span class="color">$24.00</span>&nbsp;&nbsp;&nbsp;<span class="line-through">$32.00</span></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        <div class="h4 col-xs-b25">Top Rated</div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-31.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                <div class="simple-article dark">$98.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-32.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                <div class="simple-article dark">$12.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-33.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                <div class="simple-article dark">$4.00</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        <div class="h4 col-xs-b25">Popular</div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-34.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                <div class="simple-article dark">$98.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-35.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                <div class="simple-article dark">$12.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-36.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                <div class="simple-article dark">$4.00</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        <div class="h4 col-xs-b25">Best Choice</div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-37.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">WIRELESS</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                <div class="simple-article dark">$98.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-38.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                <div class="simple-article dark">$12.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="#"><img src="{{asset('')}}shop_assets/img/product-39.jpg" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="#">CASES</a></div>
                <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                <div class="simple-article dark">$4.00</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.shopadd2cart').click(function(){
            var url = $(this).attr('data-url');
            var resolution_id = $(this).attr('data-resolution-id');

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {
                    resolution_id: resolution_id,
                },
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        })
    });
</script>
@endsection
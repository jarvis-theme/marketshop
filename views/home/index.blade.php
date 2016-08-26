    <div id="container">
        <!-- Feature Box Start-->
        <!-- <div class="container">
            <div class="custom-feature-box row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_1">
                        <div class="title">Free Shipping</div>
                        <p>Free shipping on order over $1000</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_2">
                        <div class="title">Free Return</div>
                        <p>Free return in 24 hour after purchasing</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_3">
                        <div class="title">Gift Cards</div>
                        <p>Give the special perfect gift</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="feature-box fbox_4">
                        <div class="title">Reward Points</div>
                        <p>Earn and spend with ease</p>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Feature Box End-->
        <div class="container">
            <div class="row">
                <!-- Left Part Start-->
                <aside id="column-left" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">Categories</h3>
                    <div class="box-category">
                        <ul id="cat_accordion">
                            @foreach(list_category() as $categories)
                            <li>
                                @if($categories->parent=='0')
                                <a href="{{ slugKategori($categories) }}">{{ $categories->nama }}</a>
                                    @if(count($categories->anak) > 0)
                                    <span class="down"></span>
                                    <ul>
                                        @foreach($categories->anak as $submenu1)
                                        @if($submenu1->parent == $categories->id)
                                        <li>
                                            <a href="{{ slugKategori($submenu1) }}">{{ $submenu1->nama }}</a>
                                            @if(count($submenu1->anak) > 0)
                                            <span class="down"></span>
                                            <ul>
                                                @foreach($submenu1->anak as $submenu2)
                                                @if($submenu2->parent == $submenu1->id)
                                                <li><a href="{{ slugKategori($submenu2) }}">{{ $submenu2->nama }}</a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @endif
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @if(bestSeller()->count() > 0)
                    <h3 class="subtitle">Bestsellers</h3>
                    <div class="side-item">
                        @foreach(bestSeller() as $best)
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="{{ product_url($best) }}"><img src="{{ product_image_url($best->gambar1,'thumb') }}" alt="{{ $best->nama }}" title="{{ $best->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($best) }}">{{ $best->nama }}</a></h4>
                                <p class="price"><span class="price-new">{{ price($best->hargaJual) }}</span> @if(!empty($best->hargaCoret))<span class="price-old">{{ price($best->hargaCoret) }}</span>@endif <!-- <span class="saving">-10%</span> --></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if(home_product()->count() > 0)
                    <h3 class="subtitle">Specials</h3>
                    <div class="side-item">
                        @foreach(home_product() as $home_product)
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="{{ product_url($home_product) }}"><img src="{{ product_image_url($home_product->gambar1,'thumb') }}" alt="{{ $home_product->nama }}" title="{{ $home_product->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($home_product) }}">{{ short_description($home_product->nama,60) }}</a></h4>
                                <p class="price"> <span class="price-new">{{ price($home_product->hargaJual) }}</span> @if(!empty($home_product->hargaCoret)) <span class="price-old">{{ price($home_product->hargaCoret) }}</span> @endif <!-- <span class="saving">-26%</span> --> </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if(recentBlog()->count() > 0)
                    <div class="list-group">
                        <h3 class="subtitle">New Article</h3>
                        <div id="news" class="owl-carousel">
                            @foreach(recentBlog() as $side_article)
                            <div class="item">
                                <h4><i><a href="{{ blog_url($side_article) }}">{{ $side_article->judul }}</a></i></h4>
                                <p>{{ $side_article->isi }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if(vertical_banner()->count() > 0)
                    {{--*/ $no = 1; /*--}}
                    <div class="banner owl-carousel">
                        @foreach(vertical_banner() as $side_banner)
                        <div class="item"> <a href="{{ url($side_banner->url) }}"><img src="{{ banner_image_url($side_banner->gambar) }}" alt="promo {{$no}}" class="img-responsive" /></a> </div>
                        {{-- $no++; --}}
                        @endforeach
                    </div>
                    @endif
                    @if(new_product()->count() > 0)
                    <h3 class="subtitle">Latest</h3>
                    <div class="side-item">
                        @foreach(new_product() as $new)
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="{{ product_url($new) }}"><img src="{{ product_image_url($new->gambar1,'thumb')}}" alt="{{ $new->nama }}" title="{{ $new->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($new) }}">{{ short_description($new->nama,90) }}</a></h4>
                                <p class="price">
                                    <span class="price-new">{{ price($new->hargaJual) }}</span> @if(!empty($new->hargaCoret))<span class="price-old">{{ price($new->hargaCoret) }}</span>@endif<!--  <span class="saving">-27%</span> -->
                                </p>
                                <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </aside>
                <!-- Left Part End-->
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <!-- Slideshow Start-->
                    {{ Theme::partial('slider') }}
                    <!-- Slideshow End-->
                    @if(home_product()->count() > 0)
                    <!-- Featured Product Start-->
                    <h3 class="subtitle">Featured</h3>
                    <div class="owl-carousel product_carousel">
                        @foreach(home_product() as $featured)
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="{{ product_url($featured) }}"><img src="{{ product_image_url($featured->gambar1,'thumb') }}" alt="{{ $featured->nama }}" title="{{ $featured->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($featured) }}">{{ $featured->nama }}</a></h4>
                                <p class="price"><span class="price-new">{{ price($featured->hargaJual) }}</span> @if(!empty($featured->hargaCoret))<span class="price-old">{{ price($featured->hargaJual) }}</span>@endif <!-- <span class="saving">-10%</span> --></p>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="location.href='{{ product_url($featured) }}'"><span>Add to Cart</span></button>
                                <!-- <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i></button>
                                </div> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Featured Product End-->
                    @endif
                    @if(vertical_banner()->count() > 0)
                    <!-- Banner Start-->
                    <div class="marketshop-banner">
                        <div class="row">
                            {{--*/ $i = 1; /*--}}
                            @foreach(vertical_banner() as $banner)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="{{ url($banner->url) }}"><img src="{{ banner_image_url($banner->gambar) }}" alt="Info {{$i}}" title="Info {{$i}}" /></a></div>
                            {{-- $i++; --}}
                            @endforeach
                        </div>
                    </div>
                    <!-- Banner End-->
                    @endif
                    <!-- Categories Product Slider Start-->
                    <!-- <div class="category-module" id="latest_category">
                        <h3 class="subtitle">Electronics - <a class="viewall" href="category.tpl">view all</a></h3>
                        <div class="category-module-content">
                            <ul id="sub-cat" class="tabs">
                                <li><a href="#tab-cat1">Laptops</a></li>
                                <li><a href="#tab-cat2">Desktops</a></li>
                                <li><a href="#tab-cat3">Cameras</a></li>
                                <li><a href="#tab-cat4">Mobile Phones</a></li>
                                <li><a href="#tab-cat5">TV &amp; Home Audio</a></li>
                                <li><a href="#tab-cat6">MP3 Players</a></li>
                            </ul>
                            <div id="tab-cat1" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/samsung_tab_1-200x200.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Aspire Ultrabook Laptop</a></h4>
                                            <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_pro_1-200x200.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#"> Strategies for Acquiring Your Own Laptop </a></h4>
                                            <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_air_1-200x200.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Laptop Silver black</a></h4>
                                            <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_1-200x200.jpg" alt="Ideapad Yoga 13-59341124 Laptop" title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Ideapad Yoga 13-59341124 Laptop</a></h4>
                                            <p class="price"> $2.00 </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_shuffle_1-200x200.jpg" alt="Hp Pavilion G6 2314ax Notebok Laptop" title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_touch_1-200x200.jpg" alt="Samsung Galaxy S4" title="Samsung Galaxy S4" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Samsung Galaxy S4</a></h4>
                                            <p class="price"> <span class="price-new">$62.00</span> <span class="price-old">$122.00</span> <span class="saving">-50%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-cat2" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_shuffle_1-200x200.jpg" alt="Hp Pavilion G6 2314ax Notebok Laptop" title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-cat3" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/FinePix-Long-Zoom-Camera-200x200.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">FinePix S8400W Long Zoom Camera</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/nikon_d300_1-200x200.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Digital Camera for Elderly</a></h4>
                                            <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-cat4" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/samsung_tab_1-200x200.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Aspire Ultrabook Laptop</a></h4>
                                            <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/iphone_1-200x200.jpg" alt="iPhone5" title="iPhone5" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">iPhone5</a></h4>
                                            <p class="price"> $123.20 </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_touch_1-200x200.jpg" alt="Samsung Galaxy S4" title="Samsung Galaxy S4" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Samsung Galaxy S4</a></h4>
                                            <p class="price"> <span class="price-new">$62.00</span> <span class="price-old">$122.00</span> <span class="saving">-50%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/palm_treo_pro_1-200x200.jpg" alt="HTC M7 with Stunning Looks" title="HTC M7 with Stunning Looks" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">HTC M7 with Stunning Looks</a></h4>
                                            <p class="price"> $337.99 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-cat5" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/samsung_tab_1-200x200.jpg" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Aspire Ultrabook Laptop</a></h4>
                                            <p class="price"> <span class="price-new">$230.00</span> <span class="price-old">$241.99</span> <span class="saving">-5%</span> </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_classic_1-200x200.jpg" alt="Portable Mp3 Player" title="Portable Mp3 Player" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Portable Mp3 Player</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_pro_1-200x200.jpg" alt=" Strategies for Acquiring Your Own Laptop " title=" Strategies for Acquiring Your Own Laptop " class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#"> Strategies for Acquiring Your Own Laptop </a></h4>
                                            <p class="price"> <span class="price-new">$1,400.00</span> <span class="price-old">$1,900.00</span> <span class="saving">-26%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_air_1-200x200.jpg" alt="Laptop Silver black" title="Laptop Silver black" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Laptop Silver black</a></h4>
                                            <p class="price"> <span class="price-new">$1,142.00</span> <span class="price-old">$1,202.00</span> <span class="saving">-5%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/macbook_1-200x200.jpg" alt="Ideapad Yoga 13-59341124 Laptop" title="Ideapad Yoga 13-59341124 Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Ideapad Yoga 13-59341124 Laptop</a></h4>
                                            <p class="price"> $2.00 </p>
                                            <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_nano_1-200x200.jpg" alt="Mp3 Player" title="Mp3 Player" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Mp3 Player</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/FinePix-Long-Zoom-Camera-200x200.jpg" alt="FinePix S8400W Long Zoom Camera" title="FinePix S8400W Long Zoom Camera" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">FinePix S8400W Long Zoom Camera</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_shuffle_1-200x200.jpg" alt="Hp Pavilion G6 2314ax Notebok Laptop" title="Hp Pavilion G6 2314ax Notebok Laptop" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Hp Pavilion G6 2314ax Notebok Laptop</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick="cart.add('34');"><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick="wishlist.add('34');"><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick="compare.add('34');"><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_touch_1-200x200.jpg" alt="Samsung Galaxy S4" title="Samsung Galaxy S4" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Samsung Galaxy S4</a></h4>
                                            <p class="price"> <span class="price-new">$62.00</span> <span class="price-old">$122.00</span> <span class="saving">-50%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/nikon_d300_1-200x200.jpg" alt="Digital Camera for Elderly" title="Digital Camera for Elderly" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Digital Camera for Elderly</a></h4>
                                            <p class="price"> <span class="price-new">$92.00</span> <span class="price-old">$98.00</span> <span class="saving">-6%</span> </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-cat6" class="tab_content">
                                <div class="owl-carousel latest_category_tabs">
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_classic_1-200x200.jpg" alt="Portable Mp3 Player" title="Portable Mp3 Player" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Portable Mp3 Player</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick="cart.add('48');"><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="image"><a href="#"><img src="image/product/ipod_nano_1-200x200.jpg" alt="Mp3 Player" title="Mp3 Player" class="img-responsive" /></a></div>
                                        <div class="caption">
                                            <h4><a href="#">Mp3 Player</a></h4>
                                            <p class="price"> $122.00 </p>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Categories Product Slider End-->
                    @if(horizontal_banner()->count() > 0)
                    <!-- Banner Start -->
                    <div class="marketshop-banner">
                        <div class="row">
                            {{--*/ $j = 1; /*--}}
                            @foreach(horizontal_banner() as $main_banner)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><a href="{{ url($main_banner->url) }}"><img src="{{ banner_image_url($main_banner->gambar) }}" alt="Info {{$j}}" title="Info {{$j}}" /></a></div>
                            {{-- $j++; --}}
                            @endforeach
                        </div>
                    </div>
                    <!-- Banner End -->
                    @endif
                    @if(latest_product()->count() > 0)
                    <!-- Categories Product Slider Start -->
                    <h3 class="subtitle">New Arrivals - <a class="viewall" href="{{ url('produk') }}">view all</a></h3>
                    <div class="owl-carousel latest_category_carousel">
                        @foreach(latest_product() as $new)
                        <div class="product-thumb">
                            <div class="image"><a href="{{ product_url($new) }}"><img src="{{ product_image_url($new->gambar1,'thumb') }}" alt="{{ $new->nama }}" title="{{ $new->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($new) }}">{{ short_description($new->nama,60) }}</a></h4>
                                <p class="price"> <span class="price-new">{{ price($new->hargaJual) }}</span> @if(!empty($new->hargaCoret))<span class="price-old">{{ price($new->hargaCoret) }}</span>@endif <!-- <span class="saving">-5%</span> --> </p>
                                <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div> -->
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="location.href='{{ product_url($new) }}"><span>Add to Cart</span></button>
                                <!-- <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                </div> -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Categories Product Slider End -->
                    @endif
                    @if(best_seller()->count() > 0)
                    <!-- Brand Product Slider Start-->
                    <h3 class="subtitle">Hot Items - <a class="viewall" href="{{ url('produk') }}">view all</a></h3>
                    <div class="owl-carousel latest_brands_carousel">
                        @foreach(best_seller() as $hot)
                        <div class="product-thumb">
                            <div class="image"><a href="{{ product_url($hot) }}"><img src="{{ product_image_url($hot->gambar1,'thumb') }}" alt="{{ $hot->nama }}" title="{{ $hot->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="{{ product_url($hot) }}">{{ short_description($hot->nama,60) }}</a></h4>
                                <p class="price"> <span class="price-new">{{ price($hot->hargaJual) }}</span> @if(!empty($hot->hargaCoret))<span class="price-old">{{ price($hot->hargaCoret) }}</span>@endif <!-- <span class="saving">-5%</span> --> </p>
                                <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> </div> -->
                            </div>
                            <div class="button-group">
                                <button class="btn-primary" type="button" onClick="location.href='{{ product_url($hot) }}"><span>Add to Cart</span></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Brand Product Slider End -->
                    @endif
                    @if(list_koleksi()->count() > 0)
                    <!-- Brand Logo Carousel Start-->
                    <div id="carousel" class="owl-carousel nxt">
                        @foreach(list_koleksi() as $koleksi)
                        <div class="item text-center"> <a href="{{ koleksi_url($koleksi) }}"><img src="{{ koleksi_image_url($koleksi->gambar,'thumb') }}" alt="{{ $koleksi->nama }}" class="img-responsive" style="max-width: 100px; max-height: 100px;" /></a> </div>
                        @endforeach
                    </div>
                    <!-- Brand Logo Carousel End -->
                    @endif
                </div>
                <!--Middle Part End-->
            </div>
        </div>
    </div>
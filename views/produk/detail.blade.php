    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('/') }}" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('produk') }}" itemprop="url"><span itemprop="title">Produk</span></a></li>
                <li class="active" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">{{ $produk->nama }}</span></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <div itemscope itemtype="http://schema.org/Product">
                        <h1 class="title" itemprop="name">{{ $produk->nama }}</h1>
                        <div class="row product-info">
                            <div class="col-sm-6">
                                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01" src="{{ product_image_url($produk->gambar1,'medium') }}" title="{{ $produk->nama }}" alt="{{ $produk->nama }}" data-zoom-image="{{ product_image_url($produk->gambar1,'large') }}" /> </div>
                                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> Click image for Gallery</span></div>
                                <div class="image-additional" id="gallery_01">
                                    @if($produk->gambar1 != '')
                                    <a class="thumbnail" href="#" data-zoom-image="{{ product_image_url($produk->gambar1,'large') }}" data-image="{{ product_image_url($produk->gambar1,'medium') }}" title="{{ $produk->nama }}">
                                        <img src="{{ product_image_url($produk->gambar1,'thumb') }}" title="{{ $produk->nama }}" alt = "{{ $produk->nama }}"/>
                                    </a>
                                    @endif
                                    @if($produk->gambar2 != '')
                                    <a class="thumbnail" href="#" data-zoom-image="{{ product_image_url($produk->gambar2,'large') }}" data-image="{{ product_image_url($produk->gambar2,'medium') }}" title="{{ $produk->nama }}">
                                        <img src="{{ product_image_url($produk->gambar2,'thumb') }}" title="{{ $produk->nama }}" alt="{{ $produk->nama }}" />
                                    </a>
                                    @endif
                                    @if($produk->gambar3 != '')
                                    <a class="thumbnail" href="#" data-zoom-image="{{ product_image_url($produk->gambar3,'large') }}" data-image="{{ product_image_url($produk->gambar3,'medium') }}" title="{{ $produk->nama }}">
                                        <img src="{{ product_image_url($produk->gambar3,'thumb') }}" title="{{ $produk->nama }}" alt="{{ $produk->nama }}" />
                                    </a>
                                    @endif
                                    @if($produk->gambar4 != '')
                                    <a class="thumbnail" href="#" data-zoom-image="{{ product_image_url($produk->gambar4,'large') }}" data-image="{{ product_image_url($produk->gambar4,'medium') }}" title="{{ $produk->nama }}">
                                        <img src="{{ product_image_url($produk->gambar4,'thumb') }}" title="{{ $produk->nama }}" alt="{{ $produk->nama }}" />
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled description">
                                    <li><b>Brand:</b> <span itemprop="brand">{{ !empty($produk->vendor) ? $produk->vendor : '-' }}</span></li>
                                    <li><b>Product Code:</b> <span itemprop="mpn">{{ !empty($produk->barcode) ? $produk->barcode : '-' }}</span></li>
                                    <!-- <li><b>Reward Points:</b> 700</li> -->
                                    <li><b>Availability:</b> <span class="{{ $produk->stok > 0 ? 'instock' : 'nostock' }}">{{ $produk->stok > 0 ? 'In' : 'Out of' }} Stock</span></li>
                                </ul>
                                <ul class="price-box">
                                    <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">@if(!empty($produk->hargaCoret))<span class="price-old">{{ price($produk->hargaCoret) }}</span> @endif<span itemprop="price">{{ price($produk->hargaJual) }}<span itemprop="availability" content="In Stock"></span></span></li>
                                    <li></li>
                                    <!-- <li>Ex Tax: $950.00</li> -->
                                </ul>
                                <form action="#" id="addorder">
                                    <div id="product">
                                        <h3 class="subtitle">Available Options</h3>
                                        @if($opsiproduk->count() > 0)
                                        <div class="form-group required">
                                            <label class="control-label">Options</label>
                                            <select class="form-control selectpicker" id="input-option200" name="option[200]">
                                                <option value=""> --- Please Select --- </option>
                                                @foreach ($opsiproduk as $key => $opsi)
                                                <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}}>{{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="cart">
                                            <div>
                                                <div class="qty">
                                                    <label class="control-label" for="input-quantity">Qty</label>
                                                    <input type="text" name="qty" value="1" size="2" id="input-quantity" class="form-control" />
                                                    <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                                                    <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                                    <div class="clear"></div>
                                                </div>
                                                <button type="submit" id="button-cart" class="btn btn-primary btn-lg">Add to Cart</button>
                                            </div>
                                            <!-- <div>
                                                <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> Add to Wish List</button>
                                                <br />
                                                <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> Compare this Product</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </form>
                                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                    <meta itemprop="ratingValue" content="0" />
                                    <p>
                                        <i class="fa fa-commenting fa-flip-horizontal"></i> <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">Write a review</a>
                                    </p>
                                </div>
                                <hr>
                                <!-- AddThis Button BEGIN -->
                                {{ sosialShare(url(product_url($produk))) }}
                                <!-- AddThis Button END -->
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                            <li><a href="#tab-specification" data-toggle="tab">Specification</a></li>
                            <li><a href="#tab-review" data-toggle="tab">Reviews</a></li>
                        </ul>
                        <div class="tab-content">
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div>
                                    <p>{{ $produk->deskripsi }}</p>
                                </div>
                            </div>
                            <div id="tab-specification" class="tab-pane">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Brand:</b> {{ $produk->vendor!="" ? $produk->vendor : "-"}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Weight:</b> {{ !empty($produk->berat) ? $produk->berat." gram" : "-"}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Availability:</b> {{ !empty($produk->stok) ? "In Stock" : "Out of Stock" }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Product Code:</b> {{ !empty($produk->barcode) ? $produk->barcode : '-' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div id="tab-review" class="tab-pane">
                                <form class="form-horizontal">
                                    <h2>Write a review</h2>
                                    <div>{{ pluginComment(product_url($produk), @$produk) }}</div>
                                </form>
                            </div>
                        </div>
                        @if(count(other_product($produk)) > 0)
                        <h3 class="subtitle">Related Products</h3>
                        <div class="owl-carousel related_pro">
                            @foreach(other_product($produk) as $other_product)
                            <div class="product-thumb">
                                <div class="image"><a href="{{ product_url($other_product) }}"><img src="{{ product_image_url($other_product->gambar1,'thumb') }}" alt="{{ $other_product->nama }}" title="{{ $other_product->nama }}" class="img-responsive" /></a></div>
                                <div class="caption">
                                    <h4><a href="{{ product_url($other_product) }}">{{ short_description($other_product->nama,50) }}</a></h4>
                                    <p class="price"> <span class="price-new">{{ price($other_product->hargaJual) }}</span> @if(!empty($other_product->hargaCoret))<span class="price-old">{{ price($other_product->hargaCoret) }}</span>@endif <!-- <span class="saving">-5%</span> --> </p>
                                    <!-- <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div> -->
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick="location.href='{{ product_url($other_product) }}'"><span>Add to Cart</span></button>
                                    <!-- <div class="add-to-links">
                                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                                        <button type="button" data-toggle="tooltip" title="Add to compare" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div> -->
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    @if(bestSeller()->count() > 0)
                    <h3 class="subtitle">Bestsellers</h3>
                    <div class="side-item">
                        @foreach(bestSeller() as $best)
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="{{ product_url($best) }}"><img src="{{ product_image_url($best->gambar1) }}" alt="{{ $best->nama }}" title="{{ $best->nama }}" class="img-responsive" /></a></div>
                            <div class="caption">
                                <h4><a href="product.html">{{ $best->nama }}</a></h4>
                                <p class="price"><span class="price-new">{{ price($best->hargaJual) }}</span> @if(!empty($best->hargaCoret))<span class="price-old">{{ price($best->hargaCoret) }}</span>@endif <!-- <span class="saving">-10%</span> --></p>
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
                                <p>{{ short_description($side_article->isi,450) }}</p>
                            </div>
                            @endforeach
                        </div>
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
                </aside>
                <!--Right Part End -->
            </div>
        </div>
    </div>
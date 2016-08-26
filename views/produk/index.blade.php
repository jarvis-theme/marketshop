    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li>{{breadcrumbProduk(@$produk, '; <span>/</span> ', ';', true, @$category, @$collection)}}</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Left Part Start -->
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
                    @if(vertical_banner()->count() > 0)
                    {{--*/ $no = 1; /*--}}
                    <div class="banner owl-carousel">
                        @foreach(vertical_banner() as $side_banner)
                        <div class="item"> <a href="{{ url($side_banner->url) }}"><img src="{{ banner_image_url($side_banner->gambar) }}" alt="promo {{$no}}" class="img-responsive" /></a> </div>
                        {{-- $no++; --}}
                        @endforeach
                    </div>
                    @endif
                </aside>
                <!--Left Part End -->
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <!-- <h1 class="title">Electronics</h1>
                    <h3 class="subtitle">Refine Search</h3>
                    <div class="category-list-thumb row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="Laptops (6)" /></a> <a href="#">Laptops (6)</a> </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="Desktops (1)" /></a> <a href="#">Desktops (1)</a> </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="Cameras (2)" /></a> <a href="#">Cameras (2)</a> </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="Mobile Phones (4)" /></a> <a href="#">Mobile Phones (4)</a> </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="TV &amp; Home Audio (11)" /></a> <a href="#">TV &amp; Home Audio (11)</a> </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4"> <a href="#"><img src="image/no_image.jpg" alt="MP3 Players (2)" /></a> <a href="#">MP3 Players (2)</a> </div>
                    </div> -->
                    <div class="product-filter">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="btn-group">
                                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                                </div>
                                <!-- <a href="#" id="compare-total">Product Compare (0)</a> -->
                            </div>
                            <div class="col-sm-2 text-right">
                                <label class="control-label" for="input-sort">Sort By:</label>
                            </div>
                            <div class="col-md-3 col-sm-2 text-right">
                                <select id="sort" class="form-control col-sm-3" data-rel="{{ URL::current() }}">
                                    <option value="default" {{ Input::get('sort')=="" ? 'selected="selected"' : '' }}>Default</option>
                                    <option value="az" {{ Input::get('sort')=="az" ? 'selected="selected"' : '' }}>Name (A - Z)</option>
                                    <option value="za" {{ Input::get('sort')=="za" ? 'selected="selected"' : '' }}>Name (Z - A)</option>
                                    <option value="low" {{ Input::get('sort')=="low" ? 'selected="selected"' : '' }}>Price (Low &gt; High)</option>
                                    <option value="high" {{ Input::get('sort')=="high" ? 'selected="selected"' : '' }}>Price (High &gt; Low)</option>
                                    <option value="new" {{ Input::get('sort')=="new" ? 'selected="selected"' : '' }}>Item (New &gt; Old)</option>
                                    <option value="old" {{ Input::get('sort')=="old" ? 'selected="selected"' : '' }}>Item (Old &gt; New)</option>
                                </select>
                            </div>
                            <div class="col-sm-1 text-right">
                                <label class="control-label" for="input-limit">Show:</label>
                            </div>
                            <div class="col-sm-2 text-right">
                                <select id="show" class="form-control" data-rel="{{ URL::current() }}">
                                    <option value="20" {{ Input::get('show')==20 ? 'selected="selected"' : '' }}>20</option>
                                    <option value="25" {{ Input::get('show')==25 ? 'selected="selected"' : '' }}>25</option>
                                    <option value="50" {{ Input::get('show')==50 ? 'selected="selected"' : '' }}>50</option>
                                    <option value="75" {{ Input::get('show')==75 ? 'selected="selected"' : '' }}>75</option>
                                    <option value="100" {{ Input::get('show')==100 ? 'selected="selected"' : '' }}>100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row products-category">
                        @foreach(list_product(Input::get('show'), @$category, @$collection, null, Input::get('sort')) as $product)
                        <div class="product-layout product-list col-xs-12">
                            <div class="product-thumb">
                                <div class="image"><a href="{{ product_url($product) }}"><img src="{{ product_image_url($product->gambar1,'thumb') }}" alt="{{ $product->nama }}" title="{{ $product->nama }}" class="img-responsive" /></a></div>
                                <div>
                                    <div class="caption">
                                        <h4><a href="{{ product_url($product) }}">{{ short_description($product->nama,50) }}</a></h4>
                                        <p class="description"> {{ short_description($product->deskripsi,100) }}</p>
                                        <p class="price"> <span class="price-new">{{ price($product->hargaJual) }}</span> @if(!empty($product->hargaCoret))<span class="price-old">{{ price($product->hargaCoret) }}</span>@endif <!-- <span class="saving">-6%</span> <span class="price-tax">Ex Tax: $75.00</span> --> </p>
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-primary" type="button" onClick="location.href='{{ product_url($product) }}'"><span>Add to Cart</span></button>
                                        <!-- <div class="add-to-links">
                                            <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                                            <button type="button" data-toggle="tooltip" title="Compare this Product" onClick=""><i class="fa fa-exchange"></i> <span>Compare this Product</span></button>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            {{ list_product(Input::get('show'), @$category, @$collection, null, Input::get('sort'))->appends(array('show' => Input::get('show'), 'sort'=>Input::get('sort')))->links() }}
                        </div>
                        <!-- <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div> -->
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
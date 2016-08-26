<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li class="active">Search</li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-12">
                <label>Search Criteria</label>
                <form action="{{ url('search') }}" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Keywords" value="{{ Input::old('search') }}" name="search">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" id="button-search" value="Search">
                        </div>
                    </div>
                </form>
                <br>
                @if(count($hasilpro) > 0)
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
                    @foreach($hasilpro as $listproduk)
                    <div class="product-layout product-list col-xs-12">
                        <div class="product-thumb">
                            <div class="image"><a href="{{ product_url($listproduk) }}"><img src="{{ product_image_url($listproduk->gambar1,'thumb') }}" alt="{{ $listproduk->nama }}" title="{{ $listproduk->nama }}" class="img-responsive" /></a></div>
                            <div>
                                <div class="caption">
                                    <h4><a href="{{ product_url($listproduk) }}">{{ $listproduk->nama }}</a></h4>
                                    <p class="description">{{ short_description($listproduk->deskripsi,100) }}</p>
                                    <p class="price"> <span class="price-new">{{ price($listproduk->hargaJual) }}</span> @if(!empty($listproduk->hargaCoret))<span class="price-old">{{ price($listproduk->hargaCoret) }}</span>@endif <!-- <span class="saving">-26%</span> <span class="price-tax">Ex Tax: $1,400.00</span> --> </p>
                                </div>
                                <div class="button-group">
                                    <button class="btn-primary" type="button" onClick="location.href='{{ product_url($listproduk) }}'"><span>Add to Cart</span></button>
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
                        {{ $hasilpro->links() }}
                    </div>
                    <!-- <div class="col-sm-6 text-right">Showing 1 to 12 of 15 (2 Pages)</div> -->
                </div>
                @else
                <div class="feature-box well">
                    <h4 class="text-center"><i>There is no product that matches the search criteria.</i></h4>
                </div>
                @endif
            </div>
            <!--Middle Part End -->
        </div>
    </div>
</div>
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Blog</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">Blog</h1>
                    @foreach(list_blog(null,@$blog_category) as $value)
                    <div class="article">
                        <h3 class="blog-title"><a href="{{ blog_url($value) }}">{{ $value->judul }}</a></h3>
                        <div class="col-xs-12 dateblog">
                            <span>{{ date("d M Y", strtotime($value->created_at)) }}</span>
                        </div>
                        <p>{{ short_description($value->isi,250) }}</p>
                        <p><a href="{{blog_url($value)}}">Read More</a></p>
                    </div>
                    @endforeach
                    <div class="divider"></div>
                    <div class="col-sm-12">{{ list_blog(null,@$blog_category)->links() }}</div>
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">{{ trans('content.frontend_shop_menu.category') }}</h3>
                    <div class="list-group">
                        <ul class="list-item">
                            @foreach(list_blog_category() as $blog_category)
                            <li><a href="{{ blog_category_url($blog_category) }}">{{ $blog_category->nama }}</a></li>
                            @endforeach
                        </ul>
                    </div>
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
                <!--Right Part End -->
            </div>
        </div>
    </div>
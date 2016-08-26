<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ url('blog') }}">Blog</a></li>
            <li class="active">{{ $detailblog->judul }}</li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h2 class="text-uppercase">{{ $detailblog->judul }}</h2>
                <blockquote>
                    <div class="lpad col-xs-12 col-sm-6">
                        <i class="fa fa-calendar-o"></i> {{ waktuTgl($detailblog->created_at) }}
                        @if(!empty($detailblog->kategori->nama))
                        &nbsp;|&nbsp;<i class="fa fa-tag"></i> <a href="{{ blog_category_url(@$detailblog->kategori) }}"> {{ @$detailblog->kategori->nama }}</a>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 share">{{ sosialShare(blog_url($detailblog)) }}</div>
                    <div class="clearfix"></div>
                    <br>
                    <p>{{ $detailblog->isi }}</p>
                </blockquote>
                <div>
                    @if(prev_blog($detailblog))
                    <div class="pull-left">
                        <a class="btn btn-primary btn-lg" href="{{ blog_url(prev_blog()) }}"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    @else
                    <div class="pull-right"></div>
                    @endif
                    @if(next_blog($detailblog))
                    <div class="pull-right">
                        <a class="btn btn-primary btn-lg" href="{{ blog_url(next_blog()) }}"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                    @else
                    <div class="pull-right"></div>
                    @endif
                </div>
                <div class="clearfix"></div>
                <div>
                    <hr class="dotlines">
                    {{ fbcommentbox(blog_url($detailblog), '100%', '5', 'light') }} 
                </div>
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
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Testimonial</li>
            </ul>
            <!-- Breadcrumb End-->
            <h1 class="title">Testimonial</h1>
            <br>
            <div class="row">
                @foreach(list_testimonial() as $testimonial)
                <div class="col-md-6">
                    <div class="feature-box well"> <i class="feature-icon fa fa-user"></i>
                        <div class="feature-content">
                            <div class="row">
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <h4>{{ $testimonial->nama }}</h4>
                                </div>
                                <div class="col-sm-2 col-md-2 col-lg-2">
                                    <p>{{ date_format($testimonial->created_at,"d/m/Y") }}</p>
                                </div>
                            </div>
                            <p>{{ $testimonial->isi }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="divider"></div>
                <div class="col-sm-12">
                    {{ list_testimonial()->links() }}
                </div>
            </div>
        </div>
    </div>
	<div id="container">
		<div class="container">
			<!-- Breadcrumb Start-->
			<ul class="breadcrumb">
				<li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
				<li class="active">Contact Us</li>
			</ul>
			<!-- Breadcrumb End-->
			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-sm-9">
					<h1 class="title">Contact Us</h1>
					<h3 class="subtitle">Our Location</h3>
					<div class="row">
						<div class="col-sm-4">
							<div class="contact-info">
								<div class="contact-info-icon"><i class="fa fa-map-marker"></i></div>
								<div class="contact-detail">
									<h4>{{ Theme::place('title') }}</h4>
									<address>
										{{ $kontak->alamat }}
									</address>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact-info">
								<div class="contact-info-icon"><i class="fa fa-phone"></i></div>
								<div class="contact-detail">
									<h4>Telephone</h4>
									Call: {{ $kontak->telepon }}<br>
									SMS: {{ $kontak->hp }} </div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="contact-info">
								<div class="contact-info-icon"><i class="fa fa-clock-o"></i></div>
								<div class="contact-detail">
									<h4>Opening Times</h4>
									24X7 Customer Care </div>
							</div>
						</div>
					</div>
					<form class="form-horizontal" action="{{url('kontak')}}" method="post">
						<fieldset>
							<h3 class="subtitle">Send us an Email</h3>
							<div class="form-group required">
								<label class="col-md-2 col-sm-3 control-label" for="input-name">Your Name</label>
								<div class="col-md-10 col-sm-9">
									<input type="text" name="namaKontak" value="{{ Input::old('namaKontak') }}" id="input-name" placeholder="Your Name" class="form-control" required />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-md-2 col-sm-3 control-label" for="input-email">E-Mail Address</label>
								<div class="col-md-10 col-sm-9">
									<input type="email" name="emailKontak" value="{{ Input::old('emailKontak') }}" id="input-email" placeholder="E-Mail Address" class="form-control" required />
								</div>
							</div>
							<div class="form-group required">
								<label class="col-md-2 col-sm-3 control-label" for="input-enquiry">Message</label>
								<div class="col-md-10 col-sm-9">
									<textarea name="messageKontak" rows="10" id="input-enquiry" placeholder="Write your message" class="form-control">{{ Input::old('messageKontak') }}</textarea>
								</div>
							</div>
						</fieldset>
						<div class="buttons">
							<div class="pull-right">
								<input class="btn btn-primary" type="submit" value="Submit" />
							</div>
						</div>
					</form>
				</div>
				<aside id="column-right" class="col-sm-3 hidden-xs">
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
						@foreach(vertical_banner() as $side_promo)
						<div class="item"> <a href="{{ url($side_promo->url) }}"><img src="{{ banner_image_url($side_promo->gambar) }}" alt="info {{ $no }}" class="img-responsive" /></a> </div>
						@endforeach
                        {{-- $no++; --}}
					</div>
					@endif
				</aside>
				<!--Middle Part End -->
			</div>
		</div>
	</div>
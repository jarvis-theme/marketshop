	<div id="container">
		<div class="container">
			<!-- Breadcrumb Start-->
			<ul class="breadcrumb">
				<li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
				<li class="active">{{ $data->judul }}</li>
			</ul>
			<!-- Breadcrumb End-->
			<div class="row">
				<!--Middle Part Start-->
				<div id="content" class="col-sm-12">
					<h1 class="title">{{ $data->judul }}</h1>
					<div class="row">
						<div class="col-sm-12">
							<p>{{ $data->isi }}</p>
						</div>
					</div>
				</div>
				<!--Middle Part End -->
			</div>
		</div>
	</div>
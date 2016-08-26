    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Term of Service</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">Term of Service</h1>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#tos">Term of Service <i class="indicator fa fa-caret-right"></i></a>
                                </h4>
                            </div>
                            <div id="tos" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>{{ $service->tos }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#refund">Refund <i class="indicator fa fa-caret-right"></i></a>
                                </h4>
                            </div>
                            <div id="refund" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{ $service->refund }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-parent="#accordion" data-toggle="collapse" class="accordion-toggle" href="#rules">Privacy Policy <i class="indicator fa fa-caret-right"></i>
                                    </a>
                                </h4>
                            </div>
                            <div id="rules" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>{{ $service->privacy }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
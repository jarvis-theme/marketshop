    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Forgotten Password</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">Forgotten Password</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="subtitle">Returning Customer</h2>
                            <p><strong>I am a returning customer</strong></p>
                            <p>If you already have an account with us, please login at the <a href="{{ url('member') }}">Login Page</a>.</p>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="subtitle">Reset Password</h2>
                            <p><strong>Please enter the email address associated with your account and we'll send you a password reset email.</strong></p>
                            <form action="{{url('member/forgetpassword')}}" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="email" name="recoveryEmail" value="{{ Input::old('recoveryEmail') }}" placeholder="E-Mail Address" id="input-email" class="form-control" required autofocus />
                                </div>
                                <input type="submit" value="Send" class="btn btn-primary" />
                            </form>
                        </div>
                    </div>
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">Account</h3>
                    <div class="list-group">
                        <ul class="list-item">
                            <li><a href="{{ url('member') }}">Login</a></li>
                            <li><a href="{{ url('member/create') }}">Register</a></li>
                            <li><a href="{{ url('member/forget-password') }}">Forgotten Password</a></li>
                            <li><a href="{{ url('member#order-history') }}">Order History</a></li>
                            <li><a href="{{ url('konfirmasiorder') }}">Payment Confirmation</a></li>
                            <li><a href="{{ url('service') }}">Term of Service</a></li>
                            <li><a href="{{ url('kontak') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </aside>
                <!--Right Part End -->
            </div>
        </div>
    </div>
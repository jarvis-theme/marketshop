    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Login</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">Account Login</h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="subtitle">New Customer</h2>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                            <a href="{{ url('member/create') }}" class="btn btn-primary">Continue</a>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="subtitle">Returning Customer</h2>
                            <p><strong>I am a returning customer</strong></p>
                            <form action="{{url('member/login')}}" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="email" name="email" value="{{ Input::old('email') }}" placeholder="E-Mail Address" id="input-email" class="form-control" required autofocus />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="{{ Input::old('password') }}" placeholder="Password" id="input-password" class="form-control" />
                                    <br />
                                    <a href="{{ url('member/forget-password') }}">Forgotten Password</a>
                                </div>
                                <input type="submit" value="Login" class="btn btn-primary" />
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
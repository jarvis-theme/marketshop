    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">Reset Password</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">Reset Password</h1>
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 class="subtitle">Reset Password</h2>
                            <p><strong>Please enter your new password</strong></p>
                            <form action="{{ url('member/recovery/'.$id.'/'.$code) }}" method="post">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">New Password</label>
                                    <input type="password" name="password" value="" placeholder="New Password" id="input-email" class="form-control" required autofocus />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-email">Confirm Password</label>
                                    <input type="password" name="password_confirmation" value="" placeholder="Confirm Password" id="input-email" class="form-control" required />
                                </div>
                                <input type="submit" value="Save" class="btn btn-primary" />
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
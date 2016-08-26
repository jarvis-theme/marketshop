    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ url('member') }}">Member</a></li>
                <li class="active">Update Profile</li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">Update Profile</h1>
                    {{ Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal')) }}
                        <fieldset id="account">
                            <legend>Your Personal Details</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Name" value="{{ Input::old('nama') ? Input::old('nama') : $user->nama }}" name="nama" required autofocus >
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="{{ Input::old('email') ? Input::old('email') : $user->email }}" name="email" required>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="col-sm-2 control-label">Telephone</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="{{ Input::old('telp') ? Input::old('telp') : $user->telp }}" name="telp">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset id="address">
                            <legend>Your Address</legend>
                            <div class="form-group required">
                                <label for="input-address-1" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="alamat" placeholder="Address" class="form-control" rows="3" required>{{ Input::old('alamat') ? Input::old('alamat') : $user->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-country" class="col-sm-2 control-label">Country</label>
                                <div class="col-sm-10">
                                    {{ Form::select("negara", array("" => "-- Please Select --") + $negara, ($user ? $user->negara :(Input::old("negara") ? Input::old("negara") :"")), array("required", "id"=>"negara", "data-rel"=>"chosen", "class"=>"form-control")) }}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="col-sm-2 control-label">Province</label>
                                <div class="col-sm-10">
                                    {{ Form::select("provinsi", array("" => "-- Please Select --") + $provinsi, ($user ? $user->provinsi :(Input::old("provinsi") ? Input::old("provinsi") :"")), array("required", "id"=>"provinsi", "data-rel"=>"chosen", "class"=>"form-control")) }}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-city" class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    {{ Form::select("kota", array("" => "-- Please Select --") + $kota, ($user ? $user->kota :(Input::old("kota") ? Input::old("kota") :"")), array("required", "id"=>"kota", "data-rel"=>"chosen", "class"=>"form-control")) }}
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" value="{{ Input::old('kodepos') ? Input::old('kodepos') : $user->kodepos }}" name="kodepos">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Your Password</legend>
                            <div class="form-group required">
                                <label for="input-password" class="col-sm-2 control-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input-password" placeholder="Current Password" name="oldpassword">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="col-sm-2 control-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input-password" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="col-sm-2 control-label">Password Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input-confirm" placeholder="Password Confirm" name="password_confirmation">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    {{ Form::close() }}
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">Account</h3>
                    <div class="list-group">
                        <ul class="list-item">
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
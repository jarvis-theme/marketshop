<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li class="active">Order Detail</li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered table table-hover">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Order Date</th>
                                <th>Detail Order</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Tracking Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $checkouttype==1 ? prefixOrder().$order->kodeOrder : '-' }}</td>
                                <td>{{ $checkouttype==1 ? waktu($order->tanggalOrder) : '-' }}</td>
                                <td>
                                    <ul class="simple-ul">
                                    @if ($checkouttype==1)
                                        @foreach ($order->detailorder as $detail)
                                        <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku['opsi1'].($detail->opsisku['opsi2'] != '' ? ' / '.$detail->opsisku['opsi2']:'').($detail->opsisku['opsi3'] !='' ? ' / '.$detail->opsisku['opsi3']:'').')':''}}</li>
                                        @endforeach
                                    @else
                                        <li>-</li>
                                    @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul class="simple-ul">
                                    @foreach ($order->detailorder as $qty_order)
                                        <li class="qty">{{ $qty_order->qty }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    @if($checkouttype==1)
                                    {{ price($order->total) }}
                                    
                                    @else 
                                        @if($order->status < 2)
                                            {{ price($order->total) }}
                                        @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                            {{ price($order->total - $order->dp) }}
                                        @else
                                            0
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $order->noResi != "" ? $order-noResi : "-"}}</td>
                                <td>
                                @if($checkouttype==1)
                                    @if($order->status==0)
                                    <span class="label label-warning">Pending</span>
                                    @elseif($order->status==1)
                                    <span class="label label-warning">Confirmation is Received</span>
                                    @elseif($order->status==2)
                                    <span class="label label-success">Payments Accepted</span>
                                    @elseif($order->status==3)
                                    <span class="label label-info">Delivered</span>
                                    @elseif($order->status==4)
                                    <span class="label label-default">Cancel</span>
                                    @endif
                                @endif  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container payment">
                @if($order->jenisPembayaran == 1 && $order->status == 0)
                <div class="well">
                    <h2 class="text-center">{{ trans('content.step5.confirm_btn') }}</h2>
                
                    {{-- */ $checkouttype==1 ? $konfirmasi = url('konfirmasiorder/'.$order->id) : '' /* --}}
                    <form class="form-horizontal" action="{{ $konfirmasi }}" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bank Account Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" placeholder="Bank Account Name" value="{{Input::old('nama')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bank Account Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="noRekPengirim" class="form-control" placeholder="Bank Account Number" value="{{Input::old('noRekPengirim')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Payment</label>
                            <div class="col-sm-10">
                                <select name="bank" class="form-control">
                                    <option value="">-- Select Payment --</option>
                                    @foreach ($banktrans as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bankdefault->nama }} - {{ $bank->noRekening }} A/n {{ $bank->atasNama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Amount Paid</label>
                            <div class="col-sm-10">
                                @if($checkouttype==1) 
                                <input type="number" name="jumlah" class="form-control theme-style" placeholder="Amount Paid" value="{{ $order->status==0 ? $order->total : '' }}" required>
                                @else
                                    @if($order->status < 2)
                                    <input type="number" name="jumlah" class="form-control theme-style" placeholder="Amount Paid" value="{{ $order->dp }}" required>
                                    @elseif(($order->status > 1 && $order->status < 4) || $order->status==7)
                                    <input type="number" name="jumlah" class="form-control theme-style" placeholder="Amount Paid" value="{{ $order->total - $order->dp }}" required>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                @if($paymentinfo!=null)
                <div class="heading-pattern">
                    <h2>Paypal Payment Details</h2>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr><td>Payment Status</td><td>:</td><td>{{$paymentinfo['payment_status']}}</td></tr>
                        <tr><td>Payment Date</td><td>:</td><td>{{$paymentinfo['payment_date']}}</td></tr>
                        <tr><td>Address Name</td><td>:</td><td>{{$paymentinfo['address_name']}}</td></tr>
                        <tr><td>Payer Email</td><td>:</td><td>{{$paymentinfo['payer_email']}}</td></tr>
                        <tr><td>Item Name</td><td>:</td><td>{{$paymentinfo['item_name1']}}</td></tr>
                        <tr><td>Receiver Email</td><td>:</td><td>{{$paymentinfo['receiver_email']}}</td></tr>
                        <tr><td>Total Payment</td><td>:</td><td>{{$paymentinfo['payment_gross']}} {{$paymentinfo['mc_currency']}}</td></tr>
                    </table>
                </div>
                <p>Thanks you for your order.</p><br>
                @endif
                @if($order->jenisPembayaran==2)
                <div class="well text-center">
                    <div id="paypal">
                        <div class="heading-pattern">
                            <h2>{{ trans('content.step5.confirm_btn') }} Paypal</h2>
                        </div>
                        <p>{{ trans('content.step5.paypal') }}</p>
                        {{ $paypalbutton }}
                    </div>
                    <div class="divider"></div>
                </div>
                @elseif($order->jenisPembayaran==4) 
                    @if(($checkouttype==1 && $order->status < 2) || ($checkouttype==3 && ($order->status!=6)))
                    <div class="well text-center">
                        <div class="heading-pattern">
                            <h2>{{ trans('content.step5.confirm_btn') }} iPaymu</h2>
                        </div>
                        <p>{{ trans('content.step5.ipaymu') }}</p>
                        <a class="btn-ipaymu" href="{{ url('ipaymu/'.$order->id) }}" target="_blank">{{ trans('content.step5.ipaymu_btn') }}</a>
                        <div class="divider"></div>
                    </div>
                    @endif
                @elseif($order->jenisPembayaran==5 && $order->status == 0)
                <div class="well text-center">
                    <div class="doku">
                        <div class="heading-pattern">
                            <h2>{{ trans('content.step5.confirm_btn') }} DOKU MyShortCart</h2>
                        </div>
                        <p>{{ trans('content.step5.doku') }}</p>
                        {{ $doku_button }}
                    </div>
                    <div class="divider"></div>
                </div>
                @elseif($order->jenisPembayaran == 6 && $order->status == 0)
                <div class="well text-center">
                    <div class="heading-pattern">
                        <h2>{{ trans('content.step5.confirm_btn') }} Bitcoin</h2>
                    </div>
                    <p>{{ trans('content.step5.bitcoin') }}</p>
                    {{ $bitcoinbutton }}
                    <div class="divider"></div>
                </div>
                @elseif($order->jenisPembayaran == 8 && $order->status == 0)
                <div class="well text-center">
                    <div class="heading-pattern">
                        <h2>{{ trans('content.step5.confirm_btn') }} Veritrans</h2>
                    </div>
                    <p>{{ trans('content.step5.veritrans') }}</p>
                    <button class="btn-veritrans" onclick="location.href='{{ $veritrans_payment_url }}'">
                        {{ trans('content.step5.veritrans_btn') }}
                    </button>
                    <div class="divider"></div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
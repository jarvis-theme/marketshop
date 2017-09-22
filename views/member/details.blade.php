<div id="container">
    <div class="container">
        <!-- Breadcrumb Start-->
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ url('member') }}">Account</a></li>
            <li class="active">Order History</li>
        </ul>
        <!-- Breadcrumb End-->
        <div class="row">
            <!--Middle Part Start-->
            <div id="content" class="col-sm-9">
                <h1 class="title">Order History</h1>
                <div class="table-responsive">
                    @if(list_order()->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td class="text-left">Product Name</td>
                                <td class="text-center">Order ID</td>
                                <td class="text-center">Tracking Number</td>
                                <td class="text-center">Qty</td>
                                <td class="text-center">Status</td>
                                <td class="text-center">Date Added</td>
                                <td class="text-right">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (list_order() as $item)
                            <tr>
                                <td class="text-left">
                                    <ul class="simple-ul">
                                        @foreach ($item->detailorder as $detail)
                                        <li>{{$detail->produk->nama}} {{$detail->opsiSkuId !=0 ? '('.$detail->opsisku["opsi1"].($detail->opsisku["opsi2"] != '' ? ' / '.$detail->opsisku["opsi2"]:'').($detail->opsisku["opsi3"] !='' ? ' / '.$detail->opsisku["opsi3"]:'').')':''}}</li>
                                        @endforeach 
                                    </ul>
                                </td>
                                <td class="text-center">{{ prefixOrder().$item->kodeOrder }}</td>
                                <td class="text-center">{{ $item->noResi!="" ? $item->noResi : "-" }}</td>
                                <td class="text-center">
                                    <ul class="simple-ul">
                                    @foreach ($item->detailorder as $qty_order)
                                        <li class="qty">{{ $qty_order->qty }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td class="text-center">
                                @if($pengaturan->checkoutType==1) 
                                    @if($item->status==0)
                                    <span class="label label-warning">Pending</span>
                                    @elseif($item->status==1)
                                    <span class="label label-warning">Confirmation is Received</span>
                                    @elseif($item->status==2)
                                    <span class="label label-success">Payments Accepted</span>
                                    @elseif($item->status==3)
                                    <span class="label label-info">Delivered</span>
                                    @elseif($item->status==4)
                                    <span class="label label-default">Cancel</span>
                                    @endif 
                                @endif
                                </td>
                                <td class="text-center">{{ waktu($item->tanggalOrder) }}</td>
                                <td class="text-right">{{ price($item->total) }}</td>
                                <td class="text-center"><a class="btn btn-info" title="View" target="_blank" data-toggle="tooltip" href="{{url('konfirmasiorder/'.$item->id)}}" data-original-title="View"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding-left: 1px">
                        {{ list_order()->links() }} 
                    </div>
                    @else
                    <span>You have not had any transactions.</span>
                    @endif
                </div>
            </div>
            <!--Middle Part End -->
            <!--Right Part Start -->
            <aside class="col-sm-3 hidden-xs" id="column-right">
                <h3 class="subtitle">Account</h3>
                <div class="list-group">
                    <ul class="list-item">
                        <li><a href="{{ url('logout') }}">Logout</a></li>
                        <li><a href="{{ url('member/'.$user->id.'/edit') }}">Update Profile</a></li>
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
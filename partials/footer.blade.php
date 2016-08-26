    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row">
                    <div class="contact col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h5>Contact Details</h5>
                        <ul>
                            <li class="address"><i class="fa fa-map-marker"></i>{{ $kontak->alamat }}</li>
                            @if(!empty($kontak->telepon))
                            <li class="mobile"><i class="fa fa-phone"></i>{{ $kontak->telepon }}</li>
                            @endif
                            @if(!empty($kontak->hp))
                            <li class="mobile"><i class="fa fa-mobile"></i>{{ $kontak->hp }}</li>
                            @endif
                            @if(!empty($kontak->bb))
                            <li class="mobile"><i class="fa fa-comments"></i>{{ $kontak->bb }} (BBM)</li>
                            @endif
                            <li class="email"><i class="fa fa-envelope"></i>Send email via our <a href="{{ url('kontak') }}">Contact Us</a>
                        </ul>
                    </div>
                    @foreach(all_menu() as $key=>$menu)
                        @if($key == '1')
                        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            <h5>Information</h5>
                            <ul>
                                @foreach($menu->link as $link_menu1)
                                @if($menu->id == $link_menu1->tautanId)
                                <li><a href="{{menu_url($link_menu1)}}">{{$link_menu1->nama}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @elseif($key == '2')
                        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            <h5>Customer Service</h5>
                            <ul>
                                @foreach($menu->link as $link_menu2)
                                @if($menu->id == $link_menu2->tautanId)
                                <li><a href="{{menu_url($link_menu2)}}">{{$link_menu2->nama}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endforeach
                    @foreach(all_menu() as $key=>$menu)
                        @if($key == '0')
                        <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                            <h5>{{ $menu->nama }}</h5>
                            <ul>
                                @foreach($menu->link as $link_menu3)
                                @if($menu->id == $link_menu3->tautanId)
                                <li><a href="{{menu_url($link_menu3)}}">{{$link_menu3->nama}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endforeach
                    <div class="column col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h5>Newsletter</h5>
                        <form action="{{@$mailing->action}}" method="post">
                            <div class="form-group">
                                <label class="control-label" for="subscribe">Sign up to receive latest news and updates.</label>
                                <input id="signup" type="email" required="" placeholder="Email address" name="email" class="form-control" required {{ @$mailing->action==''? 'disabled=""' : ''}}>
                            </div>
                            <input type="submit" value="Subscribe" class="btn btn-primary" {{ @$mailing->action==''?'disabled="disabled" style="opacity: 0.5; cursor: default;"':'' }}>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fpart-second">
            <div class="container">
                <div id="powered" class="clearfix">
                    <div class="powered_text pull-left flip">
                        <p>{{ Theme::place('title') }} &copy; {{ date('Y') }} | Powered by <a class="title-copyright" href="//jarvis-store.com" target="_blank"> Jarvis Store</a></p>
                    </div>
                    <div class="social pull-right flip">
                        @if(!empty($kontak->fb))
                        <a href="{{ url($kontak->fb) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/facebook.png')}}" alt="Facebook" title="Facebook"></a>
                        @endif
                        @if(!empty($kontak->tw))
                        <a href="{{ url($kontak->tw) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/twitter.png')}}" alt="Twitter" title="Twitter"></a>
                        @endif
                        @if(!empty($kontak->pt))
                        <a href="{{ url($kontak->pt) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/pinterest.png')}}" alt="Pinterest" title="Pinterest"></a>
                        @endif
                        @if(!empty($kontak->gp))
                        <a href="{{ url($kontak->gp) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/google_plus.png')}}" alt="Google+" title="Google+"></a>
                        @endif
                        @if(!empty($kontak->tl))
                        <a href="{{ url($kontak->tl) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/tumblr.png')}}" alt="Tumblr" title="Tumblr"></a>
                        @endif
                        @if(!empty($kontak->ig))
                        <a href="{{ url($kontak->ig) }}" target="_blank"><img data-toggle="tooltip" src="{{url(dirTemaToko().'marketshop/assets/image/socialicons/instagram.png')}}" alt="Instagram" title="Instagram"></a>
                        @endif
                        @if(!empty($kontak->picmix))
                        <a href="{{ url($kontak->picmix) }}" target="_blank"><img data-toggle="tooltip" class="picmix-bottom" src="//s3-ap-southeast-1.amazonaws.com/cdn2.jarvis-store.com/blogs/event/icon-picmix.png" alt="Picmix" title="Picmix"></a>
                        @endif
                    </div>
                </div>
                <div class="bottom-row">
                    <!-- <div class="custom-text text-center">
                        <p>This is a CMS block. You can insert any content (HTML, Text, Images) Here. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div> -->
                    <div class="payments_types">
                        @foreach(list_banks() as $bank)
                            @if($bank->status == 1)
                            <img data-toggle="tooltip" src="{{ bank_logo($bank) }}" alt="{{ $bank->bankdefault->nama }}" title="{{ $bank->bankdefault->nama }}">
                            @endif
                        @endforeach
                        @foreach(list_payments() as $pay)
                            @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                            <img data-toggle="tooltip" src="{{ url('img/bank/ipaymu.jpg') }}" alt="ipaymu" title="Ipaymu">
                            @endif
                            @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                            <img data-toggle="tooltip" src="{{ url('img/bitcoin.png') }}" alt="bitcoin" title="Bitcoin">
                            @endif
                        @endforeach
                        @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                        <img data-toggle="tooltip" src="{{ url('img/bank/doku.jpg') }}" alt="doku myshortcart" title="Doku">
                        @endif
                        @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                        <img data-toggle="tooltip" src="{{ url('img/bank/veritrans.png') }}" alt="Veritrans" title="Veritrans">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="back-top"><a data-toggle="tooltip" title="Back to Top" href="javascript:void(0)" class="backtotop"><i class="fa fa-chevron-up"></i></a></div>
    </footer>
    <!--Footer End-->
    {{ pluginPowerup() }} 
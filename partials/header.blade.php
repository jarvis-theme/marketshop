        <div id="header">
            <!-- Top Bar Start-->
            <nav id="top" class="htop">
                <div class="container">
                    <div class="row">
                        <span class="drop-icon visible-sm visible-xs"><i class="fa fa-align-justify"></i></span>
                        <div class="pull-left flip left-top">
                            <div class="links">
                                <ul>
                                    @if(!empty($kontak->telepon))
                                    <li class="mobile"><i class="fa fa-phone"></i>{{ $kontak->telepon }}</li>
                                    @endif
                                    @if(!empty($kontak->hp))
                                    <li class="mobile"><i class="fa fa-mobile fa-2x"></i>{{ $kontak->hp }}</li>
                                    @endif
                                    @if(!empty($kontak->email))
                                    <li class="email"><a href="mailto:{{ $kontak->email }}"><i class="fa fa-envelope"></i>{{ $kontak->email }}</a></li>
                                    @endif
                                    <!-- <li class="wrap_custom_block hidden-sm hidden-xs"><a>Custom Block<b></b></a>
                                        <div class="dropdown-menu custom_block">
                                            <ul>
                                                <li>
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                                                <td><img alt="" src="image/banner/responsive.jpg"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><h4>CMS Blocks</h4></td>
                                                                <td><h4>Responsive Template</h4></td>
                                                            </tr>
                                                            <tr>
                                                                <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                                                                <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong><a class="btn btn-default btn-sm" href="#">Read More</a></strong></td>
                                                                <td><strong><a class="btn btn-default btn-sm" href="#">Read More</a></strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">Wish List (0)</a></li> -->
                                    <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                </ul>
                            </div>
                            <!-- <div id="language" class="btn-group">
                                <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> <img src="image/flags/gb.png" alt="English" title="English">English <i class="fa fa-caret-down"></i></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/gb.png" alt="English" title="English" /> English</button>
                                    </li>
                                    <li>
                                        <button class="btn btn-link btn-block language-select" type="button" name="GB"><img src="image/flags/ar.png" alt="Arabic" title="Arabic" /> Arabic</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="currency" class="btn-group">
                                <button class="btn-link dropdown-toggle" data-toggle="dropdown"> <span> $ USD <i class="fa fa-caret-down"></i></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                                    </li>
                                    <li>
                                        <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div id="top-links" class="nav pull-right flip">
                            <ul>
                                @if ( is_login() )
                                <li class="dropdown" id="my_account">
                                    <a href="{{ url('member') }}">My Account <i class="fa fa-caret-down"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('member') }}">My Account</a></li>
                                        <li><a href="{{ url('member#history') }}">Order History</a></li>
                                        <li><a href="{{ url('konfirmasiorder') }}">Order Confirmation</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                <li><a href="{{ url('member') }}">Login</a></li>
                                <li><a href="{{ url('member/create') }}">Register</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Top Bar End-->
            <!-- Header Start-->
            <header class="header-row">
                <div class="container">
                    <div class="table-container">
                        <!-- Logo Start -->
                        <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                            <div id="logo"><a href="{{ url('/') }}"><img class="img-responsive" src="{{ logo_image_url() }}" title="{{ Theme::place('title') }}" alt="Logo {{ Theme::place('title') }}" /></a></div>
                        </div>
                        <!-- Logo End -->
                        <!-- Mini Cart Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12" id="shoppingcartplace">
                            {{ shopping_cart() }}
                        </div>
                        <!-- Mini Cart End-->
                        <!-- Search Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                            <form action="{{ url('search') }}" method="post">
                                <div id="search" class="input-group">
                                    <input id="filter_name" type="text" name="search" value="" placeholder="Search" class="form-control input-lg" required />
                                    <button type="submit" class="button-search"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- Search End-->
                    </div>
                </div>
            </header>
            <!-- Header End-->
            <!-- Main Menu Start-->
            <div class="container">
                <nav id="menu" class="navbar">
                    <div class="navbar-header"> <span class="visible-xs visible-sm"> Menu <b></b></span></div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="home_link" title="Home" href="{{ url('/') }}"><span>Home</span></a></li>
                            @if(list_category()->count() > 0)
                            {{-- */ $item = 0; /* --}}
                            <li class="mega-menu dropdown"><a>Categories</a>
                                <div class="dropdown-menu">
                                    <div class="column col-lg-2 col-md-3">
                                        <a></a>
                                        <div>
                                            <ul>
                                                @foreach(list_category() as $key=>$menu)
                                                <li>
                                                    @if($menu->parent=='0')
                                                    <a href="{{ slugKategori($menu) }}">{{$menu->nama}} {{ count($menu->anak) > 0 ? '<span>&rsaquo;</span>' : '' }}</a>
                                                        @if(count($menu->anak) > 0)
                                                        <div class="dropdown-menu">
                                                            <ul>
                                                                @foreach($menu->anak as $submenu)
                                                                @if($submenu->parent == $menu->id)
                                                                <li>
                                                                    <a href="{{ slugKategori($submenu) }}">{{ $submenu->nama }} {{ count($submenu->anak) > 0 ? '<span>&rsaquo;</span>' : '' }}</a>
                                                                    @if(count($submenu->anak) > 0)
                                                                    <div class="dropdown-submenu">
                                                                        <ul>
                                                                            @foreach($submenu->anak as $submenu2)
                                                                            @if($submenu2->parent == $submenu->id)
                                                                            <li>
                                                                                <a href="{{ slugKategori($submenu2) }}">{{ $submenu2->nama }}</a>
                                                                            </li>
                                                                            @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                    @endif
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                        {{-- */ $item++ /* --}}
                                                    @endif
                                                </li>
                                                    @if($item % 6 == 0 && $item !=0)
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="column col-lg-2 col-md-3">
                                                        <a></a>
                                                        <div>
                                                            <ul>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                            @if(list_koleksi()->count() > 0)
                            <li class="menu_brands dropdown">
                                <a>{{ trans('content.frontend_shop_menu.collection') }}</a>
                                <div class="dropdown-menu">
                                    @foreach(list_koleksi() as $collection)
                                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6">
                                        <a href="{{ koleksi_url($collection) }}">
                                            <img src="{{ koleksi_image_url($collection->gambar,'thumb') }}" title="{{ $collection->nama }}" alt="{{ $collection->nama }}" style="max-width:60px; max-height:60px;" />
                                        </a><a href="{{ koleksi_url($collection) }}">{{ $collection->nama }}</a>
                                    </div>
                                    @endforeach
                                </div>
                            </li>
                            @endif
                            <!-- <li class="custom-link"><a href="#">Custom Links</a></li>
                            <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>Custom Block</a>
                                <div class="dropdown-menu custom_block">
                                    <ul>
                                        <li>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                                        <td><img alt="" src="image/banner/responsive.jpg"></td>
                                                        <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h4>CMS Blocks</h4></td>
                                                        <td><h4>Responsive Template</h4></td>
                                                        <td><h4>Dedicated Support</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                                                        <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                                                        <td>This is a CMS block. You can insert any content (HTML, Text, Images) Here.</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                                                        <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                                                        <td><strong><a class="btn btn-primary btn-sm" href="#">Read More</a></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown"><a>Pages</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="category.html">Category (Grid/List)</a></li>
                                        <li><a href="product.html">Product</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="compare.html">Compare</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="search.html">Search</a></li>
                                        <li><a href="manufacturer.html">Brands</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="email-template" target="_blank">Email Template Page</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                        <li><a href="elements-forms.html">Forms</a></li>
                                        <li><a href="careers.html">Careers</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="sitemap.html">Sitemap</a></li>
                                        <li><a href="contact-us.html">Contact Us</a></li>
                                    </ul>                
                                    <ul>
                                <li><a href="login.html">Login</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="order-history.html">Order History</a></li>
                                        <li><a href="order-information.html">Order Information</a></li>
                                        <li><a href="return.html">Return</a></li>
                                        <li><a href="gift-voucher.html">Gift Voucher</a></li>
                                </ul>
                                </div>
                            </li> -->
                            <li class="contact-link"><a href="{{ url('kontak') }}">Contact Us</a></li>
                            <li class="custom-link-right"><a href="{{ url('produk') }}" target="_blank"> Buy Now!</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Main Menu End-->
        </div>
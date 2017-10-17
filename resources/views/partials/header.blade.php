<div class="header">
            <div class="topbar">
                <div class="container">
                    <div class="topbar-left">
                        <ul class="topbar-nav clearfix">
                            @if (Auth::user())
                            <li><span class="phone">{{ Auth::user()->phone_number }}</span></li>
                            <li><span class="email">{{ Auth::user()->email }}</span></li>
                            @endif
                        </ul>
                    </div>
                    <div class="topbar-right">
                      <div class="topbar-right">
                          <ul class="topbar-nav clearfix">
                              @if (Auth::guest())
                                  <li><a href="{{url('/login')}}" class="login">Đăng nhập</a></li>
                                  <li><a href="{{url('/register')}}" class="login">Đăng ký</a></li>
                              @else
                                  <li class="dropdown">
                                      <a href="#" class="account dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                                      <ul class="dropdown-menu dropdown-menu-right">
                                          <li><a title="My Account" href="#">Tài khoản của tôi</a></li>
                                          <li><a title="My info" href="#">Thông tin cá nhân</a></li>
                                          <li><a title="My Cart" href="#">Giỏ hàng của tôi</a></li>
                                          <li><a title="Checkout" href="#">Checkout</a></li>
                                          @if (Auth::user()->roles==1)
                                          <li><a title="Admin" href="{{ url('admin') }}">Trang quản trị</a></li>
                                          @endif
                                          <li>
                                              <a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                  Đăng xuất
                                              </a>

                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                              </form>
                                          </li>
                                      </ul>
                                  </li>
                              @endif
                          </ul>
                      </div>
                    </div>
                </div><!-- /.container -->
            </div><!-- /.topbar -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{url('/')}}" class="logo"><img src="images/logo.png" alt=""></a>
                        </div>
                        <div class="col-md-9">
                            <div class="support-client">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="box-container time">
                                            <div class="box-inner">
                                                <h2>Giờ mở cửa</h2>
                                                <p>thứ 2- CN: 8.00 - 18.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container free-shipping">
                                            <div class="box-inner">
                                                <h2>ship Hàng free</h2>
                                                <p>dưới 40 km</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box-container money-back">
                                            <div class="box-inner">
                                                <h2>Hoàn tiền 100%</h2>
                                                <p>nếu có sự cố trong vòng 30 ngày</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.support-client -->
                            <form class="form-search" method="GET" action="timkiem-sp">
                                <input type="text" class="input-text" name="key" id="search" placeholder="Tìm kiếm sản phẩm...">
                                <button type="submit" class="btn btn-danger"><span class="fa fa-search"></span></button>
                            </form>
                            <div class="mini-cart">
                                <div class="top-cart-title">
                                    <a href="{{ url('gio-hang') }}" class="dropdown-toggle" data-toggle="dropdown">
                                        Giỏ hàng
                                        <span class="price">{{\Cart::total()}}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="cart-listing">
                                            @foreach(\Cart::content() as $content)
                                            <div class="media">

                                                    <div class="media-left">
                                                        <a href="{{ url('gio-hang') }}"><img src="{{asset('images/products/'.$content->options->img)}}" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="{{url('deletecart/'.$content->rowId)}}"><button type="button" class="remove-cart-item" >&times;</button></a>
                                                        <h4>{{$content->name}}</h4>
                                                        <div class="mini-cart-qty">số lượng: {{$content->qty}}</div>
                                                        <div class="mini-cart-price">{{$content->price*$content->qty}}</div>
                                                    </div>

                                            </div>
                                            @endforeach
                                        </div><!-- /.cart-listing -->
                                        <div class="mini-cart-subtotal">Shipping: <span class="price">50.000</span></div>
                                        <div class="mini-cart-subtotal">Total: <span class="price">{{\Cart::total()}}</span></div>
                                        <div class="checkout-btn">
                                            <a href="{{url('checkout')}}" class="btn btn-default btn-md fwb">EDIT CART</a>
                                            <a href="{{url('checkout')}}" class="btn btn-default btn-md fwb">CHECK OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('page.menu')
                        <div class="col-md-9">
                            <ul class="menu clearfix visible-lg visible-md">
                                <li><a href="{{url('/')}}">Trang chủ</a></li>
                                <li><a href="#">giới thiệu</a></li>
                                <li><a href="{{ url('san-pham') }}">Sản Phẩm</a></li>
                                <li><a href="#">Chia sẻ</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-primary navbar-static-top hidden-lg hidden-md">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h2 class="navbar-brand visible-xs">Menu</h2>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Computer <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Desktop PC</a></li>
                                        <li><a href="#">Notebook</a></li>
                                        <li><a href="#">Gaming</a></li>
                                        <li><a href="#">Mouse &amp; Keyboard</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Camera <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Walkera</a></li>
                                        <li><a href="#">Fpv System &amp; Parts</a></li>
                                        <li><a href="#">RC Cars &amp; Parts</a></li>
                                        <li><a href="#">Helicopters &amp; Part</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Smart Phone <span class="fa fa-angle-down"></span></a>                                   <ul class="dropdown-menu">
                                        <li><a href="#">Accessories for iPhone</a></li>
                                        <li><a href="#">Accessories for iPad</a></li>
                                        <li><a href="#">Accessories for Tablet PC</a></li>
                                        <li><a href="#">Tablet PC</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Electtronic <span class="fa fa-angle-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Batteries &amp; Chargers</a></li>
                                        <li><a href="#">Headphone, Headset</a></li>
                                        <li><a href="#">Home Audio</a></li>
                                        <li><a href="#">Mp3 Player Accessories</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">New Arrivals</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container -->
                </nav>
            </div><!-- /.header-bottom -->
        </div><!-- /.header -->

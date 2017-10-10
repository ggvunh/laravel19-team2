<div class="col-md-3">
    <div class="mega-container visible-lg visible-md">
        <div class="navleft-container">
            <div class="mega-menu-title"><h3>Danh mục sản phẩm</h3></div>
            <div class="mega-menu-category">
                <ul class="nav">
                    @foreach($menus as $a)
                        @if(count($a->categories) > 0)
                            <li><a href="#">{{$a->name}}</a>
                                <div class="wrap-popup column1">
                                    <div class="popup">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav">
                                                    @foreach($a->categories as $b)
                                                        <li><a href="{{url('sanpham/'.$b->id)}}">{{$b->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

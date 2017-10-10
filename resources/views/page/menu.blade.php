<div class="col-md-3">
    <div class="mega-container visible-lg visible-md">
        <div class="navleft-container">
            <div class="mega-menu-title"><h3>Danh mục sản phẩm</h3></div>
            <div class="mega-menu-category">
                <ul class="nav">
                    @foreach($menus as $menus)
                        @if(count($menus->categories) > 0)
                            <li><a href="#">{{$menus->name}}</a>
                                <div class="wrap-popup column1">
                                    <div class="popup">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <ul class="nav">
                                                    @foreach($menus->categories as $categories)
                                                        <li><a href="{{url('sanpham/'.$categories->id)}}">{{$categories->name}}</a></li>
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

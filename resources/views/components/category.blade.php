<div class="col-lg-3 col-md-5">
    <div class="sidebar">
        <div class="sidebar__item">
            <h4>Tất cả danh mục</h4>
            <hr>
            <ul class="shop-hover">
                @foreach ($category_global as $category_shop)
                    <li>
                        <a class="{{ Request::is(['slug'=>$category_shop->slug]) ? 'active' : '' }}"
                        href="{{route('view',['slug'=>$category_shop->slug])}}">
                        {{$category_shop->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar__item">
            <h4>Lọc Theo Giá</h4>
            <hr>
            <div class="price-range-wrap">
                <ul class="shop-hover">
                    <li><a class="{{ Request::get('gia') == 1 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 1])}}">Dưới 100.000đ</a></li>
                    <li><a class="{{ Request::get('gia') == 2 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 2])}}">Từ 100.000 - 300.000đ</a></li>
                    <li><a class="{{ Request::get('gia') == 3 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 3])}}">Từ 300.000 - 500.000đ</a></li>
                    <li><a class="{{ Request::get('gia') == 4 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 4])}}">Từ 500.000 - 700.000đ</a></li>
                    <li><a class="{{ Request::get('gia') == 5 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 5])}}">Từ 700.000 - 1.000.000đ</a></li>
                    <li><a class="{{ Request::get('gia') == 6 ? 'active' : ''}}" href="{{ request()->fullUrlWithQuery(['gia' => 6])}}">Trên 1.000.000đ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
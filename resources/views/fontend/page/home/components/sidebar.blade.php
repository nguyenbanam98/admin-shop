<div class="col-xl-3 col-lg-4 col-md-5">
  <div class="sidebar-categories">
    <div class="head">Danh mục</div>
    <ul class="main-categories">
      <li class="common-filter">
        <form action="#">
          <ul>
            @foreach($categories as $category)
            <li class="filter-list"><input class="pixel-radio" type="radio" id="{{$category->id}}" name="brand"><label for="{{$category->id}}">{{$category->name}}<span> ({{$category->products->count()}})</span></label></li>
            @endforeach
          </ul>
        </form>
      </li>
    </ul>
  </div>
  <div class="sidebar-filter">
    <div class="top-filter-head">Lọc Sản Phẩm</div>
    <div class="common-filter">
      <div class="head">Thương hiệu</div>
      <form action="#">
        <ul>
          @foreach ($brands as $brand)
          <li class="filter-list"><input class="pixel-radio" type="radio" id="{{$brand->id}}" name="brand"><label for="{{$brand->id}}">{{$brand->name}}<span>({{$brand->products->count()}})</span></label></li>
          @endforeach
        </ul>
      </form>
    </div>
    <div class="common-filter">
      <div class="head">Price</div>
      <div class="price-range-area">
        <div id="price-range"></div>
        <div class="value-wrapper d-flex">
          <div class="price">Price:</div>
          <span>$</span>
          <div id="lower-value"></div>
          <div class="to">to</div>
          <span>$</span>
          <div id="upper-value"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xl-9 col-lg-8 col-md-7">
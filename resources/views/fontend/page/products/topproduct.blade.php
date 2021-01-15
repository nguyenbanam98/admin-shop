<section class="related-product-area">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Popular Item in the market</p>
      <h2>Top <span class="section-intro__style">Product</span></h2>
    </div>
    <div class="row mt-30">
      @foreach($topProducts as $key => $product)
        @if($key % 3 == 0)
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
        <div class="single-search-product-wrapper">
        @endif
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{config('image.base_url_thumbnail').$product->feature_image_path }}" alt=""></a>
            <div class="desc">
                <a href="{{route('product.detail', $product->slug)}}" class="title">{{$product->name}}</a>
                <div class="price">{{number_format($product->price)}}VNĐ</div>
            </div>
          </div>
      
        @if($key % 3 == 2)
        </div>
        </div>
        @endif
      @endforeach

      {{-- <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
        <div class="single-search-product-wrapper">
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-4.png')}}" alt=""></a>
            <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-5.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-6.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
        <div class="single-search-product-wrapper">
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-7.png')}}" alt=""></a>
            <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-8.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-9.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
        <div class="single-search-product-wrapper">
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-1.png')}}" alt=""></a>
            <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-2.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
          <div class="single-search-product d-flex">
            <a href="#"><img src="{{asset('fontend/img/product/product-sm-3.png')}}" alt=""></a>
            <div class="desc">
              <a href="#" class="title">Gray Coffee Cup</a>
              <div class="price">$170.00</div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</section>


@push('css')

@endpush
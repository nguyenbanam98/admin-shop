@extends('fontend.layouts.master')

@push('css')
  <link href="{{asset('fontend/product/list.css')}}" rel="stylesheet" />

@endpush
@section('content')

<div class="product_image_area">
  <div class="container">
    <div class="row s_product_inner">
      <div class="col-lg-6">
        <div class="owl-carousel owl-theme s_Product_carousel">
          <div class="single-prd-item">
            <img class="img-fluid" src="{{config('image.base_url_larage').$product->feature_image_path}}" alt="">
          </div>
          <!-- <div class="single-prd-item">
            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
          </div>
          <div class="single-prd-item">
            <img class="img-fluid" src="img/category/s-p1.jpg" alt="">
          </div> -->
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="s_product_text">
          <h3>{{$product->name}}</h3>
          <h2>{{number_format($product->price)}}VNĐ</h2>
          <ul class="list">
            <li><a href="#"><span>Khuyến mãi</span> : {{number_format(number_price($product->price, $product->sale))}} VNĐ</a></li>
            <li><a class="active" href="#"><span>Thương hiệu</span> : {{$product->brand->name}}</a></li>
            <li><a href="#"><span>Tình trạng</span> : Còn hàng</a></li>
          </ul>
          <div>{!! $product->description !!}</div>
          <div class="product_count">
            <form action="{{route('save.cart', ['id' => $product->id])}}" method="post">
              @csrf
              <label for="qty">Quantity:</label>
              <input type="number" id="qty" name="quantity" min="1" value="1" />
              <button class="button primary-btn">Add to Cart</button>
          </form>

          </div>
          <div class="card_area d-flex align-items-center">
            <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
            <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nội dung</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
         aria-selected="false">Specification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
         aria-selected="false">Comments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
         aria-selected="false">Reviews</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
        {!! $product->content !!}
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5>128mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5>508mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5>85mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5>52gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Quality checking</h5>
                </td>
                <td>
                  <h5>yes</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Freshness Duration</h5>
                </td>
                <td>
                  <h5>03days</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>When packeting</h5>
                </td>
                <td>
                  <h5>Without touch of hand</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Each Box contains</h5>
                </td>
                <td>
                  <h5>60pcs</h5>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="comment_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-1.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2018 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item reply">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-2.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2018 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-3.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <h5>12th Feb, 2018 at 05:56 pm</h5>
                    <a class="reply_btn" href="#">Reply</a>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Post a comment</h4>
              <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="row total_rate">
              <div class="col-6">
                <div class="box_total">
                  <h5>Overall</h5>
                  <h4>4.0</h4>
                  <h6>(03 Reviews)</h6>
                </div>
              </div>
              <div class="col-6">
                <div class="rating_list">
                  <h3>Based on 3 Reviews</h3>
                  <ul class="list">
                    <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                         class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                         class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                         class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                         class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                    <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                         class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="review_list">
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-1.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-2.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
              <div class="review_item">
                <div class="media">
                  <div class="d-flex">
                    <img src="img/product/review-3.png" alt="">
                  </div>
                  <div class="media-body">
                    <h4>Blake Ruiz</h4>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                  commodo</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Add a Review</h4>
              <p>Your Rating:</p>
              <ul class="list">
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
                <li><a href="#"><i class="fa fa-star"></i></a></li>
              </ul>
              <p>Outstanding</p>
              <form action="#/" class="form-contact form-review mt-3">
                <div class="form-group">
                  <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                  <textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                </div>
                <div class="form-group text-center text-md-right mt-3">
                  <button type="submit" class="button button--active button-review">Submit Now</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('fontend.page.products.topproduct')

@endsection


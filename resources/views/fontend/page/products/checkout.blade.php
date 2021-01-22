@extends('fontend.layouts.master')
  
  @section('content')
  <section class="checkout_area section-margin--small">
    <div class="container">
        <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="button button-coupon" href="#">Apply Coupon</a>
        </div>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session('success') }}
                    </div> 
                    @endif
                    @if(Session::has('err'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session('err') }}
                    </div> 
                    @endif
                    <h3>Thông tin mua hàng</h3>
 
                    <form class="row contact_form" action="{{route('checkout')}}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" value="{{$transaction->name ?? ''}}" name="name" placeholder="Name">
                        </div>
                      
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="phone" value="{{$transaction->phone ?? ''}}"  placeholder="Phone number">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" value="{{$transaction->email ?? ''}}" placeholder="Email Address">
                        </div>
                 
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" name="address" value="{{$transaction->address ?? ''}}" placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <textarea class="form-control" name="notes" id="message" rows="1" placeholder="Order Notes">{{$transaction->notes ?? ''}}</textarea>
                        </div>
                  
                        

                   
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                            @foreach($contents as $content)
                            <li><a href="#" style="font-size: 12px;">{{$content->name}} <span class="middle">x {{$content->qty}}</span> <span class="last">{{number_format($content->price)}}VNĐ</span></a></li>
                            @endforeach
                            
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>{{Cart::subtotal()}}VNĐ</span></a></li>
                            <li><a href="#">Phí vận chuyển: <span>{{Cart::tax()}}VNĐ</span></a></li>
                            <li><a href="#">Total <span>{{Cart::total()}}VNĐ</span></a></li>
                        </ul>
                      
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" value="1" name="type">
                                <label for="f-option5">Trả bằng tiền mặt</label>
                                <div class="check"></div>
                            </div>
                            
                        </div>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" value="2" name="type">
                                <label for="f-option6">Thanh toán online</label>
                                <div class="check"></div>
                            </div>
                            
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option7" value="3" name="type">
                                <label for="f-option7">Paypal </label>
                                <img src="{{ asset('fontend/img/product/card.jpg')}}" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                account.</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <div class="text-center">
                          <button type="submit" class="button button-paypal">Thanh toán</button>
                        </div>
                    </form>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  @endsection
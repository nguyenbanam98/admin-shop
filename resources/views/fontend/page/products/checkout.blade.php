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
                    <h3>Thông tin mua hàng</h3>
                    @if(isset($shipping))
                    <form class="row contact_form" action="{{route('update.checkout', ['id' => $shipping->id])}}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" value="{{$shipping->name}}" id="first" name="name" placeholder="Name">
                        </div>
                      
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" value="{{$shipping->phone}}" id="number" name="phone"  placeholder="Phone number">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" value="{{$shipping->email}}" id="email" name="email" placeholder="Email Address">
                        </div>
                 
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" value="{{$shipping->address}}" name="address" placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <textarea class="form-control" name="notes" id="message"  rows="1" placeholder="Order Notes">{{$shipping->notes ?? ''}}</textarea>
                        </div>
                  
                        <button type="submit" class="button mt-2">Gửi</button>
                        
                    </form>

                    @elseif($shipping == null)


                    <form class="row contact_form" action="{{route('save.checkout')}}" method="post" novalidate="novalidate">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="name" placeholder="Name">
                        </div>
                      
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="phone"  placeholder="Phone number">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                        </div>
                 
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <textarea class="form-control" name="notes" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                  
                        <button type="submit" class="button mt-2">Gửi</button>
                        
                    </form>
                    @endif

                   
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
                        <form action="{{route('order.checkout')}}" method="post">
                            @csrf
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" value="1" name="payment_option">
                                <label for="f-option5">Trả bằng tiền mặt</label>
                                <div class="check"></div>
                            </div>
                            
                        </div>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" value="2" name="payment_option">
                                <label for="f-option5">Thanh toán online</label>
                                <div class="check"></div>
                            </div>
                            
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" value="3" name="payment_option">
                                <label for="f-option6">Paypal </label>
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
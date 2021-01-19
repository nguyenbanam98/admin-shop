<section class="cart_area">
  <div class="container">
      <div class="cart_inner">
      
          <div class="table-responsive">
              <table class="table update_cart_url" data-url="{{route('update.qty')}}">
                  <thead>
                      <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col">Trạng thái</th>
                      </tr>
                  </thead>
            
                  <tbody>
                      @foreach($contents as $key => $content)
                      <tr>
                          <td>
                              <div class="media">
                                  <div class="d-flex">
                                      <img src="{{config('image.base_url_thumbnail') . $content->options->image}}" alt="">
                                  </div>
                                  <div class="media-body">
                                      <p>{{$content->name}}</p>
                                  </div>
                              </div>
                          </td>
                          <td>
                              <h5>{{number_format($content->price)}}VNĐ</h5>
                          </td>
                       
                          <td>
                              <div class="product_count">
                                  <input type="text" name="quantity" id="sst-{{$content->name}}" maxlength="12" title="Quantity:" value="{{$content->qty}}"
                                      class="input-text qty">
                                  <button onclick="var result = document.getElementById('sst-{{$content->name}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                      class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                  <button onclick="var result = document.getElementById('sst-{{$content->name}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                      class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                              </div>
                          </td>
                          <td>
                              <h5 class="mt-0">{{number_format($content->price * $content->qty)}}VNĐ</h5>
                                  
                              
                          </td>
                          <td>
                              <a  href="#"
                                    data-id="{{$content->rowId}}"
                                    data-url="{{ route('update.qty')}}"
                                  class="btn btn-sm text-primary update_cart"><i class="fas fa-pencil-alt"></i></a>
                              <a href="#"
                                  data-url="{{ route('delete.cart', ['id' => $content->rowId]) }}"
                                  class="btn btn-sm action_delete text-danger"><i class="fas fa-trash"></i></a>
                          </td>

                      </tr>

                      @endforeach
                      <tr class="bottom_button">
                          <td>
                              <a class="button" href="#">Update Cart</a>
                          </td>
                          <td>

                          </td>
                          <td>

                          </td>
                          <td>
                              <div class="cupon_text d-flex align-items-center">
                                  <input type="text" placeholder="Coupon Code">
                                  <a class="primary-btn" href="#">Apply</a>
                                  <a class="button" href="#">Have a Coupon?</a>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>

                          </td>
                          <td>

                          </td>
                          <td>
                              <h5>Subtotal</h5>
                          </td>
                          <td>
                              <h5>{{Cart::subtotal()}}VNĐ</h5>
                          </td>
                      </tr>
                      <tr class="shipping_area">
                          <td class="d-none d-md-block">

                          </td>
                          <td>

                          </td>
                          <td>
                              <h5>Shipping</h5>
                          </td>
                          <td>
                              <div class="shipping_box">
                                  <ul class="list">
                                      <li>Thuế <span>{{Cart::tax()}} VNĐ</span></li>
                                      <li>Phí vận chuyển <span>Free</span></li>
                                  </ul>
                                  <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                  <select class="shipping_select">
                                      <option value="1">Bangladesh</option>
                                      <option value="2">India</option>
                                      <option value="4">Pakistan</option>
                                  </select>
                                  <select class="shipping_select">
                                      <option value="1">Select a State</option>
                                      <option value="2">Select a State</option>
                                      <option value="4">Select a State</option>
                                  </select>
                                  <input type="text" placeholder="Postcode/Zipcode">
                                  <a class="gray_btn btn-primary" href="cart/checkout">Thanh toán</a>
                              </div>
                          </td>
                      </tr>
                      <tr class="out_button_area">
                          <td class="d-none-l">

                          </td>
                          <td class="">

                          </td>
                          <td>

                          </td>
                          <td>
                              <div class="checkout_btn_inner d-flex align-items-center">
                                  <span class="gray_btn" href="cart/checkout">Thành tiền</span>
                                  <a class="primary-btn ml-2" href="cart/checkout">{{Cart::total()}}VNĐ</a>
                              </div>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</section>


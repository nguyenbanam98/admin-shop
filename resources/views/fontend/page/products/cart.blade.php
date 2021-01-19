@extends('fontend.layouts.master')
  
  @section('content')

  <div class="cart_wrapper">
    @include('fontend.page.products.cart_component')

  </div>

@endsection




@push('scripts')

    <script src="{{asset('fontend/product/delete.js')}}"></script>
    <script src="{{asset('fontend/product/update.js')}}"></script>

@endpush
@extends('admin.layouts.master')

@section('title')

<title>Order</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Order Page</h1>
  </div>

  <div class="section-body">

  <br><br>
    <table class="table table-striped table-hover table-sm table-bordered">

        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Avatar</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key => $order)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>
                        {{$order->product->name}}
                     </td>
                    <td>
                    </td>
                    <td>
                      {{number_format($order->price)}} VNĐ

                    </td>
                    <td>
                      {{$order->qty}}
                    </td>
                    <td>
                      {{number_format($order->price * $order->qty)}} VNĐ
                    </td>
                    <td>
                        <a href="#"
                            data-url="{{ route('admin.transactions.delete.order', ['id' => $order->id]) }}"
                            class="btn btn-danger btn-sm action_delete">Delete</a>
                    </td>
                </tr>
            @endforeach
                                
        </tbody>
        </table>
</div>

</section>

@endsection


@push('scripts')
    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
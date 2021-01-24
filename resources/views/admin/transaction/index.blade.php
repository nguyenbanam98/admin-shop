@extends('admin.layouts.master')

@section('title')

<title>Transaction</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Transaction Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif
  <br><br>
    <table class="table table-striped table-hover table-sm table-bordered">

        <thead>
            <tr>
                <th>STT</th>
                <th>Người mua</th>
                <th>Số tiền</th>
                <th>Thanh toán</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($transactions))
            @foreach($transactions as $key => $transaction)
                <tr>
                    <td>{{$key + $transactions->firstitem()}}</td>
                    <td>
                      <ul>
                        <li>{{$transaction->name }}</li>
                        <li>{{$transaction->email }}</li>
                        <li>{{$transaction->phone}}</li>
                        <li>{{$transaction->address}}</li>
                      </ul>
                     </td>
                    <td>
                        {{number_format($transaction->total_money)}} VNĐ
                    </td>
                    <td>
                      <span class="badge badge-primary">
                        {{$transaction->getType($transaction->type)['name']}}

                      </span>
                    </td>
                    <td>
                      <span class="badge badge-{{$transaction->getStatus($transaction->status)['class']}}">
                        {{$transaction->getStatus($transaction->status)['name']}}
                      </span>
                    </td>
                    <td>
                        <a href="{{route('admin.transactions.view', ['id' => $transaction->id])}}" class="btn btn-primary btn-sm">View</a>

                        <a href=""
                            data-url="{{ route('admin.transactions.delete', ['id' => $transaction->id]) }}"
                            class="btn btn-danger btn-sm action_delete">Delete</a>
                      <div class="dropdown d-inline mr-2">
                        <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Trạng thái
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('admin.transactions.action', ['receive', $transaction->id])}}">Tiếp nhận</a>
                          <a class="dropdown-item" href="{{route('admin.transactions.action', ['process', $transaction->id])}}">Đang vận chuyển</a>
                          <a class="dropdown-item" href="{{route('admin.transactions.action', ['success', $transaction->id])}}">Đã bàn giao</a>
                          <a class="dropdown-item" href="{{route('admin.transactions.action', ['cancel', $transaction->id])}}">Đã hủy</a>
                        </div>
                      </div>
                    </td>
                </tr>
            @endforeach
            @endif
                                
        </tbody>
        </table>
    {{ $transactions->links() }}
</div>

</section>

@endsection


@push('scripts')
    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
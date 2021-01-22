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
	<a href="{{ route('admin.transactions.create') }}" class="btn btn-info btn-sm">Add transaction</a>
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
                      {{$transaction->getType($transaction->type)['name']}}

                    </td>
                    <td>
                      <span class="badge badge-{{$transaction->getStatus($transaction->status)['class']}}">
                        {{$transaction->getStatus($transaction->status)['name']}}
                      </span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm js_preview_transaction">View</a>

                        <a href=""
                            data-url="{{ route('admin.transactions.delete', ['id' => $transaction->id]) }}"
                            class="btn btn-danger btn-sm action_delete">Delete</a>
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
    <script src="{{asset('assets/js/page/bootstrap-modal.js')}}"></script>
    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
@extends('admin.layouts.master')

@section('title')

<title>Brand</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Category Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif
	<a href="{{ route('admin.brands.create') }}" class="btn btn-info btn-sm">Add brand</a>
	<br><br>


    <table class="table table-striped table-hover table-sm table-bordered">

        <thead>
            <tr>
                <th>STT</th>
                <th>Ten danh muc</th>
                <th>Trang thai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($brands))
            @foreach($brands as $key => $brand)
                <tr>
                    <td>{{$key + $brands->firstitem()}}</td>
                    <td>{{$brand->name}}</td>
                    <td>
                        <a href="{{route('admin.brands.action', ['active','id' => $brand->id])}}" class="badge badge-{{$brand->getStatus($brand->active)['class']}}">{{$brand->getStatus($brand->active)['name']}}</a>
                    </td>
                    <td>
                        <a href="{{route('admin.brands.edit', ['id' => $brand->id])}}" class="btn btn-primary btn-sm">Edit</a>

                        <a href=""
                            data-url="{{ route('admin.brands.delete', ['id' => $brand->id]) }}"
                            class="btn btn-danger btn-sm action_delete">Delete</a>
                    </td>
                </tr>
            @endforeach
            @endif
                                
        </tbody>
        </table>
    {{ $brands->links() }}
</div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
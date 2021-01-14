@extends('admin.layouts.master')

@section('title')

<title>Menu</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Menu Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.menus.create') }}" class="btn btn-info btn-sm">Add menu</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
      @foreach ($menus as $key => $menu)
			<tr>
				<td>{{ $key + $menus->firstitem() }}</td>
				<td>{{ $menu->name }}</td>
				<td>
				
					<a href="{{route('admin.menus.edit', ['id' => $menu->id])}}" class="btn btn-primary btn-sm">Edit</a>
          <a href=""
            data-url="{{ route('admin.menus.delete', ['id' => $menu->id]) }}"
            class="btn btn-danger btn-sm action_delete">Delete</a>
					
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $menus->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
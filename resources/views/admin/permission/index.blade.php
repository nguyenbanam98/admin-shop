@extends('admin.layouts.master')

@section('title')

<title>Permissions</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Permissions Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.permissions.create') }}" class="btn btn-info btn-sm">Add permissions</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Mô tả</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
      @foreach ($permissions as $key => $permission)
			<tr>
				<td>{{ $key + $permissions->firstitem() }}</td>
				<td>{{ $permission->name }}</td>
				<td>{{ $permission->display_name }}</td>
				<td>
				
					<a href="{{route('admin.permissions.edit', ['id' => $permission->id])}}" class="btn btn-primary btn-sm">Edit</a>
          <a href=""
            data-url="{{ route('admin.permissions.delete', ['id' => $permission->id]) }}"
            class="btn btn-danger btn-sm action_delete">Delete</a>
					
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $permissions->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
@extends('admin.layouts.master')

@section('title')

<title>Role</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Role Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.roles.create') }}" class="btn btn-info btn-sm">Add role</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th scope="col">Tên vai trò</th>
        <th scope="col">Mô tả vai trò</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
      @foreach ($roles as $key => $role)
			<tr>
				<td>{{ $key + $roles->firstitem() }}</td>
				<td>{{ $role->name }}</td>
				<td>{{ $role->display_name }}</td>
				<td>
				
					<a href="{{route('admin.roles.edit', ['id' => $role->id])}}" class="btn btn-primary btn-sm">Edit</a>
          <a href=""
            data-url="{{ route('admin.roles.delete', ['id' => $role->id]) }}"
            class="btn btn-danger btn-sm action_delete">Delete</a>
					
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $roles->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
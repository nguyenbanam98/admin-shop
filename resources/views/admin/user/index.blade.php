@extends('admin.layouts.master')

@section('title')

<title>User</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>User Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm">Add user</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
      @foreach ($users as $key => $user)
			<tr>
				<td>{{ $key + $users->firstitem() }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
				
					<a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-primary btn-sm">Edit</a>
          <a href=""
            data-url="{{ route('admin.users.delete', ['id' => $user->id]) }}"
            class="btn btn-danger btn-sm action_delete">Delete</a>
					
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $users->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
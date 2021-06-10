@extends('admin.layouts.master')

@section('title')

<title>Category</title>

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
	<a href="{{ route('admin.categories.create') }}" class="btn btn-info btn-sm">Add category</a>
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
      @foreach ($categories as $key => $category)
			<tr>
				<td>{{ $key + $categories->firstitem() }}</td>
				<td>{{ $category->name }}</td>
				<td>
					<a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-primary btn-sm">Edit</a>
                      <a href=""
                         data-url="{{ route('admin.categories.delete', ['id' => $category->id]) }}"
						 class="btn btn-danger btn-sm action_delete">
                          Delete
                      </a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $categories->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush

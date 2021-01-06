@extends('admin.layouts.master')

@section('title')

<title>Tag</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Tag Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.tags.create') }}" class="btn btn-info btn-sm">Add tag</a>
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
      @foreach ($tags as $key => $tag)
			<tr>
				<td>{{ $key + $tags->firstitem() }}</td>
				<td>{{ $tag->name }}</td>
				<td>
				
					<a href="{{route('admin.tags.edit', ['id' => $tag->id])}}" class="btn btn-primary btn-sm">Edit</a>
          <a href=""
            data-url="{{ route('admin.tags.delete', ['id' => $tag->id]) }}"
            class="btn btn-danger btn-sm action_delete">Delete</a>
					
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	{{ $tags->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
@extends('admin.layouts.master')

@section('title')

<title>Slider</title>

@endsection

@push('css')
    <link href="{{asset('admins/product/product.css')}}" rel="stylesheet" />
@endpush

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Slider Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<a href="{{ route('admin.sliders.create') }}" class="btn btn-info btn-sm">Add menu</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th scope="col">Tên slider</th>
				<th scope="col">Desciption</th>
				<th scope="col">Hình ảnh</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody class="post_table">
      @foreach($sliders as $key => $slider)

					<tr>
							<td>{{ $key + $sliders->firstitem() }}</td>
							<td>{{ $slider->name }}</td>
							<td>{{ $slider->description }}</td>
							<td><img src="{{ $slider->image_path }}" class="product_image_150_100"></td>

							<td>
									<a href="{{route('admin.sliders.edit', ['id' => $slider->id])}}"
									class="btn btn-primary">Edit</a>
									<a href=""
											data-url="{{ route('admin.sliders.delete', ['id' => $slider->id]) }}"
											class="btn btn-danger action_delete">Delete</a>

							</td>
				</tr>
			@endforeach

		</tbody>
	</table>
	{{ $sliders->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
@extends('admin.layouts.master')

@section('title')

<title>Product</title>

@endsection

@push('css')
    <link href="{{asset('admins/product/product.css')}}" rel="stylesheet" />
@endpush

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Product Page</h1>
	</div>

	<form class="form-inline" action="{{route('admin.products.search')}}" method="get">

		<div class="form-group mx-sm-2 mb-2">
				<label class="sr-only"> Nhập ID </label>
				<input type="text" class="form-control" name="product_id"
							 value="{{ request()->product_id }}"
							 placeholder="Nhập Id">
		</div>

		<div class="form-group mx-sm-2 mb-2">
				<label class="sr-only"> Nhập tên sản phẩm </label>
				<input type="text"
							 value="{{ request()->name }}"
							 class="form-control" placeholder="Nhập tên sản phẩm" name="name">
		</div>


		<div class="form-group mx-sm-2 mb-2">
				<label class="sr-only"> Nhập tags sản phẩm </label>
				<input type="text"
							 value="{{ request()->tags }}"
							 class="form-control" placeholder="Nhập tags sản phẩm" name="tags">
		</div>

		<div class="form-group mx-sm-2 mb-2">
				<label class="sr-only"> Nhập tên sản phẩm </label>
				<select class="form-control" name="category_id">
						<option value="">Chọn danh mục sản phẩm</option>
						{!! $htmlOptionSearchHeader !!}
				</select>
		</div>

		<div class="form-group mx-sm-2 mb-2">
			<label class="sr-only"> Nhập tên thương hiệu </label>
			<select class="form-control" name="brand_id">
					<option value="">Chọn thương hiệu</option>
					{!! $htmlOptionBrandSearchHeader !!}
			</select>
		</div>


		<button type="submit" class="btn btn-primary mb-2">Search</button>

		<button type="submit" value="true" name="export" class="btn btn-success mb-2 ml-2">Export excel</button>
</form>



  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div>
	@endif

	<a href="{{ route('admin.products.create') }}" class="btn btn-info btn-sm">Add product</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
					<th scope="col">#</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Giá</th>
					<th scope="col">Hình ảnh</th>
					<th scope="col">Danh mục</th>
					<th scope="col">Trang thai</th>
          <th scope="col">Nổi bật</th>
					<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody class="post_table">

		 @foreach($products as $key => $productItem)

		 <tr>
			<td>{{ $key + $products->firstitem() }}</td>
{{--             <td>{{ $key + 1 }}</td>--}}
			<td>{{ $productItem->name }}</td>
			<td>{{ number_format($productItem->price)}}</td>
			<td><img src="{{ $productItem->feature_image_path }}" class="product_image_150_100"></td>
			<td>{{ optional($productItem->category)->name }}</td>
			<td>
				<a href="{{route('admin.products.action', ['active','id' => $productItem->id])}}" class="badge badge-{{$productItem->getStatus($productItem->active)['class']}}">{{$productItem->getStatus($productItem->active)['name']}}</a>
			</td>
			<td>
					<a href="{{route('admin.products.action', ['hot','id' => $productItem->id])}}" class="badge badge-{{$productItem->getHot($productItem->hot)['class']}}">{{$productItem->getHot($productItem->hot)['name']}}</a>
			</td>
			<td>
					<a href="{{route('admin.products.edit', ['id' => $productItem->id])}}"
						 class="btn btn-primary">Edit</a>
			<a  href=""
					data-url="{{ route('admin.products.delete', ['id' => $productItem->id]) }}"
					class="btn btn-danger action_delete">Delete</a>

			</td>
			</tr>

		 @endforeach

			</tbody>
	</table>
	{{ $products->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush

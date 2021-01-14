@extends('admin.layouts.master')

@section('title')

<title>Setting</title>

@endsection

@push('css')
    <link href="{{asset('admins/product/product.css')}}" rel="stylesheet" />
@endpush

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Setting Page</h1>
  </div>

  <div class="section-body">

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif

	<div class="dropdown d-inline mr-2">
		<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Add setting
		</button>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="{{ route('admin.settings.create') . '?type=Text' }}">Text</a>
			<a class="dropdown-item" href="{{ route('admin.settings.create') . '?type=Textarea' }}">Textarea</a>
		</div>
	</div>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th scope="col">Tên slider</th>
				<th scope="col">Config key</th>
				<th scope="col">Config value</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody class="post_table">
      @foreach($settings as $key => $setting)

					<tr>
							<td>{{ $key + $settings->firstitem() }}</td>
							<td>{{ $setting->config_key }}</td>
							<td>{{ $setting->config_value }}</td>

							<td>
									<a href="{{route('admin.settings.edit', ['id' => $setting->id])}}"
									class="btn btn-primary">Edit</a>
									<a href=""
											data-url="{{ route('admin.settings.delete', ['id' => $setting->id]) }}"
											class="btn btn-danger action_delete">Delete</a>

							</td>
				</tr>
			@endforeach

		</tbody>
	</table>
	{{ $settings->links() }}
  </div>
</section>

@endsection


@push('scripts')

    <script src="{{asset('admins/delete.js')}}"></script>

@endpush
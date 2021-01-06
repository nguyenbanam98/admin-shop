@extends('admin.layouts.master')

@section('title')

<title>Slider</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add Slider</h1>
  </div>

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{ Session('success') }}
  </div> 
  @endif
  
  <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>Tên slider</label>
      <input type="text"
             class="form-control @error('name') is-invalid @enderror"
             name="name"
             placeholder="Nhập tên"
             value="{{old('name')}}"
      >
   
      </div>
      @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
          <label>Mô tả slider</label>
          <textarea
              class="form-control @error('description') is-invalid @enderror"
              name="description" rows="4">{{ old('description') }}
          </textarea>

      </div>
      @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
          <label>Hình ảnh</label>
          <input type="file"
                class="form-control-file @error('image_path') is-invalid @enderror"
                name="image_path"

          >
      </div>
      @error('image_path')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary btn-sm ">Add slider</button>
  
  </form>
</section>

@endsection
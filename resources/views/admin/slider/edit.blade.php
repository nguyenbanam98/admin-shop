@extends('admin.layouts.master')

@section('title')

<title>Slider</title>

@endsection


@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add slider</h1>
  </div>

  
  <form action="{{ route('admin.sliders.update', ['id' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>Tên slider</label>
    <input type="text"
           class="form-control @error('name') is-invalid @enderror"
           name="name"
           placeholder="Nhập tên"
           value="{{ $slider->name }}"
    >
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

    <div class="form-group">
        <label>Mô tả slider</label>

        <textarea
            class="form-control @error('description') is-invalid @enderror"
            name="description" rows="4">{{ $slider->description }}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Hình ảnh</label>
        <input type="file"
              class="form-control @error('image_path') is-invalid @enderror"
              name="image_path"

        >
        <div class="col-md-4 mt-1">
            <div class="row">
                <img class="product_image_150_100" src="{{ $slider->image_path }}" alt="">
            </div>
        </div>
        @error('image_path')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    

    <button type="submit" class="btn btn-primary btn-sm ml-3">Update slider</button>
  
  </form>
</section>

@endsection
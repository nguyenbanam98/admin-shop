@extends('admin.layouts.master')

@section('title')

<title>Product</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Edit product</h1>
  </div>

  @if(count($errors)>0)
    @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>  		
    @endforeach
  @endif
  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{ Session('success') }}
  </div> 
  @endif
  
  <form action="{{route('admin.products.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}" >
    </div>
    <div class="form-group">
      <label>Giá sản phẩm</label>
      <input type="text"
          class="form-control"
          name="price"
          placeholder="Nhập giá sản phẩm"
          value="{{$product->price}}"

      >
    </div>
    <div class="form-group">
      <label>Chọn danh mục</label>
      <select class="form-control select2_init" name="category_id">
          <option value="">Chọn danh mục</option>
          {!! $htmlOption !!}
      </select>
    </div>

    <div class="form-group">
      <label>Tags</label>
      <select class="form-control select2" multiple="" name="tags[]">
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}"
            @foreach ($product->tags as $value)
                {{ $tag->id== $value->id ? 'selected' : ''}}
            @endforeach
            >{{ $tag->name }}</option> 
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Brand</label>
      <select class="form-control select2_init" name="brand_id">
          @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{$product->brand_id ==  $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option> 
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Ảnh đại diện</label>
      <input type="file"
          class="form-control-file"
          name="feature_image_path"
          {{-- value="{{$product->feature_image_path}}" --}}
      >
   </div>
   <div class="mb-2">
      <img src="{{ $product->feature_image_path }}" 
        style=" width: 130px;
                height: 100px;
                object-fit: cover;" 
        class="card-img-top" alt="">
    </div>
    <div class="form-group">
      <label>Mô tả</label>
      <textarea class="form-control" name="description" id="description">{{ $product->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control" name="content" id="content">{{ $product->content }}</textarea>
    </div>
    <div class="form-group">
      <label>Ảnh chi tiết</label>
      <input type="file"
          multiple
          class="form-control-file"
          name="image_path[]"
      >
    </div>
    <div class="col-md-12 container_image_detail">
      <div class="row">
          @foreach($product->images as $producImageItem)
                      <div class="col-md-3 mr-1">
                          <div class="card">
                              <img  src="{{ $producImageItem->image_path }}" class="card-img-top" alt="" style=" width: 130px;
                              height: 100px;
                              object-fit: cover;">
                          </div>
                      </div>
          @endforeach
      </div>
    </div>
  
    <button type="submit" class="btn btn-primary btn-sm ml-3">Edit</button>

  
    </form>
 
</section>

@endsection

@push('scripts')

     
  <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

  <script src="{{asset('admins/filemanager.js')}}"></script>

  
@endpush
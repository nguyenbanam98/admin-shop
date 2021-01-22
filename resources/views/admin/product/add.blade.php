@extends('admin.layouts.master')

@section('title')

    <title>Product</title>

@endsection

@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Add post</h1>
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

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="text"
                       class="form-control"
                       name="price"
                       placeholder="Nhập giá sản phẩm"
                       value="{{old('price')}}"

                >
            </div>
            <div class="form-group">
                <label>Giá khuyến mãi</label>
                <input type="text" class="form-control" name="sale">
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
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Brand</label>
                <select class="form-control select2_init" name="brand_id">
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file"
                       class="form-control-file"
                       name="feature_image_path"
                >
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" name="content" id="content"></textarea>
            </div>
            <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input type="file"
                       multiple
                       class="form-control-file"
                       name="image_path[]"
                >
            </div>

            <button type="submit" class="btn btn-primary btn-sm ml-3">Add post</button>


        </form>

    </section>

@endsection

@push('scripts')


    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="{{asset('admins/filemanager.js')}}"></script>


@endpush

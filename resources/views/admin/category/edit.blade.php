@extends('admin.layouts.master')

@section('title')

<title>Category</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add Category</h1>
  </div>

  @if(count($errors)>0)
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>  		
  @endforeach
  @endif
  

  
  <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
  @csrf
    <div class="form-group col-md-6">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}">

      <div class="form-group">
        <label for="categorySelect">Chon danh muc</label>
        <select class="form-control" name="parent_id" id="categorySelect">
            <option value="0">Chon danh muc cha</option>
            {!! $htmlOption !!}
        </select>
      </div>
    </div>
    
    

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add Category</button>
  
  </form>
</section>

@endsection
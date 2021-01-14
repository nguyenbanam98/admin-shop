@extends('admin.layouts.master')

@section('title')

<title>tag</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add Tag</h1>
  </div>

  @if(count($errors)>0)
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>  		
  @endforeach
  @endif
  

  
  <form action="{{ route('admin.tags.update', ['id' => $tag->id]) }}" method="POST">
  @csrf
  <div class="form-group col-md-6">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name', $tag->name)}}">
  </div>
  

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add tag</button>
  
  </form>
</section>

@endsection
@extends('admin.layouts.master')

@section('title')

<title>Tag</title>

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

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{ Session('success') }}
  </div> 
  
  @endif
  
  <form action="{{ route('admin.tags.store') }}" method="POST">
  @csrf
  <div class="form-group col-md-6">
    <label>Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add Tag</button>
  
  </form>
</section>

@endsection
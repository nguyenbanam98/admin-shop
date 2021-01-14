@extends('admin.layouts.master')

@section('title')

<title>Permission</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add permission</h1>
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
  
  <form action="{{ route('admin.permissions.store') }}" method="POST">
  @csrf
    <div class="form-group col-md-6">
      <label>Name</label>
      <input type="text" class="form-control" name="name">

      <label>Mô tả</label>
      <input type="text" class="form-control" name="display_name">

      <label>Key code</label>
      <input type="text" class="form-control" name="key_code">


      <div class="form-group">
        <label>Chọn permission cha</label>
        <select class="form-control" name="parent_id">
            <option value="0">Chọn permission cha</option>
            {!! $optionSelect !!}
        </select>
      </div>
    </div>

    
  

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add</button>
  
  </form>
</section>

@endsection
@extends('admin.layouts.master')

@section('title')

<title>Menu</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add Menu</h1>
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
  
  <form action="{{ route('admin.menus.store') }}" method="POST">
  @csrf
    <div class="form-group col-md-6">
      <label>Name</label>
      <input type="text" class="form-control" name="name">

      <div class="form-group">
        <label>Chọn menu cha</label>
        <select class="form-control" name="parent_id">
            <option value="0">Chọn menu cha</option>
            {!! $optionSelect !!}
        </select>
      </div>
    </div>

    
  

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add menu</button>
  
  </form>
</section>

@endsection
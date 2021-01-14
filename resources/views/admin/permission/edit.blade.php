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
  

  
  <form action="{{ route('admin.permissions.update', ['id' => $permission->id]) }}" method="POST">
  @csrf
    <div class="form-group col-md-6">
      <label>Name</label>
      <input type="text" class="form-control" name="name" value="{{old('name', $permission->name)}}">

      <div class="form-group">
        <label for="permissionSelect">Chon danh muc</label>
        <select class="form-control" name="parent_id" id="permissionSelect">
            <option value="0">Chon danh muc cha</option>
            {!! $optionSelect !!}
        </select>
      </div>
    </div>
    
    

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add permission</button>
  
  </form>
</section>

@endsection
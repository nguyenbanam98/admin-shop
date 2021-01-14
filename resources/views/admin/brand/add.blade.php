@extends('admin.layouts.master')

@section('title')

<title>Brand</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add brand</h1>
  </div>

  @if(count($errors)>0)
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" role="alert">
    {{ $error }}
  </div>  		
  @endforeach
  @endif

        <form action="{{route('admin.brands.store')}}" method="post">
            @csrf
            @include('admin.brand.form')
            
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
 </section>
@endsection
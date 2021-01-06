@extends('admin.layouts.master')

@section('title')

<title>Setting</title>

@endsection

@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add Setting</h1>
  </div>

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{ Session('success') }}
  </div> 
  @endif
  
  <form action="{{ route('admin.settings.store') .'?type=' .request()->type }}" method="POST">
  @csrf
      <div class="form-group">
        <label>Config key</label>
        <input type="text"
              class="form-control"
              name="config_key"
              placeholder="Nhập config key"
        >
    
        </div>
        @error('config_key')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if(request()->type === 'Text')
            <div class="form-group">
                <label>Config value</label>
                <input type="text"
                      class="form-control "
                      name="config_value"
                      placeholder="Nhập config value"
                >
                
            </div>
           
        @elseif(request()->type === 'Textarea')
        <div class="form-group">
            <label>Config value</label>
            <textarea
                class="form-control "
                name="config_value"
                placeholder="Nhập config value"
                style="height: 130px;"
            ></textarea>
            
        </div>
    

      @endif

    <button type="submit" class="btn btn-primary btn-sm ">Add </button>
  
  </form>
</section>

@endsection
@extends('admin.layouts.master')

@section('title')

<title>Setting</title>

@endsection


@section('content')


<section class="section">
  <div class="section-header">
    <h1>Add setting</h1>
  </div>


  
  <form action="{{ route('admin.settings.update', ['id' => $setting->id]) }}" method="POST">
  @csrf
      <div class="form-group">
        <label>Config key</label>
        <input type="text"
              class="form-control @error('config_key') is-invalid @enderror"
              name="config_key"
              placeholder="Nhập config key"
              value="{{ $setting->config_key }}"
        >
        @error('config_key')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    @if(request()->type === 'Text')
        <div class="form-group">
            <label>Config value</label>
            <input type="text"
                  class="form-control @error('config_value') is-invalid @enderror"
                  name="config_value"
                  placeholder="Nhập config value"
                  value="{{ $setting->config_value }}"
            >
            @error('config_value')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @elseif(request()->type === 'Textarea')
        <div class="form-group">
            <label>Config value</label>
            <textarea
                  class="form-control @error('config_value') is-invalid @enderror"
                  name="config_value"
                  placeholder="Nhập config value"
                  rows="5"
            >{{ $setting->config_value }}</textarea>
            @error('config_value')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

    @endif
    
    

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add menu</button>
  
  </form>
</section>

@endsection
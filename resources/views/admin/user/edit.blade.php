@extends('admin.layouts.master')

@section('title')
    <title>User</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add user</h1>
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
        <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name user</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>


            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary btn-sm ml-3">Add user</button>
        </form>
    </section>
@endsection

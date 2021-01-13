@extends('admin.layouts.master')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Brand', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('admin.brands.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Ten danh muc</th>
                            <th>Trang thai</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($brands))
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <a href="{{route('admin.brands.action', ['active','id' => $brand->id])}}" class="badge badge-{{$brand->getStatus($brand->active)['class']}}">{{$brand->getStatus($brand->active)['name']}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.brands.edit', ['id' => $brand->id])}}"><i class="far fa-edit text-info mr-2"></i></a>
                                        <a href="{{route('admin.brands.action', ['delete','id' => $brand->id])}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                          @endif
                                              
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $brands->links() }}
                </div>
              
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
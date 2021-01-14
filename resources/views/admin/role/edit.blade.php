@extends('admin.layouts.master')

@section('title')

<title>User</title>

@endsection

@push('css')
    <link href="{{asset('admins/role/add.css')}}" rel="stylesheet" />
@endpush

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
  
  <form action="{{ route('admin.roles.update', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
    <div class="col-md-12">
      @csrf
      <div class="form-group">
          <label>Tên vai trò</label>
          <input type="text"
                 class="form-control"
                 name="name"
                 placeholder="Nhập tên vai trò"
                 value="{{ $role->name }}"
          >

      </div>

      <div class="form-group">
          <label>Mô tả vai trò</label>

          <textarea
              class="form-control"
              name="display_name" rows="4">{{ $role->display_name }}</textarea>

      </div>

      <div class="form-group">
        <label>Thêm vai trò</label>
    
      </div>
  </div>
  
  <div class="col-md-12">
    <div class="row">

            <div class="card border-primary mb-3 col-md-12">
            
                <div class="row">
                      
                        <table class="table table-striped" id="sortable-table">
                          <thead style="background-color: rgb(103,119,239)">
                            <tr>
                              <th>
                                <div class="custom-checkbox custom-control ">
                                  <input type="checkbox" class="custom-control-input checkall" id="checkbox-all">
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                              </th>
                              <th>Module name</th>
                              <th>Read</th>
                              <th>Write</th>
                              <th>Update</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($permissionsParent as $permissionsParentItem)                            
                        
                                <tr class="table-role">
                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control" style="margin-left: 60px;">
                                      <input type="checkbox" class="custom-control-input checkbox_wrapper" id="{{$permissionsParentItem->id}}">
                                      <label for="{{$permissionsParentItem->id}}" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </td>
                                  <td>{{$permissionsParentItem->name }}</td>
                                @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)

                                  <td class="p-0 text-center">
                                    <div class="custom-checkbox custom-control" style="margin-left: 60px; padding-left: 0px;">
                                      <input type="checkbox" name="permission_id[]" 
                                             class="custom-control-input checkbox_childrent" 
                                             {{ $pemissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                             value="{{ $permissionsChildrentItem->id }}" 
                                             id="{{$permissionsChildrentItem->id}}"
                                      >
                                      <label for="{{$permissionsChildrentItem->id}}" class="custom-control-label ">&nbsp;</label>
                                    </div>
                                  </td>
                              @endforeach

                                  
                                </tr>

                        @endforeach

                        </tbody>
                              
                          
                      </table>
                </div>
            </div>


      </div>


</div>
  

    <button type="submit" class="btn btn-primary btn-sm ml-3">Add user</button>
  
  </form>
</section>

@endsection

@push('scripts')

    <script src="{{asset('admins/role/add.js')}}"></script>

@endpush
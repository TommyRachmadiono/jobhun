@extends('templates.masteradmin')
@section('content')

<div class="row">
<div class="col-md-12">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>User </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tbl_user">
                    <thead>
                        <tr>
                            <th style="text-align: center;"> Name </th>
                            <th style="text-align: center;"> Username </th>
                            <th style="text-align: center;"> Gender </th>
                            <th style="text-align: center;"> Role </th>
                            <th style="text-align: center;"> Email </th>
                            <th style="text-align: center;"> Phone </th>
                            <th style="text-align: center;"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->username }} </td>
                                <td> {{ $user->biodata->gender }} </td>
                                <td> {{ $user->role }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->biodata->phone }} </td>
                                
                                <td style="text-align: center;"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_edit{{ $user->id }}"> 
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <form style="display: inline-block;" action="{{ route('user.delete', $user->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger"> 
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                        </tr>
                        <!-- Modal -->
<div class="modal fade" id="modal_edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User {{ $user->username }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="username" class="control-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="username" placeholder="Username" name="username" required="" value="{{ $user->username }}" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="name" placeholder="Name" name="name" required="" value="{{ $user->name }}" readonly="">
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="role" class="control-label">Role</label>
                            <select class="form-control" name="role" id="role" required="">
                                <option value="">-- Select Role --</option>
                                <option value="{{ $user->role }}" selected="">{{ $user->role }} (picked)</option>
                                <option value="administrator">Administrator</option>
                                <option value="author">Author</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection

@section('custom_js')
<script type="text/javascript">
$(document).ready(function() {
    $('#tbl_user').DataTable();
});
</script>
@endsection
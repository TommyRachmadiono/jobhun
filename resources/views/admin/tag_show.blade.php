@extends('templates.masteradmin')
@section('content')

<div class="row">
<div class="col-md-12">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Tags </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tbl_tag">
                    <thead>
                        <tr>
                            <th style="text-align: center;"> ID </th>
                            <th style="text-align: center;"> Tag </th>
                            <th style="text-align: center;"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td> {{ $tag->id }} </td>
                                <td> {{ $tag->tag }} </td>
                                
                                <td style="text-align: center;"> 
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_edit{{ $tag->id }}"> 
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <form style="display: inline-block;" action="{{ route('tag.delete', $tag->id) }}" method="POST"> 
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger"> 
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    </form>
                                </td>
                        </tr>
                        <!-- Modal -->
<div class="modal fade" id="modal_edit{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User {{ $tag->tag }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('tag.update', $tag->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="username" class="control-label">ID</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="id" placeholder="Username" name="id" required="" value="{{ $tag->id }}" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label">Tag</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="tag" placeholder="Tag" name="tag" required="" value="{{ $tag->tag }}" >
                            </div>
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
    $('#tbl_tag').DataTable();
});
</script>
@endsection
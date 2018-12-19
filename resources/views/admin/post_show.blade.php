@extends('templates.masteradmin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Post </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="tbl_post">
                        <thead>
                            <tr>
                                <th style="text-align: center;"> Title </th>
                                <th style="text-align: center;"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td> {{ $post->title }} </td>

                                <td style="text-align: center;"> 
                                    <a href="{{ route('post_edit', $post->id) }}">
                                        <button class="btn btn-primary"> 
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <form style="display: inline-block;" action="{{-- {{ route('tag.delete', $tag->id) }} --}}" method="POST"> 
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger"> 
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            
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
            $('#tbl_post').DataTable();
        });
    </script>
    @endsection
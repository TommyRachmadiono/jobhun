@extends('templates.masteradmin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-plus font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> Add New Tag</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="tag" class="control-label">Tag Name</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-tag"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="tag" placeholder="Tag" name="tag" required="">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn blue">Submit</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
@endsection
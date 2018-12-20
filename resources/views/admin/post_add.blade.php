@extends('templates.masteradmin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-plus font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> {{ $type }} New Post</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="title" class="control-label">Title</label>
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                                <input type="text" class="form-control input-circle-right" id="title" placeholder="Title" name="title" required="" value="@isset($post) {{ $post->title }} @endisset" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="multiple" class="control-label">Select a Tag</label>
                            <select name="tags[]" id="multiple" class="form-control select2-multiple" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="featured_image" class="control-label">Featured Image</label>
                            @isset($post)
                            <img src="{{ asset('images/post/'.$post->featured_image) }}">
                            @endisset
                            <div class="input-group">
                                <span class="input-group-addon input-circle-left">
                                    <i class="fa fa-image"></i>
                                </span>
                                <input type="file" class="form-control input-circle-right" id="featured_image" name="featured_image" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" rows="3" style="resize: none;"></textarea>
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

<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXTRAS PORTLET-->
                                <div class="portlet light form-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Summernote Editor</span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form class="form-horizontal form-bordered">
                                            <div class="form-body">
                                                <div class="form-group last">
                                                    <label class="control-label col-md-2">Default Editor</label>
                                                    <div class="col-md-10">
                                                        <div name="summernote" id="summernote_1"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-2 col-md-10">
                                                        <button type="submit" class="btn green">
                                                            <i class="fa fa-check"></i> Submit</button>
                                                        <button type="button" class="btn default">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection

@section('custom_js')

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'content' );
</script>
@endsection
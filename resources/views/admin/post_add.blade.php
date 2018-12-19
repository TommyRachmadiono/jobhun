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
                            <label for="multiple" class="control-label">Select2 multi select</label>
                            <select name="tags" id="multiple" class="form-control select2-multiple" multiple>
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

@endsection

@section('custom_js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'content' );
</script>
@endsection
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
                <form role="form" action="@if($type == 'Edit') {{route('post.edit',$post->id)}} @else {{route('post.store') }} @endif" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @isset($post) 
                            <input name="_method" type="hidden" value="PATCH">
                    @endisset
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
                            <label for="multiple" class="control-label">Select Tags</label>
                            <select name="tags[]" id="multiple" class="form-control select2-multiple" multiple>
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}" @isset($post) @if(in_array($tag->id,$post->tags->pluck('id')->all())) selected @endif  @endisset>{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="featured_image" class="control-label">Featured Image</label>
                            <br />
                            @isset($post)
                            <img width="200" src="{{ asset('images/post/'.$post->featured_image) }}">
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
                            <div class="col-md-12">
                                 <textarea name="content">@isset($post) {!! $post->content !!} @endisset</textarea>
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

@section('custom_js')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    var options = {
        filebrowserImageBrowseUrl: '/jobhun/public/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/jobhun/public/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/jobhun/public/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/jobhun/public/laravel-filemanager/upload?type="Files&_token='
    };
    CKEDITOR.replace( 'content', options);
</script>
@endsection
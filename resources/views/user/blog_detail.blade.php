@extends('templates.masteruser')
@section('content')

<div class="fullscreen landing parallax banner" data-img-width="2000" data-img-height="1325" data-diff="100">

    <div class="overlay">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <h1 class="wow fadeInLeft">
                        {{ $post->title }}
                    </h1>

                    <div class="landing-text wow fadeInLeft">
                        <p> {!! $post->content !!} </p>

                    </div>                

                    <!-- header button -->
               {{--      <div class="head-btn wow fadeInLeft">
                        <a href="{{ route('detail_blog', $post->url) }}" class="btn-primary app-store">
                            <i class=""></i> <span> Read More</span>
                        </a>
                    </div> --}}

                </div> 
                
                <!-- phone image -->
                <div class="col-md-6">
                    <img src="{{ asset('images/post/'.$post->featured_image) }}" alt="phone" class="header-phone img-responsive wow fadeInRight">
                </div>
            </div>
        </div> 
    </div> 

</div>

@endsection()
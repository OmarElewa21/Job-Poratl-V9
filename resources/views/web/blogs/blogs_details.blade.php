@extends('web.layouts.app')
@section('title')
    {{ __('messages.post.post_details') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <!-- ===== Start of Candidate Profile Header Section ===== -->
    {{--    <section class="page-header blog-page-header">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>{{ __('messages.post.post_details') }}</h2>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- ===== End of Candidate Header Section ===== -->--}}

    {{--    <section class="ptb80" id="blog-post">--}}
    {{--        <div class="container">--}}
    {{--            <div class="col-md-8 col-xs-12 post-content-wrapper">--}}

    {{--                <div class="post-title">--}}
    {{--                    <h2>{{ html_entity_decode($blog->title) }}</h2>--}}

    {{--                    <div class="post-detail">--}}
    {{--                        <span><i class="fa fa-user"></i>{{ $blog->user->full_name }}</span>--}}
    {{--                        <span><i class="fa fa-clock-o"></i>{{ $blog->created_at->format('jS F, Y') }}</span>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="post-content">--}}

    {{--                    <div class="post-img">--}}
    {{--                        <img--}}
    {{--                            src="{{ !empty($blog->blog_image_url)?$blog->blog_image_url:asset('web/img/blog_default_image.jpg') }}"--}}
    {{--                            alt="">--}}
    {{--                    </div>--}}
    {{--                    <div class="post-detail-category-badge web-post-box">--}}
    {{--                        @forelse($blog->postAssignCategories->pluck('name')->toArray() as $categoryBadges)--}}
    {{--                            <span--}}
    {{--                                class="font-size-13px badge-pill badge-{{ getBadgeColor($loop->index) }}">{{$categoryBadges}}</span>--}}
    {{--                        @empty--}}
    {{--                            {{ __('messages.employer_menu.no_data_available') }}--}}
    {{--                        @endforelse--}}
    {{--                    </div>--}}
    {{--                    <p>{!! !empty($blog->description)? nl2br(($blog->description)):__('messages.common.n/a') !!}</p>--}}

    {{--                    <div>--}}
    {{--                        <div class="col-md-8 col-12 custom-blog">--}}
    {{--                            <div class="blog-widget">--}}
    {{--                                <h3 class="widget-title margin-bottom-25 comment-count post-comment-title"--}}
    {{--                                    id="post-comment">{{ __('messages.post.comments') }}--}}
    {{--                                    @if(! count($comments) == 0)--}}
    {{--                                        <span class="post-comment-title"--}}
    {{--                                              id="comment-count">({{ count($comments) }})</span>--}}
    {{--                                    @endif--}}
    {{--                                </h3>--}}
    {{--                                <div class="latest-comments">--}}
    {{--                                    <ul class="comment-listing">--}}
    {{--                                        @foreach($comments as $commentRecord)--}}
    {{--                                            <li id="li-comment-1680">--}}
    {{--                                                <div class="comments-box">--}}
    {{--                                                    <div class="comments-avatar">--}}
    {{--                                                        @if(isset($commentRecord->user_id))--}}
    {{--                                                            <img src="{{$commentRecord->user->avatar }}"--}}
    {{--                                                                 alt="user-image">--}}
    {{--                                                        @else--}}
    {{--                                                            <img src="{{ asset('web/img/default-user.png')}}"--}}
    {{--                                                                 alt="user-image">--}}
    {{--                                                        @endif--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="comments-text">--}}
    {{--                                                        <div class="avatar-name d-flex justify-content-between ">--}}
    {{--                                                            <h5 class="d-flex">{{ $commentRecord->name }}--}}
    {{--                                                                @if($commentRecord->user_id == getLoggedInUserId() && getLoggedInUser())--}}
    {{--                                                                    <a href="javascript:void(0)"--}}
    {{--                                                                       title="{{ __('messages.common.edit') }}"--}}
    {{--                                                                       class="edit-comment-btn action-btn"--}}
    {{--                                                                       data-id="{{$commentRecord->id}}">--}}
    {{--                                                                        <i class="fa fa-edit edit-comment text-danger"></i>--}}
    {{--                                                                    </a>--}}
    {{--                                                                    <a href="javascript:void(0)"--}}
    {{--                                                                       title="{{ __('messages.common.delete') }}"--}}
    {{--                                                                       class="action-btn delete-comment-btn"--}}
    {{--                                                                       data-id="{{$commentRecord->id}}">--}}
    {{--                                                                        <i class="fa fa-trash delete-comment text-warning"></i>--}}
    {{--                                                                    </a>--}}
    {{--                                                                @endif--}}
    {{--                                                            </h5>--}}
    {{--                                                            <span class="date-color float-right createdTime">--}}
    {{--                                                                {{ $commentRecord->created_at->format('d, M Y g:i a') }}</span>--}}
    {{--                                                        </div>--}}
    {{--                                                        <p id="comment-{{$commentRecord->id}}">{{ $commentRecord->comment }}</p>--}}
    {{--                                                    </div>--}}
    {{--                                                </div>--}}
    {{--                                                <hr class="last-comment-border">--}}
    {{--                                            </li>--}}
    {{--                                        @endforeach--}}
    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="blog-widget" id="respond">--}}
    {{--                                <h4 class="widget-title post-comment-title">{{ __('messages.post.post_a_comments') }}</h4>--}}
    {{--                                <div class="widget-content">--}}
    {{--                                    {{ Form::open(['id' => 'commentForm']) }}--}}
    {{--                                    {{ Form::token() }}--}}
    {{--                                    {{ Form::hidden('comment-id', null, ['class' => 'comment-id','value' => '']) }}--}}
    {{--                                    <div class="row">--}}
    {{--                                        @if(!Auth::check())--}}
    {{--                                            <div class="col-md-6">--}}
    {{--                                                <div class="input-with-icon">--}}
    {{--                                                    {{ Form::text('name', null, ['class' => 'with-border comment-name', 'placeholder'=>'Your Name']) }}--}}
    {{--                                                    <i class="icon-feather-user"></i>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="col-md-6">--}}
    {{--                                                <div class="input-with-icon">--}}
    {{--                                                    {{ Form::email('email', null, ['class' => 'with-border comment-email', 'placeholder'=>'Your E-mail']) }}--}}
    {{--                                                    <i class="icon-feather-mail"></i>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        @endif--}}
    {{--                                        <div class="col-md-12">--}}
    {{--                                            {{ Form::textarea('comment', null,['class' => 'with-border comment','id' => 'comment-field','placeholder'=>'Add Your Comment'])}}--}}

    {{--                                            {{ Form::button(__('web.common.submit'), ['type'=>'submit','class' => 'button btn-color btn ripple-effect','id'=>'submitBtn','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                    {{ Form::close() }}--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    @auth--}}
    {{--                        @role('Candidate')--}}
    {{--                        <ul class="social-btns list-inline mt20">--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ $url['facebook'] }}" class="social-btn-roll facebook">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <a href="{{ $url['twitter'] }}" class="social-btn-roll twitter">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <a href="{{ $url['gmail'] }}" class="social-btn-roll">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <a href="{{ $url['pinterest'] }}" class="social-btn-roll pinterest">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <a href="{{ $url['linkedin'] }}" class="social-btn-roll linkedin">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                        @endrole--}}
    {{--                    @endauth--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            @include('web.blogs.blog-sidebar')--}}
    {{--            @include('web.blogs.templates.templates')--}}

    {{--        </div>--}}
    {{--    </section>--}}

    <!-- Preloader -->
    <section class="page-title ptb80">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Blog Detail</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Blog Detail</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Blog Single -->
    <section class="blog-single">
        <div class="auto-container">
            <div class="upper-box">
                <h3>{{ html_entity_decode($blog->title) }}</h3>
                <ul class="post-info">
                    <li><span class="thumb"><img
                                    src="{{ isset($blog->user->avatar) ? $blog->user->avatar : asset('web/img/default-user.png')}}"
                                    alt=""></span></li>
                    <li>{{ \Carbon\Carbon::parse($blog->created_at)->isoFormat('MMM Do YYYY')}}</li>
                    <li>{{ isset($comments) ? count($comments) : 0 }} Comment</li>
                </ul>
                @auth
                    @role('Candidate')
                    <div class="social-share">
                        <a href="{{ $url['facebook'] }}" class="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{ $url['twitter'] }}" class="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{{ $url['gmail'] }}" class="google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="{{ $url['pinterest'] }}" class="pinterest">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a href="{{ $url['linkedin'] }}" class="linkedin">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                    @endrole
                @endauth
        </div>
        <div class="auto-container">
            <figure class="image"><img
                        src="{{ !empty($blog->blog_image_url)?$blog->blog_image_url:asset('web/img/blog_default_image.jpg') }}"
                        alt=""></figure>
            <ul class="job-other-info d-flex flex-wrap">
                @forelse($blog->postAssignCategories->pluck('name')->toArray() as $categoryBadges)
                    <li class="{{ getJobOtherColor($loop->index) }}">{{$categoryBadges}}</li>
                @empty
                    {{ __('messages.employer_menu.no_data_available') }}
                @endforelse
            </ul>
            <p>{!! !empty($blog->description)? nl2br(($blog->description)):__('messages.common.n/a') !!}</p>

        {{--                <h4>Course Description</h4>--}}
        {{--                <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>--}}
        {{--                <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>--}}
        {{--                <blockquote class="blockquote-style-one mb-5 mt-5">--}}
        {{--                    <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. </p>--}}
        {{--                    <cite>Luis Pickford</cite>--}}
        {{--                </blockquote>--}}
        {{--                <h4>What you'll learn</h4>--}}
        {{--                <ul class="list-style-four">--}}
        {{--                    <li>Become a UI/UX designer.</li>--}}
        {{--                    <li>Build a UI project from beginning to end.</li>--}}
        {{--                    <li>You will be able to start earning money Figma skills.</li>--}}
        {{--                    <li>Work with colors & fonts.</li>--}}
        {{--                    <li>You will create your own UI Kit.</li>--}}
        {{--                    <li>Become a UI/UX designer.</li>--}}
        {{--                    <li>Build a UI project from beginning to end.</li>--}}
        {{--                    <li>You will be able to start earning money Figma skills.</li>--}}
        {{--                    <li>Work with colors & fonts.</li>--}}
        {{--                    <li>You will create your own UI Kit.</li>--}}
        {{--                </ul>--}}
        {{--                <figure class="image"><img src="images/resource/post-img.jpg" alt=""></figure>--}}
        {{--                <h4>Requirements</h4>--}}
        {{--                <ul class="list-style-three">--}}
        {{--                    <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>--}}
        {{--                    <li>A computer with a good internet connection.</li>--}}
        {{--                    <li>Adobe Photoshop (OPTIONAL)</li>--}}
        {{--                </ul>--}}

        <!-- Other Options -->
        {{--                <div class="other-options">--}}
        {{--                    <div class="social-share">--}}
        {{--                        <h5>Share this post</h5>--}}
        {{--                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>--}}
        {{--                        <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>--}}
        {{--                        <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>--}}
        {{--                    </div>--}}

        {{--                    <div class="tags">--}}
        {{--                        <a href="#">App</a>--}}
        {{--                        <a href="#">Design</a>--}}
        {{--                        <a href="#">Digital</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        <!-- Post Control -->
            <div class="post-control">
                <div class="prev-post">
                    @if(count($prevPost) >0 )
                        <span class="icon flaticon-back"></span>
                        @foreach($prevPost as $post)
                            <a href="{{ route('front.posts.details',$post->id) }}"> <span
                                        class="title">Previous Post</span></a>
                            <h5><a href="{{ route('front.posts.details',$post->id) }}">{{ $post->title }}</a></h5>
                        @endforeach
                    @endif
                </div>
                <div class="next-post">
                    @if(count($nextPost) >0 )
                        <span class="icon flaticon-next"></span>
                        @foreach($nextPost as $post)
                            <a href="{{ route('front.posts.details',$post->id) }}"> <span class="title">Next Post</span></a>
                            <h5><a href="{{ route('front.posts.details',$post->id) }}">{{ $post->title }}</a></h5>
                        @endforeach
                    @endif
                </div>

            </div>
            <section class="user-dashboard">
                @if(! count($comments) == 0)
                    <h4 class="post-comment-title comment-count" id="post-comment"> {{ __('web.web_blog.comments') }}
                        <span class="post-comment-title" id="comment-count">({{ count($comments) }})</span>
                    </h4>
                @endif
                <div class="dashboard-outer comments-area">
                    <div class="row">
                        @foreach($comments as $commentRecord)
                            <div class="ui-block col-xl-12 col-lg-12 col-md-12 col-sm-12 comment">
                                <div class="ui-item justify-content-start">
                                    <div>
                                        @if(isset($commentRecord->user_id))
                                            <img src="{{$commentRecord->user->avatar }}"
                                                 alt="user-image" class="user-img">
                                        @else
                                            <img src="{{ asset('web/img/default-user.png')}}"
                                                 alt="user-image" class="user-img">
                                        @endif
                                    </div>
                                    <div class="ml-sm-3">
                                    <span class="text-blue font-weight-bold">{{ $commentRecord->name }}
                                        @if($commentRecord->user_id == getLoggedInUserId() && getLoggedInUser())
                                            <ul class="option-list d-inline-flex">
                                            <li><a href="javascript:void(0)" title="{{ __('messages.common.edit') }}"
                                                   class="edit-comment-btn action-btn" data-id="{{$commentRecord->id}}">
                                                    <button data-text="Edit Comment">
                                                        <span class="la la-pencil"></span>
                                                    </button>
                                                </a>
                                            </li>
                                            <li><a href="javascript:void(0)" title="{{ __('messages.common.delete') }}"
                                                   class="action-btn delete-comment-btn float-right"
                                                   data-id="{{$commentRecord->id}}">
                                                    <button data-text="Delete Comment">
                                                        <span class="la la-trash"></span>
                                                    </button>
                                                </a>
                                            </li>
                                        </ul>
                                        @endif
                                    </span>
                                        <p>{{ $commentRecord->created_at->format('d, M Y g:i a') }}</p>
                                        <p id="comment-{{$commentRecord->id}}"
                                           class="mb-0">{{ $commentRecord->comment }}</p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- Comments area -->
            {{--            <div class="comments-area">--}}
            {{--                <!-- Comment Box -->--}}
            {{--                @if(! count($comments) == 0)--}}
            {{--                    <h4 class="post-comment-title comment-count" id="post-comment"> {{ __('web.web_blog.comments') }}--}}
            {{--                        <span class="post-comment-title" id="comment-count">({{ count($comments) }})</span>--}}
            {{--                    </h4>--}}
            {{--                @endif--}}
            {{--                <div class="comment-box">--}}
            {{--                @foreach($comments as $commentRecord)--}}

            {{--                    <!-- Comment -->--}}
            {{--                        <div class="comment">--}}
            {{--                            <div class="user-thumb">--}}
            {{--                                @if(isset($commentRecord->user_id))--}}
            {{--                                    <img src="{{$commentRecord->user->avatar }}"--}}
            {{--                                         alt="user-image">--}}
            {{--                                @else--}}
            {{--                                    <img src="{{ asset('web/img/default-user.png')}}"--}}
            {{--                                         alt="user-image">--}}
            {{--                                @endif--}}
            {{--                            </div>--}}
            {{--                            <div class="comment-info">--}}
            {{--                                <div class="user-name">{{ $commentRecord->name }}--}}
            {{--                                    @if($commentRecord->user_id == getLoggedInUserId() && getLoggedInUser())--}}
            {{--                                        <ul class="option-list d-inline-flex">--}}
            {{--                                            <li><a href="javascript:void(0)" title="{{ __('messages.common.edit') }}"--}}
            {{--                                                   class="edit-comment-btn action-btn" data-id="{{$commentRecord->id}}">--}}
            {{--                                                    <button data-text="Edit Comment">--}}
            {{--                                                        <span class="la la-pencil"></span>--}}
            {{--                                                    </button>--}}
            {{--                                                </a>--}}
            {{--                                            </li>--}}
            {{--                                            <li><a href="javascript:void(0)" title="{{ __('messages.common.delete') }}"--}}
            {{--                                                   class="action-btn delete-comment-btn float-right"--}}
            {{--                                                   data-id="{{$commentRecord->id}}">--}}
            {{--                                                    <button data-text="Delete Comment">--}}
            {{--                                                        <span class="la la-trash"></span>--}}
            {{--                                                    </button>--}}
            {{--                                                </a>--}}
            {{--                                            </li>--}}
            {{--                                        </ul>--}}
            {{--                                    @endif--}}
            {{--                                </div>--}}
            {{--                                <div class="title">{{ $commentRecord->created_at->format('d, M Y g:i a') }}</div>--}}
            {{--                            </div>--}}
            {{--                            <p id="comment-{{$commentRecord->id}}">{{ $commentRecord->comment }}</p>--}}
            {{--                        </div>--}}
            {{--                    @endforeach--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>

            <!-- Comment Form -->
            <div class="comment-form default-form auto-container">
                <h4>{{ __('messages.post.post_a_comments') }}</h4>
                {{ Form::open(['id' => 'commentForm']) }}
                {{ Form::token() }}
                {{ Form::hidden('comment-id', null, ['class' => 'comment-id','value' => '']) }}
                <div class="row clearfix">
                    @if(!Auth::check())
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Your Name</label>
                            {{ Form::text('name', null, ['class' => 'with-border comment-name', 'placeholder'=>'Your Name']) }}
                            <i class="icon-feather-user"></i>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>Your Email</label>
                            {{ Form::email('email', null, ['class' => 'with-border comment-email', 'placeholder'=>'Your E-mail']) }}
                            <i class="icon-feather-mail"></i>
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <label>Your Comment</label>
                        {{ Form::textarea('comment', null,['class' => 'with-border comment','id' => 'comment-field','placeholder'=>'Add Your Comment'])}}
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        {{ Form::button(__('web.common.submit'), ['type'=>'submit','class' => 'theme-btn btn-style-one','id'=>'submitBtn','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            <!--End Comment Form -->
        </div>
        @auth
            @role('Candidate')
            <ul class="social-btns list-inline mt20">
                <li>
                    <a href="{{ $url['facebook'] }}" class="social-btn-roll facebook">
                        <div class="social-btn-roll-icons">
                            <i class="social-btn-roll-icon fa fa-facebook"></i>
                            <i class="social-btn-roll-icon fa fa-facebook"></i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ $url['twitter'] }}" class="social-btn-roll twitter">
                        <div class="social-btn-roll-icons">
                            <i class="social-btn-roll-icon fa fa-twitter"></i>
                            <i class="social-btn-roll-icon fa fa-twitter"></i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ $url['gmail'] }}" class="social-btn-roll">
                        <div class="social-btn-roll-icons">
                            <i class="social-btn-roll-icon fa fa-google"></i>
                            <i class="social-btn-roll-icon fa fa-google"></i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ $url['pinterest'] }}" class="social-btn-roll pinterest">
                        <div class="social-btn-roll-icons">
                            <i class="social-btn-roll-icon fa fa-pinterest"></i>
                            <i class="social-btn-roll-icon fa fa-pinterest"></i>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ $url['linkedin'] }}" class="social-btn-roll linkedin">
                        <div class="social-btn-roll-icons">
                            <i class="social-btn-roll-icon fa fa-linkedin"></i>
                            <i class="social-btn-roll-icon fa fa-linkedin"></i>
                        </div>
                    </a>
                </li>
            </ul>
            @endrole
        @endauth
        @include('web.blogs.templates.templates')
    </section>
@endsection

@section('page_scripts')
    <script>
        let blogComment = "{{ route('blog.create.comment', $blog->id) }}";
        let commentUrl = "{{ url('post-comments') }}";
        let editCommentUrl = "{{ '/edit' }}";
        let defaultImage = "{{ asset('web/img/default-user.png') }}";

    </script>
    <script src="{{ mix('assets/js/web/js/blog/blog_comments.js') }}"></script>

@endsection

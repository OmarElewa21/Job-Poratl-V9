{{--<div class="col-md-4 col-xs-11 blog-sidebar custom-mt-40">--}}

{{--    <div class="col-md-12 clearfix">--}}
{{--        <h4 class="widget-title">{{ __('web.post_menu.categories') }}</h4>--}}
{{--        <ul class="sidebar-list">--}}
{{--            @if($blogCategories->count())--}}
{{--                @foreach($blogCategories as $blogCategory)--}}
{{--                   @if($blogCategory->post_assign_categories_count > 0)--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('front.blog.category',$blogCategory->id)  }}" class="hover-color">--}}
{{--                            {{ ($blogCategory->post_assign_categories_count > 0) ? html_entity_decode($blogCategory->name): ''}} --}}
{{--                            {{($blogCategory->post_assign_categories_count > 0)? '('.$blogCategory->post_assign_categories_count.')':''}}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="col-md-11 clearfix mt30">--}}
{{--        <h4 class="widget-title">{{ __('web.post_menu.popular_post') }}</h4>--}}
{{--        @forelse($popularBlogs as $popularBlog)--}}
{{--            <div class="sidebar-blog-post">--}}
{{--                <div class="thumbnail-post sidebar-image">--}}
{{--                    <a href="{{ route('front.posts.details',$popularBlog->id) }}">--}}
{{--                        <img src="{{ !empty($popularBlog->blog_image_url)?$popularBlog->blog_image_url:asset('assets/img/infyom-logo.png') }}"--}}
{{--                             alt="">--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <div class="post-info">--}}
{{--                    <a href="{{ route('front.posts.details',$popularBlog->id) }}" class="hover-color"> {{ html_entity_decode($popularBlog->title) }}</a>--}}
{{--                    <span>{{ $popularBlog->created_at->diffForHumans() }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @empty--}}
{{--            <h6><span class="popular-blog-no-available">--}}
{{--                               {{ __('messages.post.no_posts_available') }}--}}
{{--                            </span></h6>--}}
{{--        @endforelse--}}
{{--    </div>--}}
{{--</div>--}}


<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
    <aside class="sidebar blog-sidebar">
        <!-- Shop Widget -->
        @if($blogCategories->count())
            <div class="sidebar-widget catagory-widget">
                <div class="sidebar-title"><h4>{{ __('web.post_menu.categories') }}</h4></div>
                <ul class="catagory-list">
                    @foreach($blogCategories as $blogCategory)
                        @if($blogCategory->post_assign_categories_count > 0)
                            <li>
                                <a href="{{ route('front.blog.category',$blogCategory->id)  }}">
                                    {{ ($blogCategory->post_assign_categories_count > 0) ? html_entity_decode($blogCategory->name): ''}}
                                    {{($blogCategory->post_assign_categories_count > 0)? '('.$blogCategory->post_assign_categories_count.')':''}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
    @endif

    <!-- Recent Post -->
        <div class="sidebar-widget recent-post">
            <div class="sidebar-title"><h4>{{ __('web.web_blog.recent_posts') }}</h4></div>

            <div class="widget-content">

                @foreach($popularBlogs as $popularBlog)
                    <article class="post">
                        <div class="post-thumb"><a href="{{ route('front.posts.details',$popularBlog->id) }}"><img
                                        src="{{ !empty($popularBlog->blog_image_url)?$popularBlog->blog_image_url:asset('assets/img/infyom-logo.png') }}"
                                        alt=""></a></div>
                        <h6>
                            <a href="{{ route('front.posts.details',$popularBlog->id) }}">{{ html_entity_decode($popularBlog->title) }}</a>
                        </h6>
                        <div class="post-info">{{ \Carbon\Carbon::parse($popularBlog->created_at)->isoFormat('MMM Do YYYY')}}</div>
                    </article>
                @endforeach
             </div>
        </div>
    </aside>
</div>



        <!-- Recent Post -->
{{--        <div class="sidebar-widget recent-post">--}}
{{--            <div class="sidebar-title"><h4>{{ __('web.post_menu.popular_post') }}</h4></div>--}}

{{--            <div class="widget-content">--}}
{{--                @forelse($popularBlogs as $popularBlog)--}}
{{--                    <article class="post">--}}
{{--                        <div class="post-thumb">--}}
{{--                            <a href="{{ route('front.posts.details',$popularBlog->id) }}">--}}
{{--                                <img src="{{ !empty($popularBlog->blog_image_url)?$popularBlog->blog_image_url:asset('assets/img/infyom-logo.png') }}"--}}
{{--                                     alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <h6><a href="{{ route('front.posts.details',$popularBlog->id) }}"--}}
{{--                               class="hover-color"> {{ html_entity_decode($popularBlog->title) }}</a></h6>--}}
{{--                        <div class="post-info">{{ \Carbon\Carbon::parse($popularBlog->created_at)->isoFormat('MMM Do YYYY')}}</div>--}}
{{--                    </article>--}}
{{--                @empty--}}
{{--                    <h6><span class="popular-blog-no-available">--}}
{{--                               {{ __('messages.post.no_posts_available') }}--}}
{{--                            </span></h6>--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Shop Widget -->--}}
{{--        --}}{{--        <div class="sidebar-widget">--}}
{{--        --}}{{--            <div class="sidebar-title"><h4>Tags</h4></div>--}}
{{--        --}}{{--            <ul class="tag-list">--}}
{{--        --}}{{--                <li><a href="#">app</a></li>--}}
{{--        --}}{{--                <li><a href="#">administrative</a></li>--}}
{{--        --}}{{--                <li><a href="#">android</a></li>--}}
{{--        --}}{{--                <li><a href="#">wordpress</a></li>--}}
{{--        --}}{{--                <li><a href="#">design</a></li>--}}
{{--        --}}{{--                <li><a href="#">react</a></li>--}}
{{--        --}}{{--            </ul>--}}
{{--        --}}{{--        </div>--}}
{{--    </aside>--}}
{{--</div>--}}

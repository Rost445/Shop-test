<div class="sidebar">
    <div class="widget widget-search">
        <h3 class="widget-title">Пошук</h3><!-- End .widget-title -->

        <form action="{{ url('blog') }}" method="get">
            <label for="ws" class="sr-only">Пошук в блозі</label>
            <input type="text" class="form-control" name="search"
                value="{{ Request::get('search') }}" placeholder="Пошук в блозі" required>
            <button type="submit" class="btn"><i class="icon-search"></i><span
                    class="sr-only">Пошук</span></button>
        </form>
    </div><!-- End .widget -->

    <div class="widget widget-cats">
        <h3 class="widget-title">Категорії</h3><!-- End .widget-title -->

        <ul>
            @foreach ($getBlogCategory as $category)
                <li><a
                        href="{{ url("blog/category/{$category->slug}") }}">{{ $category->name }}<span>{{ $category->getCountBlog() }}</span></a>
                </li>
            @endforeach


        </ul>
    </div><!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

        @foreach ($getPopular as $valueP)
        <ul class="posts-list">
            <li>
                <figure>
                    <a href="{{ url('blog/'.$valueP->slug)}}">
                        <img src=" {{ $valueP->getImage() }}" alt="{{ $valueP->title }}">
                    </a>
                </figure>
                <div>
                    <span>{{ date('M d, Y', strtotime($valueP->created_at)) }}</span>
                    <h4><a href="{{ url('blog/'.$valueP->slug)}}">{{ $valueP->title }}</a></h4>
                </div>
            </li>
        </ul><!-- End .posts-list -->
    @endforeach
    </div><!-- End .widget -->

</div><!-- End .sidebar sidebar-shop -->
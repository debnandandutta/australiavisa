@extends('ausvisa.master')
@section('body')
    <style>
        .activ-draft {
            background: #12318f;
            color: #ffffff!important;
            padding-left: 10px;

        }
        .ul-16 li:before {
            content: "●";
            color: #3262F2;
            margin-right: 15px;
        }
    </style>
    <section class="blog">
        <div class="azir-container">
            <div class="blog-detail">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12"><a id="sidebar-opener" href="#"> <i class="icon_menu"></i>Open sidebar</a></div>
                            <div class="col-12 col-lg-8">
                                @foreach($contents as $content)

                                <div class="blog-detail_content">
                                    {!!$content->description!!}</div>
                                @endforeach
                                <div class="blog-detail_footer">
                                    <div class="tag">
                                        <h3>Tag:</h3>
                                        <div class="items-group tag-group"><a href="blog_default.html">Consulting</a><a href="blog_default.html">Finance</a><a href="blog_default.html">Business</a></div>
                                    </div>
                                    <div class="share">
                                        <h3>Share</h3>
                                        <div class="social-group"><a class="fab fa-facebook-f" href="https://www.facebook.com/"></a><a class="fab fa-twitter" href="https://twitter.com/"></a><a class="fab fa-invision" href="https://www.invisionapp.com/"></a></div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="blog_sidebar ml-auto" id="sidebar">

                                    <div class="sidebar_section">
                                        <div class="blog-categories">

                                            <ul>
                                                @foreach($categories as $category)

                                                <li class="{{ (request()->is('page/'. $category->slug)) ? 'activ-draft' : '' }}"><a class="category-link {{ (request()->is('page/'. $category->slug)) ? 'activ-draft' : '' }}" href="{{ url('page/' . $category->slug) }}"><span class="name">{{$category->name}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="sidebar_section">

                                            <div class="quote">
                                                <div class="quote__title">AUSTRALIAN VISA</div>
                                                <div class="quote__text text-justify">
                                                    <p class="p-16"><strong><a title="Australia Visa Malaysia" href="#">Australia Visa Malaysia</a></strong> is online based service provider private company. Here customer is our main power and they are always right to us. So we expect opinions and suggestions from our valueable customer to make our service more convenient, helpful for further better service.</p>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

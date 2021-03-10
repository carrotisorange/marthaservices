@extends('layout.main')

@section('main')
    <div class="modern-top-intoduce-section">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="modern-top-hom-cat-section">

                        <div class="modern-home-search-bar-wrap">
                            <div class="search-wrapper">
                                <h3> <i class="fa fa-home"></i> @lang('app.find_your_property')</h3>

                                <form class="form-inline" action="{{ route('listing') }}" method="get">
                                    <div class="form-group">
                                        <input type="text"  class="form-control" id="searchTerms" name="q" value="{{ request('q') }}" placeholder="@lang('app.search___')" />
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control select2" name="country">
                                            <option value="">@lang('app.select_a_country')</option>
                                            <option value="173" {{ request('country') == 173 ? 'selected' :'' }}>Philippines</option>
                                            {{-- @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control select2" id="state_select" name="state">
                                            <option value=""> @lang('app.select_state') </option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn theme-btn"> <i class="fa fa-search"></i> @lang('app.search_property')</button>
                                </form>

                                <div class="or-search"> OR </div>

                                <a href="{{ route('listing') }}" class="btn btn-info btn-lg"><i class="fa fa-search-plus"></i> @lang('app.try_advance_search')</a>

                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

    @if($enable_monetize)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! get_option('monetize_code_below_categories') !!}
                </div>
            </div>
        </div>
    @endif

    @if($urgent_ads->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_urgent_ads') [@lang('app.more') <i class="fa fa-link"></i>]
                            </a>
                        </h4>
                    </div>
                    <hr />

                </div>
            </div>


            <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                <div class="row">
                    @foreach($urgent_ads as $ad)
                        <div class="col-md-3">
                            <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                <div class="ads-thumbnail">
                                    <a href="{{ route('single_ad', $ad->slug) }}">
                                        <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                        @if($ad->purpose)
                                            <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                        @endif

                                        <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                <i class="fa fa-file-video-o"></i>
                                            @else
                                                <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                            @endif
                                            </span>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                    <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                    <table class="table table-responsive property-box-info">

                                        @if($ad->city)
                                            <tr>
                                                <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                </td>
                                                <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                            <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                        </tr>

                                        @if($ad->beds)
                                            <tr>
                                                <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                            </tr>
                                        @endif

                                    </table>

                                </div>

                                @if($ad->price_plan == 'premium')
                                    <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                @endif
                                @if($ad->mark_ad_urgent == '1')
                                    <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> <!-- themeqx_new_premium_ads_wrap -->


        </div>
    @endif

    @if($premium_ads->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_premium_ads') [@lang('app.more') <i class="fa fa-link"></i>]
                            </a>
                        </h4>
                    </div>
                    <hr />
                </div>


                <div class="row">
                    <div class="themeqx_new_regular_ads_wrap themeqx-carousel-ads">
                        @foreach($premium_ads as $ad)
                            <div class="col-md-3">
                                <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                    <div class="ads-thumbnail">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                            @if($ad->purpose)
                                                <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                            @endif

                                            <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                    <i class="fa fa-file-video-o"></i>
                                                @else
                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                        <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                        <table class="table table-responsive property-box-info">

                                            @if($ad->city)
                                                <tr>
                                                    <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                    </td>
                                                    <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                                <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                            </tr>

                                            @if($ad->beds)
                                                <tr>
                                                    <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                    <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                                </tr>
                                            @endif

                                        </table>

                                    </div>

                                    @if($ad->price_plan == 'premium')
                                        <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                    @endif
                                    @if($ad->mark_ad_urgent == '1')
                                        <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- themeqx_new_premium_ads_wrap -->
                </div>

            </div>
        </div>
        @if($enable_monetize)
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        {!! get_option('monetize_code_below_premium_ads') !!}
                    </div>
                </div>
            </div>
        @endif
    @endif

    @if($regular_ads->count() > 0)

        <div class="container">
            <div class="row">

                <div class="col-sm-12">

                    <div class="carousel-header">
                        <h4><a href="{{ route('listing') }}">
                                @lang('app.new_regular_ads') [@lang('app.more') <i class="fa fa-link"></i>]
                            </a>
                        </h4>
                    </div>
                    <hr />
                </div>

                <div class="row">

                    <div class="themeqx_new_premium_ads_wrap themeqx-carousel-ads">
                        @foreach($regular_ads as $ad)
                            <div class="col-md-3">
                                <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                    <div class="ads-thumbnail">
                                        <a href="{{ route('single_ad', $ad->slug) }}">
                                            <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                                            @if($ad->purpose)
                                                <span class="modern-sale-rent-indicator">
                                                    {{ ucfirst($ad->purpose) }}
                                                </span>
                                            @endif

                                            <span class="modern-img-indicator">
                                                @if(! empty($ad->video_url))
                                                    <i class="fa fa-file-video-o"></i>
                                                @else
                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                @endif
                                            </span>
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

                                        <p class="price"> <span itemprop="price" content="{{$ad->price}}"> {{ themeqx_price_ng($ad) }} </span></p>

                                        <table class="table table-responsive property-box-info">

                                            @if($ad->city)
                                                <tr>
                                                    <td> <a class="location text-muted" href="{{ route('listing', ['city' => $ad->city->id]) }}"> <i class="fa fa-map-marker"></i> {{ $ad->city->city_name }} </a>
                                                    </td>
                                                    <td> <p class="date-posted text-muted"> <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}</p> </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </td>
                                                <td><i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                                            </tr>

                                            @if($ad->beds)
                                                <tr>
                                                    <td><i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                                                    <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                                                </tr>
                                            @endif

                                        </table>

                                    </div>

                                    @if($ad->price_plan == 'premium')
                                        <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
                                    @endif
                                    @if($ad->mark_ad_urgent == '1')
                                        <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- themeqx_new_premium_ads_wrap -->

                </div>

            </div>
        </div>

    @endif

    @if($enable_monetize)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {!! get_option('monetize_code_below_regular_ads') !!}
                </div>
            </div>
        </div>
    @endif

    {{-- @if(get_option('show_latest_blog_in_homepage') ==1)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="carousel-header">
                        <h4><a href="{{ route('blog') }}">
                                @lang('app.latest_post_from_blog')
                            </a>
                        </h4>
                    </div>
                    <hr />
                </div>
            </div>


            <div class="row">

                <div class="home-latest-blog themeqx-carousel-blog-post">
                    @foreach($posts as $post)
                        <div class="col-md-4">

                            <div class="themeqx-estate-blog-grid">
                                <div class="image">
                                    <a href="{{ route('blog_single', $post->slug) }}">
                                        @if($post->feature_img)
                                            <img alt="{{ $post->title }}" src="{{ media_url($post->feature_img) }}" >
                                        @else
                                            <img  alt="{{ $post->title }}" src="{{ asset('uploads/placeholder.png') }}" >
                                        @endif
                                    </a>
                                </div>

                                <h2><a href="{{ route('blog_single', $post->slug) }}" class="blog-title">{{ $post->title }}</a></h2>

                                <div class="blog-post-carousel-meta-info">
                                    @if($post->author)
                                        <span class="pull-left">By <a href="{{ route('author_blog_posts', $post->author->id) }}">{{ $post->author->name }}</a></span>
                                    @endif
                                    <span class="pull-right">
                                        <i class="fa fa-calendar"></i> {{ $post->created_at_datetime() }}
                                    </span>
                                    <div class="clearfix"></div>
                                </div>
                                <p class="intro"> {{ str_limit(strip_tags($post->post_content), 80) }}</p>
                                <a class="btn btn-default" href="{{ route('blog_single', $post->slug) }}" >@lang('app.continue_reading')  <i class="fa fa-external-link"></i> </a>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    @endif --}}

    <div class="modern-post-ad-call-to-cation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>@lang('app.want_something_sell_quickly')</h1>
                    <p>@lang('app.post_your_ad_quicly')</p>
                    <a href="{{route('create_ad')}}" class="btn btn-info btn-lg">@lang('app.post_an_ad')</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script>
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('<option value="" selected> @lang('app.select_state') </option>');
                    $('#state_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(document).ready(function(){
            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_state_by_country') }}',
                    data : { country_id : country_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'country_to_state');
                    }
                });
            });
        });
    </script>
@endsection
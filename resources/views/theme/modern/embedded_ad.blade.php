<link rel="stylesheet" href="{{ asset('assets/css/embedded.css') }}">


<div class="embedded-item-thumbnail embedded-box-{{$ad->price_plan}}">

    <h4 class="embedded-ad-title"><a href="{{ route('single_ad', $ad->slug) }}" title="{{ $ad->title }}"><span itemprop="name">{{ str_limit($ad->title, 40) }} </span></a></h4>

        <div class="embedded-ads-thumbnail">
            <a href="{{ route('single_ad', $ad->slug) }}">
                <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">

                @if($ad->purpose)
                    <span class="modern-sale-rent-indicator">
                        {{ ucfirst($ad->purpose) }}
                    </span>
                @endif

                <span class="modern-img-indicator">
                    @if(! empty($ad->video_url))
                        @lang('app.video')
                    @else
                        @lang('app.img') {{ $ad->media_img->count() }}</i>
                    @endif
                </span>
            </a>
        </div>
        <div class="caption">

            <p class="price"> {{ themeqx_price_ng($ad) }}</p>

            <table class="table table-responsive property-box-info">

                @if($ad->city)
                    <tr>
                        <td> {{ $ad->city->city_name }}</td>
                        <td>  {{ $ad->created_at->diffForHumans() }} </td>
                    </tr>
                @endif

                <tr>
                    <td>{{ ucfirst($ad->type) }} </td>
                    <td> {{ $ad->square_unit_space.' '.$ad->unit_type }}</td>
                </tr>

                @if($ad->beds)
                    <tr>
                        <td>{{ $ad->beds.' '.trans('app.bedrooms') }}</td>
                        <td> {{ $ad->floor.' '.trans('app.floor') }} </td>
                    </tr>
                @endif

            </table>

            <a href="{{ route('single_ad', $ad->slug) }}" class="btn-details">@lang('app.view_details')</a>

        </div>

        @if($ad->price_plan == 'premium')
            <div class="ribbon-wrapper-green"><div class="ribbon-green">{{ ucfirst($ad->price_plan) }}</div></div>
        @endif
        @if($ad->mark_ad_urgent == '1')
            <div class="ribbon-wrapper-red"><div class="ribbon-red">@lang('app.urgent')</div></div>
        @endif
    </div>

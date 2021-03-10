@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <div class="bg-white">
                    <div class="sidebar-filter-wrapper">

                        @if($enable_monetize)
                            {!! get_option('monetize_code_listing_sidebar_top') !!}
                        @endif

                        <form action="" id="listingFilterForm" method="get">

                        <div class="row">
                            <div class="col-xs-12">
                                <p class="listingSidebarLeftHeader">@lang('app.search')
                                    <span id="loaderListingIcon" class="pull-right" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="@lang('app.search___')" />
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class=" col-sm-6 col-xs-12">
                                    <button class="btn btn-primary btn-block"><i class="fa fa-search"></i>  @lang('app.search')</button>
                                </div>
                            </div>
                        </div>

                        </form>

                    </div>

                </div>


                <div class="bg-white">
                    <div class="sidebar-filter-wrapper">

                        @if($enable_monetize)
                            {!! get_option('monetize_code_listing_sidebar_top') !!}
                        @endif

                        <form action="" id="listingFilterForm" method="get">

                        <div class="row">
                            <div class="col-xs-12">
                                <p class="listingSidebarLeftHeader">@lang('app.advance_search')
                                    <span id="loaderListingIcon" class="pull-right" style="display: none;"><i class="fa fa-spinner fa-spin"></i></span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="@lang('app.search___')" />
                        </div>

                        <hr />

                        <div class="form-group">
                            <label>@lang('app.select_a_category')</label>
                            <select class="form-control select2" name="type" multiple="multiple">
                                <option value="">@lang('app.select_a_category')</option>
                                <option value="apartment">@lang('app.apartment')</option>
                                <option value="condos">@lang('app.condos')</option>
                                <option value="house">@lang('app.house')</option>
                                <option value="land">@lang('app.land')</option>
                                <option value="commercial_space">@lang('app.commercial_space')</option>
                                <option value="villa">@lang('app.villa')</option>
                            </select>
                        </div>

                        <hr />
                        <div class="form-group">
                            <select class="form-control select2" name="country">
                                <option value="">@lang('app.select_a_country')</option>

                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control select2" id="state_select" name="state">
                                <option value=""> @lang('app.select_state') </option>
                                @if($selected_countries)
                                    @foreach($selected_countries->states as $state)
                                        <option value="{{ $state->id }}" {{ request('state') ==  $state->id ? 'selected':'' }} >{{ $state->state_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control select2" id="city_select" name="city">
                                <option value=""> @lang('app.select_city') </option>
                                @if($selected_states)
                                    @foreach($selected_states->cities as $city)
                                        <option value="{{ $city->id }}" {{ request('city') ==  $city->id ? 'selected':'' }} >{{ $city->city_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <hr />
                        <div class="form-group">
                            <label>@lang('app.price_min_max')</label>

                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="number" class="form-control" name="min_price" value="{{ request('min_price') }}" placeholder="@lang('app.min_price')" />
                                </div>
                                <div class="col-xs-6">
                                    <input type="number" class="form-control" name="max_price" value="{{ request('max_price') }}" placeholder="@lang('app.max_price')" />
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="form-group">
                            <label>@lang('app.property_type')</label>

                            <div class="checkbox">
                                <label for="type_apartment" class="radio-inline">
                                    <input type="radio" value="apartment" id="type_apartment" name="type"  {{ request('type') == 'apartment'? 'checked="checked"' : '' }}>
                                    @lang('app.apartment')
                                </label>
                            </div>

                            <div class="checkbox">
                                <label for="type_condos" class="radio-inline">
                                    <input type="radio" value="condos" id="type_condos" name="type"  {{ request('type') == 'condos'? 'checked="checked"' : '' }}>
                                    @lang('app.condos')
                                </label>
                            </div>

                            <div class="checkbox">
                                <label for="type_house" class="radio-inline">
                                    <input type="radio" value="house" id="type_house" name="type" {{ request('type') == 'house'? 'checked="checked"' : '' }}>
                                    @lang('app.house')
                                </label>
                            </div>

                            <div class="checkbox">
                                <label for="type_land" class="radio-inline">
                                    <input type="radio" value="land" id="type_land" name="type" {{ request('type') == 'land'? 'checked="checked"' : '' }}>
                                    @lang('app.land')
                                </label>
                            </div>


                            <div class="checkbox">
                                <label for="type_commercial_space" class="radio-inline">
                                    <input type="radio" value="commercial_space" id="type_commercial_space" name="type" {{ request('type') == 'commercial_space'? 'checked="checked"' : '' }}>
                                    @lang('app.commercial_space')
                                </label>
                            </div>

                            <div class="checkbox">
                                <label for="type_villa" class="radio-inline">
                                    <input type="radio" value="villa" id="type_villa" name="type" {{ request('type') == 'villa'? 'checked="checked"' : '' }}>
                                    @lang('app.villa')
                                </label>
                            </div>

                        </div>

                        <hr />
                        <div class="form-group">
                            <div class="row">
                                <div class=" col-sm-6 col-xs-12">
                                    <button class="btn btn-primary btn-block"><i class="fa fa-search"></i>  @lang('app.filter')</button>
                                </div>
                                <div class=" col-sm-6 col-xs-12">
                                    <a href="{{ route('listing') }}" class="btn btn-default btn-block"><i class="fa fa-refresh"></i>  @lang('app.reset')</a>
                                </div>
                            </div>
                        </div>

                        </form>
                        <div class="clearfix"></div>

                        @if($enable_monetize)
                            {!! get_option('monetize_code_listing_sidebar_bottom') !!}
                        @endif

                    </div>

                </div>

                <div class="sidebar-widget">
                    <h3>@lang('app.feature_agents')</h3>
                    @foreach($agents as $agent)
                        <div class="sidebar-feature-agents">
                            <div class="row">
                                <div class="col-xs-3">
                                    <a href="{{ route('listing', ['user_id'=>$agent->id]) }}">
                                        <img src="{{ $agent->get_gravatar() }}" class="img-circle img-responsive" /> </a>
                                </div>
                                <div class="col-xs-9">
                                    <a href="{{ route('listing', ['user_id'=>$agent->id]) }}">
                                        <h5>{{ $agent->name }}</h5>
                                        <p class="text-muted"><i class="fa fa-map-marker"></i> {{ $agent->get_address()}}</p>
                                        <p class="text-muted"><i class="fa fa-building-o"></i> {{ $agent->ads->count() }} @lang('app.estates')
                                            @if($agent->phone), <i class="fa fa-phone"></i> {{ $agent->phone }} @endif
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12">

                        <?php
                        $allAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'all'])));
                        $personalAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'personal'])));
                        $businessAdTab = route('listing').str_replace('/', '', str_replace(route('listing'), '', request()->fullUrlWithQuery(['adType'=>'business'])));

                        ?>

                        <div class="listingTopFilterBar">
                            <span class="totalFoundListingTop">@lang('app.total') <strong>{{ $ads->total() }}</strong> @lang('app.ads_founds') </span>

                            <ul class="listingViewIcon pull-right">
                                <li class="dropdown shortByListingLi">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">@lang('app.short_by') <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'price_high_to_low']) }}">@lang('app.price_high_to_low')</a></li>
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'price_low_to_high']) }}">@lang('app.price_low_to_high')</a></li>
                                        <li><a href="{{ request()->fullUrlWithQuery(['shortBy'=>'latest']) }}">@lang('app.latest')</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)" id="showGridView">
                                        <i class="fa fa-th-large"></i> </a> </li>
                                <li><a href="javascript:void(0)" id="showListView">
                                        <i class="fa fa-list"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

                @if($enable_monetize)
                    <div class="row">
                        <div class="col-sm-12">
                            {!! get_option('monetize_code_listing_above_premium_ads') !!}
                        </div>
                    </div>
                @endif

                <div class="ad-box-wrap">
                    @if( ! request('user_id'))
                        @if($premium_ads)
                            @if($premium_ads->count() > 0)
                                <div class="ad-box-premium-wrap">
                                    <h3>@lang('app.premium_ads')</h3>
                                    <div class="ad-box-grid-view" style="display: {{ session('grid_list_view') ? (session('grid_list_view') == 'grid'? 'block':'none') : 'block' }};">
                                        <div class="row">
                                            @foreach($premium_ads as $ad)
                                                {{-- */ session('grid_list_view') ? (session('grid_list_view') == 'grid'? $ad->increase_impression() :'none') : $ad->increase_impression(); /*--}}

                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <div itemscope itemtype="http://schema.org/Product" class="ads-item-thumbnail ad-box-{{$ad->price_plan}}">
                                                        <div class="ads-thumbnail">
                                                            <a href="{{ route('single_ad', $ad->slug) }}">
                                                                <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">
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
                                    </div>
                                </div>

                                <div class="ad-box-list-view" style="display: {{ session('grid_list_view') == 'list'? 'block':'none' }};">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-responsive">
                                                @foreach($premium_ads as $ad)
                                                    {{-- */ session('grid_list_view') == 'list'? $ad->increase_impression() :'none' /*--}}
                                                    <tr class="ad-{{ $ad->price_plan }}">
                                                        <td width="100">
                                                            <img src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="">
                                                            <span class="modern-img-indicator">
                                                                @if(! empty($ad->video_url))
                                                                    <i class="fa fa-file-video-o"></i>
                                                                @else
                                                                    <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                                @endif
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <h5><a href="{{ route('single_ad', $ad->slug) }}" >{{ $ad->title }}</a> </h5>
                                                            <p class="text-muted">
                                                                @if($ad->city)
                                                                    <i class="fa fa-map-marker"></i> <a class="location text-muted" href="{{ route('listing', ['city'=>$ad->city->id]) }}"> {{ $ad->city->city_name }} </a>,
                                                                @endif
                                                                <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <h5>{{ themeqx_price_ng($ad) }}</h5>
                                                            @if($ad->price_plan == 'premium')
                                                                <div class="ribbon-green-bar">{{ ucfirst($ad->price_plan) }}</div>
                                                            @endif
                                                            @if($ad->mark_ad_urgent == '1')
                                                                <div class="ribbon-red-bar">@lang('app.urgent')</div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif

                    @if($enable_monetize)
                        <div class="row">
                            <div class="col-sm-12">
                                {!! get_option('monetize_code_listing_above_regular_ads') !!}
                            </div>
                        </div>
                    @endif

                    @if($ads->total() > 0)

                            <h3>@lang('app.listing_results')</h3>

                        <div class="ad-box-grid-view" style="display: {{ session('grid_list_view') ? (session('grid_list_view') == 'grid'? 'block':'none') : 'block' }};">
                            <div class="row">
                                @foreach($ads as $ad)
                                    <div class="col-md-4 col-sm-6 col-xs-12">
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
                        </div>

                        <div class="ad-box-list-view" style="display: {{ session('grid_list_view') == 'list'? 'block':'none' }};">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-responsive">
                                        @foreach($ads as $ad)
                                            <tr class="ad-{{ $ad->price_plan }}">
                                                <td width="100">
                                                    <img itemprop="image"  src="{{ media_url($ad->feature_img) }}" class="img-responsive" alt="{{ $ad->title }}">
                                                     <span class="modern-img-indicator">
                                                         @if(! empty($ad->video_url))
                                                             <i class="fa fa-file-video-o"></i>
                                                         @else
                                                             <i class="fa fa-file-image-o"> {{ $ad->media_img->count() }}</i>
                                                         @endif
                                                     </span>
                                                </td>
                                                <td>
                                                    <h5><a href="{{ route('single_ad', $ad->slug) }}" >{{ $ad->title }}</a> </h5>
                                                    <h5>{{ themeqx_price_ng($ad) }} </h5>

                                                    <p class="text-muted">
                                                        @if($ad->city)
                                                            <i class="fa fa-map-marker"></i> <a class="location text-muted" href="{{ route('listing', ['city'=>$ad->city->id]) }}"> {{ $ad->city->city_name }} </a>,
                                                        @endif
                                                        <i class="fa fa-clock-o"></i> {{ $ad->created_at->diffForHumans() }}
                                                    </p>

                                                    <p class="listViewItemFooter">
                                                        <span> <i class="fa fa-building"></i> {{ ucfirst($ad->type) }} </span>

                                                        <span> <i class="fa fa-arrows-alt "></i>  {{ $ad->square_unit_space.' '.$ad->unit_type }} </span>

                                                        @if($ad->beds)
                                                            <span>
                                                            <i class="fa fa-bed"></i> {{ $ad->beds.' '.trans('app.bedrooms') }} </span>
                                                            <span>{{ $ad->floor.' '.trans('app.floor') }}</span>
                                                        @endif
                                                    </p>


                                                    @if($ad->price_plan == 'premium')
                                                        <div class="ribbon-green-bar">{{ ucfirst($ad->price_plan) }}</div>
                                                    @endif
                                                    @if($ad->mark_ad_urgent == '1')
                                                        <div class="ribbon-red-bar">@lang('app.urgent')</div>
                                                    @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-warning">
                            <h2><i class="fa fa-info-circle"></i> @lang('app.search_not_found') </h2>
                        </div>
                    @endif

                    @if($enable_monetize)
                        <div class="row">
                            <div class="col-sm-12">
                                {!! get_option('monetize_code_listing_below_regular_ads') !!}
                            </div>
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        {{ $ads->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('page-js')
    <script>
        $(document).ready(function() {
            $('#shortBySelect').change(function () {
                var form_input = $('#listingFilterForm').serialize();
                location.href = '{{ route('listing') }}?' + form_input + '&shortBy=' + $(this).val();
            });
        });
        function generate_option_from_json(jsonData, fromLoad){
            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_sub_category'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_sub_category') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].category_name +' </option>';
                    }
                    $('#sub_category_select').html(option);
                    $('#sub_category_select').select2();
                }else {
                    $('#sub_category_select').html('<option value="">@lang('app.select_a_sub_category')</option>');
                    $('#sub_category_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('<option value="">@lang('app.select_a_brand')</option>');
                    $('#brand_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }else if(fromLoad === 'country_to_state'){
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

            }else if(fromLoad === 'state_to_city'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="" selected> @lang('app.select_city') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].city_name +' </option>';
                    }
                    $('#city_select').html(option);
                    $('#city_select').select2();
                }else {
                    $('#city_select').html('<option value="" selected> @lang('app.select_city') </option>');
                    $('#city_select').select2();
                }
                $('#loaderListingIcon').hide('slow');
            }
        }

        $(function(){

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
            $('[name="state"]').change(function(){
                var state_id = $(this).val();
                $('#loaderListingIcon').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state_id : state_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });
        });
        $(function(){
            $('#showGridView').click(function(){
                $('.ad-box-grid-view').show();
                $('.ad-box-list-view').hide();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'grid',  _token : '{{ csrf_token() }}' },
                });
            });
            $('#showListView').click(function(){
                $('.ad-box-grid-view').hide();
                $('.ad-box-list-view').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('switch_grid_list_view') }}',
                    data : { grid_list_view : 'list',  _token : '{{ csrf_token() }}' },
                });
            });
        });
    </script>

    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', '<?php echo trans('app.success') ?>', toastr_options);
        @endif
    </script>
@endsection
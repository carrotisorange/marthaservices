@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">

        <div id="wrapper">

            @include('admin.sidebar_menu')

            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-md-10 col-xs-12">

                        <form action="" id="adsPostForm" class="form-horizontal" method="post" enctype="multipart/form-data"> @csrf

                        <legend>@lang('app.ad_info')</legend>

                        <div class="form-group {{ $errors->has('ad_title')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.ad_title')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ad_title" value="{{ old('ad_title') ? old('ad_title') : $ad->title }}" name="ad_title" placeholder="@lang('app.ad_title')">
                                {!! $errors->has('ad_title')? '<p class="help-block">'.$errors->first('ad_title').'</p>':'' !!}
                                <p class="text-info"> @lang('app.great_title_info')</p>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('ad_description')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.ad_description')</label>
                            <div class="col-sm-8">
                                <textarea name="ad_description" class="form-control" rows="8">{{ old('ad_description')?  old('ad_description') : $ad->description }}</textarea>
                                {!! $errors->has('ad_description')? '<p class="help-block">'.$errors->first('ad_description').'</p>':'' !!}
                                <p class="text-info"> @lang('app.ad_description_info_text')</p>
                            </div>
                        </div>



                        <div class="form-group required {{ $errors->has('type')? 'has-error':'' }}">
                            <label class="col-md-4 control-label">@lang('app.property_type') </label>
                            <div class="col-md-8">
                                <label for="type_apartment" class="radio-inline">
                                    <input type="radio" value="apartment" id="type_apartment" name="type"  {{ $ad->type == 'apartment'? 'checked="checked"' : '' }}>
                                    @lang('app.apartment')
                                </label>

                                <label for="type_condos" class="radio-inline">
                                    <input type="radio" value="condos" id="type_condos" name="type"  {{ $ad->type == 'condos'? 'checked="checked"' : '' }}>
                                    @lang('app.condos')
                                </label>

                                <label for="type_house" class="radio-inline">
                                    <input type="radio" value="house" id="type_house" name="type" {{ $ad->type == 'house'? 'checked="checked"' : '' }}>
                                    @lang('app.house')
                                </label>

                                <label for="type_land" class="radio-inline">
                                    <input type="radio" value="land" id="type_land" name="type" {{ $ad->type == 'land'? 'checked="checked"' : '' }}>
                                    @lang('app.land')
                                </label>

                                <label for="type_commercial_space" class="radio-inline">
                                    <input type="radio" value="commercial_space" id="type_commercial_space" name="type" {{ $ad->type == 'commercial_space'? 'checked="checked"' : '' }}>
                                    @lang('app.commercial_space')
                                </label>

                                <label for="type_villa" class="radio-inline">
                                    <input type="radio" value="villa" id="type_villa" name="type" {{ $ad->type == 'villa'? 'checked="checked"' : '' }}>
                                    @lang('app.villa')
                                </label>

                                {!! $errors->has('type')? '<p class="help-block">'.$errors->first('type').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('purpose')? 'has-error':'' }}">
                            <label for="purpose" class="col-sm-4 control-label">@lang('app.purpose')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2NoSearch" name="purpose" id="purpose">
                                    <option value="sale" {{ $ad->purpose == 'sale' ? 'selected':'' }}>@lang('app.sale')</option>
                                    <option value="rent" {{ $ad->purpose == 'rent' ? 'selected':'' }}>@lang('app.rent')</option>
                                </select>
                                {!! $errors->has('purpose')? '<p class="help-block">'.$errors->first('purpose').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group  {{ $errors->has('price')? 'has-error':'' }}">
                            <label for="price" class="col-md-4 control-label">@lang('app.price')</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" placeholder="@lang('app.ex_price')" class="form-control" name="price" id="price" value="{{ old('price')? old('price') : $ad->price }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" name="negotiable" id="negotiable" {{ $ad->is_negotiable == 1 ? 'checked':'' }}>
                                        @lang('app.negotiable')
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-offset-4">
                                {!! $errors->has('price')? '<p class="help-block">'.$errors->first('price').'</p>':'' !!}
                                <p class="text-info">Pick a good price. </p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label">@lang('app.price_per_unit'):</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">{{ get_option('currency_sign') }}</span>
                                    <input type="text" class="form-control input-sm" placeholder="@lang('app.price_per_unit')" value="{{ $ad->price_per_unit }}" name="price_per_unit" id="price_per_unit">
                                </div>
                                <span class="help-inline">&nbsp;</span>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control select2NoSearch" name="price_unit">
                                    <option value="sqft" {{ $ad->unit_type == 'sqft' ? 'selected':'' }} >@lang('app.square_feet')</option>
                                    <option value="sqmeter" {{ $ad->unit_type == 'sqmeter' ? 'selected':'' }} >@lang('app.square_meter')</option>
                                    <option value="acre" {{ $ad->unit_type == 'acre' ? 'selected':'' }} >@lang('app.acre')</option>
                                    <option value="hector" {{ $ad->unit_type == 'hector' ? 'selected':'' }} >@lang('app.hector')</option>
                                </select>
                                <span class="help-inline">&nbsp;</span>
                            </div>
                        </div>


                        <legend>@lang('app.property_detail')</legend>

                        <div class="form-group {{ $errors->has('square_unit_space')? 'has-error':'' }}">
                            <label for="square_unit_space" class="col-sm-4 control-label">@lang('app.square_unit_space')</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="square_unit_space" value="{{ $ad->square_unit_space }}" name="square_unit_space" placeholder="@lang('app.square_unit_space')">
                                {!! $errors->has('square_unit_space')? '<p class="help-block">'.$errors->first('square_unit_space').'</p>':'' !!}
                                <p class="help-block">@lang('app.square_unit_space_help_text') </p>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('floor')? 'has-error':'' }}">
                            <label for="floor" class="col-sm-4 control-label">@lang('app.floor')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="floor" value="{{ $ad->floor }}" name="floor" placeholder="@lang('app.floor_ex')">
                                {!! $errors->has('floor')? '<p class="help-block">'.$errors->first('floor').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('beds')? 'has-error':'' }}">
                            <label for="beds" class="col-sm-4 control-label">@lang('app.beds')</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="beds" value="{{ $ad->beds }}" name="beds" placeholder="@lang('app.beds')">
                                {!! $errors->has('beds')? '<p class="help-block">'.$errors->first('beds').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('attached_bath')? 'has-error':'' }}">
                            <label for="attached_bath" class="col-sm-4 control-label">@lang('app.attached_bath')</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="attached_bath" value="{{ $ad->attached_bath }}" name="attached_bath" placeholder="@lang('app.attached_bath')">
                                {!! $errors->has('attached_bath')? '<p class="help-block">'.$errors->first('attached_bath').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('common_bath')? 'has-error':'' }}">
                            <label for="common_bath" class="col-sm-4 control-label">@lang('app.common_bath')</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="common_bath" value="{{ $ad->common_bath }}" name="common_bath" placeholder="@lang('app.common_bath')">
                                {!! $errors->has('common_bath')? '<p class="help-block">'.$errors->first('common_bath').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('balcony')? 'has-error':'' }}">
                            <label for="balcony" class="col-sm-4 control-label">@lang('app.balcony')</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="balcony" value="{{ $ad->balcony }}" name="balcony" placeholder="@lang('app.balcony')">
                                {!! $errors->has('balcony')? '<p class="help-block">'.$errors->first('balcony').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="additional_details" class="col-sm-4 control-label">@lang('app.additional_details')</label>
                            <div class="col-sm-8">
                                <label><input type="checkbox" value="1" name="dining_space" @if($ad->dining_space == 1) checked="checked" @endif  /> @lang('app.dining_space') </label>
                                <label><input type="checkbox" value="1" name="living_room"  @if($ad->living_room == 1) checked="checked" @endif /> @lang('app.living_room') </label>
                            </div>
                        </div>

                        <legend>@lang('app.amenities')</legend>

                        @php $saved_amenities = (array) unserialize($ad->amenities); @endphp
                        <div class="form-group type_checkbox">
                            <div class="col-sm-12">
                                @if($categories->count() > 0)
                                    @foreach($categories as $category)
                                        <label> <input type="checkbox" value="{{ $category->id }}" name="amenities[{{$category->id}}]" @if(in_array($category->id ,$saved_amenities)) checked="checked" @endif > {{ $category->category_name }} </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @if($distances->count() > 0)

                            <legend>@lang('app.distances')</legend>

                            @php $saved_distances = unserialize($ad->distances); @endphp
                            @foreach($distances as $distance)
                                @php $existing_value = (! empty($saved_distances[$distance->id]) ) ? $saved_distances[$distance->id] : '';  @endphp
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">{{ $distance->brand_name }}</label>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="{{ $distance->brand_name }}"  class="form-control" value="{{ $existing_value }}" name="distances[{{$distance->id}}]">
                                    </div>
                                    <div class="col-lg-3">
                                        meters
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <legend>@lang('app.image')</legend>

                        <div class="form-group {{ $errors->has('images')? 'has-error':'' }}">
                            <div class="col-sm-12">

                                @if($ad->media_img->count() > 0)
                                    @foreach($ad->media_img as $img)
                                        <div class="creating-ads-img-wrap">
                                            <img src="{{ media_url($img, false) }}" class="img-responsive" />
                                            <div class="img-action-wrap" id="{{ $img->id }}">
                                                <a href="javascript:;" class="imgDeleteBtn"><i class="fa fa-trash-o"></i> </a>
                                                <a href="javascript:;" class="imgFeatureBtn"><i class="fa fa-star{{ $img->is_feature ==1 ? '':'-o' }}"></i> </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div id="uploaded-ads-image-wrap">

                                    @if($ads_images->count() > 0)
                                        @foreach($ads_images as $img)
                                            <div class="creating-ads-img-wrap">
                                                <img src="{{ media_url($img, false) }}" class="img-responsive" />
                                                <div class="img-action-wrap" id="{{ $img->id }}">
                                                    <a href="javascript:;" class="imgDeleteBtn"><i class="fa fa-trash-o"></i> </a>
                                                    <a href="javascript:;" class="imgFeatureBtn"><i class="fa fa-star{{ $img->is_feature ==1 ? '':'-o' }}"></i> </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="file-upload-wrap">
                                    <label>
                                        <input type="file" name="images" id="images" style="display: none;" />
                                        <i class="fa fa-cloud-upload"></i>
                                        <p>@lang('app.upload_image')</p>

                                        <div class="progress" style="display: none;"></div>

                                    </label>
                                </div>

                                {!! $errors->has('images')? '<p class="help-block">'.$errors->first('images').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('video_url')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.video_url')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="video_url" value="{{ old('video_url')? old('video_url') : $ad->video_url }}" name="video_url" placeholder="@lang('app.video_url')">
                                {!! $errors->has('video_url')? '<p class="help-block">'.$errors->first('video_url').'</p>':'' !!}
                                <p class="help-block">@lang('app.video_url_help')</p>
                                <p class="text-info">@lang('app.video_url_help_for_modern_theme')</p>
                            </div>
                        </div>


                        <legend>@lang('app.location_info')</legend>

                        <div class="form-group  {{ $errors->has('country')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.country')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="country">
                                    <option value="">@lang('app.select_a_country')</option>

                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ $ad->country_id == $country->id ? 'selected' :'' }}>{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->has('country')? '<p class="help-block">'.$errors->first('country').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('state')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.state')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" id="state_select" name="state">
                                    @if($previous_states->count() > 0)
                                        @foreach($previous_states as $state)
                                        <option value="{{ $state->id }}" {{ $ad->state_id == $state->id ? 'selected' :'' }}>{{ $state->state_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <p class="text-info">
                                    <span id="state_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i> </span>
                                </p>
                            </div>
                        </div>

                        <div class="form-group  {{ $errors->has('city')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.city')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" id="city_select" name="city">
                                    @if($previous_cities->count() > 0)
                                        @foreach($previous_cities as $city)
                                        <option value="{{ $city->id }}" {{ $ad->city_id == $city->id ? 'selected':'' }}>{{ $city->city_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <p class="text-info">
                                    <span id="city_loader" style="display: none;"><i class="fa fa-spin fa-spinner"></i> </span>
                                </p>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('latitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.latitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="latitude" value="{{ $ad->latitude }}" name="latitude" placeholder="@lang('app.latitude')">
                                {!! $errors->has('latitude')? '<p class="help-block">'.$errors->first('latitude').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('longitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.longitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="longitude" value="{{$ad->longitude }}" name="longitude" placeholder="@lang('app.longitude')">
                                {!! $errors->has('longitude')? '<p class="help-block">'.$errors->first('longitude').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p><i class="fa fa-info-circle"></i> @lang('app.map_click_help') </p>
                        </div>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="dvMap" style="width: 100%; height: 400px; margin: 20px 0;"></div>


                        <legend>@lang('app.seller_info')</legend>

                        <div class="form-group {{ $errors->has('seller_name')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_name" value="{{ old('seller_name')? old('seller_name') : $ad->seller_name }}" name="seller_name" placeholder="@lang('app.seller_name')">
                                {!! $errors->has('seller_name')? '<p class="help-block">'.$errors->first('seller_name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('seller_email')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_email')</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="seller_email" value="{{ old('seller_email')? old('seller_email') : $ad->seller_email }}" name="seller_email" placeholder="@lang('app.seller_email')">
                                {!! $errors->has('seller_email')? '<p class="help-block">'.$errors->first('seller_email').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('seller_phone')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.seller_phone')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seller_phone" value="{{ old('seller_phone') ? old('seller_phone') : $ad->seller_phone }}" name="seller_phone" placeholder="@lang('app.seller_phone')">
                                {!! $errors->has('seller_phone')? '<p class="help-block">'.$errors->first('seller_phone').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address')? 'has-error':'' }}">
                            <label for="address" class="col-sm-4 control-label">@lang('app.address')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="address" value="{{ old('address')? old('address') : $ad->address }}" name="address" placeholder="@lang('app.address')">
                                {!! $errors->has('address')? '<p class="help-block">'.$errors->first('address').'</p>':'' !!}
                                <p class="text-info">@lang('app.address_line_help_text')</p>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('price_plan')? 'has-error':'' }}">
                            <label for="price_plan" class="col-sm-4 control-label">@lang('app.price_plan')</label>
                            <div class="col-sm-8">
                                {{ ucfirst($ad->price_plan) }}
                            </div>
                        </div>

                        <hr />

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">@lang('app.edit_ad')</button>
                            </div>
                        </div>
                        </form>

                    </div>

                </div>

            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->

@endsection

@section('page-js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{get_option('google_map_api_key')}}&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        function initAutocomplete() {

            var myLatLng = {lat: {{ $ad->latitude ? $ad->latitude : get_option('default_latitude') }}, lng: {{ $ad->longitude ? $ad->longitude : get_option('default_longitude') }} };

            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: myLatLng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            //Click event for getting lat lng
            google.maps.event.addListener(map, 'click', function (e) {
                $('input#latitude').val(e.latLng.lat());
                $('input#longitude').val(e.latLng.lng());
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: '{{$ad->title}}'
            });
            marker.setMap(map);

            var markers = [];
            // [START region_getplaces]
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
            // [END region_getplaces]
        }

    </script>


    <script>

        function generate_option_from_json(jsonData, fromLoad){

            //Load Category Json Data To Brand Select
            if (fromLoad === 'category_to_brand'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> <?php echo trans('app.select_a_brand') ?> </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].brand_name +' </option>';
                    }
                    $('#brand_select').html(option);
                    $('#brand_select').select2();
                }else {
                    $('#brand_select').html('');
                    $('#brand_select').select2();
                }
                $('#brand_loader').hide('slow');
            }else if(fromLoad === 'country_to_state'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> @lang('app.select_state') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].state_name +' </option>';
                    }
                    $('#state_select').html(option);
                    $('#state_select').select2();
                }else {
                    $('#state_select').html('');
                    $('#state_select').select2();
                }
                $('#state_loader').hide('slow');

            }else if(fromLoad === 'state_to_city'){
                var option = '';
                if (jsonData.length > 0) {
                    option += '<option value="0" selected> @lang('app.select_city') </option>';
                    for ( i in jsonData){
                        option += '<option value="'+jsonData[i].id+'"> '+jsonData[i].city_name +' </option>';
                    }
                    $('#city_select').html(option);
                    $('#city_select').select2();
                }else {
                    $('#city_select').html('');
                    $('#city_select').select2();
                }
                $('#city_loader').hide('slow');

            }

        }


        $(document).ready(function(){
            $('[name="category"]').change(function(){
                var category_id = $(this).val();
                $('#brand_loader').show();

                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_brand_by_category') }}',
                    data : { category_id : category_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'category_to_brand');
                    }
                });
            });


            $('[name="country"]').change(function(){
                var country_id = $(this).val();
                $('#state_loader').show();
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
                $('#city_loader').show();
                $.ajax({
                    type : 'POST',
                    url : '{{ route('get_city_by_state') }}',
                    data : { state_id : state_id,  _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        generate_option_from_json(data, 'state_to_city');
                    }
                });
            });

            $("#images").change(function() {
                var fd = new FormData(document.querySelector("form#adsPostForm"));
                //$('#loadingOverlay').show();
                $('.progress').show();
                $.ajax({
                    url : '{{ route('upload_ads_image') }}',
                    type: "POST",
                    data: fd,

                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                //console.log(percentComplete);

                                var progress_bar = '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '+percentComplete+'%">'+percentComplete+'% </div>';

                                if (percentComplete === 100) {
                                    $('.progress').hide();
                                }
                            }
                        }, false);

                        return xhr;
                    },

                    cache: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success : function (data) {
                        //$('#loadingOverlay').hide('slow');
                        if (data.success == 1){
                            $('#uploaded-ads-image-wrap').load('{{ route('append_media_image') }}');
                        } else{
                            toastr.error(data.msg, '<?php echo trans('app.error') ?>', toastr_options);
                        }
                    }
                });
            });


            $('body').on('click', '.imgDeleteBtn', function(){
                //Get confirm from user
                if ( ! confirm('{{ trans('app.are_you_sure') }}')){
                    return '';
                }

                var current_selector = $(this);
                var img_id = $(this).closest('.img-action-wrap').attr('id');
                $.ajax({
                    url : '{{ route('delete_media') }}',
                    type: "POST",
                    data: { media_id : img_id, _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.success == 1){
                            current_selector.closest('.creating-ads-img-wrap').hide('slow');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
                });
            });
            $('body').on('click', '.imgFeatureBtn', function(){
                var img_id = $(this).closest('.img-action-wrap').attr('id');
                var current_selector = $(this);

                $.ajax({
                    url : '{{ route('feature_media_creating_ads') }}',
                    type: "POST",
                    data: { media_id : img_id, _token : '{{ csrf_token() }}' },
                    success : function (data) {
                        if (data.success == 1){
                            $('.imgFeatureBtn').html('<i class="fa fa-star-o"></i>');
                            current_selector.html('<i class="fa fa-star"></i>');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
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
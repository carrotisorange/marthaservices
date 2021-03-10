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

                <div class="row">
                    <div class="col-md-10 col-xs-12">

                        <form action="{{route('save_settings')}}" class="form-horizontal" method="post" enctype="multipart/form-data"> @csrf


                        <div class="form-group {{ $errors->has('site_name')? 'has-error':'' }}">
                            <label for="site_name" class="col-sm-4 control-label">@lang('app.site_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="site_name" value="{{ old('site_name')? old('site_name') : get_option('site_name') }}" name="site_name" placeholder="@lang('app.site_name')">
                                {!! $errors->has('site_name')? '<p class="help-block">'.$errors->first('site_name').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('site_title')? 'has-error':'' }}">
                            <label for="site_title" class="col-sm-4 control-label">@lang('app.site_title')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="site_title" value="{{ old('site_title')? old('site_title') : get_option('site_title') }}" name="site_title" placeholder="@lang('app.site_title')">
                                {!! $errors->has('site_title')? '<p class="help-block">'.$errors->first('site_title').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email_address')? 'has-error':'' }}">
                            <label for="email_address" class="col-sm-4 control-label">@lang('app.email_address')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email_address" value="{{ old('email_address')? old('email_address') : get_option('email_address') }}" name="email_address" placeholder="@lang('app.email_address')">
                                {!! $errors->has('email_address')? '<p class="help-block">'.$errors->first('email_address').'</p>':'' !!}
                                <p class="text-info"> @lang('app.email_address_help_text')</p>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="default_timezone" class="col-sm-4 control-label">
                                @lang('app.default_timezone')
                            </label>
                            <div class="col-sm-8 {{ $errors->has('default_timezone')? 'has-error':'' }}">
                                <select class="form-control select2" name="default_timezone" id="default_timezone">
                                    @php $saved_timezone = get_option('default_timezone'); @endphp
                                    @foreach(timezone_identifiers_list() as $key=>$value)
                                        <option value="{{ $value }}" {{ $saved_timezone == $value? 'selected':'' }}>{{ $value }}</option>
                                    @endforeach

                                </select>


                                {!! $errors->has('default_timezone')? '<p class="help-block">'.$errors->first('default_timezone').'</p>':'' !!}
                                <p class="text-info">@lang('app.default_timezone_help_text')</p>
                            </div>
                        </div>



                        <div class="form-group {{ $errors->has('date_format')? 'has-error':'' }}">
                            <label for="email_address" class="col-sm-4 control-label">@lang('app.date_format')</label>
                            <div class="col-sm-8">
                                <fieldset>
                                    @php $saved_date_format = get_option('date_format'); @endphp

                                    <label><input type="radio" value="F j, Y" name="date_format" {{ $saved_date_format == 'F j, Y'? 'checked':'' }}> {{ date('F j, Y') }}<code>F j, Y</code></label> <br />
                                    <label><input type="radio" value="Y-m-d" name="date_format" {{ $saved_date_format == 'Y-m-d'? 'checked':'' }}> {{ date('Y-m-d') }}<code>Y-m-d</code></label> <br />

                                    <label><input type="radio" value="m/d/Y" name="date_format" {{ $saved_date_format == 'm/d/Y'? 'checked':'' }}> {{ date('m/d/Y') }}<code>m/d/Y</code></label> <br />

                                    <label><input type="radio" value="d/m/Y" name="date_format" {{ $saved_date_format == 'd/m/Y'? 'checked':'' }}> {{ date('d/m/Y') }}<code>d/m/Y</code></label> <br />

                                    <label><input type="radio" value="custom" name="date_format" {{ $saved_date_format == 'custom'? 'checked':'' }}> Custom:</label>
                                    <input type="text" value="{{ get_option('date_format_custom') }}" id="date_format_custom" name="date_format_custom" />
                                    <span>example: {{ date(get_option('date_format_custom')) }}</span>
                                </fieldset>
                                <p class="text-info"> @lang('app.date_format_help_text')</p>
                            </div>
                        </div>



                        <div class="form-group {{ $errors->has('time_format')? 'has-error':'' }}">
                            <label for="email_address" class="col-sm-4 control-label">@lang('app.time_format')</label>
                            <div class="col-sm-8">
                                <fieldset>
                                    <label><input type="radio" value="g:i a" name="time_format" {{ get_option('time_format') == 'g:i a'? 'checked':'' }}> {{ date('g:i a') }}<code>g:i a</code></label> <br />
                                    <label><input type="radio" value="g:i A" name="time_format" {{ get_option('time_format') == 'g:i A'? 'checked':'' }}> {{ date('g:i A') }}<code>g:i A</code></label> <br />

                                    <label><input type="radio" value="H:i" name="time_format" {{ get_option('time_format') == 'H:i'? 'checked':'' }}> {{ date('H:i') }}<code>H:i</code></label> <br />

                                    <label><input type="radio" value="custom" name="time_format" {{ get_option('time_format') == 'custom'? 'checked':'' }}> Custom:</label>
                                    <input type="text" value="{{ get_option('time_format_custom') }}" id="time_format_custom" name="time_format_custom" />
                                    <span>example: {{ date(get_option('time_format_custom')) }}</span>
                                </fieldset>
                                <p><a href="http://php.net/manual/en/function.date.php" target="_blank">@lang('app.date_time_read_more')</a> </p>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('currency_sign')? 'has-error':'' }}">
                            <label for="currency_sign" class="col-sm-4 control-label">@lang('app.currency_sign')</label>
                            <div class="col-sm-8">
                                {{--<input type="text" class="form-control" id="currency_sign" value="{{ old('currency_sign')? old('currency_sign') : get_option('currency_sign') }}" name="currency_sign" placeholder="@lang('app.currency_sign')">
                                {!! $errors->has('currency_sign')? '<p class="help-block">'.$errors->first('currency_sign').'</p>':'' !!}--}}


                                <?php $current_currency = get_option('currency_sign'); ?>
                                <select name="currency_sign" class="form-control select2">
                                    @foreach(themeqx_classifieds_currencies() as $code => $name)
                                        <option value="{{ $code }}"  {{ $current_currency == $code? 'selected':'' }}> {{ $code }} </option>
                                    @endforeach
                                </select>


                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('logo_settings')? 'has-error':'' }}">
                            <label for="email_address" class="col-sm-4 control-label">@lang('app.logo_settings')</label>
                            <div class="col-sm-8">
                                <fieldset>
                                    <label><input type="radio" value="show_site_name" name="logo_settings" {{ get_option('logo_settings') == 'show_site_name'? 'checked':'' }}> @lang('app.show_site_name') </label> <br />
                                    <label><input type="radio" value="show_image" name="logo_settings" {{ get_option('logo_settings') == 'show_image'? 'checked':'' }}> @lang('app.show_image') </label> <br />
                                </fieldset>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('google_map_api_key')? 'has-error':'' }}">
                            <label for="google_map_api_key" class="col-sm-4 control-label">@lang('app.google_map_api_key')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="google_map_api_key" value="{{ old('google_map_api_key')? old('google_map_api_key') : get_option('google_map_api_key') }}" name="google_map_api_key" placeholder="@lang('app.google_map_api_key')">
                                <p class="help-block"> @lang('app.google_map_api_key_get_info') <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">https://developers.google.com/maps/documentation/javascript/get-api-key</a> </p>
                                {!! $errors->has('google_map_api_key')? '<p class="help-block">'.$errors->first('google_map_api_key').'</p>':'' !!}
                            </div>
                        </div>



                        <div class="form-group {{ $errors->has('default_latitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.default_latitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="default_latitude" value="{{ old('default_latitude')? old('default_latitude') : get_option('default_latitude') }}" name="default_latitude" placeholder="@lang('app.default_latitude')">
                                {!! $errors->has('default_latitude')? '<p class="help-block">'.$errors->first('default_latitude').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('default_longitude')? 'has-error':'' }}">
                            <label for="ad_title" class="col-sm-4 control-label">@lang('app.default_longitude')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="default_longitude" value="{{ old('default_longitude')? old('default_longitude') : get_option('default_longitude') }}" name="default_longitude" placeholder="@lang('app.default_longitude')">
                                {!! $errors->has('default_longitude')? '<p class="help-block">'.$errors->first('default_longitude').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p><i class="fa fa-info-circle"></i> @lang('app.map_click_help') </p>
                        </div>

                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="dvMap" style="width: 100%; height: 400px; margin: 20px 0;"></div>


                        <hr />
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" id="settings_save_btn" class="btn btn-primary">@lang('app.save_settings')</button>
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
            var map = new google.maps.Map(document.getElementById('dvMap'), {
                center: {lat: {{ (get_option('default_latitude') != 'default_latitude' ) ? get_option('default_latitude') : 40.715 }}, lng: {{ (get_option('default_longitude') != 'default_longitude')? get_option('default_longitude') : -74.009 }} },
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
                $('input#default_latitude').val(e.latLng.lat());
                $('input#default_longitude').val(e.latLng.lng());
            });

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
        $(document).ready(function(){

            $('input[type="checkbox"], input[type="radio"]').click(function(){
                var input_name = $(this).attr('name');
                var input_value = 0;
                if ($(this).prop('checked')){
                    input_value = $(this).val();
                }
                $.ajax({
                    url : '{{ route('save_settings') }}',
                    type: "POST",
                    data: { [input_name]: input_value, '_token': '{{ csrf_token() }}' },
                });
            });


            $('input[name="date_format"]').click(function(){
                $('#date_format_custom').val($(this).val());
            });
            $('input[name="time_format"]').click(function(){
                $('#time_format_custom').val($(this).val());
            });

            /**
             * Send settings option value to server
             */
            $('#settings_save_btn').click(function(e){
                e.preventDefault();

                var this_btn = $(this);
                this_btn.attr('disabled', 'disabled');

                var form_data = this_btn.closest('form').serialize();
                $.ajax({
                    url : '{{ route('save_settings') }}',
                    type: "POST",
                    data: form_data,
                    success : function (data) {
                        if (data.success == 1){
                            this_btn.removeAttr('disabled');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
                });
            });

        });
    </script>
@endsection
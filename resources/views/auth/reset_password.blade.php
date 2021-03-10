@extends('layout.main')
@section('title') @lang('app.reset_password') | @parent @endsection

@section('main')

    <div class="container">
        <div class="row">

            <div class="login">

                @if(session('success'))
                    <div class="col-md-12">{!! session('success') !!}</div>
                @endif

                <div class="col-sm-6 col-sm-offset-3 col-xs-12">

                    <form action="" class="form-horizontal" method="post"> @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group {{ $errors->has('password')? 'has-error':'' }} ">
                            <label class="control-label col-md-4">@lang('app.new_password')</label>
                            <div class="col-md-8">
                                <input type="password" name="password" id="password" class="form-control"  value="{{ old('password') }}" placeholder="@lang('app.new_password')">
                                {!! $errors->has('password')? '<p class="help-block">'.$errors->first('password').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation')? 'has-error':'' }} ">
                            <label class="control-label col-md-4">@lang('app.confirm_new_password')</label>
                            <div class="col-md-8">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"  value="{{ old('password_confirmation') }}" placeholder="@lang('app.confirm_new_password')">
                                {!! $errors->has('password_confirmation')? '<p class="help-block">'.$errors->first('password_confirmation').'</p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-unlock"></i> @lang('app.reset_password')</button>

                            </div>
                        </div>
                    </form>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script>
        var options = {closeButton : true};
        @if(session('error'))
        toastr.error('{{ session('error') }}', 'Error!', options)
        @endif
    </script>
@endsection

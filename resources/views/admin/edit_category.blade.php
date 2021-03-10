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
                    <div class="col-sm-8 col-sm-offset-1 col-xs-12">

                        <form action="" class="form-horizontal" method="post"> @csrf


                        <div class="form-group">
                            <label for="category_type" class="col-sm-4 control-label">@lang('app.categories_type')</label>
                            <div class="col-sm-8">
                                <select class="form-control select2icon" name="category_type">
                                    <option value="indoor" @if($edit_category->category_type =='indoor' ) selected="selected" @endif >@lang('app.indoor')</option>
                                    <option value="outdoor" @if($edit_category->category_type =='outdoor' ) selected="selected" @endif >@lang('app.outdoor')</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('category_name')? 'has-error':'' }}">
                            <label for="category_name" class="col-sm-4 control-label">@lang('app.category_name')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="category_name" value="{{ old('category_name') ? old('category_name') : $edit_category->category_name }}" name="category_name" placeholder="@lang('app.category_name')<">
                                {!! $errors->has('category_name')? '<p class="help-block">'.$errors->first('category_name').'</p>':'' !!}

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="`color_class" class="col-sm-4 control-label">@lang('app.select_color')</label>
                            <div class="col-sm-8">
                                <input type="color" name="color_class" class="form-control" value="{{ $edit_category->color_class }}" />
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description')? 'has-error':'' }}">
                            <label for="description" class="col-sm-4 control-label">@lang('app.description')</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" class="form-control" rows="6">{{ old('description')? old('description') : $edit_category->description }}</textarea>
                                {!! $errors->has('description')? '<p class="help-block">'.$errors->first('description').'</p>':'' !!}

                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary">@lang('app.edit_category')</button>
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

@endsection
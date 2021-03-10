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
                    <div class="col-xs-12">

                        <table class="table table-bordered table-striped" id="jDataTable">
                            <thead>
                            <tr>
                                <th>@lang('app.name')</th>
                                <th>@lang('app.via')</th>
                                <th>@lang('app.email')</th>
                                <th>@lang('app.created_at')</th>
                                <th>@lang('app.actions')</th>
                            </tr>
                            </thead>

                            @foreach($users as $user)

                                <tr>
                                    <th>{!! '<a href="'.route('user_info', $user->id).'">'.$user->name.'</a>' !!}</th>
                                    <th>{!! $user->user_name !!}</th>
                                    <th>{!! $user->email !!}</th>
                                    <th>{!! $user->signed_up_datetime() !!}</th>
                                    <th>
                                        @php
                                            $html = '<a href="'.route('user_info', $user->id).'" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> '.trans('app.view').'</a>';

                       if($user->feature == 0){
                           $html .= '<a href="javascript:;" class="btn btn-default btn-xs agent-feature-btn" data-user-id="'.$user->id.'"><i class="fa fa-star-o"></i></a>';
                       }else{
                           $html .= '<a href="javascript:;" class="btn btn-default btn-xs agent-feature-btn" data-user-id="'.$user->id.'"><i class="fa fa-star"></i></a>';
                       }

                       echo $html;
                                        @endphp
                                    </th>
                                </tr>

                            @endforeach

                        </table>

                        {!! $users->links() !!}

                    </div>
                </div>

            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {

            $(document).on('click','.agent-feature-btn', function(){
                var user_id = $(this).data('user-id');
                $that = $(this);
                $.ajax({
                    type : 'POST',
                    url : '{{ route('change_user_feature') }}',
                    data: { user_id : user_id, _token : '{{csrf_token()}}' },
                    success : function(data){
                        $that.html(data);
                    }
                });
            });

        });
    </script>
@endsection
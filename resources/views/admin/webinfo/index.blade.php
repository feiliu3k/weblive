@extends('admin.layout')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/default.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/component.css') }}" >
@stop
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $live->livetitle }} <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/create' }}" class="btn btn-success btn-xs pull-right" >
                <i class="fa fa-plus-circle"></i> 新建
            </a></div>
            <div class="panel-body">
                <div class="col-md-12">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                    <div class="main">
                        <ul class="cbp_tmtimeline">
                            @if ($live->webInfos)
                                @foreach ($live->webInfos as $liveinfo)
                                <li>
                                    <time class="cbp_tmtime" datetime="{{ $liveinfo->ifotime }}"><span>{{ $liveinfo->publishDate }}</span> <span>{{ $liveinfo->publishTime }}</span></time>
                                    <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                    <div class="cbp_tmlabel">
                                        <h2>{{$liveinfo->ifotitle}}
                                            <div class="pull-right">
                                            <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/'.$liveinfo->ifoid.'/edit' }}" class="btn btn-xs btn-success">
                                                <i class="fa fa-edit" ></i> 编辑
                                            </a>
                                            </div>
                                        </h2>
                                        {!! $liveinfo->ifocontent !!}
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">评论列表</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="main">
                        <ul class="cbp_tmtimeline">
                            @if ($live->comments)
                                @foreach ($live->comments as $comment)
                                <li>
                                    <time class="cbp_tmtime" datetime="{{ $liveinfo->ifotime }}"><span>{{ $liveinfo->publishDate }}</span> <span>{{ $liveinfo->publishTime }}</span></time>
                                    <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                    <div class="cbp_tmlabel">
                                        <h2>{{$liveinfo->ifotitle}}
                                            <div class="pull-right">
                                            <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/'.$liveinfo->ifoid.'/edit' }}" class="btn btn-xs btn-success">
                                                <i class="fa fa-edit" ></i> 编辑
                                            </a>
                                            </div>
                                        </h2>
                                        {!! $liveinfo->ifocontent !!}
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ URL::asset('assets/js/jquery.form.js') }}"></script>
    <script charset="UTF-8" src="{{ URL::asset('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script charset="UTF-8" src="{{ URL::asset('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/ueditor.all.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/lang/zh-cn/zh-cn.js') }}"></script>
@stop
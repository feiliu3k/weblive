@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>微直播访问  <small>» 列表</small></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>用户标志</th>
                            <th>昵称</th>
                            <th>用户ip</th>
                            <th>手机号码</th>
                            <th>访问路径</th>
                            <th>首次观看时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($visitors)
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $visitor->localrecord }}</td>
                                    <td>{{ $visitor->nickname }}</td>
                                    <td>{{ $visitor->userip }}</td>
                                    <td>{{ $visitor->mobile }}</td>
                                    <td>
                                        @if ($visitor->visitorfrom==1)
                                            <span>微信端</span>
                                        @elseif ($visitor->visitorfrom==0)
                                            <span>浏览器</span>
                                        @else
                                            <span>其他</span>
                                        @endif    
                                    </td>
                                    <td>{{ $visitor->visittime }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="delete_viewrecord('{{ $visitor->liveid }}','{{ $visitor->id }}')">
                                        <i class="fa fa-times-circle fa-lg"></i>
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
             <div class="pull-right">
                {!! $visitors->render() !!}
            </div>
        </div>
    </div>
    {{-- 确认删除 --}}
    <div class="modal fade" id="modal-vr-delete" tabIndex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">请确认</h4>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        <i class="fa fa-question-circle fa-lg"></i>
                        你是否要删除此浏览记录吗?
                    </p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('/admin/visitor/delete') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="liveid" id="delete-viewrecord-liveid">
                        <input type="hidden" name="vrid" id="delete-viewrecord-vrid">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-times-circle"></i> 确定
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>

        function delete_viewrecord(liveid,vrid)
        {
            $("#delete-viewrecord-liveid").val(liveid);
            $("#delete-viewrecord-vrid").val(vrid);
            $("#modal-vr-delete").modal("show");
        }
    </script>
@stop
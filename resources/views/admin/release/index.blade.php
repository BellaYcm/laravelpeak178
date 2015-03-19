@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">管理评论{{ Config::get('constants.ADMIN_URL') }}</div>

                    <div class="panel-body">
                        <div style="padding-bottom: 5px;"> <a href="{{ URL( Config::get('constants.ADMIN_URL').'/releases/create') }}" class="btn btn-lg btn-primary">新增</a></div>
                        <table class="table table-striped">

                            <tr class="row">
                                <th class="col-lg-4">title</th>
                                <th class="col-lg-4">article_number</th>
                                <th class="col-lg-4">content</th>
                                <th class="col-lg-4">image</th>
                                <th class="col-lg-4">timestamp</th>
                                <th class="col-lg-2">type</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach ($release as $release)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        {{ $release->title }}
                                    </td>
                                    <td class="col-lg-6">
                                        {{ $release->article_number }}
                                    </td>
                                    <td class="col-lg-6">
                                        {{ $release->contents }}
                                    </td>
                                    <td class="col-lg-6">
                                        {{ $release->image }}
                                    </td>

                                    <td class="col-lg-2">
                                        <h4>{{ $release->timestamp }}</h4>
                                    </td>
                                    <td class="col-lg-4">
                                        <h3>{{$release->type}}</h3>
                                        </a>
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL( Config::get('constants.ADMIN_URL').'/releases/'.$release->id.'/edit') }}" class="btn btn-success">编辑</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL( Config::get('constants.ADMIN_URL').'/releases/'.$release->id) }}" method="POST" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-danger">删除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">管理评论</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <tr class="row">
                                <th class="col-lg-4">Content</th>
                                <th class="col-lg-2">User</th>
                                <th class="col-lg-4">Page</th>
                                <th class="col-lg-1">编辑</th>
                                <th class="col-lg-1">删除</th>
                            </tr>
                            @foreach ($comments as $comment)
                                <tr class="row">
                                    <td class="col-lg-6">
                                        {{ $comment->content }}
                                    </td>
                                    <td class="col-lg-2">
                                                <h4>{{ $comment->nickname }}</h4>
                                    </td>
                                    <td class="col-lg-4">
                                                <h3>{{$comment->release_id}}</h3>
                                        </a>
                                    </td>
                                    <td class="col-lg-1">
                                        <a href="{{ URL( Config::get('constants.ADMIN_URL').'/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                                    </td>
                                    <td class="col-lg-1">
                                        <form action="{{ URL( Config::get('constants.ADMIN_URL').'/comments/'.$comment->id) }}" method="POST" style="display: inline;">
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
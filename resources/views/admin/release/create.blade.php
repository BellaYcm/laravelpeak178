@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增 Release</div>

                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ URL( Config::get('constants.ADMIN_URL').'/releases') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h4>title</h4>
                            <input type="text" name="title" class="form-control" required="required">
                            <br>
                            <h4>article_number</h4>
                            <input type="text" name="article_number" class="form-control" required="required">
                            <br>
                            <h4>image</h4>
                            <input type="text" name="image" class="form-control" required="required">
                            <br>
                            <h4>timestamp</h4>
                            <input type="text" name="timestamp" class="form-control" required="required">
                            <br>
                            <h4>type</h4>
                            <input type="text" name="type" class="form-control" required="required">
                            <br>
                            <h4>contents</h4>
                            <textarea name="contents" rows="10" class="form-control" required="required"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">新增 Release</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
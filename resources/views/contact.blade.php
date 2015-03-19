@extends('_layouts.default')

@section('content')

<div id="new" style="margin: 0 auto;width: 50%;padding-bottom: 100px;padding-top: 100px">
    <p>如您有好的建议，或者期待加入我们，请留下联系方式</p>
    <form action="{{ URL('contact/store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" style="width: 300px;" id="name" required="required">
        </div>
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" style="width: 300px;" id="email">
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required" id="content"></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-success col-lg-12" id="submit">Submit</button>
    </form>
</div>


@endsection
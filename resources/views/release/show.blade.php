@extends('_layouts.default')

@section('content')
    <hr class="featurette-divider">

    <div class="row featurette" style="width: 50%;margin: 100px auto;">
        <div class="col-md-5">
            <img class="featurette-image img-responsive" src="{{ $release->image }}" alt="Generic placeholder image" >
        </div>
        <div class="col-md-7">
            <h2 class="featurette-heading">{{ $release->title }}<span class="text-muted"></span></h2>
            <p class="lead">货号：{{ $release->article_number }}</p>
            <span class="text-muted">发售日期{{ date("Y-m-d ",$release->timestamp) }}</span>
        </div>
    </div>



    <div class="conmments" style="margin: 0 auto;width: 50%;">

        @foreach ($release->hasManyComments as $comment)

            <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                <div class="nickname" data="{{ $comment->nickname }}">

                        <h3>{{ $comment->nickname }}</h3>
                    <h6>{{ $comment->created_at }}</h6>
                </div>
                <div class="content">
                    <p style="padding: 20px;">
                        {{ $comment->content }}
                    </p>
                </div>
                <div class="reply" style="text-align: right; padding: 5px;">
                    <a href="#new" onclick="reply(this);">回复</a>
                </div>
            </div>

    @endforeach
    </div>

    <div id="new" style="width: 50%;margin: 0 auto;padding-bottom: 10%">
        <form action="{{ URL('comment/store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="release_id" value="{{ $release->id }}">
            <div class="form-group">
                <label>Nickname</label>
                <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required">
            </div>

            <div class="form-group">
                <label>Content</label>
                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
            <p>评论需审核才能显示</p>
        </form>
    </div>
    <script>
        function reply(a) {
            var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
            var textArea = document.getElementById('newFormContent');
            textArea.innerHTML = '@'+nickname+' ';
        }
    </script>



@endsection
@extends('_layouts.default')

@section('content')
    <h4>
        <a href="/">⬅️返回首页</a>
    </h4>

    <h1 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1>
    <hr>
    <div id="date" style="text-align: right;">
        {{ $article->updated_at }}
    </div>
    <div id="content" style="padding: 50px;">
        <p>
            {{ $article->body }}
        </p>
    </div>
    <div id="comments" style="margin-bottom: 100px;">

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



        <script>
            function reply(a) {
                var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                var textArea = document.getElementById('newFormContent');
                textArea.innerHTML = '@'+nickname+' ';
            }
        </script>


    </div>
@endsection
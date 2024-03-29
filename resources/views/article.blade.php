@extends('_layouts.default')

@section('content')
    <div id="title" style="text-align: center;">
        <h1>Learn Laravel 5</h1>
        <div style="padding: 5px; font-size: 16px;">{{ Inspiring::quote() }}</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach ($article as $article)
                <li style="margin: 50px 0;">
                    <div class="title">
                        <a href="{{ URL('article/'.$article->id) }}">
                            <h4>{{ $article->title }}</h4>
                        </a>
                    </div>
                    <div class="body">
                        <p>{{ $article->body }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Diaries</h1>
        <div class='diaries'>
            @foreach ($diaries as $diary)
                <div class='diary'>
                    <h2 class='title'>{{$diary->title}}</h2>
                    <p class='content'>{{$diary->content}}</p>
                    <p class='photo'>{{$diary->photo}}</p>
                    <a href="/diaries/{{$diary->id}}">see more</a>
                    <form action="/diaries/{{ $diary->id }}" id="form_{{ $diary->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteDiary({{ $diary->id }})">Delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <a href="/diaries/create">
            <button type="button">Create</button>
        </a>
        <div class='paginate'>
            {{ $diaries->links() }}
        </div>
        <script>
            function deleteDiary(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
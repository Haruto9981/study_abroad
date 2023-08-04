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
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $diaries->links() }}
        </div>
    </body>
</html>
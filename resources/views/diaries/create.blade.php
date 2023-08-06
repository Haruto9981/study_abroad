<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <body>
        <h1>Create Diary</h1>
        <form action="/diaries" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="diary[title]" placeholder="Title"/>
                <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
            </div>
            <div class="content">
                <h2>Content</h2>
                <textarea name="diary[content]" placeholder="What's your experience?"></textarea>
                 <p class="content__error" style="color:red">{{ $errors->first('diary.content') }}</p>
            </div>
            <input type="submit" value="Create"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

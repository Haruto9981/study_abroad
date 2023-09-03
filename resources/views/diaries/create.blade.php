<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
    <x-app-layout>
        <body>
            <div class="container px-64 pb-10 mx-auto">
                <br>
                <h1  class="text-4xl">Create</h1>
                <a class="flex justify-end" href="/diaries/index">
                    <button id="expressions-button" class="rounded-lg bg-gray-300 px-4 py-2">Back</button>
                </a>
                <div class="my-10 lg:mb-0 border border-black px-10 pt-4 pb-10 rounded-3xl">
                    <form action="/diaries" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-4">
                            <h2 class="text-3xl mb-2">Title</h2>
                            <input class="w-full" type="text" name="diary[title]" placeholder="Title"/>
                            <p class="title__error" style="color:red">{{ $errors->first('diary.title') }}</p>
                        </div>
                        <div  class="my-4">
                            <h2 class="text-3xl  mb-2">Content</h2>
                            <textarea class="w-full h-60" name="diary[content]" placeholder="What's your experience?"></textarea>
                             <p class="content__error" style="color:red">{{ $errors->first('diary.content') }}</p>
                        </div>
                        <div  class="my-4">
                            <h2 class="text-3xl  mb-2">Picture</h2>
                            <input type="file" name="diary[photo]"> 
                        </div>
                        <div  class="my-4">
                            <select name="diary[is_private]">
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="rounded-lg bg-gray-300 px-4 py-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>

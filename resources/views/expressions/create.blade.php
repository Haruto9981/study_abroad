<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Expression</title>
    </head>
    <x-app-layout>
        <body>
            <div class="container px-64 pb-10 mx-auto">
                <br>
                <h1  class="text-4xl">Add</h1>
                <a class="flex justify-end" href="/expressions/index">
                    <button id="expressions-button" class="rounded-lg bg-gray-300 px-4 py-2">Back</button>
                </a>
                <div class="my-10 lg:mb-0 border border-black px-10 pt-4 pb-10 rounded-3xl">
                    <form action="/expressions" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-4">
                            <h2 class="text-3xl mb-2">Vocabulary</h2>
                            <input class="w-full" type="text" name="expression[vocabulary]" placeholder="Vocabulary"/>
                            <p class="title__error" style="color:red">{{ $errors->first('expression.vocabulary') }}</p>
                        </div>
                        <div  class="my-4">
                            <h2 class="text-3xl  mb-2">Meaning</h2>
                            <textarea class="w-full" name="expression[meaning]" placeholder="What does it mean?"></textarea>
                             <p class="content__error" style="color:red">{{ $errors->first('expression.meaning') }}</p>
                        </div>
                        <div  class="my-4">
                            <h2 class="text-3xl  mb-2">Example Sentence</h2>
                            <textarea class="w-full" name="expression[example]" placeholder="What's the example sentence?"></textarea>
                             <p class="content__error" style="color:red">{{ $errors->first('expression.example') }}</p>
                        </div>

                        <div  class="my-4">
                            <select name="expression[is_private]">
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="rounded-lg bg-gray-300 px-4 py-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>

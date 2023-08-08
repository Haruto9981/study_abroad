<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Expression</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Expression') }}
           </h2>
        </x-slot>
        <body>
            <form action="/expressions" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="vocabulary">
                    <h2>Expression</h2>
                    <input type="text" name="expression[vocabulary]" placeholder="Vocabulary"/>
                    <p class="title__error" style="color:red">{{ $errors->first('expression.vocabulary') }}</p>
                </div>
                <div class="explaination">
                    <h2>Explaination</h2>
                    <textarea name="expression[explaination]" placeholder="Any Explaination?"></textarea>
                     <p class="content__error" style="color:red">{{ $errors->first('expression.explaination') }}</p>
                </div>
                <div class="is_private">
                    <select name="expression[is_private]">
                        <option value="0">private</option>
                        <option value="1">public</option>
                    </select>
                </div>
                <input type="submit" value="Create"/>
            </form>
            <div class="footer">
                <a href="/expressions/index">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Diary</title>
    </head>
     <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Expression') }}
           </h2>
        </x-slot>
        <body>
            <form action="/expressions/{{ $expression->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="vocabulary">
                    <h2>Vocabulary</h2>
                    <input type="text" name="expression[vocabulary]" value="{{ $expression->vocabulary }}"/>
                    <p class="vocabulary__error" style="color:red">{{ $errors->first('expression.vocabulary') }}</p>
                </div>
                <div class="explaination">
                    <h2>Explaination</h2>
                    <input type="text" name="expression[explaination]" value="{{ $expression->explaination }}"/>
                     <p class="explaination__error" style="color:red">{{ $errors->first('expression.explaination') }}</p>
                </div>
                <input type="submit" value="Save"/>
            </form>
            <div class="footer">
                <a href="/expressions/index">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>

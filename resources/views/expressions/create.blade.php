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
                <div class="meaning">
                    <h2>Meaning</h2>
                    <textarea name="expression[meaning]" placeholder="Meaning?"></textarea>
                     <p class="content__error" style="color:red">{{ $errors->first('expression.meaning') }}</p>
                </div>
                <div class="example">
                    <h2>Example</h2>
                    <textarea name="expression[example]" placeholder="Any example sentence?"></textarea>
                     <p class="content__error" style="color:red">{{ $errors->first('expression.example') }}</p>
                </div>
                <div class="is_private">
                    <select name="expression[is_private]">
                        <option value="private">private</option>
                        <option value="public">public</option>
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

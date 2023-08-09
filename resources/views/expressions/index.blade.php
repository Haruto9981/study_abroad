<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Expression</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Expressions') }}
           </h2>
        </x-slot>
        <body>
            <div class='expressions'>
                @foreach ($expressions as $expression)
                    <div class='expression'>
                        <h2 class='vocabulary'>{{$expression->vocabulary}}</h2>
                        <p class='explaination'>{{$expression->explaination}}</p>
                        <a href="/expressions/{{$expression->id}}">see more</a>
                        <form action="/expressions/{{ $expression->id }}" id="form_{{ $expression->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteExpression({{ $expression->id }})">Delete</button> 
                        </form>
                    </div>
                @endforeach
            </div>
            <a href="/expressions/create">
                <button type="button">Create</button>
            </a>
            <div class='paginate'>
                {{ $expressions->links() }}
            </div>
            <script>
                function deleteExpression(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </body>
    </x-app-layout>
</html>
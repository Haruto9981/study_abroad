<x-app-layout>
    <body>
        <div class="container px-64 pb-10 mx-auto">
            <br>
            <h1  class="text-4xl font-medium">Edit</h1>
            <div class="flex justify-end" href="/expressions/index">
                <button onclick="location.href='/expressions/index'" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Back</button>
            </div>
            <div class="my-10 lg:mb-0 border border-black px-10 pt-4 pb-10 rounded-3xl">
                <form  action="/expressions/{{ $expression->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="my-4">
                        <h2 class="text-3xl mb-2">Vocabulary</h2>
                        <input class="w-full" type="text" name="expression[vocabulary]"  value="{{ $expression->vocabulary }}"/>
                        <p style="color:red">{{ $errors->first('expression.vocabulary') }}</p>
                    </div>
                    <div  class="my-4">
                        <h2 class="text-3xl  mb-2">Meaning</h2>
                        <textarea class="w-full" name="expression[meaning]" type="text">{{ $expression->meaning }}</textarea>
                         <p style="color:red">{{ $errors->first('expression.meaning') }}</p>
                    </div>
                    <div  class="my-4">
                        <h2 class="text-3xl  mb-2">Example</h2>
                        <textarea class="w-full" name="expression[example]" type="text">{{ $expression->example }}</textarea>
                         <p style="color:red">{{ $errors->first('expression.example') }}</p>
                    </div>
                    <div  class="my-4">
                        <select name="expression[is_private]">
                            <option value="private" {{ old('expression[is_private]', $expression->is_private) == 'private' ? 'selected' : ''}}>private</option>
                            <option value="public" {{ old('expression[is_private]',$expression->is_private) == 'public' ? 'selected' : ''}}>public</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>


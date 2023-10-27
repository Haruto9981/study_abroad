<x-app-layout>
    <body>
        <div class="container px-64 pb-10 mx-auto">
            <br>
            <h1  class="text-4xl">Create</h1>
            <div class="flex justify-end" href="/diaries/index">
                <button onclick="location.href='/diaries/index'" id="expressions-button" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Back</button>
            </div>
            <div class="my-10 lg:mb-0 border border-black px-10 pt-4 pb-10 rounded-3xl">
                <form action="/diaries" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-4">
                        <h2 class="text-3xl mb-2">Title</h2>
                        <input class="w-full" type="text" name="diary[title]" placeholder="Title" value="{{ old('diary.title') }}"/>
                        <p  style="color:red">{{ $errors->first('diary.title') }}</p>
                    </div>
                    <div  class="my-4">
                        <h2 class="text-3xl  mb-2">Content</h2>
                        <textarea class="w-full h-60" name="diary[content]" oninput="countWords(value);" placeholder="What's your experience?">{{ old('diary.content') }}</textarea>
                        <p  style="color:red">{{ $errors->first('diary.content') }}</p>
                        <p>Word Count: <span  id="inputlength">0</span></p>
                    </div>
                    <div  class="my-4">
                        <h2 class="text-3xl  mb-2">Picture</h2>
                        <input type="file" name="photo"> 
                    </div>
                    <div  class="my-4">
                        <select name="diary[is_private]">
                            <option value="private" {{ old('diary[is_private]', 'private') == 'private' ? 'selected' : ''}}>private</option>
                            <option value="public" {{ old('diary.is_private') == 'public' ? 'selected' : ''}}>public</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button type="submit"  class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>


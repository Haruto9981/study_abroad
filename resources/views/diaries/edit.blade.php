<x-app-layout>
    <body>
        <div class="container px-64 pb-10 mx-auto">
            <br>
            <h1  class="text-4xl">Edit</h1>
            <a class="flex justify-end" href="/diaries/index/{{$diary->id}}">
                <button class="rounded-lg bg-orange-300 text-white font-bold px-4 py-2">Back</button>
            </a>
            <div class="my-10 lg:mb-0 border border-black px-10 pt-4 pb-10 rounded-3xl">
                <form  action="/diaries/{{ $diary->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-4">
                        <h2 class="text-3xl mb-2">Title</h2>
                        <input class="w-full" type="text" name="diary[title]"  value="{{ $diary->title }}"/>
                        <p style="color:red">{{ $errors->first('diary.title') }}</p>
                    </div>
                    <div  class="my-4">
                        <h2 class="text-3xl  mb-2">Content</h2>
                        <textarea class="w-full h-60" name="diary[content]" type="text">{{ $diary->content }}</textarea>
                         <p style="color:red">{{ $errors->first('diary.content') }}</p>
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
                        <button type="submit" class="rounded-lg bg-orange-300 text-white font-bold px-4 py-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-app-layout>


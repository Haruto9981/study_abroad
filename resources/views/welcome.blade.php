<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <title>Abroad+</title>

        <!-- Fonts -->
      
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/f7b82fd301.js" crossorigin="anonymous"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904207/apple-touch-icon_gg5xce.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904294/favicon-32x32_jhsn7u.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904334/favicon-16x16_g15wzf.png">
        <link rel="mask-icon" href="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696904413/safari-pinned-tab_ja75ta.svg">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body class="antialiased">
      <header class="bg-white border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between h-24">
              <div class="shrink-0 -m-5 flex items-center mix-blend-multiply">
                  <a class="block w-24" href="/">
                      <img src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1694504297/iyfnp36solrghvygndv8.jpg" alt="logo">
                  </a>
              </div>
              <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ml-96">
                  <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base leading-5 text-gray-500 hover:text-gray-700 hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-amber-400 transition duration-150 ease-in-out">Log in</a>
                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-base leading-5 text-gray-500 hover:text-gray-700 hover:border-orange-300 focus:outline-none focus:text-gray-700 focus:border-amber-400 transition duration-150 ease-in-out">Register</a>
                  @endif
              </div>
            </div>
        </div>
      </header>
      <div class="relative">
        <div>
           <img class="absolute w-max h-auto px-20 pt-2 pb-20" src="https://res.cloudinary.com/dkkvbt5jl/image/upload/v1696775639/Pixel%20Map.png">
        </div>
        <section class="text-gray-600 body-font absolute mx-20">
          <div class="container px-5 py-20 mx-auto">
            <div class="text-center mb-20">
              <h1 class="sm:text-5xl text-4xl font-medium title-font text-gray-900 mb-4">Make Your Study Abroad Successful!</h1>
              <p class="text-xl leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">〜すべての人の留学が有意義なものになるように〜<br>
              Abroad＋で必ず留学を成功させよう！</p>
                <a href="{{ route('register') }}">
                  <button class="flex mx-auto my-8 text-white bg-orange-300 font-bold rounded border-0 py-2 px-8 focus:outline-none hover:bg-orange-400 text-lg">Let's get started!</button>
                </a>
              <div class="flex mt-6 justify-center">
                <div class="w-16 h-1 rounded-full bg-orange-400 inline-flex"></div>
              </div>
            </div>
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-400 mb-5 flex-shrink-0">
                  <i class="fa-solid fa-book fa-2xl"></i>
                </div>
                <div class="flex-grow">
                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3">英語日記を書こう!</h2>
                  <p class="leading-relaxed text-base">留学は毎日が刺激的です。あなたの素晴らしい経験を英語で綴ってみよう。毎日の継続がWriting力向上やモチベーション維持に繋がるはずです。他の人がどんな留学生活を送っているのかも覗いてみましょう。</p>
                </div>
              </div>
              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-400 mb-5 flex-shrink-0">
                   <i class="fa-regular fa-note-sticky fa-2xl"></i>
                </div>
                <div class="flex-grow">
                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3">学んだ英語表現を共有しよう！</h2>
                  <p class="leading-relaxed text-base">留学先では新たな表現やスラング表現にたくさん出会います。これらを様々な国・地域で留学しているユーザー同士で共有しよう。「この地域ではこんな面白い英語表現があるのか」と新たな発見があるはずです。</p>
                </div>
              </div>
              <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-400 mb-5 flex-shrink-0">
                  <i class="fa-solid fa-users fa-2xl"></i>
                </div>
                <div class="flex-grow">
                  <h2 class="text-gray-900 text-lg title-font font-medium mb-3">留学仲間と繋がろう！</h2>
                  <p class="leading-relaxed text-base">留学中に意外とよく起こるのがマンネリ化です。そしてこれこそが留学失敗の原因なのです。こうした現状の中、同じ留学仲間同士で繋がることはモチベーションを高め合う上で絶大な効果を発揮するでしょう。</p>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </body>
</html>

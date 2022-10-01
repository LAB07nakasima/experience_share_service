<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold font-sans text-xl text-gray-800 leading-tight">
        {{ __('みんなの人生体験談') }}
      </h2>
    </x-slot>

    <div class="py-12">
    {{--<div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <div class="mb-6">
                <div class="flex flex-col mb-4">
                    <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">タイトル</p>
                    <p class="py-2 px-3 text-grey-darkest" id="title">
                        {{$post->title}}
                    </p>
                </div>
                <div class="flex flex-col mb-4">
                    <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">内容</p>
                    <p class="py-2 px-3 text-grey-darkest" id="contents">
                        {{$post->contents}}
                    </p>
                </div>

                <div>
                @foreach ($comments as $comment)
                    <div class="mb-2">
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">コメント</p>
                            <p class="py-2 px-3 text-grey-darkest" id="contents">
                                {{ $comment->comment }}
                            </p>
                        </div> --}}

                        {{-- @if ($comment->comment_user_id == Auth::id())
                            <form action="{{ route('comment.destroy', ['comment_id' => $comment->id]) }}" method="POST">
                                @csrf --}}
                                {{-- <button class="submit">削除</button>
                                <input type="hidden" name="post_id" value="{{ $id }}">
                            </form>
                        @endif
                    </div>
                @endforeach
                </div>

                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <div class="px-5 py-24 mx-auto flex justify-center">
                            <div class="lg:w-full md:w-full bg-white rounded-lg p-8 flex flex-col w-full mt-10 md:mt-0 shadow-md">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">コメントする</h2>
                                <p class="leading-relaxed mb-5 text-gray-600">気になったことや質問、応援など書いてください</p>

                                <div class="relative mb-4">
                                    <label for="comment" class="leading-7 text-sm text-gray-600" for="comment">Message</label>
                                    <textarea id="comment" name="comment" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $id }}">
                                </div>
                                    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信
                                    </button> --}}
                            {{-- </div>
                        </div>
                    </form>



                    <a href="{{ route('post.index') }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Back
                    </a>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

{{-- tailwind テスト --}}
      <body class="bg-gray-100 font-sans leading-normal tracking-normal">

        {{-- <nav id="header" class="fixed w-full z-10 top-0">

            <div id="progress" class="h-1 z-20 top-0" style="background:linear-gradient(to right, #4dc0b5 var(--scroll), transparent 0);"></div>

            <div class="w-full md:max-w-4xl mx-auto flex flex-wrap items-center justify-between mt-0 py-3">

                <div class="pl-4">
                    <a class="text-gray-900 text-base no-underline hover:no-underline font-extrabold text-xl" href="#">
                        Minimal Blog
                    </a>
                </div>

                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-green-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>

                <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-100 md:bg-transparent z-20" id="nav-content">
                    <ul class="list-reset lg:flex justify-end flex-1 items-center">
                        <li class="mr-3">
                            <a class="inline-block py-2 px-4 text-gray-900 font-bold no-underline" href="#">Active</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4" href="#">link</a>
                        </li>
                        <li class="mr-3">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-2 px-4" href="#">link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

        <!--Container-->
        <div class="container w-full md:max-w-3xl mx-auto pt-20 bg-white rounded-lg">

            <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

                <!--Title-->
                <div class="font-sans">
                    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl ml-6">{{$post->title}}</h1>

                    <div class="flex pt-4">
                        <p class="text-sm md:text-base font-normal text-gray-600">投稿者: &nbsp; {{ $post->user->name }}</p>
                        <p class="text-sm md:text-base font-normal text-gray-600 ml-8">投稿日: &nbsp;{{ $post->created_at }}</p>
                    </div>
                </div>


                <!--Post Content-->


                <!--Lead Para-->
                <p class="py-8 font-sans">
                    {{$post->contents}}
                </p>

                {{-- <p class="py-6 font-sans">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis tortor sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt urna. Cras nisi diam, pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum, dignissim lorem eu, blandit massa. Phasellus eleifend turpis vel erat bibendum scelerisque. Maecenas id risus dictum, rhoncus odio vitae, maximus purus. Etiam efficitur dolor in dolor molestie ornare. Aenean pulvinar diam nec neque tincidunt, vitae molestie quam fermentum. Donec ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec nulla eget sem dictum elementum.</p> --}}

                {{-- <ol>
                    <li class="py-3 font-sans">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus. Fusce vehicula dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est quam. Suspendisse quam quam, commodo sit amet placerat in, interdum a ipsum. Morbi sit amet tellus scelerisque tortor semper posuere.</li>
                    <li class="py-3 font-sans">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo. Duis auctor ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra. Nullam lorem mauris, faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum luctus hendrerit. Ut eros magna, eleifend ac ornare vulputate, pretium nec felis.</li>
                    <li class="py-3 font-sans">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique rutrum velit. Mauris accumsan tempor felis vitae gravida. Cras egestas convallis malesuada. Etiam ac ante id tortor vulputate pretium. Maecenas vel sapien suscipit, elementum odio et, consequat tellus.</li>
                </ol> --}}

                {{-- 引用 --}}
                <blockquote class="border-l-4 border-green-500 italic my-8 pl-8 md:pl-12">ここに画像を入れられるように機能を作ります</blockquote>

                {{-- <p class="py-6">Example code block:</p>
                <pre class="bg-gray-900 rounded text-white font-mono text-base p-2 md:p-4">
                    <code class="break-words whitespace-pre-wrap"> --}}
                        {{-- &lt;header class="site-header outer"&gt;
                        &lt;div class="inner"&gt;
                        {!! &gt; "site-nav" !!}
                        &lt;/div&gt;
                        &lt;/header&gt; --}}
                    {{-- </code>
                </pre> --}}


                <!--/ Post Content-->

            </div>

            <!--Tags -->
            <div class="text-base md:text-sm text-gray-500 px-4 py-6">
                Tags: 多分ここにカテゴリー表示をさせます <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a> . <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">Link</a>
            </div>

            <!--Divider-->
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">


            <!--Subscribe-->
            {{-- <div class="container px-4">
                <div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center">
                    <h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to my Newsletter</h2>
                    <h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered right to your inbox</h3>
                    <div class="w-full text-center pt-4">
                        <form action="#">
                            <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                                <input type="email" placeholder="youremail@example.com" class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                                <button type="submit" class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> --}}
            <!-- /Subscribe-->



            <!--Author(著者)-->
            <h1 class="font-bold font-sans py-2 px-8 font-sans text-2xl md:text-3xl"> 投稿者 </h1>
            <div class="flex w-full items-center font-sans px-8 py-12">
                <img class="w-10 h-10 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                <div class="flex-1 px-2">
                    <p class="text-base font-bold text-base md:text-xl leading-none mb-2">{{ $post->user->name }}</p>
                    <p class="text-gray-600 text-xs md:text-base">Minimal Blog Tailwind CSS template by <a class="text-green-500 no-underline hover:underline" href="https://www.tailwindtoolbox.com">TailwindToolbox.com</a></p>
                </div>
                <div class="justify-end">
                    <a href="{{ route('post.index') }}">
                    <button class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">戻る</button>
                    </a>
                </div>
            </div>
            <!--/Author-->

            <!--Divider(区切り)-->
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">


            {{-- コメント --}}
            <div class="w-full px-8 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
                <div class="font-sans">
                    <h1 class="font-bold py-2 font-sans text-2xl md:text-3xl"> Comment</h1>

                    @foreach ($comments as $comment)
                    <div class="ml-8 mb-8">
                        <p class="text-sm font-sant" id="contents">
                            {{ $comment->name }}
                        </p>
                        <p class="pb-6 font-sant" id="contents">
                            {{ $comment->comment }}
                        </p>

                        @if ($comment->comment_user_id == Auth::id())
                            <form action="{{ route('comment.destroy', ['comment_id' => $comment->id]) }}" method="POST" class="">
                                @csrf
                                <button class="submit bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full ">Comment削除</button>
                                <input type="hidden" name="post_id" value="{{ $id }}">
                            </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!--Divider(区切り)-->
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">

            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <div class="px-5 py-24 mx-auto flex justify-center">
                    <div class="lg:w-full md:w-full p-8 flex flex-col w-full mt-10 md:mt-0">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">コメントする</h2>
                        <p class="leading-relaxed mb-5 text-gray-600">気になったことや質問、応援など書いてください</p>

                        <div class="relative mb-4">
                            <label for="comment" class="leading-7 text-sm text-gray-600" for="comment">Message</label>
                            <textarea id="comment" name="comment" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            <input type="hidden" name="post_id" value="{{ $id }}">
                        </div>
                            <button type="submit" class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full">送信
                            </button>
                            {{-- <a class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none" href="/post/{{ $post->id }}">投稿に戻る</a> --}}
                    </div>
                </div>
            </form>

            <!--Divider(区切り)-->
            <hr class="border-b-2 border-gray-400 mb-8 mx-4">

            <!--Next & Prev Links-->
            {{-- <div class="font-sans flex justify-between content-center px-4 pb-12">
                <div class="text-left">
                    <span class="text-xs md:text-sm font-normal text-gray-600">&lt; Previous Post</span><br>
                    <p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
                </div>
                <div class="text-right">
                    <span class="text-xs md:text-sm font-normal text-gray-600">Next Post &gt;</span><br>
                    <p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
                </div>
            </div> --}}


            <!--/Next & Prev Links-->

        </div>
        <!--/container-->

        <footer class="bg-white border-t border-gray-400 shadow">
            <div class="container max-w-4xl mx-auto flex py-8">

                <div class="w-full mx-auto flex flex-wrap">
                    <div class="flex w-full md:w-1/2 ">
                        {{-- <div class="px-8"> --}}
                            <h3 class="font-bold text-gray-900">About</h3>
                            {{-- <p class="py-4 text-gray-600 text-sm">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.
                            </p> --}}
                        {{-- </div> --}}
                    </div>

                    <div class="flex w-full md:w-1/2">
                        <div class="px-8">
                            <h3 class="font-bold text-gray-900">Social</h3>
                            <ul class="list-reset items-center text-sm pt-3">
                                <li>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                                </li>
                                <li>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                                </li>
                                <li>
                                    <a class="inline-block text-gray-600 no-underline hover:text-gray-900 hover:text-underline py-1" href="#">Add social link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            /* Progress bar */
            //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
            var h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight',
                progress = document.querySelector('#progress'),
                scroll;
            var scrollpos = window.scrollY;
            var header = document.getElementById("header");
            var navcontent = document.getElementById("nav-content");

            document.addEventListener('scroll', function() {

                /*Refresh scroll % width*/
                scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
                progress.style.setProperty('--scroll', scroll + '%');

                /*Apply classes for slide in bar*/
                scrollpos = window.scrollY;

                if (scrollpos > 10) {
                    header.classList.add("bg-white");
                    header.classList.add("shadow");
                    navcontent.classList.remove("bg-gray-100");
                    navcontent.classList.add("bg-white");
                } else {
                    header.classList.remove("bg-white");
                    header.classList.remove("shadow");
                    navcontent.classList.remove("bg-white");
                    navcontent.classList.add("bg-gray-100");

                }

            });


            //Javascript to toggle the menu
            document.getElementById('nav-toggle').onclick = function() {
                document.getElementById("nav-content").classList.toggle("hidden");
            }
        </script>

    </body>

</x-app-layout>

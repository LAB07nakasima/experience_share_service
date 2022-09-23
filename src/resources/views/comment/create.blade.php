<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('コメント') }}
      </h2>
    </x-slot>
    {{-- <div class="card-body line-height">
        <div id="comment-post-{{ $post->id }}">
            {{-- @include('post.comment_list') --}}
            {{-- <p>テスト</p>
        </div>
        <a class="light-color post-time no-text-decoration" href="/posts/{{ $post->id }}/comments">{{ $article->created_at }}</a>
        <hr>
        <div class="row actions" id="comment-form-article-{{ $article->id }}">
            <form class="w-100" id="new_comment" action="/posts/{{ $post->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                <input value="{{ $post->id }}" type="hidden" name="post_id" />
                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
            </form>
        </div>
    </div> --}}


    <section class="text-gray-600 body-font relative">
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <div class="px-5 py-24 mx-auto flex justify-center">
                <div class="lg:w-1/2 md:w-1/2 bg-white rounded-lg p-8 flex flex-col w-full mt-10 md:mt-0 shadow-md">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">コメントする</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">気になったことや質問、応援など書いてください</p>

                    <div class="relative mb-4">
                        <label for="comment" class="leading-7 text-sm text-gray-600" >Message</label>
                        <textarea id="comment" name="comment" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                        <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信
                        </button>
                        {{-- <a class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none" href="/post/{{ $post->id }}">投稿に戻る</a> --}}
                </div>
            </div>
        </form>
    </section>

</x-app-layout>

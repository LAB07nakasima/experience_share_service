<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Show post detail') }}
      </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
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

                @foreach ($comments as $comment)
                    <div class="mb-2">
                        <span>
                            <strong>
                                {{-- <a class="no-text-decoration black-color" href="{{ route('post.index', ['name' => $comments->user->name]) }}">{{ $comments->user->name }}</a> --}}
                            </strong>
                        </span>
                        <div class="flex flex-col mb-4">
                            <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">コメント</p>
                            <p class="py-2 px-3 text-grey-darkest" id="contents">
                                {{ $comment->comment }}
                            </p>
                        </div>
                        {{-- <span>{{ $comment->comment }}</span> --}}
                        @if ($comment->comment_user_id == Auth::id())
                            <form action="{{ route('comment.destroy', ['comment_id' => $comment->id]) }}" method="POST">
                                @csrf
                                {{-- <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comment/{{ $comment->id }}">
                                    消去
                                </a> --}}
                                <button class="submit">削除</button>
                                <input type="hidden" name="post_id" value="{{ $id }}">
                            </form>

                        @endif
                    </div>
                @endforeach

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
                                    </button>
                                    {{-- <a class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none" href="/post/{{ $post->id }}">投稿に戻る</a> --}}
                            </div>
                        </div>
                    </form>



                    <a href="{{ route('post.index') }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Back
                    </a>
              </div>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>

<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('投稿一覧') }}
      </h2>
    </x-slot>


        {{-- CSSテスト --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="container px-5 py-24 mx-auto">
                        {{-- container mx-auto =コンテナを中央に配置--}}
                        <div class="-my-8 divide-y-2 divide-gray-100">

                                @foreach ($posts as $post)
                                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                            <span class="font-semibold title-font text-gray-600">カテゴリー
                                            </span>
                                            {{-- <span class="mt-1 text-gray-600">
                                                {{ $post->created_at }}
                                            </span> --}}
                                            <span class="mt-4 text-gray-600">
                                                {{$post->user->name}}
                                            </span>
                                            <span class="mt-1 text-gray-600">
                                                フォロー数：{{ $post->user->followers()->count() }}
                                            </span>
                                            <span class="mt-1 text-gray-600">@if ($post->user_id !== Auth::user()->id)
                                                @if(Auth::user()->followings()->where('users.id', $post->user->id)->exists())
                                                    <!-- unfollow ボタン -->
                                                    <form action="{{ route('unfollow', $post->user) }}" method="POST" class="text-left">
                                                    @csrf
                                                        <button type="submit" class="text-gray-600 bg-white-700 hover:bg-white-800 focus:outline-none focus:ring-4 focus:ring-white-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-white-600 ">
                                                            フォロー解除
                                                            </span>
                                                        </button>
                                                        {{ $post->user->followers()->count() }}
                                                    </form>
                                                @else
                                                    <!-- follow ボタン -->
                                                    <form action="{{ route('follow', $post->user) }}" method="POST" class="text-left">
                                                    @csrf
                                                        {{-- <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"> --}}
                                                        <button type="submit" class="text-gray-600 bg-white-700 hover:bg-white-800 focus:outline-none focus:ring-4 focus:ring-white-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-white-600 ">
                                                            フォローする
                                                        </button>
                                                    </form>
                                                @endif
                                                @endif
                                            </span>
                                        </div>
                                        <div class="md:flex-grow">
                                            <div class="flex">
                                                <h2 class="text-2xl font-medium font-sans text-gray-900 title-font mb-2">
                                                    {{ $post->title }}
                                                </h2>
                                                <p class="text-gray-700 font-sans text-sm ml-auto my-auto">投稿日{{ $post->created_at }}</p>
                                            </div>
                                            <p class="leading-relaxed font-sans my-8">
                                                {{ $post->contents }}
                                            </p>
                                            <a class="text-indigo-500 inline-flex items-center mt-4" href="{{ route('post.show', $post->id) }}">
                                                Learn More
                                            </a>
                                            <span class="text-gray-400 mr-1 inline-flex items-center ml-auto leading-none text-sm pr-1 py-1 border-gray-200">
                                                <!-- favorite 状態で条件分岐 -->
                                                @if($post->users()->where('user_id', Auth::id())->exists())
                                                <!-- unfavorite ボタン -->
                                                    <form action="{{ route('unfavorites',$post) }}" method="POST" class="text-left">
                                                        @csrf
                                                        <button type="submit" class="flex mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                                                            <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <!-- favorite ボタン -->
                                                    <form action="{{ route('favorites',$post) }}" method="POST" class="text-left">
                                                        @csrf
                                                        <button type="submit" class="flex ml-1 text-sm text-center hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                                                            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                                {{ $post->users()->count() }}

                                                <!-- 🔽 条件分岐でログインしているユーザが投稿したもののみ編集ボタンと削除ボタンが表示される -->
                                                @if ($post->user_id === Auth::user()->id)
                                                <!-- 更新ボタン -->
                                                    <form action="{{ route('post.edit',$post->id) }}" method="GET" class="text-left">
                                                        @csrf
                                                        <button type="submit" class="mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif

                                                <!-- 🔽 削除ボタン -->
                                                @if ($post->user_id === Auth::user()->id)
                                                    <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="text-left">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                            <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                @endforeach




                            <div class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                    <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                                    <span class="mt-1 text-gray-500 text-sm">12 Jun 2019</span>
                                </div>
                                <div class="md:flex-grow">
                                    <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Meditation bushwick direct trade taxidermy shaman</h2>
                                    <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
                                        <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                </div>
                            </div>
                            <div class="py-8 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                    <span class="font-semibold title-font text-gray-700">CATEGORY</span>
                                    <span class="text-sm text-gray-500">12 Jun 2019</span>
                                </div>
                                <div class="md:flex-grow">
                                    <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">Woke master cleanse drinking vinegar salvia</h2>
                                    <p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>
                                    <a class="text-indigo-500 inline-flex items-center mt-4">Learn More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ここまで --}}

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  投稿一覧画面
                    <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap -m-8">
                        @foreach ($posts as $post)
                        <div class="p-12 md:w-1/2 p-4 flex flex-col items-start">
                            <div class="border p-2">
                                <span class="block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">カテゴリー２</span>
                                    <h2 class="sm:text-3xl text-2xl title-font font-semibold text-center text-gray-900 mt-4 mb-4">{{ $post->title }}</h2>
                                        <p class="leading-relaxed mb-8">内容: {{ $post->contents }}</p>

                                    <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                                        {{-- <a class="text-indigo-500 inline-flex items-center"> --}}
                                        {{-- <a href="{{ route('post.show', $post->id) }}">Learn More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>

                                        いいね機能
                                        <span class="text-gray-400 mr-1 inline-flex items-center ml-auto leading-none text-sm pr-1 py-1 border-gray-200">

                                            <!-- favorite 状態で条件分岐 -->
                                            @if($post->users()->where('user_id', Auth::id())->exists())
                                            <!-- unfavorite ボタン -->
                                                <form action="{{ route('unfavorites',$post) }}" method="POST" class="text-left">
                                                    @csrf
                                                    <button type="submit" class="flex mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                                                        <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <!-- favorite ボタン -->
                                                <form action="{{ route('favorites',$post) }}" method="POST" class="text-left">
                                                    @csrf
                                                    <button type="submit" class="flex ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                                                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    $post->users()->count() }}
                                                    </button>
                                                </form>
                                            @endif
                                            {{ $post->users()->count() }}
                                        </span>

                                        {{-- コメント詳細 --}}
                                        {{-- <span class="text-gray-400 mr-1 inline-flex items-center ml-1 leading-none text-sm pr-1 py-1">
                                            <form action="{{ route('comment.show', ['post_id' => $post->id]) }}" method="GET" class="text-left">
                                                <button type="submit" class="flex ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-black py-1 px-2 focus:outline-none focus:shadow-outline">
                                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                                    </svg>コメント
                                                </button>
                                            </form>
                                        </span> --}}

                                        <!-- 🔽 条件分岐でログインしているユーザが投稿したもののみ編集ボタンと削除ボタンが表示される -->
                                        {{-- @if ($post->user_id === Auth::user()->id) --}}
                                        <!-- 更新ボタン -->
                                            {{-- <form action="{{ route('post.edit',$post->id) }}" method="GET" class="text-left">
                                                @csrf
                                                <button type="submit" class="mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif --}}

                                        <!-- 🔽 削除ボタン -->
                                        {{-- @if ($post->user_id === Auth::user()->id)
                                            <form action="{{ route('post.destroy',$post->id) }}" method="POST" class="text-left">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="mr-1 ml-1 text-sm hover:bg-gray-200 hover:shadow-none text-white py-1 px-2 focus:outline-none focus:shadow-outline">
                                                    <svg class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="black">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div> --}}

                                    {{-- フォロー関係のUI --}}
                                    {{-- <a class="inline-flex items-center">
                                        <img alt="blog" src="https://dummyimage.com/103x103" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                        <span class="flex-grow flex flex-col pl-4">
                                        <span class="title-font font-medium text-gray-900">ユーザー名：{{$post->user->name}}</span>
                                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">
                                             DESIGNER(フォロワーだったらフォロワーとか表示させたい)
                                            @if ($post->user_id !== Auth::user()->id)
                                            @if(Auth::user()->followings()->where('users.id', $post->user->id)->exists())
                                            <!-- unfollow ボタン -->
                                            <form action="{{ route('unfollow', $post->user) }}" method="POST" class="text-left">
                                            @csrf
                                                <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                                    フォロー解除
                                                    </span>
                                                </button>
                                                {{ $post->user->followers()->count() }}

                                            </form>
                                            @else
                                            <!-- follow ボタン -->
                                            <form action="{{ route('follow', $post->user) }}" method="POST" class="text-left">
                                            @csrf
                                                <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                                    フォロー
                                                </button>
                                                {{ $post->user->followers()->count() }}
                                            </span>
                                            </form>
                                            @endif
                                            @endif

                                        </span>
                                    </a>
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </section>
                </div>
              </div>
            </div>
          </div> --}}
</x-app-layout>

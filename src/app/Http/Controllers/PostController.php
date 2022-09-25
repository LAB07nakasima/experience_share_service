<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = [];
        $posts = Post::getAllOrderByUpdated_at();
        // dd($posts);

        return view('post.index',compact('posts'),

        // ×ペジネーションをつけたい
        [
            'posts' => DB::table('posts')->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator =  Validator::make($request->all(),[
            'title' => 'string|max:35',
            'contents' => 'string|max:2048',
        ]);
        // バリデーションエラー
        if ($validator->fails()) {
            return redirect()
                ->route('post/create')
                ->withInput()
                ->withErrors($validator);
        }

        // create()は最初から用意されている関数で戻り値は挿入されたレコードの情報
        $data = $request->merge(['user_id' => Auth::user()->id])->all();

        $result = Post::create($data);
        $posts = Post::getAllOrderByUpdated_at();
        // dd($posts);
        // ルーティング[post.index]にリクエスト送信
        return redirect()->route('post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // IDを指定して１件のデータを取得 postという名前でshow.bladeに渡す
        $post = Post::find($id);

        // commentのデータも必要なので取ってくる
        // 取ってきた$idとpost_idカラムで一致したレコードを取得
        $comments = Comment::where('comment_post_id' , $id)
            ->get();

        // dd($comments);
        return view('post.show', compact('post', 'id', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:35',
            'contents' => 'string|max:2048',

        ]);
        // バリデーションエラー
        if ($validator->fails()){
            return redirect()
                ->route('post.edit', $id)
                ->withInput()
                ->withErrors($validator);
        }
        //データの更新処理
        $result = Post::find($id)->update($request->all());
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Post::find($id)->delete();
        return redirect()->route('post.index');
    }

    public function mydata()
    {
        // Userモデルに定義したリレーションを使用してデータを取得
        $posts = User::query()
            ->find(Auth::user()->id)
            ->userPosts()
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($posts);
        return view('post.index', compact('posts'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('comment.create');
        // return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($id);
        // commentのデータをDBに保存
        $comments = new Comment();
        $comments->comment = $request->comment;
        $comments->comment_post_id = $request->post_id;
        $comments->comment_user_id = Auth::user()->id;
        $comments->save();

        // inputタグ hiddenで渡した値を取得する
        $post_id = $request->input('post_id');

        $comments = DB::table('comments')
            ->select('comments.*', 'users.name')
            ->join('users','comments.comment_user_id', 'users.id')
            ->where('comment_post_id', $post_id)
            ->get()
            ->toArray();

        // dd($comments);

        //post情報の取得をしてviewに返す
        $post = Post::where('id', $post_id )
            ->first();
        // dd($post);

        return view('post.show', compact('comments', 'post' ))
            ->with('id', $post_id);

        // フォームから送信されてきたデータとユーザーIDをマージし、DBにinsertする
        // $data = $request->merge(['user_id' => Auth::user()->id])->all();
        // $result = Comment::create($data);

        // $post_id = $request->post_id;

        // return redirect()->route('comment.show', ['post' => $post_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $post_id)
    {
        // IDを指定して１件のデータを取得 postという名前でshow.bladeに渡す
        $id = $request->post_id;
        $comments = DB::table('comments')
            ->select('comments.*', 'users.name')
            ->join('users','comments.comment_user_id', 'users.id')
            ->where('comment_post_id', $id)
            ->get()
            ->toArray();

        $post =DB::table('posts')
            ->select()
            ->where('id', $id)
            ->get()
            ->first();

        // dd($comments);
        return view('comment.show', compact('comments','post'));

        // お手本
        // $client = DB::table('clients')
        //     ->select('clients.*', 'industries.name as industry')
        //     ->join('industries', 'clients.industry_id', 'industries.id')
        //     ->where('clients.id', $id)
        //     ->get()
        //     ->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, int $comment_id)
    {

        // dd($comment_id);
        $comment = Comment::find($comment_id);
        $comment->delete();
        // dd($comment);

        $post_id = $request->input('post_id');

        // $this_post_id = DB::table('comments')
        //
        //     ->select('comments.*', 'users.name')
        //     ->join('users','comments.user_id', 'users.id')
        //     ->where('id', $comment_id)
        //     ->get();
        // dd($this_post_id);

        // return redirect()->route('post.show')
        //     ->with('post', $comment_id);

        // URL
        return redirect("/post/" . $post_id );
    }
}

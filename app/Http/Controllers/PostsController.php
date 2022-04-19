<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->select('users.username','users.images','posts.user_id','posts.id','posts.posts','posts.created_at')
            ->orderBy('posts.created_at','desc')
            ->get();
        return view('posts.index',['list'=>$list]);
    }

    public function create(Request $request)
    {
        //dd(Auth::id());
        $post = $request->input('newPost');
        DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/top');
    }

    public function edit(Request $request){
        $post = $request->input('upPost');
        $id = $request->input('id');
        DB::table('posts')
            ->where('id', $id)
            ->update([
                'posts' => $post,
                'updated_at' => now(),
            ]);
        return redirect('/top');
    }

    public function delete($id){
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

}

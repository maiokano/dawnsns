<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile($id){
        $user = DB::table('users')
            ->where ('id',$id)
            ->first();
        $user_posts = DB::table('posts')
            ->join('users','users.id','=','posts.user_id')
            ->where('users.id',$id)
            ->select('users.username','users.images','posts.posts','posts.created_at')
            ->get();
        $follow_list = DB::table('follows')
            ->where('follower',Auth::id())
            ->get()
            ->toArray();
        return view('users.profile',['user'=>$user,'user_posts'=>$user_posts,'follow_list'=>$follow_list]);
    }
    public function search(Request $request){
        $name = $request->input('username');
        $follow_list = DB::table('follows')
            ->where('follower',Auth::id())
            ->get()
            ->toArray();

        if($name !== null){
            $users = DB::table('users')
            ->where('id','<>',Auth::id())
            ->where('username','like',"%$name%")
            ->get();
        }else{
            $users = DB::table('users')
                ->where('id','<>',Auth::id())->get();
        }

        return view('users.search',['users'=>$users,'follow_list'=>$follow_list]);
    }
}

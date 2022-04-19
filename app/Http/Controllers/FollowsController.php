<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $users = DB::table('users')
            ->join('follows','users.id','=','follows.follow')
            ->where('follower',Auth::id())
            ->select('users.id','users.images')
            ->get();

        $follow_posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->join('follows','users.id','=','follows.follow')
            ->where('follower',Auth::id())
            ->select('users.id','users.username','users.images','posts.posts','posts.created_at')
            ->get();

        return view('follows.followList',['users'=>$users,'follow_posts'=>$follow_posts]);
    }
    public function followerList(){
        return view('follows.followerList');
    }

    public function follow($follower){
        DB::table('follows')->insert([
            'follower' => Auth::id(),
            'follow' => $follower,
        ]);
        return back();

    }

    public function unfollow($follow){
        DB::table('follows')
            ->where('follow',$follow)
            ->where('follower',Auth::id())
            ->delete();
        return back();
    }
}
